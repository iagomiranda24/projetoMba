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
                    <a class="a-hover" href="#"> <i class="fas fa-sitemap"></i> Inovulação </a>
                </li>
                <li class="col-2">
                    <a class="a-hover" href="#"> <i class="fas fa-hat-cowboy-side"></i> Nascimento </a>
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
            <h1 class="sobre-h1 text-center"> Comunicação de cobrições </h1>
        </div>
        <div class="texto">
            <p class="text-center"> Sobre comunicações de cobrições </p>

            <article class="row container" id="div-articles">
                <article class="col padding-articles">
                <h3 class="h3-icon">
                    <i class="fas fa-egg text-center"></i>
                </h3>

                    <h4 class="title sobre text-center">
                        Comunicação de cobrição Fiv
                    </h4>
                    <p class="p-article text-center"> deverá constar o nome
                        completo do criador, a data da aquisição ou produção e o número de
                        embriões, a identificação da matriz doadora e do reprodutor utilizado, com o
                        nome, número de Controle ou Registro, raça e categoria a que pertencem,
                        bem como, a identificação da matriz receptora, caso o embrião tenha sido
                        implantado. </p>
                </article>

                <article class="col padding-articles">
                    <h3 class="h3-icon">
                        <i class="fas fa-home text-center"></i>
                    </h3>
                    <h4 class="title sobre text-center">
                        Comunicação de Inovulação
                    </h4>
                    <p class="p-article text-center"> O envio das comunicações referidas neste Artigo é de inteira
                        responsabilidade dos criadores, devendo os formulários conter a assinatura
                        do médico veterinário responsável pelo procedimento, ou, no caso de envio
                        eletrônico, ser feito pelo próprio médico veterinário através do sistema
                        eletrônico da GIROLANDO ou mediante sua aprovação eletrônica com
                        controle de usuário.
                    </p>
                </article>
                <article class="col padding-articles">
                    <h3 class="h3-icon">
                        <i class="fas fa-birthday-cake text-center"></i>
                    </h3>
                    <h4 class="title sobre text-center">
                        Comunicação Nascimento
                    </h4>
                    <p class="p-article text-center">  Deverá ser feita a Comunicação de Nascimento ao SRGRG,
                        informando o número da comunicação de cobrição, bem como conter todos
                        os dados da doadora e do reprodutor e identificando a matriz receptora;
                        Deve ser feito o teste de DNA, a partir da idade mínima estipulada
                        pelo laboratório. Somente após a qualificação de parentesco do pai e da
                        mãe, apresentada em laudo, é que poderá ser liberado o material de
                        inspeção para Controle de Genealogia ou Registro Genealógico de
                        Nascimento do produto.</p>
                </article>
            </article>
        </div>
    </section>
@endsection