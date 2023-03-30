@extends('layout.app')
@section('title','ALUGUEL DE IMÓVEIS')
@section('content')
    <section class="header_session" style="background-image: url({{ asset('img/tower.jpg') }})"><div class="header-box"><h1>@yield('title')</h1></div></section>

    <div id="content_sale">
        <section class="content" id="tenancy">


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
                                                <button
                                                    type="button"
                                                    data-bs-target="#imovel{{$rant->id}}"
                                                    data-bs-slide-to="{{$i}}"
                                                    class="active"
                                                    aria-current="true"
                                                    aria-label="Slide {{$i++}}">
                                                </button>
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
                                    <div class="py-1">
                                        <small class="fw-light">
                                            @if($rant->type_rent == 1) Apartamento @endif
                                            @if($rant->type_rent == 2) Casa @endif
                                            @if($rant->type_rent == 3) Cobertura @endif
                                            @if($rant->type_rent == 4) Flat @endif
                                            @if($rant->type_rent == 5) Sala Comercial @endif
                                            @if($rant->type_rent == 6) Terreno @endif
                                        </small>
                                    </div>
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
            <div class="row">
                <div class="col">
                    <span>{{ $tot_house }} imóvei<span class="@if($tot_house > 1) d-inline @endif">s</span> encontrados</span>
                </div>
            </div>
            <div>{{ $rants->links() }}</div>
        </section>
    </div>
@endsection
