<?php
$infoSite = MySql::conectar()->prepare("SELECT * FROM `tb_site.adm_config`");
$infoSite->execute();
$infoSite = $infoSite->fetch();
?>
<section class="home banner-container">
    <div class="center">
        <div class="banner-single imgFinanceiro"></div><!-- banner-single -->
        <div class="banner-single imgProcessos"></div><!-- banner-single -->
        <div class="banner-single imgEstrutura"></div><!-- banner-single -->
        <div class="overlay"></div><!-- overlay -->
        <div>
            <h5 id="textoPrincipal"><?php echo $infoSite['slogan']; ?></h5>
        </div>
    </div><!-- center -->
</section><!-- Banner Principal -->

<div class="container-fluid">

    <section id="quemsomos" class="pt-3">

        <section class="py-5">
            <h2>Quem Somos</h2>
        </section><!-- Título -->

        <section class="row">
            <article class="col-sm-12">
                <h6 class="card-text"><?php echo $infoSite['quemsomos']; ?></h6>
            </article>
        </section><!-- Texto -->

    </section><!-- Quem Somos -->

    <section id="servicos" class="pt-3">

        <section class="py-5">
            <h2>Nossos Serviços</h2>
        </section><!-- Título -->

        <section class="row">

            <article class="col-sm-12 col-md-6 col-lg-4">
                <div class="my-3">
                    <h4 class="my-2"><?php echo $infoSite['servico1titulo']; ?></h4>
                    <h6 class="my-2"><?php echo $infoSite['servico1descricao']; ?></h6>
                    <a class="link-btn" href="#servicos"><button class="btn btn-light btn-block" type="button">Mais informações</button></a>
                </div>
            </article><!-- Serviço 1 -->

            <article class="col-sm-12 col-md-6 col-lg-4">
                <div class="my-3">
                    <h4 class="my-2"><?php echo $infoSite['servico2titulo']; ?></h4>
                    <h6 class="my-2"><?php echo $infoSite['servico2descricao']; ?></h6>
                    <a class="link-btn" href="#servicos"><button class="btn btn-light btn-block" type="button">Mais informações</button></a>
                </div>
            </article><!-- Serviço 2 -->

            <article class="col-sm-12 col-md-6 col-lg-4">
                <div class="my-3">
                    <h4 class="my-2"><?php echo $infoSite['servico3titulo']; ?></h4>
                    <h6 class="my-2"><?php echo $infoSite['servico3descricao']; ?></h6>
                    <a class="link-btn" href="#servicos"><button class="btn btn-light btn-block" type="button">Mais informações</button></a>
                </div>
            </article><!-- Serviço 3 -->

            <article class="col-sm-12 col-md-6 col-lg-4">
                <div class="my-3">
                    <h4 class="my-2"><?php echo $infoSite['servico4titulo']; ?></h4>
                    <h6 class="my-2"><?php echo $infoSite['servico4descricao']; ?></h6>
                    <a class="link-btn" href="#servicos"><button class="btn btn-light btn-block" type="button">Mais informações</button></a>
                </div>
            </article><!-- Serviço 4 -->

            <article class="col-sm-12 col-md-6 col-lg-4">
                <div class="my-3">
                    <h4 class="my-2"><?php echo $infoSite['servico5titulo']; ?></h4>
                    <h6 class="my-2"><?php echo $infoSite['servico5descricao']; ?></h6>
                    <a class="link-btn" href="#servicos"><button class="btn btn-light btn-block" type="button">Mais informações</button></a>
                </div>
            </article><!-- Serviço 5 -->

            <article class="col-sm-12 col-md-6 col-lg-4">
                <div class="my-3">
                    <h4 class="my-2"><?php echo $infoSite['servico6titulo']; ?></h4>
                    <h6 class="my-2"><?php echo $infoSite['servico6descricao']; ?></h6>
                    <a class="link-btn" href="#servicos"><button class="btn btn-light btn-block" type="button">Mais informações</button></a>
                </div>
            </article><!-- Serviço 6 -->

        </section><!-- Cards -->

    </section><!-- Serviços -->

    <section id="planos" class="pt-3">

        <section class="pt-5">
            <h2>Planos Disponíveis</h2>
        </section><!-- Título -->

        <section class="mb-3">
            <h6>Escolha a melhor modalidade para você:</h6>
            <h6>Presencial ou Online</h6>
        </section><!-- Presencial ou Online -->

        <section class="row">

            <article class="col-sm-12 col-md-6 col-lg-4">
                <div class="my-3 mx-2">
                    <h4 class="my-2"><?php echo $infoSite['plano1titulo']; ?></h4>
                    <img class="imagem-card mx-auto d-block" src="<?php echo INCLUDE_PATH ?>assets/images/planobasico.webp" alt="">
                    <h6 class="my-2"><?php echo $infoSite['plano1descricao']; ?></h6>
                    <a class="link-btn" href="#planos"><button class="btn btn-light btn-block" type="button">Saiba Mais</button></a>
                </div>
            </article><!-- Plano 1 -->

            <article class="col-sm-12 col-md-6 col-lg-4">
                <div class="my-3 mx-2">
                    <h4 class="my-2"><?php echo $infoSite['plano2titulo']; ?></h4>
                    <img class="imagem-card mx-auto d-block" src="<?php echo INCLUDE_PATH ?>assets/images/planoprata.webp" alt="">
                    <h6 class="my-2"><?php echo $infoSite['plano2descricao']; ?></h6>
                    <a class="link-btn" href="#planos"><button class="btn btn-light btn-block" type="button">Saiba Mais</button></a>
                </div>
            </article><!-- Plano 2 -->

            <article class="col-sm-12 col-md-6 col-lg-4">
                <div class="my-3 mx-2">
                    <h4 class="my-2"><?php echo $infoSite['plano3titulo']; ?></h4>
                    <img class="imagem-card mx-auto d-block" src="<?php echo INCLUDE_PATH ?>assets/images/planoouro.jpg" alt="">
                    <h6 class="my-2"><?php echo $infoSite['plano3descricao']; ?></h6>
                    <a class="link-btn" href="#planos"><button class="btn btn-light btn-block" type="button">Saiba Mais</button></a>
                </div>
            </article><!-- Plano 3 -->

        </section><!-- Cards -->

    </section><!-- Planos -->

    <section id="artigos" class="pt-3">

        <section class="py-5">
            <h2>Artigos</h2>
        </section><!-- Título -->

        <section class="row">

            <article class="col-sm-12 col-md-6 col-lg-4">
                <div class="mx-2">
                    <img class="imagem-card mx-auto d-block" src="<?php echo INCLUDE_PATH ?>assets/images/financeiro.webp" alt="">
                    <h4 class="my-2"><?php echo $infoSite['artigo1titulo']; ?></h4>
                    <h6>Publicado em: <?php echo $infoSite['artigo1data']; ?></h6>
                    <hr>
                    <h6 class="my-2"><?php echo $infoSite['artigo1descricao']; ?></h6>
                    <a class="link-btn" href="#artigos"><button class="btn btn-light btn-block mb-5" type="button">Continue lendo ...</button></a>
                </div>
            </article><!-- Artigo 1 -->

            <article class="col-sm-12 col-md-6 col-lg-4">
                <div class="mx-2">
                    <img class="imagem-card mx-auto d-block" src="<?php echo INCLUDE_PATH ?>assets/images/processos.webp" alt="">
                    <h4 class="my-2"><?php echo $infoSite['artigo2titulo']; ?></h4>
                    <h6>Publicado em: <?php echo $infoSite['artigo2data']; ?></h6>
                    <hr>
                    <h6 class="my-2"><?php echo $infoSite['artigo2descricao']; ?></h6>
                    <a class="link-btn" href="#artigos"><button class="btn btn-light btn-block mb-5" type="button">Continue lendo ...</button></a>
                </div>
            </article><!-- Artigo 2 -->

            <article class="col-sm-12 col-md-6 col-lg-4">
                <div class="mx-2">
                    <img class="imagem-card mx-auto d-block" src="<?php echo INCLUDE_PATH ?>assets/images/estrategia.webp" alt="">
                    <h4 class="my-2"><?php echo $infoSite['artigo3titulo']; ?></h4>
                    <h6>Publicado em: <?php echo $infoSite['artigo3data']; ?></h6>
                    <hr>
                    <h6 class="my-2"><?php echo $infoSite['artigo3descricao']; ?></h6>
                    <a class="link-btn" href="#artigos"><button class="btn btn-light btn-block mb-5" type="button">Continue lendo ...</button></a>
                </div>
            </article><!-- Artigo 3 -->

        </section><!-- Cards -->

    </section><!-- Artigos -->

</div>