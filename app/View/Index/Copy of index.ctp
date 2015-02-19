<?php //debug($slides); ?>
<script language="javascript">
	$(document).ready(function(){
	    /*
	     * Mostra popup dhtml
	     */
	    /*window.setTimeout(function() {
			$('.banner-dhtml').show(function(){
			 
				window.setTimeout(function() {
					$('.banner-dhtml').hide();
				}, 15000);
			})
		}, 2000);
		
		$('.fechar-popup').click(function(){
			$('.banner-dhtml').hide();
		})*/
	});
</script>
			

<script>
	
	$(document).ready(function(){
		$('.click_slide').click(function(){
			var baner = $(this);
			$.ajax({
			    url:'/clicks/count_click_slide/Slide/'+baner.attr('data-click'),
			    type:'POST',
				 	beforeSend: function(){
				  },
				  	success: function(content) {
						return true;
				  },
				  	error: function(content) {
						return false;
				  }		   
	
			});		
		})
	})
	
</script>


<div class="row"></div>
<div class="row mt20 mb20">
	<div class="galerias six columns">
		<div class="bloco-8">
			<div class="row">
				<div class="row">
					<span class="icon-categoria"></span><span class="titulo-categoria color-link"><a href="/galerias">Fotos no Cambuí</a></span>
				</div>

				<div id="slides10">
					<div class="slides_container">
						
						<?php foreach($galerias as $key =>$galeria): ?>
							
							<a href="/galeria/ver/<?= $galeria['Galeria']['id'] ?>" title="">
								<img src="<?= $_URL_FILE; ?>galleries/fotos/640x480-<?= $galeria['File'][0]['name']?>" width="640" height="480"/>
								<div class="box-post-destaque">
									<div class="row">
										<div class="post-destaque-categoria upper"><?= $galeria['Galeria']['titulo'] ?></div>
										<div class="icon-destaque-categoria"></div>
									</div>
									<div class="row">
										<div class="post-destaque-titulo">
											<div class="three columns">
												
												<span class="icon-data"></span>
												<div class="box-data">
													<span class="texto-data1">data</span>
													<span class="texto-data2"><?= $galeria['Galeria']['data'] ?></span>
												</div>
												
											</div>
											<div class="nine columns">
												
												<span class="icon-local"></span>
												<div class="box-local">
													<span class="texto-local1">Visualizações</span>
													<span class="texto-local2"><?= $galeria['Galeria']['view'] ?></span>
												</div>
												
											</div>
										</div>
									</div>
								</div>
							</a>
						<?php endforeach; ?>						
						
					</div>
					<div class="row mt10">
						<div class="nine columns">
							<a class="link-ver-todas mt5" href="/galerias">Ver mais Fotos</a>
						</div>
						<div class="three columns">
							<a href="#?" class="prev5"><center><img src="/img/prev.png" alt="Anterior"></center></a>
							<a href="#?" class="next5"><center><img src="/img/next.png" alt="Próximo"></center></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="agenda six columns">
		<div class="bloco-9">
			<div class="row">
				<div class="row">
					<div class="f-left">
						<span class="icon-categoria"></span>
						<span class="titulo-categoria color-link"><a href="/agenda">Agenda</a></span>
					</div>
				</div>
				<div class="row">
					<div class="three columns">
						<span class="dia-num1"><?= date('d')?></span>
						<div class="dia-ext1">
							<span><?= $this->Data->convertWeek(date('D')); ?></span>
						</div>
					</div>
					<div class="nine columns">
						<span class="listagem-programacao-texto1">hoje</span>
						<ul class="listagem-programacao mt10">
							<?php foreach($schedulesBoxRight as $schedulesNav): ?>
							<li>
								<div class="row">
									<a href="/agenda/ver/<?= $schedulesNav['Schedule']['url'] ?>"> 
										<b><?= date("H:i", strtotime($schedulesNav['Schedule']['schedule'])) ?></b>
										- <?= $schedulesNav['Schedule']['title'] ?>
									</a>
								</div>
							</li>
							<?php endforeach ?>
						</ul>
					</div>
				</div>
				<div class="row box-divisao mt10 mb10"></div>
				<div class="row mt20">
					
					<div class="carousel">
						<ul class="paginacao-programacao-home">
							
							<?php 
								$montaCalendario = $this->Data->calendar(date("Y-m-d"),'all/0'); 
								foreach($montaCalendario['dias'] as $dias){
									echo $dias;
								}
							?>
						</ul>
						<button class="prev"></button>
						<button class="next"></button>
					</div>
					
					
				</div>
			</div>
		</div>
	</div>
</div>








<div class="row box-divisao mt20"></div>
<div class="gastronomia  row mt20 mb20">
	<div class="bloco-3">
		<div class="eight columns posts">
			<div class="row">
				<span class="icon-categoria"></span><span class="titulo-categoria color-link"><a href="/estabelecimentos/gastronomia">Gastronomia</a></span>
			</div>
			<div class="row mt10 filtroGeral-home">
				<div class="filtroGeral">
					<div id="tabs-1">
						<div class="row mt10"> <!--gastronomia-->
							<?php foreach($gastronomiashome as  $gastronomiahome): ?>
							
							<div class="four columns">
								<div class="row">
									<a href="/estabelecimentos/ver/<?= $gastronomiahome['Business']['url']?>">
										<img class="img-border border" src="<?= $_URL_FILE ?>businesses/fotos/318x177-<?= $gastronomiahome['Business']['image'] ?>" style="height: 85px; width:100%;"/>
									</a>
								</div>
								<div class="row">
									<span class="nome"><a href="/estabelecimentos/ver/<?= $gastronomiahome['Business']['url']?>"><?= $gastronomiahome['Business']['name'] ?></a></span>
									<span class="endereco mb5">Local: <?= $this->Caracter->_getLimit($gastronomiahome['Business']['address'], 25)  ?>...</span>
									<span class="texto1">Aberto:</span>
									<div class="texto2"><?= $this->Caracter->_getLimit($gastronomiahome['Business']['business_hours'], 30) ?>...</div>
									<!--<span class="texto4">1 Pedaço por R$4,00</span>-->
								</div>
							</div>
							
							<?php endforeach; ?>
						</div>
						<div class="row mt20">
							<?php if(count($banner_home_gastronomia) >=1 ){  //debug($banner_home_gastronomia);  //banner_home_gastronomia  ?> 
								<?php foreach($banner_home_gastronomia as $banner_home_gas){ /*debug($banner_home_gas);*/?> 
									
									<?php if($banner_home_gas['Banner']['tipo'] == 'image'){ ?>
										<a target="<?= $banner_home_gas['Banner']['target'] ?>" href="<?= $banner_home_gas['Banner']['link'] ?>" class='click' id='banner_gastronomia' data-click="<?= $banner_home_gas['Banner']['id'] ?>">
											<img src="<?= $_URL_FILE; ?>banners/fotos/<?= $banner_home_gas['Banner']['image'] ?>"  width="<?php echo $banner_home_gas['LocalBanner']['width']?>" height="<?php echo $banner_home_gas['LocalBanner']['height']?>" />
										</a>
									<?php } else { ?>	
										<?= $banner_home_gastronomia['Banner']['cod'] ?>
									<?php } ?>
								<?php } ?>
							<?php } ?>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<div class="four columns">
			<?php echo $this->element('bloco_form_busca_gastronomia'); ?>
		</div>
	</div>
</div>
<div class="row box-divisao"></div>
<div class="row mt20 mb20">
	<!--Vantagem-->
	<div class="tree columns">
		<?php if(isset($vantagens['Advantage'])){ ?>
			<div class="vantagens">
				<div class="bloco-4">
					<div class="row">
						<span class="icon-categoria"></span><span class="titulo-categoria color-link"><a href="/vantagem">Vantagem do dia</a></span>
					</div>
					<div class="row mt5 relative"  style="margin-top:5px; padding-bottom:36px;">
						<?php if(isset($vantagens['Advantage']['price']) && !empty($vantagens['Advantage']['price'])){ ?>
							<span class="percentual">
								- <?= $this->Percent->_getDescont($vantagens['Advantage']['price'], $vantagens['Advantage']['price_to']) ?> %
							</span
						<?php }?>
							
						<a href="/vantagens/ver/<?= $vantagens['Advantage']['url'] ?>"><img class="img-border border" style="" src="<?= $_URL_FILE ?>advantages/fotos/226x263-<?= $vantagens['Advantage']['image'] ?>" width="100%"/></a>
						<div class="row vantagem-home" style="">
							<div class="post-destaque-categoria">
								<div class="icon-categoria-default"></div>
								<span><a href="/vantagens/ver/<?= $vantagens['Advantage']['url'] ?>"><?= $vantagens['Advantage']['title'] ?></a></span>
							</div>
							<div class="icon-destaque-categoria"></div>
						</div>
					</div>
					
					
					<div class="row relative vantagem-home2 mt5">
						
							<div class="five columns mt5">
								<div class="icon-relogio"></div>
									<div class="teaser mt5">
						           		<div class="tp">
						                    <div id="no-reflection" class="no-reflection"></div>
						                </div>
						            </div>
					        </div>
					        <div class="seven columns">
						        <div class="destaque-oferta oferta-home">
						        	<small><span>De 
						        	<b>R$ <?= $vantagens['Advantage']['price'] ?></b>  </span> </small><br />
						        	<span>Por
						        	<b> R$ <?= $vantagens['Advantage']['price_to'] ?></b></span>
						        </div>
					        </div>
					        
						
					</div>

				</div>
			</div>
		<?php } ?>
	</div>
	<!--fim Vantagem-->
	
	<!--Diversao-->
	<div class="four columns diversao" style="padding-right:10px;">
		<div class="bloco-5">
			<div class="posts">
				<div class="row">
					<span class="icon-categoria"></span><span class="titulo-categoria color-link"><a href="/diversao">Diversão</a></span>
				</div>
				
				<?php foreach($diversaohome as $key => $diverhome): ?>				
					<div class="row list-posts mb10 mt5">
						<?php if($key==0): ?>
							<div class="row">
								<a href="/estabelecimentos/ver/<?= $diverhome['Business']['url'] ?>"><img class="img-border border" src="<?= $_URL_FILE ?>businesses/fotos/318x177-<?= $diverhome['Business']['image'] ?>"  style="height: 150px; width:100%;"/></a>
							</div>
						<?php endif; ?>
						<div class="row">
							<a href="">
								<span class="texto1"><?= $diverhome['Business']['name'] ?></span>
								<span class="texto2"><?= $diverhome['Category']['name'] ?></span>
								<div class="texto3"><?= $this->Caracter->_getLimit($diverhome['Business']['address'], 50)?>...</div>
							</a>
						</div>
					</div>
				<?php endforeach; ?>
				
				
			</div>
		</div>
	</div>
	<!--fim Diversao-->
	
	<!--Bem estar-->
	<div class="four columns bem-estar">
		<div class="bloco-6">
			<div class="posts">
				<div class="row">
					<span class="icon-categoria"></span><span class="titulo-categoria color-link"><a href="/bem-estar">Bem Estar</a></span>
				</div>
				<?php foreach($bemestarhome as $key => $bemhome): 
				//debug($bemhome['Business']['url']);
				?>
				
				
					<div class="row list-posts mb10 mt5">
						<?php if($key==0): ?>
							<div class="row">
								<a href="/estabelecimentos/ver/<?php echo $bemhome['Business']['url']; ?>"><img class="img-border border" src="<?= $_URL_FILE ?>businesses/fotos/318x177-<?= $bemhome['Business']['image'] ?>"  style="height: 150px; width:100%;"/></a>
							</div>
						<?php endif; ?>
						<div class="row">
							<a href="">
								<span class="texto1"><?= $bemhome['Business']['name'] ?></span>
								<span class="texto2"><?= $bemhome['Category']['name'] ?></span>
								<div class="texto3"><?= $this->Caracter->_getLimit($bemhome['Business']['address'], 50) ?>...</div>
							</a>
						</div>
					</div>
				<?php endforeach; ?>				
			</div>
		</div>
	</div>
	<!--fim Bem estar-->
	
	<div class="one column">
		<?php if(count($banner_home_bem_estar) >=1 ):?>
			<?php foreach($banner_home_bem_estar as $banner_home_bem): ?> 
				<?php if($banner_home_bem['Banner']['tipo'] == 'image'): ?>
					<a target="<?= $banner_home_bem['Banner']['target'] ?>" href="<?= $banner_home_bem['Banner']['link'] ?>" class='click' id='banner_bemestar' data-click="<?= $banner_home_bem['Banner']['id'] ?>">
						<img src="<?= $_URL_FILE; ?>banners/fotos/<?= $banner_home_bem['Banner']['image'] ?>"  width="<?php echo $banner_home_bem['LocalBanner']['with'];?>" height="<?php echo $banner_home_bem['LocalBanner']['height'];?>" />
					</a>
				<?php else: ?>	
					<?= $banner_home_bem_estar['Banner']['cod'] ?>
				<?php endif; ?>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>
<div class="row mt20 mb20">
	<?php if(count($banner_home_group_banners1) >=1 ):?>
		<?php foreach($banner_home_group_banners1 as $banner_home_group1): ?> 
			<div class="four columns">
				<?php if($banner_home_group1['Banner']['tipo'] == 'image'): ?>
					<a target="<?= $banner_home_group1['Banner']['target'] ?>" href="<?= $banner_home_group1['Banner']['link'] ?>" class='click' id='banner_homegroups' data-click="<?= $banner_home_group1['Banner']['id'] ?>">
						<img src="<?= $_URL_FILE; ?>banners/fotos/<?= $banner_home_group1['Banner']['image'] ?>"  width="<?php echo $banner_home_group1['LocalBanner']['width']; ?>" height="<?php echo $banner_home_group1['LocalBanner']['height']; ?>" />
					</a>
				<?php else: ?>	
					<?= $banner_home_group_banners1['Banner']['cod'] ?>
				<?php endif; ?>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
</div>










<div class="row mt20">
	<div class="bloco-1 eight columns">
		<div class="row  destaque">
			<div class="row">
				<span class="icon-categoria"></span><span class="titulo-categoria">Destaque**</span>
			</div>
			<div class="mt5" id="slides1">
				<div class="slides_container1">
					<?php foreach($slides as $slide){ ?>
						<a href="<?= $slide['Slide']['link']?>" target="<?= $slide['Slide']['target']?>"  itle="" class="click_slide" data-click="<?= $slide['Slide']['id']?>">
							<img src="<?= $_URL_FILE.'slides/fotos/635x360-'.$slide['Slide']['image']; ?>"/>	
							<div class="box-post-destaque">
								<div class="row">
									<div class="post-destaque-categoria upper bdge alpha60">
										<div class="icon-categoria-default"></div>
										<span><?= $slide['Slide']['title']?></span>
									</div>
									<div class="icon-destaque-categoria"></div>
								</div>
								<div class="row">
									<div class="post-destaque-titulo bdge alpha60" ><?= $slide['Slide']['subtitle']?></div>
								</div>
							</div>
						</a>
					<?php } ?>
				</div>
				<div class="row box-prev-next">
					<center>
						<a href="#?" class="prev1">Anterior</a>
						<a href="#?" class="next1">Próximo</a>
					</center>
				</div>
			</div>
		</div>
	</div>
	<div class="noticias four columns">
		<div class="row bloco-2">
			<div class="row">
				<span class="icon-categoria"></span><span class="titulo-categoria color-link"><a href="/noticias">Últimas Notícias</a></span>
			</div>
			
			<div class="mt5" id="slides2">
				<div class="slides_container2">
					<div class="slide">
					<?php
						$i = 1;
					?>		
				
						<?php foreach($newshome as $key=>$newhome): ?>

								<div class="row mb20">
									<a href="/noticias/ver/<?= $newhome['News']['url'] ?>">
										<img src="<?= $_URL_FILE ?>news/fotos/318x177-<?= $newhome['News']['image'] ?>" width="100%" height="85px" /><!--160x70-->
										<div class="box-post-destaque">
											<div class="row">
												<div class="post-destaque-categoria upper bdge alpha60">
													<div class="icon-categoria-default"></div>
													<span><?= $newhome['Category']['name'] ?></span>
												</div>
												<div class="icon-destaque-categoria"></div>
											</div>
											<div class="row">
												<div class="post-destaque-titulo bdge alpha60"><?= $newhome['News']['title'] ?></div>
											</div>
										</div>	
									</a>
								</div>
								<?php if($i==2) :?>13
								<?php $i=0 ?>
									
									<?php if($key <= 5): ?>
										</div>
										<div class="slide">
									<?php endif; ?>
							<?php endif ?>
							<?php $i++?>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="row box-prev-next">
					<center>
						<a href="#?" class="prev2">Anterior</a>
						<a href="#?" class="next2">Próximo</a>
					</center>
				</div>
			</div>			
		</div>
	</div>
</div>

<div class="row box-divisao"></div>
<div class="row mt20 mb20">
	<div class="autos six columns">
		<div class="bloco-7">
			<div id="tabs2" class="nav-tabs2 row posts">
				<div class="row">
					<div class="f-left">
						<span class="icon-categoria2"></span>
						<span class="titulo-categoria2 color-link"><a href="/autos">Autos</a></span>
					</div>
					<ul class="f-right">
						<li><a href="#tabs-1">Super Oferta</a></li>
						<li class="last"><a href="#tabs-2">Últimos Cadastrados</a></li>
					</ul>
				</div>
				<div id="tabs-1">	
					<div id="slides3" class="mt10">
						<div class="slides_container3">
							<?php foreach($autos as $auto): ?>
							<a href="/autos/ver/<?= $auto['Auto']['id'] ?>">
								<div class="row">
									<div class="six columns">
										<img src="<?= $_URL_FILE; ?>autos/fotos/B-<?= $auto['File'][0]['name']?>" style="max-height:115px; min-width:100%; "/>
									</div>
									<div class="six columns">
										<span class="row titulo"><?= $auto['Auto']['modelo'] ?> - R$ <?= $auto['Auto']['preco'] ?></span>
										<span class="row texto1">Kilometragem: <?= $auto['Auto']['quilometragem'] ?>km</span>
										<span class="row texto1">Ano: <?= $auto['Auto']['ano_fabricacao'] ?></span>
										<span class="row texto2"><b>Anunciante:</b> <?= $auto['Auto']['nome'] ?></span>
										<button class="button button-radius button-categoria mt5">Quero Comprar</button>
									</div>
								</div>
							</a>
							<?php endforeach; ?>
						</div>
						<div class="row box-prev-next">
							<div class="sub-box-prev-next">
								<a href="#?" class="prev3">Anterior</a>
								<a href="#?" class="next3">Próximo</a>
							</div>
						</div>
					</div>
				</div>
				<div id="tabs-2">
					<div id="slides4" class="mt10">
						<div class="slides_container3">
							<?php foreach($autosUltimos as $auto): ?>
							<a href="/autos/ver/<?= $auto['Auto']['id'] ?>">
								<div class="row">
									<div class="six columns">
										<img src="<?= $_URL_FILE; ?>autos/fotos/B-<?= $auto['File'][0]['name']?>" style="max-height:115px; min-width:100%; "/>
									</div>
									<div class="six columns">
										<span class="row titulo"><?= $auto['Auto']['modelo'] ?> - R$ <?= $auto['Auto']['preco'] ?></span>
										<span class="row texto1">Kilometragem: <?= $auto['Auto']['quilometragem'] ?>km</span>
										<span class="row texto1">Ano: <?= $auto['Auto']['ano_fabricacao'] ?></span>
										<span class="row texto2"><b>Anunciante:</b> <?= $auto['Auto']['nome'] ?></span>
										<button class="button button-radius button-categoria mt5">Quero Comprar</button>
									</div>
								</div>
							</a>
							<?php endforeach; ?>
						</div>
						<div class="row box-prev-next">
							<div class="sub-box-prev-next">
								<a href="#?" class="prev3">Anterior</a>
								<a href="#?" class="next3">Próximo</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="imoveis six columns">
		<div class="bloco-8">
			<div id="tabs3" class="nav-tabs2 row posts">
				<div class="row">
					<div class="f-left">
						<span class="icon-categoria2"></span>
						<span class="titulo-categoria2 color-link"><a href="/imoveis">Imóveis</a></span>
					</div>
					<ul class="f-right">
						<li><a href="#tabs-1">Super Oferta</a></li>
						<li class="last"><a href="#tabs-2">Últimos Cadastrados</a></li>
						
					</ul>
				</div>
				<div id="tabs-1">	
					<div id="slides6" class="mt10">
						<div class="slides_container3">
							<?php foreach($imoveis as $imovel): ?>
							<a href="/imoveis/ver/<?= $imovel['Imovei']['id'] ?>">
								<div class="row">
									<div class="six columns">
										<img src="<?= $_URL_FILE; ?>imoveis/fotos/B-<?= $imovel['File'][0]['name']?>" width="100%"  />
									</div>
									<div class="six columns">
										<span class="row titulo"><?= $imovel['Imovei']['tipo'] ?> - R$ <?= $imovel['Imovei']['preco'] ?></span>
										<span class="row texto1">Finalidade: <?= $imovel['Imovei']['situacao'] ?></span>
										<span class="row texto1">Quartos: <?= $imovel['Imovei']['quartos'] ?></span>
										<span class="row texto2"><b>Anunciante:</b> <?= $imovel['Imovei']['vendedor'] ?></span>
										<button class="button button-radius button-categoria mt5">Quero Comprar</button>
									</div>
								</div>
							</a>
							<?php endforeach; ?>
						</div>
						<div class="row box-prev-next">
							<div class="sub-box-prev-next">
								<a href="#?" class="prev3">Anterior</a>
								<a href="#?" class="next3">Próximo</a>
							</div>
						</div>
					</div>
				</div>
				<div id="tabs-2">
					<div id="slides7" class="mt10">
						<div class="slides_container3">
							<?php foreach($imoveisUltimos as $imovel): ?>
							<a href="/imoveis/ver/<?= $imovel['Imovei']['id'] ?>">
								<div class="row">
									<div class="four columns">
										<img src="<?= $_URL_FILE; ?>imoveis/fotos/B-<?= $imovel['File'][0]['name']?>" width="100%"/>
									</div>
									<div class="eight columns">
										<span class="row titulo"><?= $imovel['Imovei']['tipo'] ?> - R$ <?= $imovel['Imovei']['preco'] ?></span>
										<span class="row texto1">Finalidade: <?= $imovel['Imovei']['situacao'] ?></span>
										<span class="row texto1">Quartos: <?= $imovel['Imovei']['quartos'] ?></span>
										<span class="row texto2"><b>Anunciante:</b> <?= $imovel['Imovei']['vendedor'] ?></span>
										<button class="button button-radius button-categoria mt5">Quero Comprar</button>
									</div>
								</div>
							</a>
							<?php endforeach; ?>
						</div>
						<div class="row box-prev-next">
							<div class="sub-box-prev-next">
								<a href="#?" class="prev3">Anterior</a>
								<a href="#?" class="next3">Próximo</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row mt20">
	<?php if(count($banner_home_group_banners2) >=1 ):?>
		<?php foreach($banner_home_group_banners2 as $banner_home_group2): ?> 
			<div class="three columns">
				<?php if($banner_home_group2['Banner']['tipo'] == 'image'): ?>
					<a target="<?= $banner_home_group2['Banner']['target'] ?>" href="<?= $banner_home_group2['Banner']['link'] ?>" class='click' id='banner_homegroups2' data-click="<?= $banner_home_group2['Banner']['id'] ?>">
						<img src="<?= $_URL_FILE; ?>banners/fotos/<?= $banner_home_group2['Banner']['image'] ?>"  width="<?php echo $banner_home_group2['LocalBanner']['width']; ?>" height="<?php echo $banner_home_group2['LocalBanner']['height']; ?>" />
					</a>
				<?php else: ?>	
					<?= $banner_home_group_banners2['Banner']['cod'] ?>
				<?php endif; ?>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
</div>
<!--slide agenda home-->
<script type="text/javascript">
	$(".carousel").jCarouselLite({
	    btnNext: ".next",
	    btnPrev: ".prev",
	    start: <?= $montaCalendario['currentView'] + 2; ?>,
	});
</script>