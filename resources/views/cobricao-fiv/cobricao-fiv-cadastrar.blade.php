@extends('templates-base.template-base')
<script src="{{asset('assets/sweetalert2-js/dist/sweetalert2.all.js')}}"></script>
<link rel="stylesheet" href="{{asset('assets/sweetalert2-js/dist/sweetalert2.css')}}">
@section('content')
    <script src="{{asset('assets/scripts-personalizados/cadastro-script-personalizado.js')}}"></script>

    <div class="header">
        <nav class="nav-header">
            <ul class="col-12 header-1 ">
                <li class="col-2">
                    <a class="a-hover" href="{{url('home')}}"> <i class="fas fa-home"></i> ínicio </a>
                </li>
                <li class="col-2">
                    <a class="a-hover" href="{{url('view-dados-cobricao-fiv')}}"> <i class="fas fa-egg"></i> Cobrição FIV </a>
                </li>
                <li class="col-2">
                    <a class="a-hover" data-bs-toggle="modal"
                       data-bs-target="#modalDemonstration"  href="#"> Sobre</a>
                </li>
                <li class="col-2">
                    <a class="a-hover" data-bs-toggle="modal"
                       data-bs-target="#modalDemonstration1"  href="#"> Sobre</a>
                </li>
                @if(Auth::check())
                    <li class="col-2">
                        <a class="a-hover" href="{{url('/sair')}}"> <i class="fas fa-sign-out-alt"></i> Sair </a>
                    </li>
                @endif
            </ul>
        </nav>
        <div class="clear"></div>
    </div>
    <br>
    <div class="container form-builder-fiv">
        <h1 class="text-center"> Cadastrar comunicação FIV </h1>
        <br>
        @if(isset($errors) && count($errors) > 0)

            <script>
                Swal.fire('Error:', 'Errors: @foreach($errors->all() as $error) {{$error}} "<br>" @endforeach', 'error');
            </script>

        @endif

        @if(session('Error'))

            <script>

                Swal.fire('Info', '<p class="alert alert-info">{{session('Error')}}</p> ','info');

            </script>

        @endif


        @if(session('Success'))

            <script>

                Swal.fire('Info', '<p class="alert alert-info">{{session('Success')}}</p> ','info');

            </script>

        @endif

        @if(session('Success'))

            <script>

                Swal.fire('Info', '<p class="alert alert-success">{{session('Success')}}</p> ','success');
                setTimeout(function(){ window.location.href= 'view-dados-cobricao-fiv';}, 2000);

            </script>
        @endif
        <form id="form_cobricao_fiv" class="form form-group" action="{{url('/cadastrar-cobricao-fiv')}}" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group row">
                <label for="text" class="col-4 col-form-label">
                    Nome do criador
                </label>
                <div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        </div>
                        <input id="text" name="name_criador" type="text" class="form-control" value="{{Auth::user()->name}}"required>
                    </div>
                </div>
            </div>
            <br>

            <div class="form-group row">
                <label for="text" class="col-4 col-form-label">
                    Data de aquisição
                </label>
                <div class="col-8">
                    <div class="input-group">
                        <input type="date" class="form-control" name="data_aquisição" access="false" value="{{old('data_aquisição')}}"id="date-1611414762701" required="required" aria-required="true">
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="text" class="col-4 col-form-label">
                    Matriz doadora
                </label>
                <div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        </div>
                        <input id="text" name="matriz_doadora" type="text" value="{{old('matriz_doadora')}}" class="form-control" required>
                    </div>
                </div>
            </div>
            <br>

            <div class="form-group row">
                <label for="text" class="col-4 col-form-label">
                    Raça
                </label>
                <div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        </div>
                        <input id="text" name="raca" type="text" value="{{old('raca')}}" class="form-control" required>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="text" class="col-4 col-form-label">
                    Reprodutor
                </label>
                <div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        </div>
                        <input id="text" value="{{old('reprodutor')}}" name="reprodutor" type="text" class="form-control" required>
                </div>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="text" class="col-4 col-form-label">
                    Número do registro
                </label>
                <div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        </div>
                        <input id="text" value="{{old('n_registro')}}" name="n_registro" type="text" class="form-control" required>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="text" class="col-4 col-form-label">
                    Categoria
                </label>
                <div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        </div>
                        <input id="text" value="{{old('categoria')}}" name="categoria" type="text" class="form-control" required>
                    </div>
                </div>
            </div>
            <br>

            <div class="form-group row">
                <label for="select" class="col-4 col-form-label">
                    Quantidade de embriões
                </label>
                <div class="col-8">
                    <select id="select" name="n_embrioes" class="custom-select">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-4">
                    O embrião foi implantado ?
                </label>
                <div class="col-8">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input name="radio" id="radio_0" type="radio" class="custom-control-input" onclick="Show()" value="SIM" checked>
                        <label for="radio_0" class="custom-control-label">
                            SIM
                        </label>
                    </div>
                    <br>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input name="radio" id="radio_1" type="radio" class="custom-control-input" onclick="Show1()" value="NÃO">
                        <label for="radio_1" class="custom-control-label">
                            Não
                        </label>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group row" id="div-input">
                <label for="text" class="col-4 col-form-label">
                    Matriz receptora
                </label>
                <div class="col-8 ">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        </div>
                        <input id="text" name="matriz_receptora" value="{{old('matriz_receptora')}}" type="text" class="form-control">
                    </div>
                </div>
            </div>
            <br>
            <div class="text-center">
                <button class="btn btn-info my-4" type="submit">Salvar</button>
            </div>
        </form>

        <!-- Modal -->
        <div class="modal fade" id="modalDemonstration" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Aviso</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Aguarde implementação...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalDemonstration1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Aviso</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Aguarde implementação...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection