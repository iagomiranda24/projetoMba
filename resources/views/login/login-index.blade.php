@extends('templates-base.template-base')
<script src="{{asset('assets/sweetalert2-js/dist/sweetalert2.all.js')}}"></script>
<link rel="stylesheet" href="{{asset('assets/sweetalert2-js/dist/sweetalert2.css')}}">
@section('content')
    @if(isset($errors) && count($errors) > 0 )

        <script>
            Swal.fire('Error:', 'Errors: @foreach($errors->all() as $error) {{$error}} "<br>" @endforeach', 'error');
        </script>

    @endif
    @if(session('usuario'))


        <script>

            Swal.fire('', '<p class="alert alert-danger">{{session('usuario')}}</p> ','warning');

        </script>

        @endif

    @if(session('senha'))


        <script>

            Swal.fire('', '<p class="alert alert-danger">{{session('senha')}}</p> ','warning');

        </script>

    @endif

    @if(session('senhaUser'))


        <script>

            Swal.fire('', '<p class="alert alert-danger">{{session('senhaUser')}}</p> ','warning');

        </script>

    @endif
    @if(session('loginSucesso'))

        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-right',
                showConfirmButton: false,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: '<div class="alert alert-success">{{session('loginSucesso')}}</div>'
            })

            setTimeout(function(){ window.location.href= '/home';}, 1000);

        </script>

        @endif

    <center>
        <div class="row" id="img-logo">
            <a class="" href="{{url('/home')}}"> <img class="a-img rounded-circle" alt="img-index" src="{{asset('assets/images-home/img-gir.png')}}"></a>
        </div>
    </center>
    <div class="login row">
        <div class="h1-login row">
            <h1 class="text-center" id="title-form"> Login  </h1>
        </div>
        <form class="form form-login" action="{{url('/authentica')}}" method="GET">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <label id="label-create-login">  Usuário: </label>
            <input id="inputs" type="text" name="user" placeholder="Digite seu usuário" class="form-control" value="{{old('user')}}" required>
            <br>
            <label id="label-create-login">  Senha: </label>
            <input id="inputs" type="password" name="password" placeholder="Digite sua senha" class="form-control" value="{{old('password')}}" required>
            <br>
            <div class="button-login row">
                <button type="submit" id="button-login"  value="Entrar" class="btn btn-success"> Entrar </button>
            </div>
        </form>
        <span class="esqueceu-senha">
            <a href="#"> Esqueceu a senha ? </a>
        </span>

        <span class="cadastre-se">
            <a href="{{url('/create-login')}}"> Cadastre-se</a>
        </span>
    </div>
@endsection