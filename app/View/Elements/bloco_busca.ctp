
<div class="row box-busca-top">
	<div class="six columns">
		<div class="box-busca">
			<div class="row">
				<div class="sub-box-busca">
					<form action="/search" method="GET">
						<div class="nine columns">
							<input type="hidden" name="hash" value="<?= md5(date('Y-m-d H:i:s'))?>" />
							<input class="input input-radius input-pesquisa" type="text" name="por" value="<?= isset($_GET['por']) ? $_GET['por']: ''?>" placeholder="O QUE VOCÊ PROCURA?" />
							
						</div>
						<div class="three columns">
							<button class="button button-radius button-pesquisa">BUSCAR</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="three columns relative">
		<span class="oferecimento">Oferecimento:</span>
		<?php if(!empty($bannerOferecimento)):?>
			<?php if($bannerOferecimento['Banner']['tipo'] == 'image'): ?>
				<a target="<?= $bannerOferecimento['Banner']['target'] ?>" href="<?= $bannerOferecimento['Banner']['link'] ?>" class='click' data-click="<?= $bannerOferecimento['Banner']['id'] ?>">
					<img src="<?= $_URL_FILE; ?>banners/fotos/<?= $bannerOferecimento['Banner']['image'] ?>" style="width:150px; height:50px'" />
				</a>
			<?php else: ?>	
				<?= $bannerOferecimento['Banner']['cod'] ?>
			<?php endif; ?>
		<?php endif; ?>
	</div>
	<div class="three columns">
		<a href="/imoveis" class="img-top" ><img src="/img/icon-categoria-imoveis3.png"  /></a>
		<a href="/autos" class="img-top"><img src="/img/icon-categoria-autos3.png" /></a>
	</div>	
</div>