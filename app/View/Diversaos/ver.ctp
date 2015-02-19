<div class="galerias">
	<div class="row mt20">
		<div class="eight columns">
			<div class="post-aberto">
				<div class="bloco-1 row">
					<div class="row destaque">
						<div class="row">
							<span class="icon-categoria"></span><span class="titulo-categoria">Galerias</span>
						</div>
						
					</div>
				</div>
				<div class="row titulo upper mt20">
					Album x
				</div>
				<!--galeria de fotos do post-->
				<div class="row mt20">
					<ul class="galeria-fotos">
						<?php foreach($files as $file): ?>
							<li><a href="#"><img src="<?= $_URL_FILE; ?>galleries/fotos/640x480-<?= $file['File']['name']?>" width="100%" /></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
				<!--bloco de comentários-->
				<div class="row mt20">
					<div class="row mb20">
						<span class="icon-comments"></span>
						<h2>Comentários</h2>
					</div>
					<div class="fb-comments" data-href="http://nocambui.com.br" data-width="630"></div>
				</div>
			</div>
		</div>
		<div class="four columns">
			<div class="row">
			 	<?php echo $this->element('bloco_veja_tambem'); ?>
			 </div>
			<div class="row mt20">
				<a href=""><img src="/img/banner-nike-lateral.png" /></a>
			</div>
		</div>
	</div>	
</div>