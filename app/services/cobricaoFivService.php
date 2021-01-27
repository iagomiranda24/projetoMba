<?php


namespace App\services;

use App\repositories\cobricaoFivRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use function Stringy\create;
use Illuminate\Support\Facades\Validator;

class cobricaoFivService
{
    protected $request;
    protected $cobricaoFivRepository;

    public function __construct (Request $request, cobricaoFivRepository $cobricaoFivRepository) {

        $this->request = $request;
        $this->cobricaoFivRepository = $cobricaoFivRepository;

    }

    public function viewDeExibirDadosDaCobricaoFiv()

    {

        $colecaoCobricaoFiv = $this->cobricaoFivRepository->dadosCobricaoFivModel()->get();

        return view('cobricao-fiv.exibir-dados-cobricao-fiv', compact('colecaoCobricaoFiv'));

    }


    public function viewDeCadastrarCobricaoFiv()

    {

        return view('cobricao-fiv.cobricao-fiv-cadastrar');

    }

    public function logicaDoCadastroDeCobricaoFiv()
    {
        $validator = Validator::make($this->request->all(), ['name_criador' => 'min:3|max:60|',
            'data_aquisição' => 'min:5|max:15',
            'raca' => 'min:5|max:60',
            'categoria' => 'min:5|max:60',
            'n_embrioes' => '',
            'n_registro' => 'max:60',
            'matriz_doadora' => 'min:3|max:60',
            'matriz_receptora' => 'min:3|max:60',
            'reprodutor' => 'min:3|max:60']);

        if ($validator->fails()) {

            return redirect('/cadastrar-cobricao-fiv')
                ->withErrors($validator)
                ->withInput($this->request->all());

        }

        $dados = [

            'name_criador' => $this->request->get('name_criador'),
            'data_aquisição' => $this->request->get('data_aquisição'),
            'matriz_doadora' => $this->request->get('matriz_doadora'),
            'reprodutor' => $this->request->get('reprodutor'),
            'raca' => $this->request->get('raca'),
            'categoria' => $this->request->get('categoria'),
            'n_embrioes' => $this->request->get('n_embrioes'),
            'n_registro' => ($this->request->get('n_registro')),
            'matriz_receptora' => ($this->request->get('matriz_receptora')),

        ];

        $criarCobricaoFiv = $this->cobricaoFivRepository->dadosCobricaoFivModel()->insert($dados);

        dd($criarCobricaoFiv);

    }

}
