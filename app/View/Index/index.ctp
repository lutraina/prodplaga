<?php //echo $regiao[0]['Regions']['nome_regiao']; //debug($slides); ?>
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
	
	/*$(document).ready(function(){
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
	})*/
</script>



<!--noticias da home + google banner-->
	
<div class="row noticias_cadre">
	<div style="width:100%; height:400px; background-color:#fff; float:left; margin-bottom:30px;">
		<div>
			<img style="padding:0;" class="" src="/img/noticias_titulo_quadro.jpg" alt=""/>
		</div>
		<div style="float:left; width:67%; margin-left: 9px;">
			<?php //debug($newshome[0]['News']);
			?>
			
			<div id="featured" >  
					<ul class="ui-tabs-nav">  
					<?php $i = 1; foreach($newshome as $key=>$newhome){ ;
						if($i < 4){?>
	    
	        				<li class="ui-tabs-nav-item ui-tabs-selected" id="nav-fragment-<?php echo $i; ?>">
	        					<a href="#fragment-<?php echo $i; ?>" style="width:280px;">
	        						<div style="background-color:#F89321; height:88px; width:130px; float:left; margin-bottom:0px; margin-left:5px; margin-right:8px;">
	        							<img style="padding:0; margin-top:11px;" class="img_pequena_noticias" src="<?= $_URL_FILE ?>news/fotos/318x177-<?= $newshome[$i]['News']['image'] ?>" alt="" width="120" height="85"/>
	        						</div>
	        						<span>
		        						<div class="li_nav_cat"><?= $newshome[$i]['Category']['name'] ?></div> 
		        						<div style="height:40px;"><?= $newshome[$i]['News']['title'] ?></div>
	        						</span>
	        					</a>
	        				</li>
	        				  
	    			<? $i++; } } $i=0;?>
    			</ul>  
			    <!-- Content --> 
			    
			    	 
			    <div id="fragment-1" class="ui-tabs-panel" style="">  
			        <img style="margin-top:35px;" src="<?= $_URL_FILE ?>news/fotos/318x177-<?= $newshome[0]['News']['image'] ?>" alt="" width="400" height="300"/>  
			        <div class="info" >
			        	<h2><a href="#" ><?= $newshome[$i]['News']['title'] ?></a></h2>  
			        </div>  
			    </div>  
			</div>
		</div>	<!--end cadre noticias-->		 

		<div style="float:left; width:31%; padding-top: 40px; background-color: #fff;">
			<!--google banner-->
			<!--<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>-->
				<!-- Anuncio Cambui 300 250 gastronomia -->
				<!--<ins class="adsbygoogle"
				     style="display:inline-block;width:300px;height:250px"
				     data-ad-client="ca-pub-4475543678910973"
				     data-ad-slot="9710819406"></ins>
				<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
			</script>-->
		</div>	<!--end cadre google banner-->
		
	</div>
</div><!--end cadre blanc noticias + google banner-->
	
	
	<!--<div style="width:729px;">-->
		<!--<img style="width:100%" class="banner1" src="/img/banner1.jpg" />-->
		<!--<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<ins class="adsbygoogle"
			     style="display:inline-block;width:729px;height:89px"
			     data-ad-client="ca-pub-4475543678910973"
			     data-ad-slot="9710819406"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>-->
 
	

<!--fotos et vantagens-------->
<div class="row mt20 mb20 vantagens_fundo" style="">
	<div class="galerias six columns">
		<div class="bloco-8">
			<div class="row">
				<div class="row">
					<!--icone e titulo fotos no cambui-->
				</div>

				<div id="slides10" style="margin-left:10px; margin-top:60px;">
					<div class="slides_container">
						
						<?php foreach($galerias as $key =>$galeria): ?>
							
							<a href="/galeria/ver/<?= $galeria['Galeria']['id'] ?>" title="">
								<img src="<?= $_URL_FILE; ?>galleries/fotos/640x480-<?= $galeria['File'][0]['name']?>" width="440" height="250"/>
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
					<div class="row mt10" style="z-index:999;">
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
</div>
	
	<!-- agenda-->
	
	
	<!--test agenda-->
	<div class="agenda_cult" style="">
	
	
		<div class="">
			<div class="bloco-9">
				<div class="row mt20">
					<div class="carousel" style="margin-top:21px; ">
						<ul class="paginacao-programacao-home">
							
							<?php 
								$montaCalendario = $this->Data->calendar(date("Y-m-d"),'all/0'); 
								foreach($montaCalendario['dias'] as $dias){
									?> <div style=""><?php echo $dias; ?> </div><?php
								}
							?>
						</ul>
						
						<button class="next"></button>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row" style="">
			<div class="row">
				<div class="">
					<ul style="float:left; width:97%; background:#fff; padding:10px;">
						<?php foreach($agendaHome as $agenda_items){ ?>
							<li style="width:200px; padding:5px; height:100px;float:left; background:#ddd; margin-left:20px; margin-bottom:15px; ">
								<?php echo $agenda_items['Category']['name']; ?>
								<br/>
								<?php echo $agenda_items['Schedule']['title']; ?>
							</li>
						<?php } ?>	
					</ul>
				</div>
			</div>
		</div>			
								
		
					
	</div>	
	
	
	<div class="four columns">
			<?php echo $this->element('bloco_form_busca_gastronomia'); ?>
			
			<div class="google_banner_300_600" style="margin-top: 30px; margin-left: -10px; float:left; width:300; height: 600px; background-color: #fff;">
				<!--google banner-->
				<!--<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>-->
					<!-- Anuncio Cambui 300 250 gastronomia -->
					<!--<ins class="adsbygoogle"
					     style="display:inline-block;width:300px;height:600px"
					     data-ad-client="ca-pub-4475543678910973"
					     data-ad-slot="9710819406"></ins>
					<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
				</script>-->
			</div>	<!--end cadre google banner-->
		
			<div style="margin-top:35px; margin-left:-10px; float:left;">
				<!--google banner-->
				<!--<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>-->
					<!-- Anuncio Cambui 300 250 gastronomia -->
					<!--<ins class="adsbygoogle"
					     style="display:inline-block;width:300px;height:250px"
					     data-ad-client="ca-pub-4475543678910973"
					     data-ad-slot="9710819406"></ins>
					<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
				</script>-->
			</div>	<!--end cadre google banner-->
		
		
		</div>
	
	<div class="estabelecimentos_liste" style="">
	
	<!--bloco gastronomias-->
	<div class="gastronomia  row mt20 mb20" style="margin-left:325px; padding:5px 2px; border:none; width:600px; height:280px;">
		
		<!--gastronomia-->
		<div style="margin-left:150px; padding: 0.03em; margin-top:26px; color:bleu; font-weight:bold; font-size:17px; text-transform:uppercase;">
  			<?php echo $regiao[0]['Regions']['nome_regiao']; ?>
  		</div> 
			
			
		
		<div class="bloco-3" style="margin-top:0px;">
			
			<div class="columns posts">
			<div class="row">
				<!--titulo gastronomia-->
			</div>
			<div class="row mt10 filtroGeral-home">
				<div class="filtroGeral">
					<div id="tabs-1">
						<div class="row mt10"> <!--gastronomia-->
							<?php foreach($gastronomiashome as  $gastronomiahome): ?>
							
							<div class="four columns">
								<div class="row">
									<a href="/estabelecimentos/ver/<?= $gastronomiahome['Business']['url']?>">
										
										<?php if($gastronomiahome['Business']['image'] != ''){ ?>
											<img class="img-border border" src="<?= $_URL_FILE ?>businesses/fotos/318x177-<?= $gastronomiahome['Business']['image'] ?>" style="height: 105px; width:156px;"/>
										<?php } else { ?>
											<img class="img-border border" src="../../img/sem_logo.png" style="height: 105px; width:105px;"/>
										<?php }?>	
									</a>
								</div>
								<div class="row">
									<span class="nome"><a href="/estabelecimentos/ver/<?= $gastronomiahome['Business']['url']?>"><?= $gastronomiahome['Business']['name'] ?></a></span>
									<!--<span class="endereco mb5">Local: <?= $this->Caracter->_getLimit($gastronomiahome['Business']['address'], 25)  ?>...</span>-->
									<!--<span class="texto1">Aberto:</span>
									<div class="texto2"><?= $this->Caracter->_getLimit($gastronomiahome['Business']['business_hours'], 30) ?>...</div>
									-->
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
			<!--busque em restaurante-->
		</div>
	</div>
</div>

<!--servicos-->
<div class="gastronomia  row mt20 mb20" style="margin-left:325px; padding:5px 2px; border:none; width:600px; height:280px;">
		 <div style="margin-left:105px; padding: 0.04em;  margin-top:21px; color:orange; font-weight:bold; font-size:17px; text-transform:uppercase;">
  <?php echo $regiao[0]['Regions']['nome_regiao']; ?>  </div>
  <div class="bloco-3">
			
			<div class="  columns posts" style="margin-top:0px;">
			<div class="row">
				<!--titulo gastronomia-->
			</div>
			<div class="row mt10 filtroGeral-home">
				<div class="filtroGeral">
					<div id="tabs-1">
						<div class="row mt10"> <!--gastronomia-->
							<?php foreach($servicoshome as  $gastronomiahome): ?>
							
							<div class="four columns">
								<div class="row">
									<?php if($gastronomiahome['Business']['image'] != ''){ ?>
											<img class="img-border border" src="<?= $_URL_FILE ?>businesses/fotos/318x177-<?= $gastronomiahome['Business']['image'] ?>" style="height: 105px; width:156px;"/>
										<?php } else { ?>
											<img class="img-border border" src="../../img/sem_logo.png" style="height: 105px; width:105px;"/>
										<?php }?>
								</div>
								<div class="row">
									<span class="nome"><a href="/estabelecimentos/ver/<?= $gastronomiahome['Business']['url']?>"><?= $gastronomiahome['Business']['name'] ?></a></span>
									<!--<span class="endereco mb5">Local: <?= $this->Caracter->_getLimit($gastronomiahome['Business']['address'], 25)  ?>...</span>-->
									<!--<span class="texto1">Aberto:</span>
									<div class="texto2"><?= $this->Caracter->_getLimit($gastronomiahome['Business']['business_hours'], 30) ?>...</div>
									--><!--<span class="texto4">1 Pedaço por R$4,00</span>-->
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
			<!--busque em restaurante-->
		</div>
	</div>
</div>


<!--diversao-->
<div class="gastronomia  row mt20 mb20" style="margin-left:325px; padding:5px 2px; border:none; width:600px; height:280px;">
		<div style="margin-left:110px; padding: 0.03em;  margin-top:20px; color:red; font-weight:bold; font-size:17px; text-transform:uppercase;">
  <?php echo $regiao[0]['Regions']['nome_regiao']; ?>  </div>
  <div class="bloco-3">
			
			<div class="  columns posts" style="margin-top:0px;">
			<div class="row">
				<!--titulo gastronomia-->
			</div>
			<div class="row mt10 filtroGeral-home">
				<div class="filtroGeral">
					<div id="tabs-1">
						<div class="row mt10"> <!--gastronomia-->
							<?php foreach($diversaohome as  $gastronomiahome): ?>
							
							<div class="four columns">
								<div class="row">
									<?php if($gastronomiahome['Business']['image'] != ''){ ?>
											<img class="img-border border" src="<?= $_URL_FILE ?>businesses/fotos/318x177-<?= $gastronomiahome['Business']['image'] ?>" style="height: 105px; width:156px;"/>
										<?php } else { ?>
											<img class="img-border border" src="../../img/sem_logo.png" style="height: 105px; width:105px;"/>
										<?php }?>
								</div>
								<div class="row">
									<span class="nome"><a href="/estabelecimentos/ver/<?= $gastronomiahome['Business']['url']?>"><?= $gastronomiahome['Business']['name'] ?></a></span>
									<!--<span class="endereco mb5">Local: <?= $this->Caracter->_getLimit($gastronomiahome['Business']['address'], 25)  ?>...</span>-->
									<!--<span class="texto1">Aberto:</span>
									<div class="texto2"><?= $this->Caracter->_getLimit($gastronomiahome['Business']['business_hours'], 30) ?>...</div>
									--><!--<span class="texto4">1 Pedaço por R$4,00</span>-->
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
			<!--busque em restaurante-->
		</div>
	</div>
</div>



<!--moda-->
<div class="gastronomia  row mt20 mb20" style="margin-left:325px; padding:5px 2px; border:none; width:600px; height:280px;">
		<div style="margin-left:86px; padding: 0.03em;  margin-top:13px; color:red; font-weight:bold; font-size:17px; text-transform:uppercase;">
  <?php echo $regiao[0]['Regions']['nome_regiao']; ?>  </div>
  <div class="bloco-3">
			
			<div class=" columns posts" style="margin-top:0px;">
			<div class="row">
				<!--titulo gastronomia-->
			</div>
			<div class="row mt10 filtroGeral-home">
				<div class="filtroGeral">
					<div id="tabs-1">
						<div class="row mt10"> <!--gastronomia-->
							<?php foreach($modahome as  $gastronomiahome): ?>
							
							<div class="four columns">
								<div class="row">
									<?php if($gastronomiahome['Business']['image'] != ''){ ?>
											<img class="img-border border" src="<?= $_URL_FILE ?>businesses/fotos/318x177-<?= $gastronomiahome['Business']['image'] ?>" style="height: 105px; width:156px;"/>
										<?php } else { ?>
											<img class="img-border border" src="../../img/sem_logo.png" style="height: 105px; width:105px;"/>
										<?php }?>
								</div>
								<div class="row">
									<span class="nome"><a href="/estabelecimentos/ver/<?= $gastronomiahome['Business']['url']?>"><?= $gastronomiahome['Business']['name'] ?></a></span>
									<!--<span class="endereco mb5">Local: <?= $this->Caracter->_getLimit($gastronomiahome['Business']['address'], 25)  ?>...</span>-->
									<!--<span class="texto1">Aberto:</span>
									<div class="texto2"><?= $this->Caracter->_getLimit($gastronomiahome['Business']['business_hours'], 30) ?>...</div>
									--><!--<span class="texto4">1 Pedaço por R$4,00</span>-->
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
			<!--busque em restaurante-->
		</div>
	</div>
</div>

	
	
	</div>
	
</div>










<div style="width:100%; padding-top:50px; padding-bottom:50px;">
	<!--<img style="width:100%" class="banner1" src="/img/banner1.jpg" />-->
	<!--<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>-->
		<!--<ins class="adsbygoogle"
		     style="display:inline-block;width:729px;height:89px"
		     data-ad-client="ca-pub-4475543678910973"
		     data-ad-slot="9710819406"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
	</script>-->
</div>


<!--autos-->

<div class="row autos_cadre">
	<div style="width:100%; height:400px; float:left; margin-bottom:30px; background: #fff url('') no-repeat !important;">
			<div class="auto_imoveis" style="float:left;">
				<div class="" style="float:left; width:300px; ">
					<?php foreach($autos as $auto): ?>
					<a href="/autos/ver/<?= $auto['Auto']['id'] ?>">
						<div class="row" style="margin-top:10px;">
							<div class="" style="float:left;">
								<img src="<?= $_URL_FILE; ?>autos/fotos/B-<?= $auto['File'][0]['name']?>" style="height:100px; ;width:140px;"/>
							</div>
							<div class="  columns">
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
				
				<div class="" style="float:left; width:300px;">
					<?php foreach($autos as $auto): ?>
					<a href="/autos/ver/<?= $auto['Auto']['id'] ?>">
						<div class="row" style="margin-top:10px;">
							<div class="" style="float:left;">
								<img src="<?= $_URL_FILE; ?>autos/fotos/B-<?= $auto['File'][0]['name']?>" style="height:100px; ;width:140px;"/>
							</div>
							<div class="  columns">
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
				
				
			<div class="auto_imoveis">
	</div>
</div><!--end cadre blanc autos + google banner--><br />

<div style="width:100%; height:630px; margin-top:50px;">
	
		
	<div style="float:left; width:31%; padding-top: 0px; padding-left: 40px; background-color: #fff;">
		<!--google banner-->
		<!--<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>-->
			<!-- Anuncio Cambui 300 250 gastronomia -->
			<!--<ins class="adsbygoogle"
			     style="display:inline-block;width:300px;height:600px"
			     data-ad-client="ca-pub-4475543678910973"
			     data-ad-slot="9710819406"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
		</script>-->
	</div>	<!--end cadre google banner-->
	
	
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