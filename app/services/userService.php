<?php


namespace App\services;

use Illuminate\Http\Request;
use App\models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use function Stringy\create;
use App\repositories\userRepository;
use Illuminate\Support\Facades\Validator;

class userService
{

    protected $userRepository;
    protected $request;

    public function __construct(userRepository $userRepository, Request $request)
    {

        $this->userRepository = $userRepository;
        $this->request = $request;

    }

    public function mostraViewLogin()
    {

        return view('login.login-index');

    }

    public function mostraviewCadastroUser()
    {

        return view('login.cadastrar-login');

    }

    public function mostraApaginaInicial()
    {

        return view('index.index-pagina-inicial');

    }

    public function logicaviewCadastroUser()
    {

        $validator = Validator::make($this->request->all(), ['name' => 'required|min:3|max:60|',
            'email' => 'required|min:5|max:60|',
            'user' => 'required|min:3|max:60|',
            'password' => 'required|min:8|max:60|confirmed']);

        if ($validator->fails()) {

            return redirect('/create-login')
                ->withErrors($validator)
                ->withInput($this->request->except('password', 'confirm_password'));

        }

        $usuario = $this->request->get('user');

        $usuarioExistente = DB::table('users')->select('user')->where('user', '=', $usuario)->get();

        if ($usuarioExistente != null) {

            return redirect('create-login')
                ->withInput($this->request->except('password', 'confirm_password'))
                ->with('userError', 'O usuário, [' . $usuario . '] já existe');
        }

        $email = $this->request->get('email');

        $emailExistente = DB::table('users')->select('email')->where('email', '=', $email)->get();

        if ($emailExistente != null) {

            return redirect('create-login')
                ->withInput($this->request->except('password', 'confirm_password'))
                ->with('emailError', 'O email, [' . $email . '] já existe');
        }

        $dados = [

            'name' => $this->request->get('name'),
            'email' => $this->request->get('email'),
            'user' => $this->request->get('user'),
            'password' => Hash::make($this->request->get('password'))

        ];

        $criarUsuario = $this->userRepository->modelUser()->create($dados);

        if ($criarUsuario) {

            return redirect('create-login')->with('Success', 'Login Criado com sucesso');

        }
    }

    public function AutenticaUsuario()
    {

        $validator = Validator::make($this->request->all(), [
            'user' => 'min:5|max:60|',
            'password' => 'min:8|max:60']);

        if ($validator->fails()) {

            return redirect('/login')
                ->withErrors($validator)
                ->withInput($this->request->except('password', 'confirm_password'));

        }

        $user = $this->request->get('user');
        $password = $this->request->get('password');

        if (Auth::attempt(['user' => $user, 'password' => $password])) {

            return redirect('/login')->with('loginSucesso', 'Login iniciado com sucesso')->withInput($this->request->all());;

        } else {

            $user = $this->request->get('user');

            $userExistente = DB::table('users')->select('user')->where('user', '=', $user)->get();

            $senha = $this->request->get('password');

            $senhaExistente = DB::table('users')->select('password')->where('password', '=', $user)->get();

            if ($senhaExistente == null && $userExistente != null) {

                $senha = "Senha Inválida";

                return redirect('/login')
                    ->with('senha', $senha)
                    ->withErrors($validator)
                    ->withInput($this->request->except('password'));

            }

            if ($senhaExistente == null && $userExistente == null) {

                $senhaUser = "Usuário e/ou senha inválidos.";

                return redirect('/login')
                    ->with('senhaUser', $senhaUser)
                    ->withErrors($validator)
                    ->withInput($this->request->except('password'));
            }
        }
    }

    public function Sair()
    {

        Session::flush();

        Auth::logout();

        return redirect('/login');


    }
}
