@extends('layout.admin')
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

        .managerGalleryView {
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
                <div style="position: absolute; left: calc( 50% - 25vw ); bottom: 20px"><a href="{{ route('admin.gallery.index',$tenancy->id) }}" class="managerGalleryView btn-blue-light">GERENCIAR GALERIA</a></div>
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
                    <i style="font-size: 1.2rem; color: #2C4D70" class="fas fa-dog"></i><span class="pe-3 text-secondary">  {{ ($tenancy->pet === 'y')? ' aceita': ' não aceita' }}</span>
                    <i style="font-size: 1.2rem; color: #2C4D70" class="fas fa-couch"></i><span class="pe-3 text-secondary"> {{ ($tenancy->furniture === 'y')? ' mobiliado': ' não mobiliado' }}</span>
                    <i style="font-size: 1.2rem; color: #2C4D70" class="fas fa-bus-alt"></i><span class="pe-3 text-secondary">  {{ ($tenancy->transport === 'y')? ' próximo': ' não próximo' }}</span>
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
                <button id="btn-agendar-visita" type="button" data-bs-toggle="modal" data-bs-target="#editHouseModal">EDITAR</button>
            </div>
        </div>
    </section>

    <form action="{{ route('admin.tenancy.update',$tenancy->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="modal fade" id="editHouseModal" tabindex="-1" aria-labelledby="editHouseModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <input type="hidden" name="id" value="{{ $tenancy->id }}">

                    <input type="hidden" name="tot_all">

                    <div class="modal-header">
                        <h5 class="modal-title" id="editHouseModalLabel">Cadastro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body row g-3">
                        <div class="col-12">
                            <label for="title" class="form-label">Título do anúncio</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $tenancy->title }}" placeholder="Título do anúncio">
                        </div>
                        <div class="col-md-3">
                            <label for="type_rent" class="form-label">Tipo de imóvel</label>
                            <select id="type_rent" class="form-select" name="type_rent">
                                <option @if($tenancy->type_rent == 1) selected @endif value="1">Apartamento</option>
                                <option @if($tenancy->type_rent == 2) selected @endif value="2">Casa</option>
                                <option @if($tenancy->type_rent == 3) selected @endif value="3">Cobertura</option>
                                <option @if($tenancy->type_rent == 4) selected @endif value="4">Flat</option>
                                <option @if($tenancy->type_rent == 5) selected @endif value="5">Sala Comercial</option>
                                <option @if($tenancy->type_rent == 6) selected @endif value="6">Terreno</option>
                            </select>
                        </div>
                        <div class="col-md-7">
                            <label for="street" class="form-label">Logradouro</label>
                            <input type="text" class="form-control" id="street" name="street" value="{{ $tenancy->street }}" placeholder="Logradouro">
                        </div>
                        <div class="col-md-2">
                            <label for="number" class="form-label">Número</label>
                            <input type="text" class="form-control" id="number" name="number" value="{{ $tenancy->number }}" placeholder="Nº">
                        </div>
                        <div class="col-md-5">
                            <label for="neighborhood" class="form-label">Bairro</label>
                            <input type="text" class="form-control" id="neighborhood" name="neighborhood" value="{{ $tenancy->neighborhood }}" placeholder="Bairro">
                        </div>
                        <div class="col-md-5">
                            <label for="city" class="form-label">Cidade</label>
                            <input type="text" class="form-control" id="city" name="city" value="{{ $tenancy->city }}" placeholder="Cidade">
                        </div>
                        <div class="col-md-2">
                            <label for="state" class="form-label">UF</label>
                            <select id="state" name="state" class="form-select">
                                <option @if($tenancy->state == 'AC') selected @endif value="AC" title="Acre">AC</option>
                                <option @if($tenancy->state == 'AL') selected @endif value="AL" title="Alagoas">AL</option>
                                <option @if($tenancy->state == 'AM') selected @endif value="AM" title="Amazonas">AM</option>
                                <option @if($tenancy->state == 'AP') selected @endif value="AP" title="Amapá">AP</option>
                                <option @if($tenancy->state == 'BA') selected @endif value="BA" title="Bahía">BA</option>
                                <option @if($tenancy->state == 'CE') selected @endif value="CE" title="Ceará">CE</option>
                                <option @if($tenancy->state == 'BR') selected @endif value="BR" title="Distrito Federal">DF</option>
                                <option @if($tenancy->state == 'ES') selected @endif value="ES" title="Espirito Santo">ES</option>
                                <option @if($tenancy->state == 'GO') selected @endif value="GO" title="Goiás">GO</option>
                                <option @if($tenancy->state == 'MA') selected @endif value="MA" title="Maranhão">MA</option>
                                <option @if($tenancy->state == 'MG') selected @endif value="MG" title="Minas Gerais">MG</option>
                                <option @if($tenancy->state == 'MT') selected @endif value="MT" title="Mato Grosso">MT</option>
                                <option @if($tenancy->state == 'PA') selected @endif value="PA" title="Pará">PA</option>
                                <option @if($tenancy->state == 'PB') selected @endif value="PB" title="Paraíba">PB</option>
                                <option @if($tenancy->state == 'PE') selected @endif value="PE" title="Pernambuco">PE</option>
                                <option @if($tenancy->state == 'PI') selected @endif value="PI" title="Piauí">PI</option>
                                <option @if($tenancy->state == 'PR') selected @endif value="PR" title="Paraná">PR</option>
                                <option @if($tenancy->state == 'RJ') selected @endif value="RJ" title="Rio de Janeito">RJ</option>
                                <option @if($tenancy->state == 'NT') selected @endif value="NT" title="Rio Grande do Norte">RN</option>
                                <option @if($tenancy->state == 'RO') selected @endif value="RO" title="Rondônia">RO</option>
                                <option @if($tenancy->state == 'RR') selected @endif value="RR" title="Roraima">RR</option>
                                <option @if($tenancy->state == 'RS') selected @endif value="RS" title="Rio Grande do Sul">RS</option>
                                <option @if($tenancy->state == 'SE') selected @endif value="SE" title="Sergipe">SE</option>
                                <option @if($tenancy->state == 'MS') selected @endif value="MS" title="Mato Grosso do Sul">MS</option>
                                <option @if($tenancy->state == 'SC') selected @endif value="SC" title="Santa Catarina">SC</option>
                                <option @if($tenancy->state == 'SP') selected @endif value="SP" title="São Paulo">SP</option>
                                <option @if($tenancy->state == 'TO') selected @endif value="TO" title="Tocantins">TO</option>
                            </select>
                        </div>
                        <div class="col-12"><hr></div>
                        <div class="col-3">
                            <label for="size" class="form-label">Metragem</label>
                            <input type="number" class="form-control" id="size" name="size" value="{{ $tenancy->size }}" placeholder="Metragem">
                        </div>
                        <div class="col-md-3">
                            <label for="rooms" class="form-label">Quartos</label>
                            <input type="number" class="form-control" id="rooms" name="rooms" value="{{ $tenancy->rooms }}" placeholder="Quartos">
                        </div>
                        <div class="col-md-3">
                            <label for="bathroom" class="form-label">Banheiros</label>
                            <input type="number" class="form-control" id="bathroom" name="bathroom" value="{{ $tenancy->bathroom }}" placeholder="Banheiros">
                        </div>
                        <div class="col-md-3">
                            <label for="park" class="form-label">Vagas</label>
                            <input type="number" class="form-control" id="park" name="park" value="{{ $tenancy->park }}" placeholder="Vagas">
                        </div>
                        <div class="col-md-3">
                            <label for="rent" class="form-label">Aluguel</label>
                            <input type="number" class="form-control" id="rent" name="rent" value="{{ $tenancy->rent }}" placeholder="Aluguel">
                        </div>
                        <div class="col-md-3">
                            <label for="condominium" class="form-label">Condomínio</label>
                            <input type="number" class="form-control" id="condominium" name="condominium" value="{{ $tenancy->condominium }}" placeholder="Condomínio">
                        </div>
                        <div class="col-md-3">
                            <label for="IPTU" class="form-label">IPTU</label>
                            <input type="number" class="form-control" id="IPTU" name="IPTU" value="{{ $tenancy->IPTU }}" placeholder="IPTU">
                        </div>
                        <div class="col-md-3">
                            <label for="firefighting" class="form-label">Taxa de Incêndio</label>
                            <input type="number" class="form-control" id="firefighting" name="firefighting"value="{{ $tenancy->firefighting }}" placeholder="Taxa de Incêndio">
                        </div>
                        <div class="col-md-3">
                            <label for="pet" class="form-label">Pets</label>
                            <select id="pet" class="form-select" name="pet">
                                <option @if($tenancy->pet == '0') selected @endif value="0">Não aceita</option>
                                <option @if($tenancy->pet == '1') selected @endif value="1">Aceita</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="furniture" class="form-label">Mobília</label>
                            <select id="furniture" class="form-select" name="furniture">
                                <option  @if($tenancy->furniture == '0') selected @endif value="0">Sem mobília</option>
                                <option  @if($tenancy->furniture == '1') selected @endif value="1">Com mobília</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="transport" class="form-label">Transporte próximo</label>
                            <select id="transport" class="form-select" name="transport">
                                <option @if($tenancy->transport == '0') selected @endif value="0">Não</option>
                                <option @if($tenancy->transport == '1') selected @endif value="1">Sim</option>
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="feature" class="form-label">Descrição do imóvel</label>
                            <textarea class="form-control" id="feature" name="feature" rows="3">{{ $tenancy->feature }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-blue-dark">Salvar</button>
                    </div>

                </div>
            </div>
        </div>

    </form>


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

    </script>
@endsection
