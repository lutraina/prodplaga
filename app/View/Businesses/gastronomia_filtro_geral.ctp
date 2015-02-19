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
	<!--bloco filtragem por letra-->
	<div class="row box-lista-filtro mt20">
		<h2 class="row color">Filtrando por '<?= $filtrandoPor ?>'</h2>
		<div class="lista-filtro mt10 color-link">
			<ul>
				<!-- <?= $this->Caracter->alfabeto('M'); ?>-->
			</ul>
		</div>
	</div>
	<!--bloco resultado filtragem por letra-->
	<div class="retorno_filtro">
		<div class="row listagem-posts mt20 ">
			<ul class="" id="itemContainerGastronomia">
				<?php foreach($gastronomias as $gastronomia): ?>
					<li>
						<div class="row">
							<div class="ten columns">
								<span class="row titulo"><a class="color" href="/estabelecimentos/ver/<?= $gastronomia['Business']['url']?>"><?= $gastronomia['Business']['name']?></a> <span class=" descricao f-right"><b>(<?= $gastronomia['Business']['view']?>) views</b></span></span>
								<span class="row local"><a href="/estabelecimentos/gastronomia/<?= $gastronomia['Category']['url']?>"><?= $gastronomia['Category']['name']?></a></span>
							</div>
							<div class="two columns">
								<a href="/estabelecimentos/ver/<?= $gastronomia['Business']['url']?>"><button class="button button-radius button-black3">veja mais</button></a>
							</div>
						</div>
						<div class="row mt5">
							<span class="row endereco"><a href="/estabelecimentos/ver/<?= $gastronomia['Business']['url']?>"><?= $gastronomia['Business']['address']?></a></span>
							<span class="row descricao"><a href="/estabelecimentos/ver/<?= $gastronomia['Business']['url']?>"><?= $gastronomia['Business']['business_hours']?></a></span>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<!--paginação-->
		<div class="row mt20">
			<!-- navigation holder gastronomia -->
			<div class="holder"></div>
		</div>
	</div>