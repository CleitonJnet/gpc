@extends('layout.app')
@section('title','Página inicial')
@section('content')
    <div id="index">
        <section id="wellcome" class="container-fluid">
            <div class="container d-flex justify-content-center align-items-center h-100">
                <div class="row">
                    <div class="col-lg-6">
                        <h2>
                            Segurança, Comodidade e Solução na <em>administração de imóveis e condomínios</em>!
                        </h2>
                        <h4>Há 30 anos oferecendo excelência e experiência na <em>administração de bens imóveis</em>.</h4>
                        <a href="#" class="btn btn-outline-light mt-3 fw-bold">saiba mais</a>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block">
                        <img src="{{ asset('img/mac_building.png') }}" id="img-wellcome" alt="notebook_gpc">
                    </div>
                </div>
            </div>
        </section>
        <section class="content" id="properties">
            <h2>MAIS QUE UMA <strong>ADMINISTRADORA</strong></h2>
            <h4>Nossos diferenciais</h4>
            <p class="text-center">Conheça nossa qualidade e serviços para sua segurança e comodidade no que diz respeito a <em>gestão</em> do seu imóvel.</p>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="card mx-auto">
                        <i class="far fa-building"></i>
                        <div class="card-body">
                            <h5 class="card-title">A Empresa</h5>
                            <p class="card-text">Conheça nossa história, missão, visão e valores.</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('about') }}" class="btn btn-outline-light">saiba mais</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="card mx-auto">
                        <i class="fas fa-house-user"></i>
                        <div class="card-body">
                            <h5 class="card-title">Imóveis</h5>
                            <p class="card-text">Para alugar ou vender seu imóvel, você conta com a
                                agilidade, transparência e, principalmente, segurança da GPC.</p>
                        </div>
                        <div class="card-footer d-flex justify-content-evenly">
                            <a href="{{ route('tenancy') }}" class="btn btn-outline-light px-3">Locação</a>
                            <a href="{{ route('sale') }}" class="btn btn-outline-light px-3">Venda</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="card mx-auto">
                        <i class="fas fa-city"></i>
                        <div class="card-body">
                            <h5 class="card-title">Condomínios</h5>
                            <p class="card-text">Soluções em <em>gestão condominial</em> diferenciadas, e flexíveis,
                                além de produtos e serviços que facilitam o seu dia a dia.</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('condominium') }}" class="btn btn-outline-light">saiba mais</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="content" id="property_manager">
            <h2 class="mb-5">Por quê escolher a
                <em>GPC</em>?</h2>
            <div class="row px-4">
                <div class="col-md-6">
                    <div id="carouselGPC" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div
                                class="carousel-item active"
                                style="background-image: url('{{ asset("img/slidesGPC/1.jpg") }}');"></div>
                            <div
                                class="carousel-item"
                                style="background-image: url('{{ asset("img/slidesGPC/2.jpg") }}');"></div>
                            <div
                                class="carousel-item"
                                style="background-image: url('{{ asset("img/slidesGPC/3.jpg") }}');"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pt-4 pt-md-0">
                    <ol style="text-align: justify; font-weight: 600; font-size: 17px;">
                        <li class="pb-4">
                            Julgamos ser importante destacar nosso objetivo com o número de clientes.
                        </li>
                        <li class="pb-4">
                            Não pretendemos concorrer com as grandes administradoras existentes.
                        </li>
                        <li class="pb-4">
                            A quantidade reduzida de condomínios, o trabalho de parceria e a agilidade nas
                            ações solicitadas fazem com que os(as) Síndicos(as) sintam nossa Administradora
                            como uma extensão de seu Condomínio.
                        </li>
                    </ol>

                </div>
            </div>
        </section>
        <section class="content" id="comments">
            <h2 >Serviços</h2>
            <div id="comment-header"><i class="fas fa-pencil-alt"></i></div>
            <div class="container-fluid mt-4 mt-md-0">
                <div id="carouselComment" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-9">
                                    <blockquote class="container">
                                        <i class="fas fa-quote-left"></i>
                                        Oferecemos total cobertura na administração de condomínios. Todos os departamentos GPC são próprios, prezamos pela excelência na prestação de serviços e absoluto controle das ações.
                                        <i class="fas fa-quote-right"></i>
                                    </blockquote>
                                    <cite class="author"> Elizabeth Queen</cite>
                                </div>
                                <div class="col-md-3"><img src="{{ asset('img/síndico.jpg') }}" class="rounded-circle" height="150" width="150" alt=""></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
