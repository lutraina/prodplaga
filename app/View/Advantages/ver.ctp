<?php $REMOTE_ADDR = $_SERVER['REMOTE_ADDR'];
	//if($REMOTE_ADDR == '134.90.138.4' ||  $REMOTE_ADDR =='177.34.21.8' || $REMOTE_ADDR == '83.154.194.160'){ ?>
	
	<div class="vantagens">
		<div class="row mt20">
			<div class="eight columns">
				<div class="post-padrao-aberto">
					<div class="row mb20">
						<div class="row">
							<span class="icon-categoria"></span><span class="titulo-categoria color-link"><a href="/vantagem">Vantagem do dia</a></span>
						</div>
					</div>

					 <div class="row">
						<div class="row">
							<div class="box-vantagem-interna bdge">
								<div class="row">
									<span class="titulo color-white"><?= $vantagens['Advantage']['title'] ?></span> 
								</div>
								<div class="row mt30 percente-ver">
									<?php
									//verification se o preço foi adicionado, senao nada é mostrado na tela
									if(isset($vantagens['Advantage']['price']) && !empty($vantagens['Advantage']['price'])){ ?>
										<span class="percentual">
										- <?= $this->Percent->_getDescont($vantagens['Advantage']['price'], $vantagens['Advantage']['price_to']) ?> %
										</span>
										<span class="texto-cupom3 color-white mt10 linha">De R$ <?= $vantagens['Advantage']['price'] ?> </span>
										<span class="texto-cupom2 color-white mt10"> Por R$ <?= $vantagens['Advantage']['price_to'] ?> </span>
									<?php } ?>	
								</div>
								<div class="row mt30">
									<div class="one column"></div>
									<div class="five columns">
										<h3 class="color-white mt5">Tempo restante</h3>
									</div>
									<div class="six columns">
										<div class="icon-relogio mt5"></div>
										<div class="teaser">
											<div class="tp">
												<div id="no-reflection" class="no-reflection">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row mt20">
									<div class="botao-cupom">
										<a target="_blank" href="/vantagens/cupom/<?= $vantagens['Advantage']['url'] ?>"><button class="button button-radius button-black">RETIRAR CUPOM</button></a>
									</div>
								</div>
							</div>
							<div class="like-post-top">
								<div class="fb-like" data-href="<?= $current_url ?>" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div>
							</div>
							<ul class="redes-compartilhe">
								<!--<li>
									<a href="http://www.facebook.com/sharer.php?s=100
									&p[url]=<?= $current_url?>
									&p[images][0]=<?= $_URL_FILE ?>advantages/fotos/410x480-<?= $vantagens['Advantage']['image'] ?>
									&p[title]=<?= $vantagens['Advantage']['title']?>
									&p[summary]=<?= $vantagens['Advantage']['regulation']?>"
									target="_blank" onclick="javascript:window.open(this.href,
							'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;">
										<img src="/img/rede-facebook.png" />
									</a>
								</li>-->
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
							<img class="img-border border f-left" src="<?= $_URL_FILE ?>advantages/fotos/410x480-<?= $vantagens['Advantage']['image'] ?>" style="width: 315px; height:370px;"/>
						</div>
						<div class="row">
							<h2 class="row mt20">Regulamento</h2>
							<div class="row mt10">
								<?= $vantagens['Advantage']['regulation'] ?>
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
				<div class="four columns">
					
					<div class="row mb20">
						<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
						<!-- Banner 300 x 600 cambui -->
						<ins class="adsbygoogle"
						     style="display:inline-block;width:300px;height:600px"
						     data-ad-client="ca-pub-4475543678910973"
						     data-ad-slot="3326208607"></ins>
						<script>
						
						(adsbygoogle = window.adsbygoogle || []).push({});
						</script>
						
						<?php if(count($banner_lateral) >=1 ):?>
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
	</div>
	
<?php //} ?>		