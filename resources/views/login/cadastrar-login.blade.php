@extends('templates-base.template-base')
<script src="{{asset('assets/sweetalert2-js/dist/sweetalert2.all.js')}}"></script>
<link rel="stylesheet" href="{{asset('assets/sweetalert2-js/dist/sweetalert2.css')}}">
<script src="{{asset('assets/scripts-personalizados/cadastro-script-personalizado.js')}}" type="text/javascript"}}></script>
@section('content')

    @if(isset($errors) && count($errors) > 0)

            <script>
                Swal.fire('Error:', 'Errors: @foreach($errors->all() as $error) {{$error}} "<br>" @endforeach', 'error');
            </script>

        @endif

    @if(session('userError'))

        <script>

            Swal.fire('Info', '<p class="alert alert-info">{{session('userError')}}</p> ','info');

        </script>

        @endif

    @if(session('emailError'))

        <script>

            Swal.fire('Info', '<p class="alert alert-info">{{session('emailError')}}</p> ','info');

        </script>

    @endif

    @if(session('Success'))

        <script>

            Swal.fire('Info', '<p class="alert alert-success">{{session('Success')}}</p> ','success');
            setTimeout(function(){ window.location.href= 'login';}, 2000);

        </script>
    @endif

    <div class="row" id="form-login">
        <h1 class="text-center" id="title-form-1"> Criar Usuário  </h1>
        <form action="{{url('/create-login')}}" method="POST" class="form">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <label id="label-create-login">  Nome: </label>
            <input type="text" name="name" class="form-control" placeholder=" Digite seu nome" value="{{old('name')}}" required>
            <br>
            <label id="label-create-login">  Usuário: </label>
            <input type="text" name="user" class="form-control" placeholder=" Digite seu usuário" value="{{old('user')}}" required>
            <br>
            <label id="label-create-login">  Email: </label>
            <input type="email" name="email" class="form-control" placeholder=" Digite seu email" value="{{old('email')}}" required>
            <br>
            <label id="label-create-login">  Senha: </label>
            <input type="password" name="password" class="form-control" placeholder=" Digite sua senha" required>
            <br>
            <label id="label-create-login">  Confirmação de Senha: </label>
            <input type="password" name="password_confirmation" class="form-control" placeholder=" Digite sua senha" required>
            <br>
            <div class="row">
            <button type="submit" class="btn btn-success"> Cadastrar </button>
            </div>

        </form>
    </div>

@endsection