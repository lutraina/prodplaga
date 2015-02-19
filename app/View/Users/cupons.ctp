<script type="text/javascript">
  /*
   * Paginação resultados noticias 
   */
   
  $(function(){

    /* initiate the plugin */
    $("div.holderCupons").jPages({
      containerID  : "CuponsItens",
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
				<span class="icon-categoria"></span><span class="titulo-categoria">HISTÓRICO DE CUPONS</span>
			</div>
			<div class="row mt20">
				<div id="tabs" class="row nav-tabs-estabelecimentos">
					<ul class="row">
						<li class="ui-tabs-active ui-state-active"><a href="#tabs-1">CUPONS</a></li>
						<a class="link-tab" href="/users">CONVIDE SEUS AMIGOS</a>
					</ul>
					<div class="conteudo-tabs-estabelecimentos">
						<form class="form">
							<div class="row">
								<div id="tabs-1">
									<div class="row">
										<ul class="list-cupons" id="CuponsItens">
											<?php if (!empty($cupons)):  ?>
												<?php foreach ($cupons as $cupon):  ?>
												<li class="row text mb20">
													<div class="six columns">
														<div class="row">
															<a target="_blank" href="/vantagens/cupom/<?= $cupon['Advantage']['url']  ?>"><h2><?= $cupon['Advantage']['title']  ?></h2></a>
														</div>
														<div class="row mt5">
															<a target="_blank" href="/vantagens/cupom/<?= $cupon['Advantage']['url']  ?>">Código <?= $cupon['User_has_advantage']['cod']  ?></a>
														</div>
														<div class="row mt5">
															<a target="_blank" href="/vantagens/cupom/<?= $cupon['Advantage']['url']  ?>">Você paga somente R$ <?= $cupon['Advantage']['price']  ?></a>
														</div>
														<div class="row mt20">
															<div class="botao-cupom-menu">
																<a target="_blank" href="/vantagens/cupom/<?= $cupon['Advantage']['url']  ?>"><button class="button button-radius button-black">visualizar</button></a>
															</div>
														</div>
													</div>
													<div class="six columns">
														<a target="_blank" href="/vantagens/cupom/<?= $cupon['Advantage']['url']  ?>">
															<img class="f-left" src="<?= $_URL_FILE ?>advantages/fotos/410x480-<?= $cupon['Advantage']['image'] ?>" style="width: 100%; height:140px;"/>											
														</a>
													</div>
												</li>
												<?php endforeach; ?>
											<?php endif; ?>
										</ul>
										<div class="holderCupons holder"></div><!-- paginação -->
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
