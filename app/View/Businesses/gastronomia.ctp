<?php
 /*
  * o que tem nesse arquivo :
  * 	COLUNA DA DIREITA ONDE TEM OS BANNERS E OS MAIS VISTOS
  * 
  */
?> 
  
  <script>
  /* when document is ready */
  $(function(){

    /* initiate the plugin */
    $("div.holder").jPages({
      containerID  : "itemContainerGastronomia",
      perPage      : 10,
      startPage    : 1,
      startRange   : 1,
      midRange     : 5,
      endRange     : 1,
        first       : false,
        previous    : " ",
        next        : " ",
        last        : false
    });

  });
  </script>
<script>
	$(document).ready(function(){
		$('.letra').click(function(){
			var letra = $(this).attr('data-letra');
			

			$.ajax({
			    url:'/estabelecimentos/filtro/'+letra+'/gastronomia/<?= @$categoriaGeral['Category']['id'] ?>',
			    type:'POST',
			    
				  beforeSend: function(){
						$('.retorno_filtro').html('Aguarde...');
				   },
				  success: function(content) {
						$('.retorno_filtro').html(content);
							
					
				  },
				  error: function(content) {
		
				  }		   
			
			});
		})	
		$('#btSubmit').click(function(){
			
			$("#form-filtro").ajaxForm({
				
		        url: '/estabelecimentos/filtro/null/gastronomia/<?= @$categoriaGeral['Category']['id'] ?>',
		    	beforeSend:function(){
		    	
		    		$('.filtroGeral').html('Agurade...');
		    	},
		        success: function(data) {
					$('.filtroGeral').html(data);
		        	
		        },
		        error: function(){
		            mensagem.html('Erro com o arquivo');
		            }
		 
			}).submit()
	       
		})
	})
	
</script>  


<div class="gastronomia">
	<div class="row mt20">
		<div class="eight columns">
			<?php if(count($gastronomiaDestaque1)>0): ?>
				<?php if(!empty($gastronomiaDestaque1['Business']['image'])): ?>	
				<div class="row mb20">
					<a href="/estabelecimentos/ver/<?= $gastronomiaDestaque1['Business']['url'] ?>"><img src="<?= $_URL_FILE ?>businesses/fotos/635x250-<?= $gastronomiaDestaque1['Business']['image'] ?>" style="height:390px; width:100%;"/></a>
					<div class="box-post-destaque mb5">
						<div class="row">
							<div class="post-destaque-categoria upper bdge">
								<div class="icon-categoria-default"></div>
								<span><a href="/estabelecimentos/gastronomia/<?= $gastronomiaDestaque1['Category']['url'] ?>"><?= $gastronomiaDestaque1['Category']['name'] ?></a></span>
							</div>
						</div>
						<div class="row">
							<div class="post-destaque-titulo bdge"><a href="/estabelecimentos/ver/<?= $gastronomiaDestaque1['Business']['url'] ?>"><?= $gastronomiaDestaque1['Business']['name'] ?></a></div>
							
						</div>
					</div>
					<span class="descricao f-right"><b>(<?= $gastronomiaDestaque1['Business']['view']?>) views</b></span>
				</div>
				<?php endif; ?>
			<?php endif; ?>

			<div class="row mb20">
				<div class="box-filtro bdge">
					<div class="row">
						<form class="form" action="#?" type="GET" id="form-filtro">
							<div class="ten columns">
								<div class="row custom-select">
									<div class="four columns">
										<label class="custom-select">
										    <select name="especialidade">
										    	<option value="">Especialidade</option>
										    	<?php foreach($specialtys as $specialty): ?>
										       		<option value="<?= $specialty ?>"><?= $specialty ?></option>
										        <?php endforeach; ?>
										    </select>
										</label>
									</div>
									<div class="four columns">
										<label class="custom-select">
										    <select name="aberto_ate">
										    	<option value="">Aberto até</option>
										    	<?php foreach($open_untils as $open_until): ?>
										       		<option value="<?= $open_until ?>"><?= $open_until ?></option>
										        <?php endforeach; ?>
										    </select>
										</label>
									</div>
									<div class="four columns">
										<label class="custom-select">
										    <select name="regiao">
										    	<option value="">Região</option>
										    	<?php foreach($regions as $region): ?>
										       		<option value="<?= $region ?>"><?= $region ?></option>
										        <?php endforeach; ?>
										    </select>
										</label>
									</div>
								</div>
							</div>
							<div class="one columns">
								<div class="button button-radius button-black2" id="btSubmit">BUSCAR</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="row posts-destaque">
				<?php foreach($gastronomiaDestaque2 as $gastronomiaDestaque):?>
					<div class="six columns">
						<a href="/estabelecimentos/ver/<?= $gastronomiaDestaque['Business']['url'] ?>"><img class="img-border border" src="<?= $_URL_FILE ?>businesses/fotos/318x177-<?= $gastronomiaDestaque['Business']['image'] ?>" style="height: 150px; width:100%;"/></a>
						<div class="row mt10">
							<div class="eight columns">
								<span class="row titulo"><a class="color" href="/estabelecimentos/ver/<?= $gastronomiaDestaque['Business']['url'] ?>">	<?= $gastronomiaDestaque['Business']['name'] ?></a></span>
								<span class="row local"><a href="/estabelecimentos/gastronomia/<?= $gastronomiaDestaque['Category']['url'] ?>">	<?= $gastronomiaDestaque['Category']['name'] ?></a></span>
								
							</div>
							<div class="four columns">
								<a href="/estabelecimentos/ver/<?= $gastronomiaDestaque['Business']['url'] ?>"><button class="button button-radius button-black3">veja mais</button></a>
								<span class="row mt5 descricao f-right"><b>(<?= $gastronomiaDestaque['Business']['view']?>) views</b></span>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>	
			<div class="filtroGeral">		
				<!--bloco filtragem por letra-->
				<div class="row box-lista-filtro mt20">
					<h2 class="row color">Lista completa de 'Gastronomia'</h2>
					<div class="lista-filtro mt10 color-link">
						<ul>
							<?= $this->Caracter->alfabeto('M'); ?>
						</ul>
					</div>
				</div>
				<!--bloco resultado filtragem por letra-->
				<div class="retorno_filtro">
					<div class="row listagem-posts mt20 ">
						<ul class="" id="itemContainerGastronomia">
							<?php foreach($gastronomias as $gastronomia): ?>
								
								<?php if($gastronomia['Business']['gratuito']=='nao'): ?>
								
									<li>
										<div class="row">
											<div class="ten columns">
												<span class="row titulo"><a class="color" href="/estabelecimentos/ver/<?= $gastronomia['Business']['url']?>"><?= $gastronomia['Business']['name']?></a> <span class=" descricao f-right"><b>(<?= $gastronomia['Business']['view']?>) views</b></span></span>
												<span class="row local"><a href="/estabelecimentos/gastronomia/<?= $gastronomia['Category']['url']?>"><?= $gastronomia['Category']['name']?></a></span>
												<div class="row mt5">
													<span class="row endereco"><a href="/estabelecimentos/ver/<?= $gastronomia['Business']['url']?>"><?= $gastronomia['Business']['address']?></a></span>
													<span class="row descricao"><a href="/estabelecimentos/ver/<?= $gastronomia['Business']['url']?>"><?= $gastronomia['Business']['business_hours']?></a></span>
													<span class="row descricao">Telefone(s): <b><?= $gastronomia['Business']['phone']?></b></span>
													
													
												</div>
											</div>
											<div class="two columns">
												<?php if(!empty($gastronomia['Business']['logo'])): ?>
													<a href="/estabelecimentos/ver/<?= $gastronomia['Business']['url']?>"><img src="<?= $_URL_FILE.'businesses/fotos/'.$gastronomia['Business']['logo']; ?>"/></a>	
												<?php endif;?>
												<a href="/estabelecimentos/ver/<?= $gastronomia['Business']['url']?>"><button class="button button-radius button-black3">veja mais</button></a>
											</div>
										</div>

									</li>								
								<?php else: ?>
								
								
								<li>
									<div class="row">
										<div class="ten columns">
											<span class="row titulo"><b><?= $gastronomia['Business']['name']?></b></span>
											<span class="row local"><?= $gastronomia['Category']['name']?></span>
										</div>
										<div class="two columns">
											
										</div>
									</div>
									<div class="row mt5">
										<span class="row endereco"><?= $gastronomia['Business']['address']?></span>
										<span class="row descricao"><?= $gastronomia['Business']['business_hours']?></span>
										<span class="row descricao">Telefone(s): <b><?= $gastronomia['Business']['phone']?></b></span>
									</div>
								</li>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>
					</div>
					<!--paginação-->
					<div class="row mt20">
						<!-- navigation holder gastronomia -->
						<div class="holder"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="four columns" style="width:300px;>
			 

<!-- COLUNA DA DIREITA ONDE TEM OS BANNERS E OS MAIS VISTOS -->
			<div class="row mb20" >
				 
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
<!-- FIM COLUNA DA DIREITA COM OS BANNERS E OS MAIS LIDOS-->
			
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