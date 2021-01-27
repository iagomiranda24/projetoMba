@extends('templates-base.template-base')
<script src="{{asset('assets/sweetalert2-js/dist/sweetalert2.all.js')}}"></script>
<link rel="stylesheet" href="{{asset('assets/sweetalert2-js/dist/sweetalert2.css')}}">
@section('content')
    @if(Auth::check())

        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title:'Seja bem vindo(a), {{Auth::user()->user}}',
                showConfirmButton: false,
                timer: 3000
            })
        </script>
        @endif
    <div class="header">
        <nav class="nav-header">
            <ul class="col-12 header-1 ">
                <li class="col-2">
                    <a class="a-hover" href="#"> <i class="fas fa-home"></i> ínicio </a>
                </li>
                @if(!Auth::check())
                <li class="col-2">
                    <a class="a-hover" href="{{url('/login')}}"> <i class="fas fa-sign-in-alt"></i> Login </a>
                </li>
                @endif
                <li class="col-2">
                    <a class="a-hover" href="#"> <i class="fas fa-egg"></i> Cobrição FIV </a>
                </li>
                <li class="col-2">
                    <a class="a-hover" href="#"> Sobre</a>
                </li>
                <li class="col-2">
                    <a class="a-hover" href="#"> Sobre</a>
                </li>
                <li class="col-2">
                    <a class="a-hover" href="#Div-principal"> <i class="fas fa-align-justify"></i> Sobre</a>
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

    <div class="div-principal text-center backgroud-div-princial-paralax">
        <div class="row text-title text-center">
            <h1 class="h1-text-2 text-center"> O melhor leite do Brasil </h1>
        </div>
        <div class="a-div-principal">
            <a href="#" class="a-text- text-center"> Clique aqui </a>
        </div>
    </div>

    <section class="sobre" id="Div-principal">
        <div class="container">
            <h1 class="sobre-h1 text-center"> dapodkaposdkaplmxaçlsxsa </h1>
        </div>
        <div class="texto">
            <p class="text-center">dapsodmapsodkpasokdpsaox,ásx,aósx,aposxa <br>
                ald,ald,las,dçal,dlaçsd,ald,açldçlfmaçs aç</p>

            <div class="row container" id="div-articles">
                <article class="col padding-articles">
                <h3 class="h3-icon">
                <i class="fas fa-home text-center"></i>
                </h3>

                    <h4 class="title sobre">
                        ESCREVER AQUI
                    </h4>
                    <p class="p-article"> DAMSDKÇAAKNDAL DAMSDKÇAAKNDAL DAMSDKÇAAKNDAL DAMSDKÇAAKNDAL </p>
                </article>

                <article class="col padding-articles">
                    <h3 class="h3-icon">
                        <i class="fas fa-home text-center"></i>
                    </h3>
                    <h4 class="title sobre">
                        ESCREVER AQUI
                    </h4>
                    <p class="p-article"> DAMSDKÇAAKNDAL DAMSDKÇAAKNDAL DAMSDKÇAAKNDAL DAMSDKÇAAKNDAL </p>
                </article>
                <article class="col padding-articles">
                    <h3 class="h3-icon">
                        <i class="fas fa-home text-center"></i>
                    </h3>
                    <h4 class="title sobre">
                        ESCREVER AQUI
                    </h4>
                    <p class="p-article"> DAMSDKÇAAKNDAL DAMSDKÇAAKNDAL DAMSDKÇAAKNDAL DAMSDKÇAAKNDAL </p>
                </article>
                <article class="col padding-articles">
                    <h3 class="h3-icon">
                        <i class="fas fa-home text-center"></i>
                    </h3>
                    <h4 class="title sobre">
                        ESCREVER AQUI
                    </h4>
                    <p class="p-article"> DAMSDKÇAAKNDAL DAMSDKÇAAKNDAL DAMSDKÇAAKNDAL DAMSDKÇAAKNDAL </p>

            </div>
        </div>
    </section>
@endsection