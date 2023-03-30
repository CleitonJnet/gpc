@extends('layout.app')
@section('title','Locação de Imóveis')
@section('content')
    <section class="header_session" style="background-image: url({{ asset('img/tower.jpg') }})">
        <div class="header-box">
            <h1>@yield('title')</h1>
        </div>
    </section>

    <div id="content_sale">
        <section class="content" id="properties">
            <h2>Agilidade e eficiência na compra e venda do seu imóvel</h2>
            <p>Clientes GPC contam com diversas vantagens na compra e venda de seu imóvel como a garantia de uma avaliação criteriosa, assessoria técnica e jurídica de profissionais qualificados que cuidam da regularização da documentação e serviços de despachante para legalização do seu imóvel.</p>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card mx-auto">
                        <i class="fas fa-hands-helping"></i>
                        <div class="card-body">
                            <h5 class="card-title">Atendimento especializado</h5>
                            <p class="card-text">Ao procurar a GPC para comprar ou vender o seu imóvel, você conta com uma equipe de profissionais altamente qualificados e devidamente credenciados no Conselho Regional de Corretores de Imóveis (CRECI). Nossos funcionários estão prontos para promover orientações técnicas necessárias e acompanhar você por todo o processo de compra e venda, mantendo-o sempre informado sobre toda a negociação do seu imóvel.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mx-auto">
                        <i class="fas fa-mail-bulk"></i>
                        <div class="card-body">
                            <h5 class="card-title">Ampla divulgação do imóvel</h5>
                            <p class="card-text">A GPC proporciona a você uma ampla divulgação do seu imóvel através do nosso site, em classificados, em sites especializados de busca, em nossa rede de agências, além do nosso canal de relacionamento direto com clientes.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mx-auto">
                        <i class="fas fa-scroll"></i>
                        <div class="card-body">
                            <h5 class="card-title">Legalização do imóvel</h5>
                            <p class="card-text">Com a GPC você tem a comodidade de ter seu imóvel regularizado através de nossa assessoria técnica, tornando-o apto para a venda. Este serviço auxilia você quanto à documentação necessária, agilizando a venda do seu imóvel e proporcionando maior comodidade.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mx-auto">
                        <i class="fas fa-award"></i>
                        <div class="card-body">
                            <h5 class="card-title">Avaliação criteriosa</h5>
                            <p class="card-text">Na GPC seu imóvel é avaliado por nossa equipe segundo critérios minuciosos para proporcionar a valorização do seu patrimônio e o potencial valor de venda.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mx-auto">
                        <i class="fas fa-briefcase"></i>
                        <div class="card-body">
                            <h5 class="card-title">Serviços de Despachante</h5>
                            <p class="card-text">Conte com este serviço em caso de regularização do imóvel, agilizando certidões, registros, entre outros documentos. Com esta vantagem você tem tudo resolvido com muito mais praticidade.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mx-auto">
                        <i class="fas fa-balance-scale"></i>
                        <div class="card-body">
                            <h5 class="card-title">Assessoria jurídica</h5>
                            <p class="card-text">Clientes GPC contam com uma assistência jurídica para tratar da documentação do imóvel, através de nossa parceria com o escritório Andrade, Costa & Silva Advogados.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mx-auto">
                        <i class="far fa-envelope"></i>
                        <div class="card-body">
                            <h5 class="card-title">Informação constante</h5>
                            <p class="card-text">Nossa preocupação é deixar você sempre informado sobre todo o processo de compra e venda do seu imóvel. Isto é para que você possa acompanhar e avaliar a negociação de forma direta e transparente. Você ainda fica informado sobre as condições do mercado, o investimento e o retorno da divulgação do seu imóvel.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
