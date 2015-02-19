<div class="galerias">
<div class="row mt20 ">
	<div class="eight columns">
		<div class="row mb20">
			<?php if(count($galeriaDestaque1)>0): ?>
				<a href="/galeria/ver/<?= $galeriaDestaque1['Galeria']['id'] ?>">
					<img src="<?= $_URL_FILE; ?>galleries/fotos/640x480-<?= $galeriaDestaque1['File'][0]['name']?>" width="100%" />
					<div class="box-post-destaque">
						<div class="row">
							<div class="post-destaque-categoria upper bdge">
								<div class="icon-categoria-default"></div>
								<span>Galeria de fotos</span>
							</div>
							<div class="post-destaque-categoria upper bdge">
								<div class="icon-data-evento"></div>
								<div class="box-data-evento">
									<span class="row upper">data</span>
									<span class="row"><?= $galeriaDestaque1['Galeria']['data'] ?></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="post-destaque-titulo bdge"><?= $galeriaDestaque1['Galeria']['titulo'] ?></div>
						</div>
					</div>
					
				</a>
			<?php endif; ?>			
		</div>
		<div class="row">
			<div class="row">
				<div class="box-post-mais-vistos">
					<div class="row">
						<span>Fotos</span> mais vistas 
					</div>
				</div>
			</div>
			<div class="row">
				<ul class="list-post-mais-vistos">
					<?php foreach($maislidas as $key => $maislida ): ?>		
						<?php if($key <=1 ):?>
							<li class="<?= $key ==1 ? 'last': ''; ?>">
								<a href="/galerias/ver/<?= $maislida['Galeria']['id'] ?>">
									<div class="row">
										<div class="four columns">
											<img src="<?= $_URL_FILE; ?>galleries/fotos/640x480-<?= $maislida['File'][0]['name']?>" width="100%" width="88" height="66px" />
											
										</div>
										<div class="eight columns">
											<div class="row mt5">
												<div class="row">
													<div class="box-post-min-categoria upper bdge">
														<div class="icon-categoria-default-min"></div>
														<span><?= $maislida['Galeria']['view'] ?> - Visualizações</span>
													</div>
													<div class="box-post-min-categoria upper bdge">
														<div class="icon-data-evento-min"></div>
														<div class="box-data-evento-min">
															<span class="row"><?= $maislida['Galeria']['data'] ?></span>
														</div>
													</div>
												</div>
												<div class="row box-post-min-titulo bdge">
													<div class="space5"><?= $maislida['Galeria']['titulo'] ?></div>
												</div>
											</div>
										</div>
									</div>
								</a>
							</li>
						<?php endif; ?>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="four columns">

		<?php foreach($galeriasDestaque2 as $galeriaDestaque2):?>
		<div class="row mb20">
			<a href="/galeria/ver/<?= $galeriaDestaque2['Galeria']['id']?>">
				<img src="<?= $_URL_FILE; ?>galleries/fotos/640x480-<?= $galeriaDestaque2['File'][0]['name']?>" width="100%" />
				<div class="box-post-destaque">
					<div class="row">
						<div class="post-destaque-categoria upper bdge">
							<div class="icon-categoria-default"></div>
							<span><?= $galeriaDestaque2['Galeria']['data']?></span>
						</div>
					</div>
					<div class="row">
						<div class="post-destaque-titulo bdge"><?= $galeriaDestaque2['Galeria']['titulo']?></div>
					</div>
				</div>
			</a>
		</div>
		<?php endforeach; ?>			
		
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
		<div class="row mb20">
			<?php echo $this->element('bloco_agenda_lateral'); ?>
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
<div class="row mt20">
	
	<div id="slides15">
		<div class="slides_container15">
			
			<div class="slide">
				<div class="row">
					<?php foreach($galerias as $galeria ): ?>
						<a href="/galeria/ver/<?= $galeria['Galeria']['id']?>" title="">
							<div class="item"> 
								<img src="<?= $_URL_FILE; ?>galleries/fotos/640x480-<?= $galeria['File'][0]['name']?>" width="100%" />
								<div class="box-post-min">
									<div class="row">
										<div class="box-post-min-categoria upper bdge">
											<div class="icon-categoria-default-min"></div>
											<span>Galeria de fotos </span>
										</div>
										<div class="box-post-min-categoria upper bdge">
											<div class="icon-data-evento-min"></div>
											<div class="box-data-evento-min">
												<span class="row"><?= $galeria['Galeria']['data']?></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="bdge box-post-min-titulo2"><?= $galeria['Galeria']['titulo']?></div>
									</div>
								</div>
							</div>
						</a>
					<?php endforeach; ?>
				</div>
			</div>
			
			
			
		</div>
		<div class="row">
			<a href="#" class="next15"><img src="/img/next15.png" alt="Próximo"></a>
			<a href="#" class="prev15"><img src="/img/prev15.png" alt="Anterior"></a>
		</div>
	</div>

</div>

</div>