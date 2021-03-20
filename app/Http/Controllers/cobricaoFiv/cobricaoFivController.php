<?php


namespace App\Http\Controllers\cobricaoFiv;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use function Stringy\create;
use App\models\cobricaoFivModel;
use App\services\cobricaoFivService;

class cobricaoFivController extends Controller
{
    protected $cobricaoFivService;

    public function __construct (Request $request, cobricaoFivService $cobricaoFivService) {

        $this->cobricaoFivService = $cobricaoFivService;
         $this->request = $request;

    }

    public function mostrarViewDeCadastroCobricaoFiv() {

        return $this->cobricaoFivService->viewDeCadastrarCobricaoFiv();

    }

    public function logicaDoCadastroDeCfIv() {

        return $this->cobricaoFivService->logicaDoCadastroDeCobricaoFiv();

    }

    public function mostrarFuncaoDadosController() {

        return $this->cobricaoFivService->viewDeExibirDadosDaCobricaoFiv();

    }

    public function editarDadosCobricaoFiv($id) {

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

            return redirect('view-dados-cobricao-fiv')
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

        $cobricaoFivParaEditar = DB::table('cobricaofivmodel')->where('id' ,'=', $id)->update($dados);

        if($cobricaoFivParaEditar) {

            $Success = 'Ediçãp efetuado com sucesso';

            return redirect('view-dados-cobricao-fiv')
                ->with('Success', $Success);

        } else {

            $Error = 'Cadastro não efetuado';

            return redirect('view-dados-cobricao-fiv')
            ->with('Error', $Error);

        }


    }

    public function deletar($id)
    {

        if (Auth::user()->name == "administrador") {

            $pegarObjetoEDeletar = DB::table('cobricaofivmodel')->where('id', '=', $id)->delete();

            if ($pegarObjetoEDeletar) {

                $Success = "O item foi excluido com sucesso";

                return redirect('view-dados-cobricao-fiv')
                    ->with('Success', $Success);

            } else {

                $Error = 'Exclusão não efetuada';

                return redirect('view-dados-cobricao-fiv')
                    ->with('Error', $Error);

            }

        } else {

            $Error1 = 'Você não tem permissão para excluir';

            return redirect('view-dados-cobricao-fiv')
                ->with('Error', $Error1);


        }
    }

}