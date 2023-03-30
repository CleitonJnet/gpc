@extends('layout.app')
@section('title','Sobre a GPC')
@section('content')
    <div id="about">
        <section class="header_session" style="background-image: url({{ asset('img/tower.jpg') }})">
            <div class="header-box">
                <h1>@yield('title')</h1>
            </div>
        </section>
        <section class="content background_img">
            <h4>1991</h4>
            <p>A GPC – Gestão Profissional de Condomínios tem seu início, com sua fundação em Niterói, na Rua Coronel Gomes Machado, 136, Sala 1103, Centro.</p>
            <h4>2021</h4>
            <p>30 anos após sua fundação a GPC expandiu seus horizontes, ocupando hoje todo o 11º pavimento do Edifício onde esta sediada. Ao longo desta duas décadas logrou a GPC alcançar a marca de mais de 3000 unidades condominiais administradas.</p>
        </section>
        <section class="content background_img">
            <h4>Nossa Filosofia</h4>
            <p>Oferecer produtos e serviços de gestão imobiliária com excelência, atuando próximo aos clientes e seus colaboradores, integrando-os, valorizando-os, promovendo qualidade de vida e colaborando para uma convivência mais humana e harmoniosa, tornando mais segura e agradável a interação entre as pessoas.</p>
            <h4>Política de Qualidade</h4>
            <p>Ser uma das melhores empresas de gestão condominial, privilegiando padrões de excelência e crescimento constante, garantindo a conservação e o bom funcionamento dos Condomínios administrados pela GPC, proporcionando conforto e segurança aos moradores, através da prestação de serviços com o melhor padrão do mercado e honorários sempre compatíveis com a concorrência.</p>
        </section>
        <section class="content" id="about">

            <h4>Princípios</h4>
            <p>Acreditar na inovação, afinal todas as idéias devem ser ouvidas, debatidas e desenvolvidas. A criatividade aliada à experiência é o segredo da liderança e do sucesso.</p>
            <p>Estar ao lado do cliente em todas as situações. Em todas as ocasiões nossos colaboradores, gestores e funcionários se posicionam ao lado do cliente. Todos os processos da nossa prestação de serviços são construídos com esta base. É nela que nos inspiramos.</p>
            <p>Valorizar as pessoas, sejam clientes, fornecedores, concorrentes e colaboradores, todos recebem o nosso respeito e a nossa cordialidade. Afinal todos fazem parte fundamental do caminho que construímos e que continuamos a construir.</p>
            <p>Responsabilidade e Respeito - Nutrimos profundo respeito pelo patrimônio do cliente. Não fazemos concessões que coloquem em risco este patrimônio e trabalhamos aprimorando processos e pessoas para garantir o cumprimento deste compromisso.</p>
        </section>
    </div>
@endsection
