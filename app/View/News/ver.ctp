<div class="noticias">
	<div class="row mt20">
		<div class="eight columns">
			<div class="post-padrao-aberto">
				<div class="row">
					<span class="titulo style_titulo color"><?= $news['News']['title']?></span> 
					<!-- <span class="data">postado dia <?= date("d/m - H:i", strtotime($news['News']['created'])) ?> por: <?= $news['News']['author']?></span>-->
				</div>
				<div class="row sub-titulo style_subtitulo mt5 mb20">
					<?= $news['News']['subtitle']?> 
					<div class="line-drop-bottom-1"></div>
				</div>
				 <div class="row">
					<a href="">
						<?php if(!empty($news['News']['image'])): ?>
						<div class="like-post-top">
							<div class="fb-like" data-href="<?= $current_url ?>" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div>
						</div>
						<?php endif; ?>
						<ul class="redes-compartilhe">
							<li>
								<a href="http://www.facebook.com/sharer.php?s=100
								&p[url]=<?= $current_url?>
								&p[images][0]=<?= $_URL_FILE ?>news/fotos/635x250-<?= $news['News']['image'] ?>
								&p[title]=<?= $news['News']['title']?>
								&p[summary]=<?= $news['News']['subtitle']?>"
								target="_blank" onclick="javascript:window.open(this.href,
						'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;">
									<img src="/img/rede-facebook.png" />
								</a>
							</li>
							<li>
								<a target="_blank" href="http://www.twitter.com/share?url=<?= $current_url?>" onclick="javascript:window.open(this.href,
					'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;">
									<img src="/img/rede-twitter.png" />
									
								</a>
							</li>
							<li>
								<a title="Google +" href="https://plus.google.com/share?url=<?= $current_url?>" target="_blank" onclick="javascript:window.open(this.href,
					'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;">
									<img src="/img/rede-plus.png" />
								</a>
							</li>
						</ul>
						<?php if(!empty($news['News']['image'])): ?>
						 <img class="imagem-topo-pagina" src="<?= $_URL_FILE ?>news/fotos/635x250-<?= $news['News']['image'] ?>"/><!--160x70-->
						 <div class="line-drop-1"></div>
						<?php endif; ?>
					</a>
				</div>
				
				<div class="row texto mt10 mb10 conteudo_style">
					<div class="line-drop-1"></div>
					<?= $news['News']['text']?>
				</div>
				<span class=""> <b>Por: <i><?= $news['News']['author']?></i> | <?= date("d/m/y - H:i", strtotime($news['News']['created'])) ?></b></span>
				<!--galeria de fotos do post
					<div class="row mt20">
						<ul class="galeria-fotos">
							<li><a class="janela-modal" href="/img/exemplo-diversao1.png"><img src="/img/exemplo-galeria-interna1.png" /></a></li>
							<li><a class="janela-modal" href="/img/exemplo-diversao1.png"><img src="/img/exemplo-galeria-interna2.png" /></a></li>
							<li><a class="janela-modal" href="/img/exemplo-diversao1.png"><img src="/img/exemplo-galeria-interna1.png" /></a></li>
							<li><a class="janela-modal" href="/img/exemplo-diversao1.png"><img src="/img/exemplo-galeria-interna2.png" /></a></li>
						</ul>
					</div>-->
				<!--bloco de comentários-->
				
				<div class="row mt20 mb20">
					<?php if(count($b_h_interno) >=1 ):?>

							<?php if($b_h_interno['Banner']['tipo'] == 'image'): ?>
								<a target="<?= $b_h_interno['Banner']['target'] ?>" href="<?= $b_h_interno['Banner']['link'] ?>" class='click' data-click="<?= $b_h_interno['Banner']['id'] ?>">
									<img src="<?= $_URL_FILE; ?>banners/fotos/<?= $b_h_interno['Banner']['image'] ?>"   />
								</a>
							<?php else: ?>	
								<?= $b_h_internotronomia['Banner']['cod'] ?>
							<?php endif; ?>
						
					<?php endif; ?>
				</div>
								
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
			<div class="row assuntos-relacionados mb20">
				<div class="assuntos-relacionados">
					<div class="row">
						<h2>
							<a href="/noticias/<?= $news['Category']['url']?>">Mais sobre <?= $news['Category']['name']?> </a>
						</h2>
					</div>
					<ul>
						<?php foreach($relacionados['News'] as $relacionado): ?>
							<?php if($news['News']['id'] != $relacionado['id']): ?>
								<li>
									<div class="row">
										<div class="four columns">
											<a href="/noticias/ver/<?= $relacionado['url']?>"><img src="<?= $_URL_FILE ?>news/fotos/318x177-<?= $relacionado['image'] ?>" width="100%"/></a>
										</div>
										<div class="eight columns">
											<div class="row">
												<div class="seven columns">
													<a href="/noticias/ver/<?= $relacionado['url']?>">
														<span class="row titulo"><?= $relacionado['title']?></span>
														<span class="row data"><?= date("d/m/Y - H:i", strtotime($relacionado['created'])); ?></span>
													</a>
												</div>
												<div class="five columns"><a href="/noticias/ver/<?= $relacionado['url']?>"><button class="button button-radius button-black4">LER MAIS</button></a></div>
											</div>
											<!-- <div class="row texto">
												Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
											</div> -->
										</div>
									</div>
								</li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				</div>				
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
			<div class="row mb20 mais-vistos">
				<?php echo $this->element('bloco_vantagens_dia'); ?>
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