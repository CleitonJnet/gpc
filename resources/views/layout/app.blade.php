<!DOCTYPE html>
<html lang="pt_br">
<head>
    {{--    INFORMAÇÔES SOBRE A PÁGINA    --}}
    <meta property="og:type" content="website"/>
    {{--    TIPO DE ARQUIVO    --}}
    <meta property="og:url" content="http://www.gpcadministradora.com.br"/>
    {{--    ENDEREÇO DO SITE    --}}
    <meta property="og:title" content="GPC Administradora"/>
    {{--    TITULO DO ARQUIVO    --}}
    <meta property="og:image" content="http://www.gpcadministradora.com.br/img/logo.png"/>
    {{--    IMAGEM DE REFERENCIA DO SITE    --}}
    <meta property="og:description" content="Segurança, Comodidade e Solução na administração de imóveis e condomínios!"/>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <title>@yield('title') :: GPC Administradora</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<video preload="auto" autoplay loop muted style="position: fixed;z-index: -1; padding: 0; display: block; top: 0;left: 0;min-width: 100vw;min-height: 100vh;">
    <source src="{{ asset('img/skyscrapers.mp4') }}" type="video/mp4" />
</video>

<header>
    <div id="nav-top">
        <div class="container d-flex justify-content-between">
            <div id="contact"><a target="_black" href="tel:+552127176759">(21) 2717-6759</a>
                <span>|</span>
                <a target="_black" href="tel:+552126222044">(21) 2622-2044</a>
                <span class="d-none d-md-inline-flex">|</span>
                <a target="_black" href="mailto:contato@gpcadministradora.com.br" class="d-none d-md-inline">contato@gpcadministradora.com.br</a>
            </div>
            <div class="restrict">
                <a
                    target="_blanc"
                    href="https://www.immobileweb.com.br/login/gpcadministradora"
                    class="text-light">
                    <i style="font-size: 1rem" class="text-light fas fa-user"></i>
                    Clientes
                </a>
            </div>
        </div>
    </div>
    <div id="menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ route('index') }}">
                    <img src="{{ asset('img/logo.png') }}" alt="GPC">
                    <div class="navbar-brand-title">Administradora</div>
                </a>
                <button
                    class="navbar-toggler border-0 p-0"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div
                    class="collapse navbar-collapse justify-content-end"
                    id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link px-2 @if(request()->is('/')) active @endif" aria-current="page" href="{{ route('index') }}">{{ __('INÍCIO') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-2 @if(request()->is('about')) active @endif" href="{{ route('about') }}">{{ __('SOBRE') }}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle @if(request()->is('tenancy_about') || request()->is('sale')) active @endif" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ __('IMÓVEIS') }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item @if(request()->is('tenancy_about')) active @endif" href="{{ route('tenancy_about') }}">{{ __('LOCAÇÃO DE IMOVEIS') }}</a></li>
                                <li><a class="dropdown-item @if(request()->is('sale')) active @endif" href="{{ route('sale') }}">{{ __('VENDA DE IMOVEIS') }}</a></li>
                            </ul>
                        </li>
                        <li class="nav-item @if( \App\Tenancy::count() < 1) d-none @endif">
                            <a href="{{route('tenancy_list')}}" class="nav-link px-2 @if(request()->is('tenancy_list')) active @endif @if(request()->is('tenancy_filter')) active @endif">{{ __('ALUGUEL') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-2 @if(request()->is('condominium')) active @endif" href="{{ route('condominium') }}">{{ __('CONDOMÍNIOS') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-2 @if(request()->is('contact')) active @endif" href="{{ route('contact') }}">{{ __('CONTATO') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<main class="container-fluid container-xxl" style="min-height:calc( 100vh - 160px )">
    @yield('content')
</main>
<div id="pre-footer"></div>
<footer>
    <div class="container content">
        <div class="row text-light">
            <div class="col-lg-4 rounded text-dark p-4 mb-4 mb-md-0" style="text-align: justify; background-color: rgba(255, 255, 255, .85);">
                <div class="d-inline">
                    <img src="{{ asset('img/logo.png') }}" class="mb-3 d-block mx-auto" alt="">
                </div>
                <p class="fw-bold text-center">Oferecemos total cobertura na <em>administração de condomínios</em>.</p>

                <hr class="bg-primary">
                <p>Todos os departamentos GPC são próprios, prezamos pela excelência na prestação de serviços e absoluto controle das ações.</p>
            </div>
            <div class="col-lg-4 px-4 mb-4 mb-md-0">
                <h4 class="mb-4 px-4" id="footer-contact">Contato direto</h4>
                <ul style="list-style: square;">
                    <li class="mb-4"><strong><em>Alugueis/Condomínios/Contabilidade</em>:</strong> <br> Para informações sobre nossos serviços ou cotações:
                        <ul>
                            <li><a target="_blanc" class="text-light" style="font-style: italic;" href="mailto:contato@gpcadministradora.com.br">contato@gpcadministradora.com.br</a></li>
                        </ul>
                    </li>
                    <li class="mb-4"><strong><em>Assessoria Jurídica</em>:</strong> <br> Para esclarecimentos e assessoria jurídica
                        <ul>
                            <li><a target="_blanc" class="text-light" style="font-style: italic;" href="mailto:contato@gpcadministradora.com.br">contato@gpcadministradora.com.br</a></li>
                        </ul>
                    </li>
                    <li class="mb-4"><strong>Boletos</strong>: Atendimento geral
                        <ul>
                            <li><a target="_blanc" class="text-light" style="font-style: italic;" href="mailto:contato@gpcadministradora.com.br">contato@gpcadministradora.com.br</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <address class="col-lg-4 px-4 mb-4 mb-md-0" id="footer-contactus">
                <h4 class="mb-4">Encontre-nos</h4>
                <div>
                    <a href="tel:+552127176759">(21) 2717-6759</a>
                    <span class="text-light fw-bold px-2">|</span>
                    <a href="tel:+552126222044">(21) 2622-2044</a>
                    <a target="_black" href="mailto:contato@gpcadministradora.com.br" class="text-light">contato@gpcadministradora.com.br</a>
                </div>

                <hr>
                <div>Rua Cel. Gomes Machado, 136 11º andar, Centro, Niterói - RJ CEP: 24020-065</div>
                <br>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14702.222848868692!2d-43.1201926!3d-22.8928651!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5d37610fa9f1f604!2sGPC%20Administradora!5e0!3m2!1spt-BR!2sbr!4v1613569397276!5m2!1spt-BR!2sbr"></iframe>
            </address>
        </div>
        <div id="media-footer" class="text-center">
            <hr>
            <a class="px-1" href="#Facebook">
                <img src="{{ asset('img/Facebook.png') }}" alt="">
            </a>
            <a class="px-1" href="#Instagram">
                <img src="{{ asset('img/Instagram.png') }}" alt="">
            </a>
            <a class="px-1" href="#YouTube">
                <img src="{{ asset('img/Youtube.png') }}" alt="">
            </a>
        </div>
    </div>
    <div id="copyright">
        <div></div>
        <div>Desenvolvido por:
            <a target="_blanc" href="http://maxsersistemas.com.br/">Maxser Sistemas</a>
        </div>
        <div class="d-none d-md-flex">
            <ul>
                <li>
                    <a href="{{ route('index') }}#wellcome">INÍCIO</a>
                </li>
                |
                <li>
                    <a href="{{ route('index') }}#properties">IMOVEIS</a>
                </li>
                |
                <li>
                    <a href="{{ route('index') }}#property_manager">ADMINISTRADORA</a>
                </li>
                |
                <li>
                    <a href="{{ route('index') }}#comments">COMENTÁRIOS</a>
                </li>
                |
                <li>
                    @guest
                        <a href="{{ route('login') }}">{{ __('LOGIN') }}</a>
                    @else
                        <a href="{{ route('login') }}">{{ __('SISTEMA') }}</a>
                    @endguest
                </li>
            </ul>
        </div>
    </div>
</footer>
<div id="whatsapp_msg" class="d-none">
    <a target="_blank" href="https://api.whatsapp.com/send/?phone=5521975091507"><img src="{{ asset('img/whatsapp.png') }}" alt=""></a>
    <div id="contact-zap" class="d-none">Fale conosco</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a82873f248.js" crossorigin="anonymous"></script>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
