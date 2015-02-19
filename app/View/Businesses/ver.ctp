<?php
 /*
  * o que tem nesse arquivo :
  * 	COLUNA DA DIREITA ONDE TEM OS BANNERS E OS MAIS VISTOS
  * 
  */
?> 
<!--script maps-->
<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/markermanager/src/markermanager.js"></script>
<script src="/js/mapa.js"></script>
<div class="<?= $business['Business']['type'] ?>">
	<div class="row mt20">
		<div class="eight columns">
			<div class="post-aberto">
				<div class="row">
					<?php if(!empty($business['Business']['image'])): ?>	
						<a href="/estabelecimentos/ver/<?= $business['Business']['url'] ?>">
							
							<div class="like-post-top">
								<div class="fb-like" data-href="<?= $current_url ?>" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div>
							</div>
						</a>

						<ul class="redes-compartilhe">
							<!--
									Código de compartilhar com o facebook está apresentando problemas
							<li>
								<a href="http://www.facebook.com/sharer.php?s=100
								&p[url]=<?= $current_url ?>
								&p[images][0]=<?= $_URL_FILE ?>businesses/fotos/635x250-<?= $business['Business']['image'] ?>
								&p[title]=<?= $business['Business']['name']?>
								&p[summary]=<?= $business['Business']['text']?>"
								target="_blank" onclick="javascript:window.open(this.href,
						'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;">
									<img src="/img/rede-facebook.png" />
								</a>
							</li>
						-->
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
							<img src="<?= $_URL_FILE ?>businesses/fotos/635x250-<?= @$business['Business']['image'] ?>" style="width:100%; margin-left:-10px;"/>
						
						<!--<div class="box-post-destaque">
							<div class="row">
								<div class="post-destaque-categoria upper bdge">
									<div class="icon-categoria-default"></div>
									<span><a href="/estabelecimentos/<?= $business['Business']['type'] ?>/<?= $business['Category']['url'] ?>"><?= $business['Category']['name'] ?></a></span>
								</div>
							</div>
							<div class="row">
								<div class="post-destaque-titulo bdge"><?= $business['Business']['name'] ?></div>
							</div>
						</div>-->
					<?php endif; ?>
				</div>
				<div class="row mt10">
					<div class="titulo style_titulo color" style="text-align:left !important;">
						<?= $business['Business']['name'] ?>
						<?php //if(isset($_GET['abas']) && $_GET['abas'] == 'sim'){ ?>
							<div style="font-size:14px; font-weight:normal; color:#aaa; font-style : italic; font-family:Helvetica;">
							
							<br/>
							<span class="row"><span style="color:#555; font-style : italic;">Endereço : </span> <?php echo $business['Business']['address']; ?></span>
							<span class="row"><span style="color:#555; font-style : italic;">Telefone : </span><?= $business['Business']['phone'] ?></span>
							<br/>
							<div style="float:right;"> 
								<table class="row">
									<tr>
										<?php if ( isset($business['Business']['email']) && !empty($business['Business']['email']) ){  ?>
											<td style="width:80px;">
												<a href="mailto:">
													<img title="email" style="width:40px;" src="/img/icone_email2.png">
												</a>
											</td>
										<?php } ?>	
										<?php if ( isset($business['Business']['email']) && !empty($business['Business']['email']) ){  ?>
											<td style="width:80px;">
												<a target="_blank" href="">
													<img title="site web" style="width:50px;" src="/img/icone_site2.jpg">
												</a>
											</td>
										<?php } ?>		
										<td style="width:80px; cursor:pointer;">
											<img id="ver_mapa" title="ver mapa" style="width:50px;" src="/img/icone_mapa.png">
										</td>
									</tr>
								</table>	
							</div>	
							
						</div>
						
						
					<?php //} ?>	
							
					</div>
				</div>
				<style type="text/css">
			      html, body, #map-canvas { height: 100%; margin: 0; padding: 0;}
			    </style>

				<div id="map-canvas" style="height:400px; border:1px solid #eee; display:none;"></div>
				
				<div id="dialog" title="Basic dialog" style="display:none;">
					<p>This is the default dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.</p>
				</div>
				
				<div class="row texto mt10 mb20 conteudo_style">
					<div class="line-drop-1"></div>
					<?= $business['Business']['text'] ?>
				</div>
				<?php if(!empty($business['Business']['video'])): ?>
					<div class="row mb20">
						<embed  style="height:360px; width:640px"
						
							src="<?= $this->Video->_getConvert($business['Business']['video']);?>"
							type="application/x-shockwave-flash">
						</embed>
					</div>
				<?php endif; ?>
				<div class="row mt20">
					<?php echo $this->Session->flash(); ?>
				</div>
				
				<div class="row mb20">
					<b>(<?= $business['Business']['view'] ?>) views </b>
				</div>
				 
				<div class="row mt20 mb20">
					<?php 
					 /* if(count($b_h_interno) >=1 ){ ?>
						if($b_h_interno['Banner']['tipo'] == 'image'){ ?>
							<a target="<?= $b_h_interno['Banner']['target'] ?>" href="<?= $b_h_interno['Banner']['link'] ?>" class='click' data-click="<?= $b_h_interno['Banner']['id'] ?>">
								<img src="<?= $_URL_FILE; ?>banners/fotos/<?= $b_h_interno['Banner']['image'] ?>"   />
							</a>
						 } else { 	
							 //echo $b_h_internotronomia['Banner']['cod'];
						 } 
						
					 } */
					?>
					
					<!--bloco de informações de informações-->
					<div class="row mt20">
						<?php echo $this->element('bloco_informacoes'); ?>
					</div>
					<!--bloco de avaliação do estabelecimento-->
				<div class="bloco-avaliacao">
					<div class="row">
						<div class="four columns">
							<span>Serviço</span>
							<ul>
								<?php for($i=1; $i <= 5; $i++): ?>
									<li><a href="#dialog" name="modal" class="<?= $i > $servico ? 'nao-avaliado' :  'avaliado'  ?>"></a></li>
								<?php endfor;?>
							</ul>
						</div>
						<div class="four columns">
							<span>Atendimento</span>
							<ul>
								<?php for($i=1; $i <= 5; $i++): ?>
									
									<li><a href="#dialog" name="modal" class="<?= $i > $atendimento ? 'nao-avaliado' :  'avaliado'  ?>"></a></li>
								<?php endfor;?>
							</ul>
						</div>
						<div class="four columns">
							<span>Ambiente</span>
							<ul>
								<?php for($i=1; $i <= 5; $i++): ?>
									<li><a href="#dialog" name="modal" class="<?= $i > $ambiente ? 'nao-avaliado' :  'avaliado'  ?>"></a></li>
								<?php endfor;?>
							</ul>
						</div>
					</div>
				</div>
				
				
				<!--pra apagar, é so pra mostrar pro mel as abas na vertical-->
				
				<?php if(isset($_GET['abas']) && $_GET['abas'] == 'sim'){ ?>
 
				
				
				<div id="tabs_business" class="row nav-tabs-estabelecimentos">
					<ul style="width:170px; class="row">
						<li><a href="#tabs-1">informações sobre</a></li>
						<li><a href="#tabs-2">mapa</a></li>
						<li><a href="#tabs-3">fotos</a></li>
						
						<li><a href="#tabs-4">nesta área</a></li>
					</ul>
					<div style="border:none;" class="conteudo-tabs-estabelecimentos">
							<div id="tabs-1" style="margin-left:5px; margin-top:-120px;">
								<div class="row">
									<ul style="margin-left:10px;" class="sub-conteudo">
										<li class="bloco-left">
											<?php foreach($business['AbasBusiness'] as $Aba){
												 echo $Aba['titulo']; 
												 echo $Aba['conteudo']; 
											}
											?>
											<span class="row"><a href="mailto:<?= $business['Business']['email'] ?>"><img src="/img/icon-email.jpg" /> </a></span>
										</li>
										<li class="bloco-right">
											
											<span class="row"><a href="<?= $business['Business']['site'] ?>" target="_blank"><img src="/img/icon-site.jpg" /></a></span>
										</li>
									</ul>					
									<ul class="sub-conteudo">
										<li class="bloco-left">
											<h3 class="row">Endereço</h3>
											<span class="row"><?= $business['Business']['address'] ?></span>
										</li>
										<li class="bloco-right">
											<h3 class="row">Telefone(s)</h3>
											<span class="row"><?= $business['Business']['phone'] ?></span>
										</li>
									</ul>
									<?php if (!empty($business['Business']['specialty'])): ?>
									<ul class="sub-conteudo">
										<?php if (!empty($business['Business']['specialty'])): ?>
										<li class="bloco-left">
											<h3 class="row">Especialidade</h3>
											<span class="row"><?= $business['Business']['specialty'] ?></span>
										</li>
										<?php endif; ?>
										<?php if (!empty($business['Business']['average_price'])): ?>
										<li class="bloco-right">
											<h3 class="row">Média de Preço por Pessoa</h3>
											<span class="row"><?= $business['Business']['average_price'] ?></span>
										</li>
										<?php endif; ?>
									</ul>
									<?php endif; ?>
									<ul class="sub-conteudo">
										<li class="bloco-left">
											<h3 class="row">Região</h3>
											<span class="row"><?= $business['Business']['region'] ?></span>
										</li>
										<li class="bloco-right">
											<h3 class="row">Funcionamento</h3>
											<span class="row">
												<?= $business['Business']['business_hours'] ?>
											</span>
										</li>
									</ul>
									<ul class="sub-conteudo" style="border-bottom:none;">
										<li class="bloco-left">
											<h3 class="row">Estacionamento</h3>
											<span class="row"><?= $business['Business']['parking'] ?></span>
										</li>
										<li class="bloco-right">
											<h3 class="row">Manobrista</h3>
											<span class="row"><?= $business['Business']['valet'] ?></span>
										</li>
									</ul>
								</div>
							</div>
							
							<div id="tabs-2">
								<div class="row">
									<div id="map_canvas"></div>
								</div>
							</div>
							<div id="tabs-3">
								<div class="box-galeria-estabelecimento">
									
									<ul>
										<?php foreach($business['File'] as $file): ?>
											<li><a href="#"><img  href="<?= $_URL_FILE; ?>businesses/fotos/640x480-<?= $file['name']?>" title="<?= $file['titulo']?>" class="janela-modal img-border border"  src="<?= $_URL_FILE; ?>businesses/fotos/640x480-<?= $file['name']?>" width="130" /></a></li>
										<?php endforeach; ?>
									</ul>
								</div>
							</div>
							<div id="tabs-4">
								<div class="row">
									<div class="seven columns">
										<div id="map_canvas"></div>
									</div>
									<div class="five columns nesta-area">
										<h3 class="row mb10">Confira os estabelecimentos mais próximos!</h3>
									
										
										<!--Categoria
										<div class="mt5 mb5">
											<a href=""><?= $business['Category']['name'] ?></a>
										</div>-->
										<ul>
											<?php if(count($mesmasareas)>1): ?>
											<?php foreach($mesmasareas as $nestaarea): ?>
												<?php if($nestaarea['Business']['id'] != $business['Business']['id']): ?>
													<!--Estabelecimentos-->
													<li>
														<a href="/estabelecimentos/ver/<?= $nestaarea['Business']['url'] ?>"><?= $nestaarea['Business']['name'] ?></a>
													</li>
												<?php endif; ?>
											<?php endforeach; ?>
											<?php else: ?>
												Não há nenhum outro estabelecimento próximo.
											<?php endif; ?>
										</ul>
										
									</div>
								</div>
							</div>
					</div>
				</div>
				<?php } ?>

				<div class="line-drop-1"></div>
				<div class="line-drop-1"></div>
				
				
				</div>
				
				
				
				<div class="row" id="avaliacoes">
					
					<div class="box-avaliacao0">
						<a href="#dialog" name="modal">JÁ ESTEVE NO(A) <span><?= $business['Business']['name'] ?></span> ? CLIQUE AQUI E AVALIE ESSE ESTABELECIMENTO</a>
					</div>

				</div>
				<!--galeria de fotos do post
				<div class="row mt20">
					<ul class="galeria-fotos">
						<li><a class="janela-modal" title="Título da imagem" href="/img/exemplo-diversao1.png"><img src="/img/exemplo-galeria-interna1.png" /></a></li>
						<li><a class="janela-modal" title="Título da imagem" href="/img/exemplo-diversao1.png"><img src="/img/exemplo-galeria-interna2.png" /></a></li>
					</ul>
				</div>-->
				
				
				<!--bloco de comentários
				<div class="row mt20">
					<div class="row mb20">
						<span class="icon-comments"></span>
						<h2>Comentários</h2>
					</div>
					<div class="fb-comments" data-href="<?= $current_url ?>" data-width="630"></div>
				</div>
				-->
				<?php if(!empty($avaliacoes)): ?>
				<h1 class="mt20"> comentários</h1>
				<div class="row mt10">
					<ul class="list-commentarios">
						<?php foreach($avaliacoes as $avaliacao): ?>
						<li>
							<div class="one column">
								<img class="avatar-comments" src="/img/avatar-comments.png" width="100%"/>
							</div>
							<div class="nine columns">
								<h3 class="name-comments"><?= $avaliacao['Review']['nome'] ?></h3>
								<div class="row date-comments">
									<?= date("d/m - H:i", strtotime($avaliacao['Review']['created'])) ?>
								</div>
								<div><?= $avaliacao['Review']['comentario']  ?></div>
							</div>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<?php endif; ?>
			</div>
		</div>
<!-- COLUNA DA DIREITA ONDE TEM OS BANNERS E OS MAIS VISTOS -->
		<div class="four columns">
			
			<div class="row mb20">
				
				<?php if(!empty($b_h_interno) && isset($b_h_interno)){ ?>
				<?php if($b_h_interno['Banner']['tipo'] != 'image'){ ?>
					<a title="<?= $b_h_interno['Banner']['text_hover'] ?>" target="<?= $b_h_interno['Banner']['target'] ?>" href="<?= $b_h_interno['Banner']['link'] ?>" class='click' data-click="<?= $b_h_interno['Banner']['id'] ?>">
						<img src="<?= $_URL_FILE; ?>banners/fotos/<?= $b_h_interno['Banner']['image'] ?>"   />
					</a>
				<?php } else { 	
					 //echo $b_h_internotronomia['Banner']['cod'];
					?> 
				 	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
						<!-- Anuncio Cambui 300 250 gastronomia -->
						<ins class="adsbygoogle"
						     style="display:inline-block;width:300px;height:250px"
						     data-ad-client="ca-pub-4475543678910973"
						     data-ad-slot="9710819406"></ins>
						<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
					
				 <? } 
				} ?>
				
				<div class="mais-vistos">
					<div class="row">
						<div class="box-categoria bdge">
							<div class="icon-categoria-default"></div>
							<span>mais vistos</span>
						</div>
					</div>
					<ul class="listagem">
						<?php foreach($maislidas as $key => $maislida): ?>
							<li>
								<div class="row">
									<div class="two columns">
										<span class="row num"><a class="color" href="/estabelecimentos/ver/<?= $maislida['Business']['url'] ?>"><?= $key+1 ?>º</a></span>
									</div>
									<div class="ten columns">
										<span class="row titulo"><a class="color" href="/estabelecimentos/ver/<?= $maislida['Business']['url'] ?>"><?= $maislida['Business']['name'] ?></a></span>
										
										<span class="row local"><a class="color" href="/estabelecimentos/ver/<?= $maislida['Business']['url'] ?>"><?= $maislida['Business']['address']?></a></span>
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
<!-- FIM DA COLUNA DA DIREITA ONDE TEM OS BANNERS E OS MAIS VISTOS -->		
	</div>
</div>

<script type="text/javascript">

$(document).ready(function() {	

	$('a[name=modal]').click(function(e) {
		e.preventDefault();
		
		var id = $(this).attr('href');
	
		var maskHeight = $(document).height();
		var maskWidth = $(window).width();
	
		$('#mask').css({'width':maskWidth,'height':maskHeight});

		$('#mask').fadeIn(1000);	
		$('#mask').fadeTo("slow",0.8);	
	
		//Get the window height and width
		var winH = $(window).height();
		var winW = $(window).width();
              
		$(id).css('top',  winH/2-$(id).height()/2);
		$(id).css('left', winW/2-$(id).width()/2);
	
		$(id).fadeIn(2000); 
	
	});
	
	$('.window .close').click(function (e) {
		e.preventDefault();
		
		$('#mask').hide();
		$('.window').hide();
	});		
	
	$('#mask').click(function () {
		$(this).hide();
		$('.window').hide();
	});			
	
});

</script>
<!-- Fim Janela Modal com caixa de diálogo -->  

