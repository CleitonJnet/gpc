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
                        <a href="{{ route('about') }}" class="btn btn-outline-light mt-3 fw-bold">saiba mais</a>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block">
                        <img src="{{ asset('img/mac_building.png') }}" id="img-wellcome" alt="notebook_gpc">
                    </div>
                </div>
            </div>
        </section>
        <section class="content @if( \App\Tenancy::count() < 1) d-none @endif" id="tenancy">
            <h2>ALUGUEL DE <strong>IMÓVEIS</strong></h2>
            <h4>Escolha seu imóvel</h4>

            @include('form_filter')
            <div class="row py-2 rounded-bottom" style="background-color: rgba(150,150,150,.2);">
                @foreach($rants as $rant)
                    <div class="col-lg-4 col-md-6 col-12 my-2">
                        <a href="{{ route('tenancy_view',$rant->id) }}" class="text-dark">
                            <div class="card view-focus">
                                <div class="card-body p-0">
                                    <div id="imovel{{$rant->id}}" class="carousel slide" data-bs-ride="carousel" data-bs-interval="0">
                                        <div class="carousel-indicators">
                                            @for( $i = 0; $i < \App\Gallery::where('tenancy_id',$rant->id)->count();)
                                                <button type="button" data-bs-target="#imovel{{$rant->id}}" data-bs-slide-to="{{$i}}" class="active" aria-current="true" aria-label="Slide {{$i++}}"></button>
                                            @endfor
                                        </div>
                                        <div class="carousel-inner">
                                            <?php $tot = 0; ?>
                                            @foreach(\App\Gallery::where('tenancy_id',$rant->id)->get() as $foto)
                                                <div class="carousel-item @if($tot == 0) active @endif" style="box-sizing: border-box; height: 240px">
                                                    <img src="{{ asset($foto->path) }}" class="d-block img-fluid rounded-top" alt="...">
                                                </div>
                                                <?php $tot++; ?>
                                            @endforeach
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#imovel{{$rant->id}}" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#imovel{{$rant->id}}" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-footer bg-white">
                                    <div class="py-1"><small class="fw-light">
                                            @if($rant->type_rent == 1) Apartamento @endif
                                            @if($rant->type_rent == 2) Casa @endif
                                            @if($rant->type_rent == 3) Cobertura @endif
                                            @if($rant->type_rent == 4) Flat @endif
                                            @if($rant->type_rent == 5) Sala Comercial @endif
                                            @if($rant->type_rent == 6) Terreno @endif
                                        </small></div>
                                    <div class="pt-2"><strong>{{ $rant->street }}</strong></div>
                                    <div class="pb-2 text-secondary">{{ $rant->neighborhood }}, {{ $rant->city }}, {{ $rant->state }}</div>
                                    <div class="py-2" style="font-size: 10pt;">
                                        <span class="pe-3 text-secondary"><i class="fas fa-ruler-combined fa-1x"></i> {{ $rant->size }}m²</span>
                                        <span class="pe-3 text-secondary"><i class="fas fa-bed fa-1x"></i> @if($rant->rooms >1) {{$rant->rooms}} quartos @else {{ $rant->rooms }} quarto @endif</span>
                                    </div>
                                    <div><small class="text-secondary">Aluguel R$ {{ number_format($rant->rent , 0,'','.') }}</small></div>
                                    <div><strong style="color: #194f48">Total R$ {{ number_format($rant->rent +  $rant->condominium +  $rant->IPTU +  $rant->firefighting, 0,'','.') }}</strong></div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
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
                            <a href="{{ route('tenancy_about') }}" class="btn btn-outline-light px-3">Locação</a>
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
            <h2 class="mb-5">Por que <strong>escolher a <em>GPC</em></strong><em>?</em></h2>
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
        <section class="content @if(count($comments) == 0) d-none @endif" id="comments">
            <h2 >Comentários</h2>
            <div id="comment-header"><i class="fas fa-pencil-alt"></i></div>
            <div class="container-fluid mt-4 mt-md-0">
                <div id="carouselComment" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <?php $active=0 ?>
                        @foreach($comments as $comment)
                            <button type="button" data-bs-target="#carouselComment" data-bs-slide-to="{{$active}}" @if($active == 0) class="active" aria-current="true" @endif <?php $active++ ?> aria-label="Slide {{$active}}"></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        <?php $active=0 ?>
                        @foreach($comments as $comment)
                            <div class="carousel-item  @if($active == 0) active @endif <?php $active++ ?>">
                                <div class="row">
                                    <div class="col-md-9">
                                        <blockquote class="container">
                                            <i class="fas fa-quote-left"></i>
                                            <span>{{ $comment->comment }}</span>
                                            <i class="fas fa-quote-right"></i>
                                        </blockquote>
                                        <cite class="author"> {{ $comment->author }}</cite>
                                    </div>
                                    <div class="col-md-3"><img src="{{ asset((file_exists('img/avatar_author/'.$comment->id.'.jpg'))?'img/avatar_author/'.$comment->id.'.jpg':'img/avatar_author/default.jpg') }}" class="rounded-circle" height="150" width="150" alt=""></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselComment" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselComment" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </section>
    </div>
@endsection
