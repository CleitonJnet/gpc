@extends('layout.app')
@section('title','Sobre o Imóvel')
@section('content')
    <style>
        .breadcrumb-item a {color: #020e18!important;}
        .img-in-box{
            background-position: center center;
            background-repeat: no-repeat;
        }

        .img-in-box-cover{
            background-size: cover;
        }

        /*Galeria carrossel top*/
        @media (max-width: 767px) {
            .carousel-inner .carousel-item > div {display: none;}
            .carousel-inner .carousel-item > div:first-child {display: block;}
        }
        .carousel-inner .carousel-item.active,
        .carousel-inner .carousel-item-next,
        .carousel-inner .carousel-item-prev {
            display: flex;
            width: 100%;
            height: 100%;
        }
        @media (min-width: 768px) {
            .carousel-inner .carousel-item-end.active,
            .carousel-inner .carousel-item-next {
                transform: translateX(25%);
            }
            .carousel-inner .carousel-item-start.active,
            .carousel-inner .carousel-item-prev {
                transform: translateX(-25%);
            }
        }
        .carousel-inner .carousel-item-end,
        .carousel-inner .carousel-item-start {transform: translateX(0);}

        /*MODAL GALERIA*/
        #modalAlert {
            justify-content: center;
            align-items: center;
            position: fixed;
            z-index: 999;
            width: 100vw;
            height: 100vh;
            top: 0;
            left: 0;
            background-color: var(--dark-70);
        }

        #modalAlert .modalAlertContent {
            width: 400px;
            height: 200px;
        }

        #modalGallery {
            display: none;
            justify-content: center;
            align-items: center;
            position: fixed;
            z-index: 999;
            width: 100vw;
            height: 100vh;
            top: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.85);
        }

        #modalGallery .modalGalleryContent {
            max-width: 100vw;
            max-height: 100vh;
            min-width: 50vw;
            width: fit-content;
        }

        .closeModalGalleryView{
            position: absolute;
            top: 5px;
            right: 5px;
            z-index: 99999;
            background-color: var(--bright);
            padding: 5px;
            border-radius: 0 0 0 10px;
            cursor: pointer;
        }

        .btn-close:focus {
            outline: 0;
            box-shadow: 0 0 0 0.25rem transparent !important;
            opacity: 1;
        }

        .viewerModalGalleryView {
            min-width:50vw;
            padding: 10px;
            text-align: center;
            position: absolute;
            z-index: 10;
        }

        .btn-close:hover {
            color: var(--bright) !important;
            text-decoration: none;
        }

        #carouselModalgallery {
            display: flex;
            justify-content: center;
        }

        #carouselModalgallery .carousel-item img {
            border: var(--bright) 3px solid;
            border-radius: 5px;
            min-width: 50vw;
            width: fit-content;
            max-width: 100vw;
            max-height: 100vh;
            display: block;
            margin: auto;
        }

        #btn-agendar-visita {
            background-color: var(--blue);
            color: var(--bright);
            display: block;
            width: 100%;
            border-radius: 5px;
            border: solid 2px var(--blue);
            padding: 10px 20px;
            margin-top: 20px;
        }

        #btn-agendar-visita:hover {
            background-color: var(--blue-dark);
            border: solid 2px var(--blue-dark);
            transition: all 150ms;
        }

        .bar-overflow {
            overflow: auto;
        }

        .bar-overflow::-webkit-scrollbar {
            height: 1px;               /* width of the entire scrollbar */
        }

        .bar-overflow::-webkit-scrollbar-track {
            background: transparent;        /* color of the tracking area */
        }

        .bar-overflow::-webkit-scrollbar-thumb {
            background-color: transparent;    /* color of the scroll thumb */
        }

    </style>

    <section class="header_session" style="background-image: url({{ asset('img/tower.jpg') }})">
        <div class="header-box">
            <h1>@yield('title')</h1>
        </div>
    </section>

    <nav class="nav-breadcrumb" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Locação</a></li>
            <li class="breadcrumb-item"><a href="#">{{ $tenancy->city }}</a></li>
            <li class="breadcrumb-item"><a href="#">{{ $tenancy->neighborhood }}</a></li>
            <li class="breadcrumb-item"><a href="#">{{ $tenancy->street }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Imóvel-{{ $tenancy->id }}</li>
        </ol>
    </nav>

    <section class="content" id="tenancy">
        <div class="row bg-dark rounded-top d-flex justify-content-center align-items-center mb-5" style="height: 250px">

            <div id="galleryCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
                <div style="position: absolute; left: calc( 50% - 25vw ); bottom: 20px"><button type="button" class="viewerModalGalleryView btn-blue-light">Ampliar galeria</button></div>
                <div class="carousel-inner" role="listbox">
                    <?php $active=0 ?>
                    @foreach($gallery as $photo)
                        <div class="carousel-item galleryItem @if($active == 0) active @endif <?php $active++ ?>">
                            <div class="col-lg-4 col-md-6 col-12 img-in-box img-in-box-cover" style="background-image: url({{ asset($photo->path) }});height: 240px;"></div>
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" style="background-color: rgba(0,0,0,0.4); width: 50px;" href="#galleryCarousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next" style="background-color: rgba(0,0,0,0.4); width: 50px;" href="#galleryCarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        <div class="row">
            <div class="col">
                <h4 class="text-start" style="color: #2A4A70;">{{ $tenancy->title }}</h4>
            </div>
            <hr style="background-color: #2A4A70;">
        </div>
        <div class="row pb-5">
            <div class="col-md-8">
                <span class="text-start text-secondary fw-normal">
                    <strong>
                        @if($tenancy->type_rent == 1) Apartamento @endif
                        @if($tenancy->type_rent == 2) Casa @endif
                        @if($tenancy->type_rent == 3) Cobertura @endif
                        @if($tenancy->type_rent == 4) Flat @endif
                        @if($tenancy->type_rent == 5) Sala Comercial @endif
                        @if($tenancy->type_rent == 6) Terreno @endif
                    :</strong>
                    {{ $tenancy->street }}, {{ $tenancy->neighborhood }}, {{ $tenancy->city }}, {{ $tenancy->state }}</span>
                <div class="text-nowrap bar-overflow mt-4">
                    <i style="font-size: 1.2rem; color: #2C4D70" class="fas fa-ruler-combined"></i><span class="pe-3 text-secondary"> {{ $tenancy->size }}m²</span>
                    <i style="font-size: 1.2rem; color: #2C4D70" class="fas fa-bed"></i><span class="pe-3 text-secondary"> {{ ($tenancy->rooms > 1)? $tenancy->rooms.' quartos': $tenancy->rooms.' quarto' }}</span>
                    <i style="font-size: 1.2rem; color: #2C4D70" class="fas fa-shower"></i><span class="pe-3 text-secondary"> {{ ($tenancy->bathroom > 1)? $tenancy->bathroom.' banheiros': $tenancy->bathroom.' banheiro' }}</span>
                    <i style="font-size: 1.2rem; color: #2C4D70" class="fas fa-car"></i><span class="pe-3 text-secondary">  {{ ($tenancy->park > 1)? $tenancy->park.' vagas': $tenancy->park.' vaga' }}</span>
                    <i style="font-size: 1.2rem; color: #2C4D70" class="fas fa-caret-square-up"></i><span class="pe-3 text-secondary">  {{ ($tenancy->elevator > 1)? $tenancy->elevator.' sem elevador': $tenancy->elevator.' com elevador' }}</span>
                    <i style="font-size: 1.2rem; color: #2C4D70" class="fas fa-couch"></i><span class="pe-3 text-secondary"> {{ ($tenancy->furniture === 'y')? ' mobiliado': ' não mobiliado' }}</span>
                    <i style="font-size: 1.2rem; color: #2C4D70" class="fas fa-bus-alt"></i><span class="pe-3 text-secondary">  {{ ($tenancy->transport === 'y')? ' próximo': ' não próximo' }}</span>
                    <i style="font-size: 1.2rem; color: #2C4D70" class="fas fa-dog"></i><span class="pe-3 text-secondary">  {{ ($tenancy->pet === 'y')? ' aceita': ' não aceita' }}</span>
                </div>
                <hr>
                <div class="py-4">
                    <h6 class="text-start text-secondary fw-bold">CARACTERÍSTICAS:</h6>
                    <p style="color: #595959">{{ $tenancy->feature }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <table class="table" style="vertical-align: middle">
                            <thead></thead>
                            <tbody>
                            <tr style="font-size: 1.05rem">
                                <th class="py-3">Aluguel</th>
                                <th class="py-3 text-end">R$ {{ number_format($tenancy->rent , 2,',','.') }}</th>
                            </tr>
                            <tr>
                                <td class="py-3">Condomínio</td>
                                <td class="py-3 text-end">R$ {{ number_format($tenancy->condominium , 2,',','.') }}</td>
                            </tr>
                            <tr>
                                <td class="py-3">IPTU</td>
                                <td class="py-3 text-end">R$ {{ number_format($tenancy->IPTU , 2,',','.') }}</td>
                            </tr>
                            <tr>
                                <td class="py-3">Taxa de incêndio</td>
                                <td class="py-3 text-end">R$ {{ number_format($tenancy->firefighting , 2,',','.') }}</td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr style="font-size: 1.5rem;color: #2A4A70">
                                <th>Total</th>
                                <th class="text-end">R$ {{ number_format($tenancy->rent + $tenancy->condominium + $tenancy->IPTU+ $tenancy->firefighting , 2,',','.') }}</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="offset-md-4 col-md-4">
                <button id="btn-agendar-visita" type="button" data-bs-toggle="modal" data-bs-target="#interestedModal">Agendar visita</button>
            </div>
        </div>
    </section>

    <div class="modal fade" id="interestedModal" tabindex="-1" aria-labelledby="interestedModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('interested') }}" method="POST">
                    @csrf

                    <input aria-label="url" type="hidden" name="id" value="{{ $tenancy->id }}">

                    <div class="modal-header">
                        <h5 class="modal-title" id="interestedModalLabel">Solicitar agendamento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome completo</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nome completo">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Telefone/Whatsapp</label>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="21 0000-0000">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="seu@email.com">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-blue-dark">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modalAlert" style="display: @if($alert == 1) flex @else none @endif">
        <div class="modalAlertContent">
            <div class="card">
                <div class="card-header">Obrigado!!!</div>
                <div class="card-body text-center">
                    <div class="mb-3">Em breve entraremos em contato</div>
                    <button type="button" class="btn btn-sm btn-blue-light px-4" onclick="closeModalAlert()">OK</button>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>

    <div id="modalGallery">
        <div class="modalGalleryContent">
            <span class="closeModalGalleryView" onclick="closeModalGallery()"><button class="btn btn-close"></button></span>
            <div id="carouselModalgallery" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="false">
                <div class="carousel-indicators @if(count($gallery) <= 1) d-none @endif">
                    <?php $active=0 ?>
                    @foreach($gallery as $photo)
                        <button type="button" data-bs-target="#carouselModalgallery" data-bs-slide-to="{{$active}}" @if($active == 0) class="active" aria-current="true" @endif <?php $active++ ?> aria-label="Slide {{$active}}"></button>
                    @endforeach
                </div>
                <div class="carousel-inner">
                    <?php $active=0 ?>
                    @foreach($gallery as $photo)
                        <div class="carousel-item  @if($active == 0) active @endif <?php $active++ ?>">
                            <img src="{{ asset($photo->path) }}" alt="...">
                        </div>
                    @endforeach
                </div>
            </div>
            <button class="carousel-control-prev @if(count($gallery) <= 1) d-none @endif" style="background-color: rgba(2,14,24,0.1); width: 100px;" type="button" data-bs-target="#carouselModalgallery" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next @if(count($gallery) <= 1) d-none @endif" style="background-color: rgba(2,14,24,0.1); width: 100px;" type="button" data-bs-target="#carouselModalgallery" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <script>
        let items = document.querySelectorAll('.galleryItem')
        var totItem = 6

        items.forEach((el) => {
            if(totItem <= 3){
                $('#galleryCarousel > .carousel-control-prev,#galleryCarousel > .carousel-control-next').css('display','none')
            }

            const minPerSlide = totItem
            let next = el.nextElementSibling
            for (var i = 1; i < minPerSlide; i++) {
                if (!next) {next = items[0]}
                let cloneChild = next.cloneNode(true)
                el.appendChild(cloneChild.children[0])
                next = next.nextElementSibling
            }
        })

        document.querySelector('body').addEventListener('keydown', function(event) {if(event.keyCode === 27) {closeModalGallery()}});

        function closeModalGallery(){
            $('body').css('overflow','auto')
            $('#modalGallery').css('display','none')
        }

        $('.viewerModalGalleryView').on('click',function (){
            $('body').css('overflow','hidden')
            $('#modalGallery').css('display','flex')
        })

        document.querySelector('body').addEventListener('keydown', function(event) {if(event.keyCode === 27) {closeModalAlert()}});
        function closeModalAlert(){
            $('#modalAlert').css('display','none')
            window.location.href = "{{ route('tenancy_view',$tenancy->id) }}";
        }

    </script>
@endsection
