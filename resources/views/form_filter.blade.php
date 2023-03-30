<form action="{{ route('tenancy_filter') }}" method="GET">
    @csrf
    <div class="row pt-4 d-flex justify-content-center rounded-top" style="background-color: rgba(0,0,0,.2);">
        <div class="col-md-3 my-2">
            <div class="form-floating">
                <select class="form-select" name="type_rent" id="type_rent" aria-label="Tipo de imóvel">
                    <option @if($type_rent == '1-6') selected @endif value="1-6">Todos</option>
                    <option @if($type_rent == '1-1') selected @endif value="1-1">Apartamento</option>
                    <option @if($type_rent == '2-2') selected @endif value="2-2">Casa</option>
                    <option @if($type_rent == '3-3') selected @endif value="3-3">Cobertura</option>
                    <option @if($type_rent == '4-4') selected @endif value="4-4">Flat</option>
                    <option @if($type_rent == '5-5') selected @endif value="5-5">Sala Comercial</option>
                    <option @if($type_rent == '6-6') selected @endif value="6-6">Terreno</option>
                </select>
                <label for="type_rent">Tipo de imóvel</label>
            </div>
        </div>
        <div class="col-md-3 my-2">
            <div class="form-floating">
                <input type="number" class="form-control" id="tot_all_min" name="tot_all_min" placeholder="Preço min" value="{{ $tot_all_min }}">
                <label for="tot_all_min">Valor mínimo</label>
            </div>
        </div>
        <div class="col-md-3 my-2">
            <div class="form-floating">
                <input type="number" class="form-control" id="tot_all_max" name="tot_all_max" placeholder="Preço máx" value="{{$tot_all_max}}">
                <label for="tot_all_max">Valor máximo</label>
            </div>
        </div>
        <div class="col-md-2 my-2">
            <div class="form-floating">
                <select class="form-select" id="rooms" name="rooms" aria-label="Quartos">
                    <option @if($rooms == '1-99') selected @endif value="1-99">Selecione</option>
                    <option @if($rooms == '1-1') selected @endif value="1-1">1</option>
                    <option @if($rooms == '2-2') selected @endif value="2-2">2</option>
                    <option @if($rooms == '3-3') selected @endif value="3-3">3</option>
                    <option @if($rooms == '4-99') selected @endif value="4-99">+4</option>
                </select>
                <label for="rooms">Quartos</label>
            </div>
        </div>
        <div class="col-md-2 my-2">
            <div class="form-floating">
                <select class="form-select" id="park" name="park" aria-label="vagas">
                    <option @if($park == '1-99') selected @endif value="1-99">Selecione</option>
                    <option @if($park == '1-1') selected @endif value="1-1">1</option>
                    <option @if($park == '2-2') selected @endif value="2-2">2</option>
                    <option @if($park == '3-3') selected @endif value="3-3">3</option>
                    <option @if($park == '4-99') selected @endif value="4-99">+4</option>
                </select>
                <label for="park">Vagas</label>
            </div>
        </div>
        <div class="col-md-3 my-2">
            <div class="form-floating">
                <select class="form-select" id="size" name="size" aria-label="Área">
                    <option @if($size == '0-999999999') selected @endif value=" 0-999999999">Todos</option>
                    <option @if($size == '0-40') selected @endif class value="0-40">Até 40m²</option>
                    <option @if($size == '40-60') selected @endif value="40-60">De 40 até 60m²</option>
                    <option @if($size == '61-80') selected @endif value="61-80">De 60 até 80m²</option>
                    <option @if($size == '81-100') selected @endif value="81-100">De 80 até 100m²</option>
                    <option @if($size == '101-200') selected @endif value="101-200">De 100 até 200m²</option>
                    <option @if($size == '201-300') selected @endif value="201-300">De 200 até 300m²</option>
                    <option @if($size == '301-400') selected @endif value="301-400">De 300 até 400m²</option>
                    <option @if($size == '400-999999999') selected @endif value="400-999999999">Acima de 400m²</option>
                </select>
                <label for="size">Área</label>
            </div>
        </div>
        <div class="col-md-3 my-2">
            <div class="form-floating">
                <select class="form-select" id="neighborhood" name="neighborhood" aria-label="Bairro">
                    <option value="@foreach(App\Tenancy::orderBy('neighborhood','ASC')->distinct()->get('neighborhood') as $neighborhood_){{$neighborhood_->neighborhood}}-@endforeach">
                        Todos
                    </option>
                    @foreach(App\Tenancy::orderBy('neighborhood','ASC')->distinct()->get('neighborhood') as $neighborhood_)
                        <option @if($neighborhood == $neighborhood_->neighborhood) selected @endif
                        value="{{ $neighborhood_->neighborhood }}">
                            {{ $neighborhood_->neighborhood }}
                        </option>
                    @endforeach
                </select>
                <label for="size">Bairro</label>
            </div>
        </div>
        <div class="col-md-3 my-2">
            <div class="form-floating">
                <select class="form-select" id="city" name="city" aria-label="Bairro">
                    <option value="@foreach(App\Tenancy::orderBy('city','ASC')->distinct()->get('city') as $city_){{$city_->city}}-@endforeach">
                        Todos
                    </option>
                    @foreach(App\Tenancy::orderBy('city','ASC')->distinct()->get('city') as $city_)
                        <option @if($city == $city_->city) selected @endif
                        value="{{ $city_->city }}">
                            {{ $city_->city }}
                        </option>
                    @endforeach
                </select>
                <label for="size">Cidade</label>
            </div>
        </div>
    </div>
    <div class="row py-3 d-flex justify-content-center" style="background-color: rgba(0,0,0,.2);">
        <div class="col d-flex justify-content-center"><button class="btn btn-outline-dark d-block py-2" style="min-width: 50%"><i class="fas fa-search-location" style="font-size: 20px;"></i> Buscar imóvel disponível</button></div>
    </div>
</form>
