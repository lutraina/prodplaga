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
</script>

<div class="noticias">
	<div class="row mt20">
		<div class="eight columns">
			<?php if(count($newsDestaque1)>0): ?>
				<div class="row mb10">
					<a href="/noticias/ver/<?= $newsDestaque1['News']['url'] ?>"><img src="<?= $_URL_FILE ?>news/fotos/635x250-<?= $newsDestaque1['News']['image'] ?>" style="width:100%;"/></a>
					<div class="box-post-destaque">
						<div class="row">
							<div class="post-destaque-categoria upper bdge">
								<div class="icon-categoria-default"></div>
								<span><a href="/noticias/<?= $newsDestaque1['Category']['url'] ?>"><?= $newsDestaque1['Category']['name'] ?></a></span>
							</div>
						</div>
						<div class="row">
							<div class="post-destaque-titulo bdge"><a href="/noticias/ver/<?= $newsDestaque1['News']['url'] ?>"><?= $newsDestaque1['News']['title'] ?></a></div>
						</div>
					</div>
				</div>
			<?php endif; ?>
			<div class="row posts-destaque">
				<?php foreach($newsDestaque2 as $newsdestaque):?>
					<div class="six columns">
						<a href="/noticias/ver/<?= $newsdestaque['News']['url'] ?>"><img class="img-border border" src="<?= $_URL_FILE ?>news/fotos/318x177-<?= $newsdestaque['News']['image'] ?>" style="height: 150px; width:100%;"/></a>
						<div class="row mt10">
							<div class="eight columns">
								<span class="row titulo"><a class="color" href="/noticias/<?= $newsdestaque['Category']['url'] ?>">	<?= $newsdestaque['Category']['name'] ?></a></span>
								<span class="row local"><a href="/noticias/ver/<?= $newsdestaque['News']['url'] ?>">	<?= $newsdestaque['News']['title'] ?></a></span>
								
							</div>
							<div class="four columns">
								<a href="/noticias/ver/<?= $newsdestaque['News']['url'] ?>"><button class="button button-radius button-black3">veja mais</button></a>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="row box-lista-filtro mt20">
				<h2 class="row color">Mais Posts / <?= $categoriaNome ?></h2>
			</div>
			<div class="row box-lista-filtro mt20">
				<div class="box-busca">
					<div class="row">
						<div class="sub-box-busca">
							<form action="/search/news_interno" method="GET">
								<div class="nine columns">
									<input type="hidden" name="hash" value="<?= md5(date('Y-m-d H:i:s'))?>" />
									<input type="hidden" name="cat" value="<?= $categoriaID ?>" />
									<input class="input input-radius input-pesquisa" type="text" name="por" value="<?= isset($_GET['por']) ? $_GET['por']: ''?>" placeholder="Buscar em <?= $categoriaNome ?>" />
									
								</div>
								<div class="three columns">
									<button class="button button-radius button-pesquisa">BUSCAR</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!--posts-->
			<div class="row listagem-posts mt20">
				<ul id="NoticiasItens">
					
					<?php foreach($news as $new): ?>
						<li>
							<div class="row">
								<div class="ten columns">
									<span class="row titulo"><a class="color" href="/noticias/ver/<?= $new['News']['url'] ?>"><?= $new['News']['title'] ?></a></span>
									<span class="row local">Categoria: <a href="/noticias/<?= $new['Category']['url'] ?>"><?= $new['Category']['name'] ?></a></span>
								</div>
								<div class="two columns">
									<a href="/noticias/ver/<?= $new['News']['url'] ?>"><button class="button button-radius button-black3">veja mais</button></a>
								</div>
							</div>
							<div class="row mt10">
								<span class="row endereco"><b><?= date("d/m - H:i", strtotime($new['News']['created'])) ?></b></span>
								<span class="row descricao"><a href="/noticias/ver/<?= $new['News']['url'] ?>"><?= $new['News']['subtitle'] ?>. </a></span>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="row mt20">
				<div class="holderNoticia holder"></div><!-- paginação -->
			</div>
		</div>
		<div class="four columns">
			<?php if(count($banner_lateral) >=1 ):?>
			<div class="row mb20">
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
			
			<!-- MAIS LIDAS -->
			<div class="row mb20">
				<div class="mais-vistos">
					<div class="row">
						<div class="box-categoria bdge">
							<div class="icon-categoria-default"></div>
							<span>Últimas Noticias</span>
						</div>
					</div>
					<ul class="listagem">
						<?php foreach($maislidas as $key => $maislida): ?>
							<li>
								<div class="row">
									<div class="two columns">
										<span class="row num"><a class="color" href="/noticias/ver/<?= $maislida['News']['url'] ?>"><?= $key+1 ?>º</a></span>
									</div>
									<div class="ten columns" style="height:52px;">
										<span class="row titulo titulo-pequeno-cinza"><a class="color" href="/noticias/ver/<?= $maislida['News']['url'] ?>"><?= $this->Caracter->_getLimit($maislida['News']['title'], 60)?>...</a></span>
										<span class="row local" style="display:none;"><a class="color" href="/noticias/ver/<?= $maislida['News']['url'] ?>"><?= $this->Caracter->_getLimit($maislida['News']['subtitle'], 50)?>...</a></span>
									    <span class="date-pequena-cinza"><?= date("d/m/y - H:i", strtotime($maislida['News']['created']));  ?></span>
									</div>
								</div>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
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