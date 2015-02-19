<script type="text/javascript">
  /*
   * Paginação resultados noticias 
   */
   
  $(function(){

    /* initiate the plugin */
    $("div.holderFavoritos").jPages({
      containerID  : "FavoritosItens",
      perPage      : 5,
      startPage    : 1,
      startRange   : 1,
      midRange     : 5,
      endRange     : 1,
        first       : false,
        previous    : " ",
        next        : " ",
        last        : false
    });

  });
</script>
<div class="users">
	<div class="row mt20">
		<div class="eight columns">
			<div class="row">
				<span class="icon-categoria"></span><span class="titulo-categoria">MEUS FAVORITOS</span>
			</div>
			<div class="row mt20">
				<div id="tabs" class="row nav-tabs-estabelecimentos">
					<ul class="row">
						<li class="ui-tabs-active ui-state-active"><a href="#tabs-1">FAVORITOS</a></li>
						<a class="link-tab" href="/users">CONVIDE SEUS AMIGOS</a>
						<a class="link-tab" href="/users/cupons">MINHAS VANTAGENS</a>
					</ul>
					<div class="conteudo-tabs-estabelecimentos">
						<form class="form">
							<div class="row">
								<div id="tabs-1">
									<div class="row">
										<ul class="list-cupons" id="FavoritosItens">
											<?php if (!empty($favoritos)):  ?>
												<?php foreach ($favoritos as $favorito):  ?>
												<li class="row text mb20">
													<div class="six columns">
														<div class="row">
															<a target="_blank" href="/galeria/ver/<?= $favorito['Galeria']['id']  ?>"><h2><?= $favorito['Galeria']['titulo']  ?></h2></a>
														</div>

														<div class="row mt20">
															<div class="botao-cupom-menu">
																<a target="_blank" href="/galeria/ver/<?= $favorito['Galeria']['id']  ?>"><button class="button button-radius button-black">visualizar</button></a>
															</div>
														</div>
													</div>
													<div class="six columns">
														<a target="_blank" href="/galeria/ver/<?= $favorito['Galeria']['id']  ?>">
															<img src="<?= $_URL_FILE; ?>galleries/fotos/640x480-<?= $favorito['File'][0]['name']?>" width="100%" style="width:100%;height:80px;"/>
														</a>
													</div>
												</li>
												<?php endforeach; ?>
											<?php endif; ?>
										</ul>
										<div class="holderFavoritos holder"></div><!-- paginação -->
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>	
		</div>
		<div class="four columns">
			<?php echo $this->element('bloco_lateral_user'); ?>
		</div>
	</div>
</div>
