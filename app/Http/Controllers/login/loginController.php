<?php


namespace App\Http\Controllers\login;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use function Stringy\create;
use App\services\userService;

class loginController extends Controller
{

    protected $userService;

    public function __construct(userService $userService)
    {

        $this->userService = $userService;

    }

    public function viewDeLogin()
    {

        return $this->userService->mostraViewLogin();

    }

    public function viewDeCadastro()
    {

        return $this->userService->mostraviewCadastroUser();

    }

    public function logicaDoCadastroDeUsuario()
    {

        return $this->userService->logicaviewCadastroUser();

    }

    public function mostraApaginaHome()
    {

        return $this->userService->mostraApaginaInicial();

    }

    public function Authenticando() {

        return $this->userService->AutenticaUsuario();

    }

    public function SairDaSessao(){

        return $this->userService->Sair();
    }
}