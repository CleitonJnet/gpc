@extends('layout.app')
@section('title','Venda de Imóveis')
@section('content')
    <section class="header_session" style="background-image: url({{ asset('img/tower.jpg') }})">
        <div class="header-box">
            <h1>@yield('title')</h1>
        </div>
    </section>

    <div id="content_sale">
        <section class="content" id="properties">
            <h2>Transparência e solidez para alugar o seu imóvel</h2>
            <p>Para alugar seu imóvel residencial ou comercial, você conta com a agilidade, transparência e, principalmente, segurança da GPC durante todo o processo e depois do fechamento do negócio.</p>
            <p>Ao contratar a GPC para administrar a locação do seu imóvel você conta com diversas vantagens como a avaliação e vistoria completa do imóvel, fiança, seguro-fiança e recebimento do aluguel em até 48 horas após a compensação do cheque do locatário.</p>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card mx-auto">
                        <i class="fas fa-hands-helping"></i>
                        <div class="card-body">
                            <h5 class="card-title">Atendimento Personalizado</h5>
                            <p class="card-text">Ao confiar a GPC a administração da locação do seu imóvel, você passa a contar com uma equipe de profissionais altamente qualificados. Nossos funcionários estão prontos para promover orientações técnicas necessárias e acompanhar você por todo o processo de locação, mantendo-o sempre informado sobre a negociação do seu imóvel e os rendimentos do seu aluguel.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mx-auto">
                        <i class="fas fa-money-check-alt"></i>
                        <div class="card-body">
                            <h5 class="card-title">Recebimento do aluguel em até 48 horas</h5>
                            <p class="card-text">A GPC proporciona a você a tranqüilidade de receber o pagamento do aluguel de seu imóvel em no Maximo 48 horas após a compensação do cheque do locatário.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mx-auto">
                        <i class="fas fa-mail-bulk"></i>
                        <div class="card-body">
                            <h5 class="card-title">Ampla divulgação</h5>
                            <p class="card-text">Para alugar seu imóvel com agilidade, a GPC oferece um amplo canal de divulgação feito através de nosso relacionamento direto com clientes cadastrados, além de anúncios em jornais e sites especializados.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mx-auto">
                        <i class="fas fa-archive"></i>
                        <div class="card-body">
                            <h5 class="card-title">Seguro fiança e fiadores</h5>
                            <p class="card-text">Com a GPC você tem a garantia do recebimento do seu aluguel através de um seguro fiança. Além disso, a GPC aceita fiadores de outras cidades e estados, onde tem representantes da ABMI (Associação Brasileira do Mercado Imobiliário) para facilitar ainda mais a locação do imóvel.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mx-auto">
                        <i class="fas fa-award"></i>
                        <div class="card-body">
                            <h5 class="card-title">Avaliação criteriosa</h5>
                            <p class="card-text">Na GPC seu imóvel é avaliado por nossa equipe segundo critérios minuciosos para proporcionar a valorização do seu patrimônio e o potencial valor de locação.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mx-auto">
                        <i class="fab fa-searchengin"></i>
                        <div class="card-body">
                            <h5 class="card-title">Vistoria completa</h5>
                            <p class="card-text">Clientes GPC têm uma vistoria completa e detalhada do seu imóvel no momento da entrega das chaves e no encerramento do contrato.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mx-auto">
                        <i class="far fa-address-card"></i>
                        <div class="card-body">
                            <h5 class="card-title">Análise cadastral</h5>
                            <p class="card-text">Na GPC é realizada uma seleção criteriosa dos interessados em alugar o seu imóvel para garantir a sua segurança, incluindo a avaliação cadastral com consultas ao SERASA, SPC e Check Check.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mx-auto">
                        <i class="fas fa-balance-scale"></i>
                        <div class="card-body">
                            <h5 class="card-title">Cobrança extrajudicial e judicial</h5>
                            <p class="card-text">Clientes GPC contam com um sistema de cobrança tanto extrajudicial quanto judicial para reaver aluguéis em atraso, através da nossa parceria com o escritório Andrade, Costa & Silva Advogados.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mx-auto">
                        <i class="fas fa-at"></i>
                        <div class="card-body">
                            <h5 class="card-title">Acompanhamento do imóvel alugado pela Internet</h5>
                            <p class="card-text">Fique mais próximo da GPC acompanhando pela Internet, através da <a
                                    href="#">área exclusiva para clientes</a>, as principais informações do seu imóvel, como extratos, relação de devedores e informes de rendimentos de IR.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mx-auto">
                        <i class="fas fa-chart-bar"></i>
                        <div class="card-body">
                            <h5 class="card-title">Prestação de contas mensais</h5>
                            <p class="card-text">Enviamos, mensalmente, aos nossos clientes uma prestação de contas detalhada com todos os valores recebidos e pagos sobre cada imóvel administrado.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
