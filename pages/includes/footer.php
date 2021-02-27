<?php
$infoSite = MySql::conectar()->prepare("SELECT * FROM `tb_site.adm_config`");
$infoSite->execute();
$infoSite = $infoSite->fetch();
?>

<footer id="contato" class="bg-light pt-5">

    <section class="row text-center pt-2">

        <article class="col-sm-12 col-md-6 col-lg-4 mb-5">
            <div>
                <h6 class="pb-2">Dados para Contato</h6>
                <p><strong>E-mail</strong></p>
                <p><a href="https://gmail.com/" target="_blank" role="button"><?php echo $infoSite['contatoemail']; ?></a></p>
                <p><strong>Telefone</strong></p>
                <p><?php echo $infoSite['contatotelefone']; ?></p>
                <p><strong>Horário de atendimento</strong></p>
                <p>Segunda-feira a Sexta-feira</p>
                <p>08h00 às 18h00</p>
            </div>
        </article><!-- E-mail e Telefone -->

        <article class="col-sm-12 col-md-6 col-lg-4 mb-5">
            <div>
                <h6 class="pb-2">Conteúdo</h6>
                <li><a title="Blog" href="<?php echo INCLUDE_PATH; ?>blog">Blog</a></li>
                <li><a title="Downloads" href="<?php echo INCLUDE_PATH; ?>downloads">Downloads</a></li>
                <li><a title="Podcasts" href="<?php echo INCLUDE_PATH; ?>podcasts">Podcasts</a></li>
                <li><a title="Agenda" href="<?php echo INCLUDE_PATH; ?>agenda">Agenda</a></li>
                <li><a title="Clientes" href="<?php echo INCLUDE_PATH; ?>clientes">Clientes</a></li>
            </div>
        </article><!-- Conteúdo -->

        <article class="col-sm-12 col-md-6 col-lg-4 mb-5">

            <h6 class="pb-5">Redes Sociais</h6>

            <div class="row text-center px-5">
                <div class="col-sm-2 col-md-2 col-lg-4">
                    <a href="<?php echo $infoSite['whatsapp']; ?>" target="_blank"><i class="fab fa-whatsapp-square fa-3x"></i></a>
                </div>
                <div class="col-sm-2 col-md-2 col-lg-4">
                    <a href="<?php echo $infoSite['telegram']; ?>" target="_blank"><i class="fab fa-telegram fa-3x"></i></a>
                </div>
                <div class="col-sm-2 col-md-2 col-lg-4">
                    <a href="<?php echo $infoSite['linkedin']; ?>" target="_blank"><i class="fab fa-linkedin fa-3x"></i></a>
                </div>
                <div class="col-sm-2 col-md-2 col-lg-4">
                    <a href="<?php echo $infoSite['facebook']; ?>" target="_blank"><i class="fab fa-facebook-square fa-3x"></i></a>
                </div>
                <div class="col-sm-2 col-md-2 col-lg-4">
                    <a href="<?php echo $infoSite['instagram']; ?>" target="_blank"><i class="fab fa-instagram fa-3x"></i></a>
                </div>
                <div class="col-sm-2 col-md-2 col-lg-4">
                    <a href="<?php echo $infoSite['twitter']; ?>" target="_blank"><i class="fab fa-twitter-square fa-3x"></i></a>
                </div>
            </div>

        </article><!-- Redes Sociais -->

    </section><!-- Cards -->

</footer><!-- Contatos -->

<script src="<?php echo INCLUDE_PATH; ?>assets/js/jquery.js"></script>
<script src="<?php echo INCLUDE_PATH; ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo INCLUDE_PATH; ?>assets/js/constants.js"></script>
<script src="<?php echo INCLUDE_PATH; ?>assets/js/scripts.js"></script>
<script src="<?php echo INCLUDE_PATH; ?>assets/js/slides.js"></script>

</body>

</html>