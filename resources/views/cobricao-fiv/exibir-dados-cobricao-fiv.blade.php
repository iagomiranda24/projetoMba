@extends('templates-base.template-base')
<script src="{{asset('assets/sweetalert2-js/dist/sweetalert2.all.js')}}"></script>
<link rel="stylesheet" href="{{asset('assets/sweetalert2-js/dist/sweetalert2.css')}}">

@section('content')
    <script src="{{asset('assets/scripts-personalizados/cadastro-script-personalizado.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/DataTables-1.10.23/css/jquery.dataTables.css')}}">
    <script src="{{asset('assets/DataTables-1.10.23/js/jquery.dataTables.js')}}"></script>

    <div class="header">
        <nav class="nav-header">
            <ul class="col-12 header-1 ">
                <li class="col-2">
                    <a class="a-hover" href="{{url('home')}}"> <i class="fas fa-home"></i> ínicio </a>
                </li>
                <li class="col-2">
                    <a class="a-hover" href="#"> <i class="fas fa-egg"></i> Cobrição FIV </a>
                </li>
                <li class="col-2">
                    <a class="a-hover" href="#" data-bs-toggle="modal"
                       data-bs-target="#modalDemonstration"> Sobre </a>
                </li>
                <li class="col-2">
                    <a class="a-hover" data-bs-toggle="modal"
                       data-bs-target="#modalDemonstration1" href="#"> Sobre</a>
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

    <div id="addCobricao" class="container row-3">
        <div class="text-center">
            <a class="a-cadastrar-cobricao" href="{{url('cadastrar-cobricao-fiv')}}"><h5><i
                            class="fas fa-plus-square"></i> Adicionar cobricao fiv </h5></a>
        </div>
    </div>

    <div class="container">
        <div class="text-center">
            <h5> Dados cobrição fiv </h5>
        </div>

        <table id="table_id" class="display table table-bordered"><font></font>
            <thead><font></font>
            <tr><font></font>
                <th>Nome do criador</th>
                <font></font>
                <th>Reprodutor</th>
                <font></font>
                <th>Data aquisição</th>
                <font></font>
                <th>Matriz Doadora</th>
                <font></font>
                <th>Raca</th>
                <font></font>
                <th>Categoria</th>
                <font></font>
                <th>Matriz Receptora</th>
                <font></font>
                <th> Número embriões</th>
                <font></font>
                <th> Número registro</th>
                <font></font>
                <th> Ações</th>
                <font></font>
            </tr>
            <font></font>
            </thead>
            <font></font>
            <tbody><font></font>

            @if(Auth::user()->name == 'administrador')
                @forelse($colecaoCobricaoFiv as $cobricao)
                    <tr><font></font>
                        <td>{{$cobricao->name_criador}}</td>
                        <font></font>
                        <td>{{$cobricao->reprodutor}}</td>
                        <font></font>
                        <td>{{$cobricao->data_aquisição}}</td>
                        <font></font>
                        <td>{{$cobricao->matriz_doadora}}</td>
                        <font></font>
                        <td>{{$cobricao->raca}}</td>
                        <font></font>
                        <td>{{$cobricao->categoria}}</td>
                        <font></font>
                        <td>{{$cobricao->matriz_receptora}}</td>
                        <font></font>
                        <td>{{$cobricao->n_embrioes}}</td>
                        <font></font>
                        <td>{{$cobricao->n_registro}}</td>
                        <font></font>
                        <td><a class="" href="#" onclick='editarCobricao("{{$cobricao->id}}")' text="{{$cobricao->id}}"
                               id="link-editar" data-bs-toggle="modal"
                               data-bs-target="#ModalEdit"> <i
                                        class="far fa-edit icon-edit"></i> </a>
                            <a class="" href="javascript: void(0)" data-bs-toggle="modal"
                               data-bs-target="#ModalDelete"><i class="fas fa-trash-alt icon-delete"
                                                                data-toggle="modal"
                                                                data-target="#exampleModal"></i></a></td>
                    </tr><font></font>
                @empty
                    @if(session('errorUser'))

                        <script>

                            Swal.fire('Info', '<p class="alert alert-info">{{session('errorUser')}}</p> ', 'info');

                        </script>

                    @endif
                @endforelse
            @endif

            @forelse($nameCriador as $cobricao)
                <tr><font></font>
                    <td>{{$cobricao->name_criador}}</td>
                    <font></font>
                    <td>{{$cobricao->reprodutor}}</td>
                    <font></font>
                    <td>{{$cobricao->data_aquisição}}</td>
                    <font></font>
                    <td>{{$cobricao->matriz_doadora}}</td>
                    <font></font>
                    <td>{{$cobricao->raca}}</td>
                    <font></font>
                    <td>{{$cobricao->categoria}}</td>
                    <font></font>
                    <td>{{$cobricao->matriz_receptora}}</td>
                    <font></font>
                    <td>{{$cobricao->n_embrioes}}</td>
                    <font></font>
                    <td>{{$cobricao->n_registro}}</td>
                    <font></font>
                    <td><a class="" href="#" onclick='editarCobricao("{{$cobricao->id}}")' text="{{$cobricao->id}}"
                           id="link-editar" data-bs-toggle="modal"
                           data-bs-target="#ModalEdit"> <i
                                    class="far fa-edit icon-edit"></i> </a>
                        <a class="" href="javascript: void(0)" data-bs-toggle="modal"
                           data-bs-target="#ModalDelete"><i class="fas fa-trash-alt icon-delete"
                                                            data-toggle="modal"
                                                            data-target="#exampleModal"></i></a></td>
                </tr><font></font>
            @empty
                @if(session('errorUser'))

                    <script>

                        Swal.fire('Info', '<p class="alert alert-info">{{session('errorUser')}}</p> ', 'info');

                    </script>

                @endif
            @endforelse
            </tbody>
            <font></font>
        </table>
        <font></font>
        <script>
            $(document).ready(function () {
                $('#table_id').DataTable();
            });
        </script>
    </div>

    @if(isset($errors) && count($errors) > 0)

        <script>
            Swal.fire('Error:', 'Errors: @foreach($errors->all() as $error) {{$error}} "<br>" @endforeach', 'error');
        </script>

    @endif

    @if(session('Error'))

        <script>

            Swal.fire('Info', '<p class="alert alert-info">{{session('Error')}}</p> ', 'info');

        </script>

    @endif


    @if(session('Success'))

        <script>

            Swal.fire('Info', '<p class="alert alert-info">{{session('Success')}}</p> ', 'info');

        </script>

    @endif

    @if(session('Success'))

        <script>

            Swal.fire('Info', '<p class="alert alert-success">{{session('Success')}}</p> ', 'success');
            setTimeout(function () {
                window.location.href = 'view-dados-cobricao-fiv';
            }, 2000);

        </script>
    @endif

    <!-- Modal -->
    <div class="modal fade" id="ModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar cadastro de cobrição fiv</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form_cobricao_fiv" class="form form-group"
                          action='{{url("editar-cobricao-fiv/$cobricao->id")}}'
                          method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group row">
                            <label for="text" class="col-4 col-form-label">
                                Nome do criador
                            </label>
                            <div class="col-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    </div>
                                    <input id="name-criador" value="{{Auth::user()->name}}" name="name_criador"
                                           type="text" class="form-control"
                                           required>
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
                                    <input type="date" class="form-control" name="data_aquisição" access="false"
                                           value="{{old('data_aquisição')}}" id="data" required="required"
                                           aria-required="true">
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
                                    <input id="matriz_doadora" name="matriz_doadora" type="text"
                                           value="{{old('matriz_doadora')}}"
                                           class="form-control" required>
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
                                    <input id="raca" name="raca" type="text" value="{{old('raca')}}"
                                           class="form-control" required>
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
                                    <input id="reprodutor" value="{{old('reprodutor')}}" name="reprodutor" type="text"
                                           class="form-control" required>
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
                                    <input id="n_registro" value="{{old('n_registro')}}" name="n_registro" type="text"
                                           class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="" class="col-4 col-form-label">
                                Categoria
                            </label>
                            <div class="col-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    </div>
                                    <input id="categoria" value="{{old('categoria')}}" name="categoria" type="text"
                                           class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="form-group row">
                            <label for="select" class="col-4 col-form-label">
                                Quantidade de embriões
                            </label>
                            <div class="col-8">
                                <select id="n_embrioes1"
                                @foreach($colecaoCobricaoFiv as $cobricao)
                                    <option id="n_embrioes" value="{{$cobricao->n_embrioes}}"
                                            @if(isset($cobricao->n_embrioes))
                                            selected
                                            @endif
                                    >{{$cobricao->n_embrioes}}</option>
                                    @endforeach
                                    </select>

                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group row" id="div-input">
                            <label for="text" class="col-4 col-form-label">
                                Matriz receptora
                            </label>
                            <div class="col-8 ">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    </div>
                                    <input id="matriz-receptora" name="matriz_receptora"
                                           value="{{old('matriz_receptora')}}"
                                           type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    @if(session('Success'))

        <script>

            Swal.fire('Info', '<p class="alert alert-info">{{session('Success')}}</p> ', 'info');

        </script>

    @endif

    @if(session('Erro1'))

        <script>

            Swal.fire('Info', '<p class="alert alert-info">{{session('Erro1')}}</p> ', 'info');

        </script>

    @endif

    <div class="modal fade  alert alert-warning " id="ModalDelete" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog alert alert-danger">
            <div class="modal-content alert alert-danger">
                <div class="modal-header alert alert-danger">
                    <h5 class="modal-title " id="exampleModalLabel">Deletar cobrição fiv</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body alert alert-danger">

                    <form class="alert alert-danger" id="form_cobricao_fiv" class="form form-group"
                          action='{{url("/deletar-cobricao-fiv/$cobricao->id")}}'
                          method="POST">

                        <input type="hidden" name="_method" value="DELETE">

                        <h5> Tem certeza que deseja excluir ? </h5>

                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">OK</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalDemonstration" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
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
    <div class="modal fade" id="modalDemonstration1" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
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
                    <button type="button" class="text text-center btn btn-secondary" data-bs-dismiss="modal">Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <script>

        function editarCobricao(idCobricao) {

            @foreach($colecaoCobricaoFiv as $cobricao)

            if (idCobricao === "{{$cobricao->id}}") {

                $("#id-edit").val("{{$cobricao->id}}");
                $("#name-criador").val('{{$cobricao->name_criador}}');
                $("#data").val('{{$cobricao->data_aquisição}}');
                $("#matriz_doadora").val('{{$cobricao->matriz_doadora }}');
                $("#raca").val('{{$cobricao->raca }}');
                $("#reprodutor").val('{{$cobricao->reprodutor }}');
                $("#n_registro").val('{{$cobricao->n_registro}}');
                $("#categoria").val('{{$cobricao->categoria }}');
                $("#n_embrioes1").val('{{$cobricao->n_embrioes}}');

                @endforeach

            }
        }


    </script>



@endsection