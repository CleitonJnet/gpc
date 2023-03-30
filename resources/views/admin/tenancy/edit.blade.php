@extends('layout.admin')
@section('title','Lista de imóveis')
@section('content')

    <div class="row rounded bg-light">
        <div class="col">
            <h4 class="pt-4 pb-2 text-start">Lista de imóveis</h4>
            <hr>
            <table class="table table-hover table-striped" style="vertical-align: middle">
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
                            <a href="{{ route('admin.tenancy.show',1) }}" class="btn btn-sm btn-blue-dark">  <i style="font-size: 1rem;color: var(--bright);" class="px-2 fas fa-house-user"></i></a>
                            <a href="#" class="btn btn-sm btn-warning">  <i style="font-size: 1rem;color: var(--bright);" class="px-2 fas fa-pen-square"></i></a>
                            <form action="{{ route('admin.tenancy.destroy',$house->id) }}" class="d-inline" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-danger" type="submit"><i style="font-size: 1rem;color: var(--bright);" class="px-2 fas fa-eraser"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex flex-column flex-md-row justify-content-center justify-content-md-between py-2">
                <div>{{ $houses->links() }}</div>
                <div><button class="btn btn-blue-dark" data-bs-toggle="modal" data-bs-target="#addHouseModal">Cadastrar</button></div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addHouseModal" tabindex="-1" aria-labelledby="addHouseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-xl-down">
            <div class="modal-content">
                <form action="{{ route('admin.tenancy.update',$tenancy) }}" method="POST">
                    @csrf
                    @method('UPDATE')

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
                                <option value="Apartamento">Apartamento</option>
                                <option value="Casa">Casa</option>
                                <option value="Cobertura">Cobertura</option>
                                <option value="Flat">Flat</option>
                                <option value="Sala Comercial">Sala Comercial</option>
                                <option value="Terreno">Terreno</option>
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
                            <input type="text" class="form-control" id="city" name="city" placeholder="Cidade">
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
                                <option value="RJ" title="Rio de Janeito">RJ</option>
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
                            <input type="number" class="form-control" id="size" name="size" placeholder="Metragem">
                        </div>
                        <div class="col-md-3">
                            <label for="rooms" class="form-label">Quartos</label>
                            <select id="rooms" class="form-select" name="rooms">
                                <option value="">-</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4+">4+</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="bathroom" class="form-label">Banheiros</label>
                            <select id="bathroom" class="form-select" name="bathroom">
                                <option value="">-</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4+">4+</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="park" class="form-label">Vagas</label>
                            <select id="park" class="form-select" name="park">
                                <option value="">-</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4+">4+</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="rent" class="form-label">Aluguel</label>
                            <input type="text" class="form-control" id="rent" name="rent" placeholder="Aluguel">
                        </div>
                        <div class="col-md-3">
                            <label for="condominium" class="form-label">Condomínio</label>
                            <input type="text" class="form-control" id="condominium" name="condominium" placeholder="Condomínio">
                        </div>
                        <div class="col-md-3">
                            <label for="IPTU" class="form-label">IPTU</label>
                            <input type="text" class="form-control" id="IPTU" name="IPTU" placeholder="IPTU">
                        </div>
                        <div class="col-md-3">
                            <label for="firefighting" class="form-label">Taxa de Incêndio</label>
                            <input type="text" class="form-control" id="firefighting" name="firefighting" placeholder="Taxa de Incêndio">
                        </div>
                        <div class="col-md-3">
                            <label for="pet" class="form-label">Pets</label>
                            <select id="pet" class="form-select" name="pet">
                                <option value="n">Não aceita</option>
                                <option value="y">Aceita</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="furniture" class="form-label">Mobília</label>
                            <select id="furniture" class="form-select" name="furniture">
                                <option value="n">Sem mobília</option>
                                <option value="y">Com mobília</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="transport" class="form-label">Transporte próximo</label>
                            <select id="transport" class="form-select" name="transport">
                                <option value="n">Não</option>
                                <option value="y">Sim</option>
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
