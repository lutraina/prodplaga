<div class="galerias">
	<div class="row mt20">
		<div class="eight columns">
			<div class="row">
				<?php echo $this->Session->flash(); ?>
			</div>
			<div class="post-aberto">
				<div class="bloco-1 row">
					<div class="row destaque">
						<div class="row">
							<div class="ten columns">
								<span class="icon-categoria"></span><span class="titulo-categoria"><?= $files[0]['Galeria']['titulo']?></span>
							</div>
							<div class="two columns f-right"><label class="button button-radius button-black4">(<?= $files[0]['Galeria']['view']?>) views</label></div>
							<!-- <div class="two columns f-right"><a href="/galeria/favoritar/<?= $files[0]['Galeria']['id']?>"><button class="button button-radius button-black4">Favoritar</button></a></div>-->
						</div>
						
					</div>
				</div>
				<!--galeria de fotos do post-->
				<div class="row mt20">
					<ul class="galeria-fotos">
						<?php foreach($files as $file): 
						list($width, $height, $type, $attr) = getimagesize("http://files.nocambui.com.br/galleries/fotos/640x480-211436399ef77a7909ee0c47d3c95ac1.JPG");

  //echo "Image width " . $width;
  
							//$size = imagesx($_URL_FILE.'galleries/fotos/640x480'.$file['File']['name']);
							//print_r($size);
						?>
							<li><a href="#**"><img width="<?php echo ($width*20/100); ?>" href="<?= $_URL_FILE; ?>galleries/fotos/640x480-<?= $file['File']['name']?>" title="<?= $file['File']['titulo']?>" class="janela-modal img-border border"  src="<?= $_URL_FILE; ?>galleries/fotos/640x480-<?= $file['File']['name']?>" width="150" /></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
				 
				<!--bloco de comentários-->
				<div class="row mt20">
					<div class="row mb20">
						<span class="icon-comments"></span>
						<h2>Comentários</h2>
					</div>
					<div class="fb-comments" data-href="<?= $current_url ?>" data-width="630"></div>
				</div>
			</div>
		</div>
		<div class="four columns">
			<div class="row">
				<!--veja tambem-->
			 	<?php echo $this->element('bloco_veja_tambem'); ?>
			 </div>
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
			<div class="row mt20">
				<?php echo $this->element('bloco_agenda_lateral'); ?>
			</div>
			<?php if(count($bloco_banners_lateral) >=1 ):?>
			<div class="row mt20">
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