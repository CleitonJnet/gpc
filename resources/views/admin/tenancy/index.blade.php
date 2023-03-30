@extends('layout.admin')
@section('title','Lista de imóveis')
@section('content')

    <style>
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

    <div class="row rounded" style="background-color: var(--bright)">
        <div class="col">
            <div class="pt-4 pb-2 d-flex justify-content-between align-items-center">
                <h4 class="text-start">Imóveis</h4>
                <div><button class="btn btn-blue-dark" data-bs-toggle="modal" data-bs-target="#addHouseModal">Cadastrar</button></div>
            </div>
            <hr>
            <table class="table table-hover" style="vertical-align: middle">
                <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Rua</th>
                    <th>Número</th>
                    <th>Bairro</th>
                    <th class="text-center">Fotos</th>
                    <th>#</th>
                </tr>
                </thead>
                <tbody>
                @foreach($houses as $house)
                    <tr>
                        <th>
                            @if($house->type_rent == 1) Apartamento @endif
                            @if($house->type_rent == 2) Casa @endif
                            @if($house->type_rent == 3) Cobertura @endif
                            @if($house->type_rent == 4) Flat @endif
                            @if($house->type_rent == 5) Sala Comercial @endif
                            @if($house->type_rent == 6) Terreno @endif
                        </th>
                        <td>{{$house->street}}</td>
                        <td>{{$house->number}}</td>
                        <td>{{$house->neighborhood}}</td>
                        <td><a href="{{ route('admin.gallery.index',$house->id) }}" class="btn btn-sm btn-blue-light d-block">{{$house->gallery()->count()}}</a></td>
                        <td style="width: 180px">
                            <a href="{{ route('admin.tenancy.show',$house->id) }}" class="btn btn-sm btn-blue-dark mb-1 mb-xl-0">  <i style="font-size: 1rem;color: var(--bright);padding: 0 35px" class="fas fa-house-user"></i></a>
                            <form action="{{ route('admin.tenancy.destroy',$house->id) }}" class="d-inline" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-danger" type="submit"><i style="font-size: 1rem;color: var(--bright);" class="px-2 fas fa-eraser"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot></tfoot>
            </table>
            <div class="py-2">
                <div>{{ $houses->links() }}</div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addHouseModal" tabindex="-1" aria-labelledby="addHouseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-xl-down">
            <div class="modal-content">
                <form action="{{ route('admin.tenancy.store') }}" method="POST">
                    @csrf

                    <input type="hidden" name="tot_all">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cadastro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body row g-3">
                        <div class="col-12">
                            <label for="title" class="form-label">Título do anúncio</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Título do anúncio">
                        </div>
                        <div class="col-md-3">
                            <label for="type_rent" class="form-label">Tipo de imóvel</label>
                            <select id="type_rent" class="form-select" name="type_rent">
                                <option value="" hidden>Tipo</option>
                                <option value="1">Apartamento</option>
                                <option value="2">Casa</option>
                                <option value="3">Cobertura</option>
                                <option value="4">Flat</option>
                                <option value="5">Sala Comercial</option>
                                <option value="6">Terreno</option>
                            </select>
                        </div>
                        <div class="col-md-7">
                            <label for="street" class="form-label">Logradouro</label>
                            <input type="text" class="form-control" id="street" name="street" placeholder="Logradouro">
                        </div>
                        <div class="col-md-2">
                            <label for="number" class="form-label">Número</label>
                            <input type="text" class="form-control" id="number" name="number" placeholder="Nº">
                        </div>
                        <div class="col-md-5">
                            <label for="neighborhood" class="form-label">Bairro</label>
                            <input type="text" class="form-control" id="neighborhood" name="neighborhood" placeholder="Bairro">
                        </div>
                        <div class="col-md-5">
                            <label for="city" class="form-label">Cidade</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="Cidade" value="Niterói">
                        </div>
                        <div class="col-md-2">
                            <label for="state" class="form-label">UF</label>
                            <select id="state" name="state" class="form-select">
                                <option value="">-</option>
                                <option value="AC" title="Acre">AC</option>
                                <option value="AL" title="Alagoas">AL</option>
                                <option value="AM" title="Amazonas">AM</option>
                                <option value="AP" title="Amapá">AP</option>
                                <option value="BA" title="Bahía">BA</option>
                                <option value="CE" title="Ceará">CE</option>
                                <option value="BR" title="Distrito Federal">DF</option>
                                <option value="ES" title="Espirito Santo">ES</option>
                                <option value="GO" title="Goiás">GO</option>
                                <option value="MA" title="Maranhão">MA</option>
                                <option value="MG" title="Minas Gerais">MG</option>
                                <option value="MT" title="Mato Grosso">MT</option>
                                <option value="PA" title="Pará">PA</option>
                                <option value="PB" title="Paraíba">PB</option>
                                <option value="PE" title="Pernambuco">PE</option>
                                <option value="PI" title="Piauí">PI</option>
                                <option value="PR" title="Paraná">PR</option>
                                <option value="RJ" title="Rio de Janeito" selected>RJ</option>
                                <option value="NT" title="Rio Grande do Norte">RN</option>
                                <option value="RO" title="Rondônia">RO</option>
                                <option value="RR" title="Roraima">RR</option>
                                <option value="RS" title="Rio Grande do Sul">RS</option>
                                <option value="SE" title="Sergipe">SE</option>
                                <option value="MS" title="Mato Grosso do Sul">MS</option>
                                <option value="SC" title="Santa Catarina">SC</option>
                                <option value="SP" title="São Paulo">SP</option>
                                <option value="TO" title="Tocantins">TO</option>
                            </select>
                        </div>
                        <div class="col-12"><hr></div>
                        <div class="col-3">
                            <label for="size" class="form-label">Metragem</label>
                            <input type="number" class="form-control" id="size" min="1" name="size" placeholder="Metragem">
                        </div>
                        <div class="col-md-3">
                            <label for="rooms" class="form-label">Quartos</label>
                            <input type="number" class="form-control" id="rooms" min="1" name="rooms" placeholder="Quartos">
                        </div>
                        <div class="col-md-3">
                            <label for="bathroom" class="form-label">Banheiros</label>
                            <input type="number" class="form-control" id="bathroom" min="1" name="bathroom" placeholder="Banheiros">
                        </div>
                        <div class="col-md-3">
                            <label for="park" class="form-label">Vagas</label>
                            <input type="number" class="form-control" id="park" min="1" name="park" placeholder="Vagas">
                        </div>
                        <div class="col-md-3">
                            <label for="rent" class="form-label">Aluguel</label>
                            <input type="number" step="0.01" class="form-control" min="0" id="rent" name="rent" placeholder="Aluguel">
                        </div>
                        <div class="col-md-3">
                            <label for="condominium" class="form-label">Condomínio</label>
                            <input type="number" step="0.01" class="form-control" min="0" id="condominium" name="condominium" placeholder="Condomínio">
                        </div>
                        <div class="col-md-3">
                            <label for="IPTU" class="form-label">IPTU</label>
                            <input type="number" step="0.01" class="form-control" min="0" id="IPTU" name="IPTU" placeholder="IPTU">
                        </div>
                        <div class="col-md-3">
                            <label for="firefighting" class="form-label">Taxa de Incêndio</label>
                            <input type="number" step="0.01" class="form-control" min="0" id="firefighting" name="firefighting" placeholder="Taxa de Incêndio">
                        </div>
                        <div class="col-md-3">
                            <label for="elevator" class="form-label">Elevador</label>
                            <select id="elevator" class="form-select" name="elevator">
                                <option value="0">Sem</option>
                                <option value="1">Com</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="pet" class="form-label">Pets</label>
                            <select id="pet" class="form-select" name="pet">
                                <option value="0">Não aceita</option>
                                <option value="1">Aceita</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="furniture" class="form-label">Mobília</label>
                            <select id="furniture" class="form-select" name="furniture">
                                <option value="0">Sem mobília</option>
                                <option value="1">Com mobília</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="transport" class="form-label">Transporte próximo</label>
                            <select id="transport" class="form-select" name="transport">
                                <option value="0">Não</option>
                                <option value="1">Sim</option>
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="feature" class="form-label">Descrição do imóvel</label>
                            <textarea class="form-control" id="feature" name="feature" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-blue-dark">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="viewTenancyModal" tabindex="-1" aria-labelledby="viewTenancyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-xxl-down modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewTenancyModalLabel">Pré-visualização</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container-xxl">

                    <style>
                        .breadcrumb-item a {color: var(--blue-dark)!important;}
                    </style>

                    <nav class="nav-breadcrumb" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Locação</a></li>
                            <li class="breadcrumb-item"><a class="breadcrumb_city" href="#"></a></li>
                            <li class="breadcrumb-item"><a class="breadcrumb_neighborhood" href="#"></a></li>
                            <li class="breadcrumb-item"><a class="breadcrumb_street" href="#"></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Imóvel-cod<span class="breadcrumb_id"></span></li>
                        </ol>
                    </nav>

                    <section class="content" id="tenancy">
                        <div class="row">
                            <div class="col">
                                <h4 class="text-start view_title" style="color: var(--blue);"></h4>
                            </div>
                            <hr style="background-color: var(--blue);">
                        </div>
                        <div class="row pb-5">
                            <div class="col-8">
                                <span class="text-start text-secondary fw-normal">
                                    <strong class="address_type_rent"></strong>:
                                    <span class="address_street"></span>,
                                    <span class="address_neighborhood"></span>,
                                    <span class="address_city"></span>,
                                    <span class="address_state"></span>
                                </span>
                            </div>
                            <div class="col"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="text-nowrap bar-overflow">
                                    <i style="font-size: 1.2rem; color: var(--blue)" class="fas fa-ruler-combined"></i><span class="pe-3 text-secondary"> <span class="view_size"></span>m²</span>
                                    <i style="font-size: 1.2rem; color: var(--blue)" class="fas fa-bed"></i><span class="pe-3 text-secondary"> <span class="view_rooms"></span></span>
                                    <i style="font-size: 1.2rem; color: var(--blue)" class="fas fa-shower"></i><span class="pe-3 text-secondary"> <span class="view_bathroom"></span></span>
                                    <i style="font-size: 1.2rem; color: var(--blue)" class="fas fa-car"></i><span class="pe-3 text-secondary"> <span class="view_park"></span></span>
                                    <i style="font-size: 1.2rem; color: var(--blue)" class="fas fa-dog"></i><span class="pe-3 text-secondary"> <span class="view_pet"></span></span>
                                    <i style="font-size: 1.2rem; color: var(--blue)" class="fas fa-couch"></i><span class="pe-3 text-secondary"> <span class="view_furniture"></span></span>
                                    <i style="font-size: 1.2rem; color: var(--blue)" class="fas fa-bus-alt"></i><span class="pe-3 text-secondary"> <span class="view_transport"></span></span>
                                </div>
                                <hr>
                                <div class="py-4">
                                    <h6 class="text-start text-secondary fw-bold">CARACTERÍSTICAS:</h6>
                                    <p style="color: var(--grey)" class="view_feature"></p>
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
                                                <th class="py-3 text-end view_rent"></th>
                                            </tr>
                                            <tr>
                                                <td class="py-3">Condomínio</td>
                                                <td class="py-3 text-end view_condominium"></td>
                                            </tr>
                                            <tr>
                                                <td class="py-3">IPTU</td>
                                                <td class="py-3 text-end view_IPTU"></td>
                                            </tr>
                                            <tr>
                                                <td class="py-3">Taxa de incêndio</td>
                                                <td class="py-3 text-end view_firefighting"></td>
                                            </tr>
                                            </tbody>
                                            <tfoot>
                                            <tr style="font-size: 1.5rem;color: var(--blue)">
                                                <th>Total</th>
                                                <th class="text-end view_soma">R$ 2.097</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-dark">Galeria de fotos</a>
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
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

    </script>

@endsection
