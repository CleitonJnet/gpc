<!DOCTYPE html>
<html lang="pt_br">
<head>
    {{--    INFORMAÇÔES SOBRE A PÁGINA    --}}
    <meta property="og:type" content="website"/>
    {{--    TIPO DE ARQUIVO    --}}
    <meta property="og:url" content="http://www.gpcadministradora.com.br/admin"/>
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
    <div id="menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ route('admin.index') }}">
                    <img src="{{ asset('img/logo.png') }}" alt="GPC">
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
                            <a class="nav-link px-2 @if(request()->is('admin')) active @endif" aria-current="page" href="{{ route('admin.index') }}">{{ __('INÍCIO') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-2 @if(request()->is('admin/tenancy') || request()->is('admin/tenancy/*') || request()->is('admin/gallery/list/*')) active @endif" href="{{ route('admin.tenancy.index') }}">{{ __('LOCAÇÃO') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-2 @if(request()->is('admin/comment/list')) active @endif" href="{{ route('admin.comment.index') }}">{{ __('COMENTÁRIOS') }}</a>
                        </li>
                        <li class="nav-item">
                            @guest
                                <a class="nav-link px-2 @if(request()->is('/')) active @endif" href="{{ route('login') }}">{{ __('SISTEMA') }}</a>
                            @else
                                <a class="nav-link px-2 @if(request()->is('/')) active @endif" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                >{{ __('SAIR') }}</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @endguest
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<main class="container-fluid container-xxl" style="padding-bottom: 80px">
    @yield('content')
</main>
<div id="pre-footer" style="position: fixed;bottom: 40px;left: 0;width: 100%; z-index: 999;"></div>
<footer style="padding: 0!important;position: fixed;bottom: 0;left: 0;width: 100%; z-index: 999;">
    <div id="copyright" style="margin: 0!important;">
        <div class="pb-2">Desenvolvido por: <a target="_blanc" href="http://maxsersistemas.com.br/">Maxser Sistemas</a></div>
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
