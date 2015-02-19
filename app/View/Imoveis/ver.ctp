<div class="imoveis">
	<div class="row mt20">
		<div class="eight columns">
			<div class="post-aberto">
				
				<div class="row">
					<a href="">
						<a href="<?= $current_url ?>">
						<div class="like-post-top">
							<div class="fb-like" data-href="<?= $current_url ?>" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div>
						</div>
	
						<ul class="redes-compartilhe">
							<li>
								<a href="http://www.facebook.com/sharer.php?s=100
								&p[url]=<?= $current_url ?>
								&p[images][0]=<?= $_URL_FILE ?>imoveis/fotos/640x480-<?= $imovel['File'][0]['name'] ?>
								&p[title]=<?= $imovel['Imovei']['tipo']?>

								&p[summary]=<?= $imovel['Imovei']['vendedor']?>"
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
						<img src="<?= $_URL_FILE ?>imoveis/fotos/A-<?= $imovel['File'][0]['name'] ?>" style="width:100%;"/>
						</a>
						<div class="box-post-destaque">
							<div class="row">
								<div class="post-destaque-categoria upper bdge">
									<div class="icon-categoria-default"></div>
									<span><a href="/imoveis">Imoveis</a></span>
								</div>
							</div>
							<div class="row">
								<div class="post-destaque-titulo bdge"><?= $imovel['Imovei']['tipo'] ?> - <?= $imovel['Imovei']['quartos'] ?> quartos</div>
							</div>
						</div>
					</a>
				</div>
				<div class="row">
					<div class="row mt20">
						<?php echo $this->Session->flash(); ?>
					</div>
				</div>
				<!--bloco de informações de informações-->
				<div class="row mt20">
					<div id="tabs" class="row nav-tabs-estabelecimentos">
						<ul class="row">
							<li><a href="#tabs-1">informações</a></li>
							<li><a href="#tabs-2">fotos</a></li>
						</ul>
						<div class="conteudo-tabs-estabelecimentos">
							<div class="row">
								<div id="tabs-1">
									<div class="row">
										<h2>Imóvel</h2>
										<ul class="sub-conteudo mt10">
											<li class="bloco-left">
												<h3 class="row">Tipo</h3>
												<span class="row"><?= $imovel['Imovei']['tipo'] ?></span>
											</li>
											<li class="bloco-right">
												<h3 class="row">Valor</h3>
												<span class="row">R$ <?= $imovel['Imovei']['preco'] ?></span>
											</li>
										</ul>
										<ul class="sub-conteudo">
											<li class="bloco-left">
												<h3 class="row">Quartos</h3>
												<span class="row"><?= $imovel['Imovei']['quartos'] ?></span>
											</li>
											<li class="bloco-right">
												<h3 class="row">Disponível para</h3>
												<span class="row"><?= $imovel['Imovei']['situacao'] ?></span>
											</li>
										</ul>
										<ul class="sub-conteudo">
											<li class="bloco">
												<h3 class="row">Endereço</h3>
												<span class="row"><?= $imovel['Imovei']['endereco'] ?></span>
											</li>
											
										</ul>
										<ul class="sub-conteudo">
											<li class="bloco">
												<h3 class="row">Mais detalhes</h3>
												<span class="row"><?= $imovel['Imovei']['opcional'] ?></span>
											</li>
											
										</ul>
									</div>
									<div class="mt20">
										<h2>Vendedor</h2>
										<ul class="sub-conteudo mt10">
											<li class="bloco-left">
												<h3 class="row">Nome</h3>
												<span class="row"><?= $imovel['Imovei']['vendedor'] ?></span>
											</li>
											<li class="bloco-right">
												<h3 class="row">E-mail</h3>
												<span class="row"><?= $imovel['Imovei']['email'] ?> km</span>
											</li>
										</ul>
									</div>
								</div>
								<div id="tabs-2">
									<div class="box-galeria-estabelecimento">
										
										<ul>
											<?php foreach($imovel['File'] as $file): ?>
												<li><a href="#"><img  href="<?= $_URL_FILE; ?>imoveis/fotos/A-<?= $file['name']?>" title="<?= $file['titulo']?>" class="janela-modal img-border border"  src="<?= $_URL_FILE; ?>imoveis/fotos/B-<?= $file['name']?>" width="130" /></a></li>
											<?php endforeach; ?>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
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
			<div class="row assuntos-relacionados">
				<div class="assuntos-relacionados">
					<div class="row">
						<h2>
							<a href="/imoveis">Veja Também </a>
						</h2>
					</div>
					<ul>
						<?php foreach($outros as $outro): ?>
							<?php if($imovel['Imovei']['id'] != $outro['Imovei']['id']): ?>
								<li>
									<div class="row">
										<div class="four columns">
											<a href="/imoveis/ver/<?= $outro['Imovei']['id']?>"><img src="<?= $_URL_FILE ?>imoveis/fotos/B-<?= $outro['File'][0]['name'] ?>" width="100%"/></a>
										</div>
										<div class="eight columns">
											<div class="row">
												<div class="seven columns">
													<a href="/imoveis/ver/<?= $outro['Imovei']['id']?>">
														<span class="row titulo"><?= $outro['Imovei']['tipo']?></span>
														<span class="row data">Marca: <?= $outro['Imovei']['situacao']?></span>
														<span class="row data">Ano: <?= $outro['Imovei']['preco']?></span>
													</a>
												</div>
												<div class="five columns"><a href=""><button class="button button-radius button-black4">LER MAIS</button></a></div>
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

