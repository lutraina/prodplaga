  <script>
  /*
   * Paginação resultados noticias 
   */
   
  $(function(){

    /* initiate the plugin */
    $("div.holderNoticia").jPages({
      containerID  : "NoticiasItens",
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
/*
   * Paginação resultados agenda 
   */  
  $(function(){

    /* initiate the plugin */
    $("div.holderAgenda").jPages({
      containerID  : "AgendaItens",
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
/*
   * Paginação resultados comércio 
   */  
  $(function(){

    /* initiate the plugin */
    $("div.holderComercio").jPages({
      containerID  : "ComerciosItens",
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
<?php //debug($regiao_search); ?>
<div class="pagina-resultado">
	<div class="row mt20">
		<div class="eight columns">
			<h1 class="row titulo">Resultados da Busca (<?=  0+count($schedules)+count($businesses)+count($news)  ?>)</h1>
			<!--tags resultado-->
			<div class="row tags">
				<span>Palavra-chave</span>
				<ul>
					<?php foreach($palavras as $palavra): ?>
						<li>
							<a href="#?"><?= $palavra ?></a>
							<!-- <div class="icon-close">X</div> -->
						</li>
					<?php endforeach; ?>
				</ul>
				<script type="text/javascript">
					$('.icon-close').click(function(){
						$('.tags ul li').click(function(){
							$(this).hide();
						});
					});
				</script>
			</div>
			<?php if(count($businesses)>=1): ?>
				<!--listagem resultado categoria x-->
				<div class="row resultados mt20 gastronomia mb20">
					<div class="row categoria">
						<h2 class="color">Comércio</h2>
						<span class="qtd-resultados"><?= count($businesses) ?> resultados encontrados</span>
					</div>
					<ul class="row" id="ComerciosItens">
						<?php foreach($businesses as $businesse): ?>
							<?php if($businesse['Business']['gratuito']=='nao'): ?>
	
									<li>
										<div class="row">
											<div class="ten columns">
												<span class="row titulo"><a class="color" href="/estabelecimentos/ver/<?= $businesse['Business']['url']?>"><?= $businesse['Business']['name']?></a></span>
												<span class="row local"><a href="/estabelecimentos/<?= $businesse['Business']['type']?>/<?= $businesse['Category']['url']?>"><?= $businesse['Category']['name']?></a></span>
												<div class="row mt5">
													<span class="row endereco"><a href="/estabelecimentos/ver/<?= $businesse['Business']['url']?>"><?= $businesse['Business']['address']?></a></span>
													<span class="row descricao"><a href="/estabelecimentos/ver/<?= $businesse['Business']['url']?>"><?= $businesse['Business']['business_hours']?></a></span>
												</div>
											</div>
											<div class="two columns">
												<?php if(!empty($businesse['Business']['logo'])): ?>
													<img src="<?= $_URL_FILE.'businesses/fotos/'.$businesse['Business']['logo']; ?>"/>	
												<?php endif;?>
												<a href="/estabelecimentos/ver/<?= $businesse['Business']['url']?>"><button class="button button-radius button-black3">veja mais</button></a>
											</div>
										</div>
										
									</li>				
								<?php else: ?>
								
								
								<li>
									<div class="row">
										<div class="ten columns">
											<span class="row"><b><?= $businesse['Business']['name']?></b></span>
											<span class="row local"><?= $businesse['Category']['name']?></span>
										</div>
										<div class="two columns">
											
										</div>
									</div>
									<div class="row mt5">
										<span class="row endereco"><?= $businesse['Business']['address']?></span>
										<span class="row descricao"><?= $businesse['Business']['business_hours']?></span>
									</div>
								</li>
								<?php endif; ?>
						<?php endforeach; ?>
					</ul>
					<div class="row mt20">
						<div class="holderComercio holder"></div> <!-- paginação -->
					</div>
				</div>		
			<?php endif; ?>
			
			<?php if(count($news)>=1): ?>
				<!--listagem resultado categoria x-->
				<div class="row resultados mt20 noticias mb20">
					<div class="row categoria">
						<h2 class="color">Notícias</h2>
						<span class="qtd-resultados"><?= count($news) ?> resultados encontrados</span>
					</div>
					<ul class="row " id="NoticiasItens">
						<?php foreach($news as $new): ?>
							<li class="row">
								<div class="row">
									<div class="ten columns mb10">
										<span class="row titulo"><a href="/noticias/ver/<?= $new['News']['url']?>"><?= $new['News']['title']?></a></span>
										<span class="row local"><a href="/noticias/<?= $new['Category']['url']?>"><?= $new['Category']['name']?></a></span>
									</div>
									<div class="two columns">
										<a href="/noticias/ver/<?= $new['News']['url']?>">
											<button class="button button-radius button-black3">veja mais</button>
										</a>
									</div>
								</div>
								<div class="row">
									<span class="row endereco"><a href="/noticias/ver/<?= $new['News']['url']?>"><?= date('d/m H:i', strtotime($new['News']['created']))?></a></span>
									<span class="row descricao"><a href="/noticias/ver/<?= $new['News']['url']?>"><?= $new['News']['subtitle']?></a></span>
								</div>
							</li>
						<?php endforeach; ?>
					</ul>
					<div class="row mt20">
						<div class="holderNoticia holder"></div><!-- paginação -->
					</div>
				</div>
			<?php endif; ?>
			
			<?php if(count($schedules)>=1): ?>
				<!--listagem resultado categoria y-->
				<div class="row resultados mt20 agenda mb20">
					<div class="row categoria">
						<h2 class="color">Agenda</h2>
						<span class="qtd-resultados"><?= count($schedules) ?> resultados encontrados</span>
					</div>
					<ul class="row " id="AgendaItens">
						<?php foreach($schedules as $schedule): ?>
							<li class="row">
								<div class="row">
									<div class="ten columns mb10">
										<span class="row titulo"><a href="/agenda/ver/<?= $schedule['Schedule']['url']?>"><?= date('d/m', strtotime($schedule['Schedule']['date_of_event']))?> -  <?= $schedule['Schedule']['title']?></a></span>
										<span class="row local"><a href="/agenda/<?= $schedule['Category']['url']?>/<?= $schedule['Category']['id']?>"><?= $schedule['Category']['name']?></a></span>
									</div>
									<div class="two columns">
										<a href="/agenda/ver/<?= $schedule['Schedule']['url']?>">
											<button class="button button-radius button-black3">veja mais</button>
										</a>
									</div>
								</div>
								<div class="row">
									<span class="row endereco"><a href="/agenda/ver/<?= $schedule['Schedule']['url']?>"><?= $schedule['Schedule']['address']?></a></span>
									<span class="row descricao"><a href="/agenda/ver/<?= $schedule['Schedule']['url']?>"><?= $this->Caracter->_getLimit($schedule['Schedule']['text'], 150)?></a></span>
								</div>
							</li>
						<?php endforeach; ?>
					</ul>
					<div class="row mt20">
						<div class="holderAgenda holder"></div><!-- paginação -->
					</div>
				</div>
			
			<?php endif; ?>

		</div>
		<div class="four columns">
			<?php if(count($banner_lateral) >=1 ):?>
			<div class="row mb20 mt20">
				<?php foreach($banner_lateral as $banner_lat): ?> 
					<?php if($banner_lat['Banner']['tipo'] == 'image'): ?>
						<a target="<?= $banner_lat['Banner']['target'] ?>" href="<?= $banner_lat['Banner']['link'] ?>" class='click' data-click="<?= $banner_lat['Banner']['id'] ?>">
							<img src="<?= $_URL_FILE; ?>banners/fotos/<?= $banner_lat['Banner']['image'] ?>"  width="100%" />
						</a>
					<?php else: ?>	
						<?= $banner_lateral['Banner']['cod'] ?>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
			<?php if(count($bloco_banners_lateral) >=1 ):?>
			<div class="row mb20">
				<?php foreach($bloco_banners_lateral as $bloco_banners): ?> 
					<?php if($bloco_banners['Banner']['tipo'] == 'image'): ?>
						<a target="<?= $bloco_banners['Banner']['target'] ?>" href="<?= $bloco_banners['Banner']['link'] ?>" class='click' data-click="<?= $bloco_banners['Banner']['id'] ?>">
							<img src="<?= $_URL_FILE; ?>banners/fotos/<?= $bloco_banners['Banner']['image'] ?>"  width="100%" />
						</a>
					<?php else: ?>	
						<?= $bloco_banners_lateral['Banner']['cod'] ?>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>