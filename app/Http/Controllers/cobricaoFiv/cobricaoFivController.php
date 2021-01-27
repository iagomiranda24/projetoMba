<?php


namespace App\Http\Controllers\cobricaoFiv;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\User;
use Illuminate\Support\Facades\DB;
use function Stringy\create;
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

}