<?php
verificaPermissaoPaginaSite(1);
$site = PHP::selectOne('tb_site.adm_config', false);
?>

<div class="box-content">
	<h3 class="mb-5"><i class="fa fa-pen"></i> Editar Informações do Site</h3>

	<form method="post" enctype="multipart/form-data">

		<?php
		if (isset($_POST['acao'])) {
			if (PHP::updateOne($_POST, true)) {
				Painel::alert('sucesso', 'Site alterado com sucesso!');
				$site = PHP::selectOne('tb_site.adm_config', false);
			} else {
				Painel::alert('erro', 'Campos vazios não são permitidos.');
			}
		}
		?>

		<div class="form-group col-sm-12">
			<input type="hidden" name="nome_tabela" value="tb_site.adm_config" />
			<input type="submit" name="acao" value="Atualizar" class="btn- btn-sm btn-success">
		</div><!--form-group-->		

		<nav">
			<div class="nav nav-tabs" id="nav-tab" role="tablist">
				<a class="nav-item nav-link active" id="nav-site-tab-01" data-toggle="tab" href="#nav-site-01" role="tab" aria-controls="nav-site01" aria-selected="true">Home</a>
				<a class="nav-item nav-link" id="nav-site-tab-02" data-toggle="tab" href="#nav-site-02" role="tab" aria-controls="nav-site02" aria-selected="false">Serviços</a>
				<a class="nav-item nav-link" id="nav-site-tab-03" data-toggle="tab" href="#nav-site-03" role="tab" aria-controls="nav-site03" aria-selected="false">Planos</a>
				<a class="nav-item nav-link" id="nav-site-tab-04" data-toggle="tab" href="#nav-site-04" role="tab" aria-controls="nav-site04" aria-selected="false">Artigos</a>
				<a class="nav-item nav-link" id="nav-site-tab-05" data-toggle="tab" href="#nav-site-05" role="tab" aria-controls="nav-site05" aria-selected="false">Contato</a>
			</div>
			</nav>
			<div class="tab-content" id="nav-tabContent">
				<div class="tab-pane fade show active" id="nav-site-01" role="tabpanel" aria-labelledby="nav-site-tab-01">
					<div class="row">
						<div class="form-group col-sm-12 mt-3">
							<label>Título do site:</label>
							<input class="form-control" type="text" name="titulo" value="<?php echo $site['titulo'] ?>" />
						</div>
						<!--titulo site-->

						<div class="form-group col-sm-12">
							<label>Slogan do slide:</label>
							<input class="form-control" type="text" name="slogan" value="<?php echo $site['slogan'] ?>" />
						</div>
						<!--slogan-->

						<div class="form-group col-sm-12">
							<label>Quem somos:</label>
							<textarea class="form-control" name="quemsomos"><?php echo $site['quemsomos']; ?></textarea>
						</div>
						<!--quemsomos-->
					</div>
				</div><!-- Home -->

				<div class="tab-pane fade" id="nav-site-02" role="tabpanel" aria-labelledby="nav-site-tab-02">
					<div class="row">
						<?php
						for ($i = 1; $i <= 6; $i++) {
						?>
							<div class="form-group col-sm-12 mt-3">
								<label>Serviço <?php echo $i; ?>:</label>
								<input class="form-control" type="text" name="servico<?php echo $i; ?>titulo" value="<?php echo $site['servico' . $i . 'titulo'] ?>" />
							</div>
							<!--titulo-->

							<div class="form-group col-sm-12">
								<label>Descrição do serviço <?php echo $i; ?>:</label>
								<textarea class="form-control" name="servico<?php echo $i; ?>descricao"><?php echo $site['servico' . $i . 'descricao']; ?></textarea>
							</div>
							<!--descricao-->
						<?php } ?>
						<!--servicos-->
					</div>
				</div><!-- Serviços -->

				<div class="tab-pane fade" id="nav-site-03" role="tabpanel" aria-labelledby="nav-site-tab-03">
					<div class="row">
						<?php
						for ($i = 1; $i <= 3; $i++) {
						?>
							<div class="form-group col-sm-12 mt-3">
								<label>Plano <?php echo $i; ?>:</label>
								<input class="form-control" type="text" name="plano<?php echo $i; ?>titulo" value="<?php echo $site['plano' . $i . 'titulo'] ?>" />
							</div>
							<!--titulo-->

							<div class="form-group col-sm-12">
								<label>Descrição do plano <?php echo $i; ?>:</label>
								<textarea class="form-control" name="plano<?php echo $i; ?>descricao"><?php echo $site['plano' . $i . 'descricao']; ?></textarea>
							</div>
							<!--descricao-->
						<?php } ?>
						<!--planos-->
					</div>
				</div><!-- Planos -->

				<div class="tab-pane fade" id="nav-site-04" role="tabpanel" aria-labelledby="nav-site-tab-04">
					<div class="row">
						<?php
						for ($i = 1; $i <= 3; $i++) {
						?>
							<div class="form-group col-sm-12 mt-3">
								<label>Artigo <?php echo $i; ?>:</label>
								<input class="form-control" type="text" name="artigo<?php echo $i; ?>titulo" value="<?php echo $site['artigo' . $i . 'titulo'] ?>" />
							</div>
							<!--titulo-->

							<div class="form-group col-sm-4">
								<label>Data do artigo <?php echo $i; ?>:</label>
								<input class="form-control" formato="data" type="text" name="artigo<?php echo $i; ?>data" value="<?php echo $site['artigo' . $i . 'data'] ?>" />
							</div>
							<!--data-->

							<div class="form-group col-sm-12">
								<label>Descrição do artigo <?php echo $i; ?>:</label>
								<textarea class="form-control" name="artigo<?php echo $i; ?>descricao"><?php echo $site['artigo' . $i . 'descricao']; ?></textarea>
							</div>
							<!--descricao-->
						<?php } ?>
						<!--artigos-->
					</div>
				</div><!-- Artigos -->

				<div class="tab-pane fade" id="nav-site-05" role="tabpanel" aria-labelledby="nav-site-tab-05">
					<div class="row">
						<div class="form-group col-sm-12 col-md-6 mt-3">
							<label>Email para contato:</label>
							<input class="form-control" type="text" name="contatoemail" value="<?php echo $site['contatoemail'] ?>" />
						</div>
						<!--email-->

						<div class="form-group col-sm-12 col-md-6 mt-3">
							<label>Telefone para contato:</label>
							<input class="form-control" type="text" name="contatotelefone" value="<?php echo $site['contatotelefone'] ?>" />
						</div>
						<!--telefone-->
					</div>
				</div><!-- Contato -->

			</div>

	</form>

</div>
<!--box-content-->