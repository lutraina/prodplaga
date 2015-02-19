  <script>
  /* when document is ready */
  $(function(){

    /* initiate the plugin */
    $("div.holder").jPages({
      containerID  : "itemContainerGastronomia",
      perPage      : 10,
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

<div class="row listagem-posts mt20 ">
	<ul class="" id="itemContainerGastronomia">
		<?php foreach($estabelecimentos as $estabelecimento): ?>
			<?php if($estabelecimento['Business']['gratuito']=='nao'): ?>
	
				<li>
					<div class="row">
						<div class="ten columns">
							<span class="row titulo"><a class="color" href="/estabelecimentos/ver/<?= $estabelecimento['Business']['url']?>"><?= $estabelecimento['Business']['name']?></a><span class=" descricao f-right"><b>(<?= $estabelecimento['Business']['view']?>) views</b></span></span>
							<span class="row local"><a href="/estabelecimentos/<?= $estabelecimento['Business']['type']?>/<?= $estabelecimento['Category']['url']?>"><?= $estabelecimento['Category']['name']?></a></span>
							<div class="row mt5">
								<span class="row endereco"><a href="/estabelecimentos/ver/<?= $estabelecimento['Business']['url']?>"><?= $estabelecimento['Business']['address']?></a></span>
								<span class="row descricao"><a href="/estabelecimentos/ver/<?= $estabelecimento['Business']['url']?>"><?= $estabelecimento['Business']['business_hours']?></a></span>
								<span class="row descricao">Telefone(s): <b><?= $estabelecimento['Business']['phone']?></b></span>
							</div>
						</div>
						<div class="two columns">
							<?php if(!empty($estabelecimento['Business']['logo'])): ?>
								<img src="<?= $_URL_FILE.'businesses/fotos/'.$estabelecimento['Business']['logo']; ?>"/>	
							<?php endif;?>
							<a href="/estabelecimentos/ver/<?= $estabelecimento['Business']['url']?>"><button class="button button-radius button-black3">veja mais</button></a>
						</div>
					</div>
					
				</li>				
			<?php else: ?>
			
			
			<li>
				<div class="row">
					<div class="ten columns">
						<span class="row titulo"><b><?= $estabelecimento['Business']['name']?></b></span>
						<span class="row local"><?= $estabelecimento['Category']['name']?></span>
					</div>
					<div class="two columns">
						
					</div>
				</div>
				<div class="row mt5">
					<span class="row endereco"><?= $estabelecimento['Business']['address']?></span>
					<span class="row descricao"><?= $estabelecimento['Business']['business_hours']?></span>
					<span class="row descricao">Telefone(s): <b><?= $estabelecimento['Business']['phone']?></b></span>
				</div>
			</li>
			<?php endif; ?>
		<?php endforeach; ?>
	</ul>
</div>
<!--paginação-->
<div class="row mt20">
	<!-- navigation holder <?= $estabelecimento['Business']['type']?> -->
	<div class="holder"></div>
</div>