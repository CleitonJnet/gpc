@extends('layout.app')
@section('title','Fale Conosco')
@section('content')
    <section class="header_session" style="background-image: url({{ asset('img/tower.jpg') }})">
        <div class="header-box">
            <h1>@yield('title')</h1>
        </div>
    </section>

    <section class="content background_img">
        <section class="header-section">
            <div><h5 class="header-title text-uppercase">DEIXE AQUI A SUA MENSAGEM</h5><div class="header-ico"><span></span><span></span><span></span></div></div>
        </section>
        <div class="container">
            <div class="row bg-white rounded border shadow">
                <div class="col-lg-12">
                    <form class="py-3" method="POST" action="http://www.eebrasil.org.br/send_mail">

                        <input type="hidden" name="_token" value="prUbyU0JLsKp6mdjHqbubZJTksczIhD4b7z91hRt">
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <input type="text" aria-label="fullname" id="fullname" name="fullname" minlength="5" class="form-control col-12" placeholder="Nome" >
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
                        <input type="submit" value="Enviar" id="msg_submit" class="btn btn-primary btn-block w-100">
                        <div id="msg_result"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
