@extends('layout.app')
@section('title','Gestão de Condomínios')
@section('content')
    <div id="content_condominium">
        <section class="header_session" style="background-image: url({{ asset('img/tower.jpg') }})">
            <div class="header-box">
                <h1>@yield('title')</h1>
            </div>
        </section>
        <section class="content">
            <h2 class="pb-4">Gestão Profissional de Condomínios</h2>
            <p>Afinal, nossa denominação já transmite aos clientes uma noção clara de nossos propósitos, com soluções de gestão condominial diferenciadas e flexíveis, nossos serviços e produtos são pensados para facilitar o dia a dia do Síndico</p>
            <p>Tranqüilidade para seu condomínio e mais qualidade de vida para moradores.</p>
            <p>A GPC considera-se uma das melhores empresas de gestão condominial e negócios imobiliários do Estado do Rio de Janeiro. Há mais de 30 anos de atuação, prestamos o melhor serviço de Administração para seu Condomínio com total segurança e agilidade. Nossa preocupação é com a tranqüilidade e bem-estar de Síndicos e Condôminos e oferecemos credibilidade, solidez e toda nossa expertise em serviços de gestão imobiliária.</p>
            <p>Nossos serviços se adéquam às necessidades específicas de diversos tipos de condomínios: residenciais e comerciais, de pequeno, médio ou grande porte, com ou sem infra-estrutura de serviços e lazer. Aliado a isso, proporcionamos todo suporte e recursos necessários para garantir a eficiência administrativa e o gerenciamento completo das questões burocráticas, financeiras, fiscais e legais de um condomínio.</p>
            <p>Com certeza, a GPC tem um serviço ideal e feito sob medida para atender as necessidades do seu condomínio. Conheça as vantagens dos nossos serviços para Condomínios residenciais e Condomínios comerciais.</p>
        </section>
        <section class="content">
            <h2>Gestão Total</h2>
            <h5 class="pb-4">Administração completa e profissional com o Gestão Total da GPC.</h5>
            <p>Ao contratar o Gestão Total da GPC, além de contar com todos os serviços básicos, seu Condomínio terá todas as vantagens de uma administração profissional, com a eficiência que ele precisa para funcionar bem.</p>
            <p>Condomínios residenciais e comerciais passam a contar com atendimento personalizado e exclusivo da GPC, através de um Sindico Profissional que preferimos denominar Gestor Condominial, que cuidará da gestão de pessoas e rotinas trabalhistas, questões operacionais, como manutenção predial, além de atribuições financeiras, fiscais e legais, que garantem maior eficiência e qualidade, resultando na valorização do patrimônio. Seu condomínio terá ainda apoio total na relação entre moradores e com fornecedores.</p>
            <p>As soluções da GPC para gestão condominial atendem a diversos perfis de condomínios. Conheça nossas opções e escolha a ideal para seu condomínio.</p>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card mx-auto">
                        <div class="card-body">
                            <h5 class="card-title">Exclusiva</h5>
                            <p class="card-text">Para condomínios que necessitam de um gestor condominial presente em tempo integral. Este modelo de gestão é ideal para grandes condomínios por sua complexidade de serviços, de controle operacional e de manutenção.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mx-auto">
                        <div class="card-body">
                            <h5 class="card-title">Especial</h5>
                            <p class="card-text">Para condomínios de pequeno ou médio porte, que necessitam de um gestor para acompanhamento constante das operações, visando melhorias nos processos e conseqüente redução de custos.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="content" id="condominium">
            <h2>Serviços</h2>
            <p class="text-center">Conheça alguns serviços da Gestão Total da GPC.</p>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card mx-auto">
                        <div class="card-body">
                            <h5 class="card-title">Rotinas trabalhistas e gestão de pessoas</h5>
                            <p class="card-text">Administração da folha de pagamento de todos os empregados do condomínio, além de cuidar de admissões, demissões, horas extras, férias, 13º salário e encargos sociais, sem riscos para o condomínio. Além de cuidar das questões de rotinas operacionais como cumprimento de horários, treinamento de empregados, execução de serviços e atendimento a moradores.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mx-auto">
                        <div class="card-body">
                            <h5 class="card-title">Check up</h5>
                            <p class="card-text">Vistoria estrutural completa que avalia a situação atual e oferece diagnóstico com plano de ação sobre as condições do condomínio. Esta análise inclui também a parte operacional e financeira para decisões mais efetivas sobre planejamento orçamentário, segurança, funcionalidade e estética.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mx-auto">
                        <div class="card-body">
                            <h5 class="card-title">Manutenção preventiva e corretiva</h5>
                            <p class="card-text">Manutenção planejada com visitas periódicas para conservação de equipamentos, máquinas de uso comum do condomínio a fim de evitar danos. Se necessário, realizamos correções e ajustes, oferecendo auxílio, inclusive, na cotação e contratação de empresas especializadas.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mx-auto">
                        <div class="card-body">
                            <h5 class="card-title">Cotação e compras</h5>
                            <p class="card-text">Para mais agilidade, disponibilizamos uma equipe específica para cotação e compra, obedecendo às normas existentes do condomínio e buscando sempre os melhores preços. Assim, o gestor condominial pode dedicar-se a outras funções da administração.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
