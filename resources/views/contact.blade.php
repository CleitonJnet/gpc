@extends('layout.app')
@section('title','Fale Conosco')
@section('content')
    <style>
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
    </style>

    <section class="header_session" style="background-image: url({{ asset('img/tower.jpg') }})">
        <div class="header-box">
            <h1>@yield('title')</h1>
        </div>
    </section>

    <section class="content background_img">
        <section class="header-section py-4">
            <div><h5 class="header-title text-uppercase">DEIXE AQUI A SUA MENSAGEM</h5><div class="header-ico"><span></span><span></span><span></span></div></div>
        </section>
        <div class="container">
            <div class="row bg-white rounded border shadow">
                <div class="col-lg-12">
                    <form class="py-3" method="POST" action="{{ route('contactMail') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <input type="text" aria-label="fullname" id="fullname" name="name" minlength="5" class="form-control col-12" placeholder="Nome" >
                            </div>
                            <div class="col-md-7 mb-3">
                                <div class="input-group">
                                    <input type="text" aria-label="phone" id="phone" name="phone" maxlength="11" minlength="10" class="form-control col-4" placeholder="DDD + Telefone" >
                                    <input type="email" aria-label="email" id="email" name="email" class="form-control col-8" placeholder="E-mail">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <textarea aria-label="msg" rows="5" class="form-control" id="msg" name="msg" placeholder="Mensagem" ></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn-blue-dark d-block w-100 py-2" id="msg_submit">Enviar mensagem</button>
                        <div id="msg_result"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>

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

    <script>
        document.querySelector('body').addEventListener('keydown', function(event) {if(event.keyCode === 27) {closeModalAlert()}});
        function closeModalAlert(){
            $('#modalAlert').css('display','none')
            window.location.href = "{{ route('contact') }}";
        }
    </script>
@endsection
