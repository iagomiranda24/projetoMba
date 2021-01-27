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
                    <a class="a-hover" href="#"> <i class="fas fa-home"></i> ínicio </a>
                </li>
                <li class="col-2">
                    <a class="a-hover" href="#"> <i class="fas fa-egg"></i> Cobrição FIV </a>
                </li>
                <li class="col-2">
                    <a class="a-hover" href="#"> Sobre</a>
                </li>
                <li class="col-2">
                    <a class="a-hover" href="#"> Sobre</a>
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

    <div class="container">
        <div class="text-center">
            <h5> Dados cobrição fiv </h5>
        </div>
    <table id="table_id" class="display table table-bordered"><font></font>
        <thead><font></font>
        <tr><font></font>
            <th>Nome do criador</th><font></font>
            <th>Reprodutor</th><font></font>
            <th>Data aquisição</th><font></font>
            <th>Matriz Doadora</th><font></font>
            <th>Raca</th><font></font>
            <th>Categoria</th><font></font>
            <th>Matriz Receptora </th><font></font>
            <th> Número embriões </th><font></font>
            <th> Número registro </th><font></font>
            <th> Ações </th><font></font>
        </tr><font></font>
        </thead><font></font>
        <tbody><font></font>
        @foreach($colecaoCobricaoFiv as $cobricao)
        <tr><font></font>
            <td>{{$cobricao->name_criador}}</td><font></font>
            <td>{{$cobricao->reprodutor}}</td><font></font>
            <td>{{$cobricao->data_aquisição}}</td><font></font>
            <td>{{$cobricao->matriz_doadora}}</td><font></font>
            <td>{{$cobricao->raca}}</td><font></font>
            <td>{{$cobricao->categoria}}</td><font></font>
            <td>{{$cobricao->matriz_receptora}}</td><font></font>
            <td>{{$cobricao->n_embrioes}}</td><font></font>
            <td>{{$cobricao->n_registro}}</td><font></font>
            <td> <a class="" href="javascript: void(0)" onclick=''> <i class="far fa-edit icon-edit"></i> </a>
                <a class="" href="javascript: void(0)" onclick=''><i class="fas fa-trash-alt icon-delete" data-toggle="modal" data-target="#exampleModal"></i></a></td>
        </tr><font></font>
        @endforeach
        </tbody><font></font>
    </table> <font></font>

    <script>
        $(document).ready( function () {
        $('#table_id').DataTable();
        } );
    </script>
    </div>
@endsection