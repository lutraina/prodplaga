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
			    url:'/estabelecimentos/filtro/'+letra+'/diversao/<?= @$categoriaGeral['Category']['id'] ?>',
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
				
		        url: '/estabelecimentos/filtro/null/diversao/<?= @$categoriaGeral['Category']['id'] ?>',
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


<div class="diversao">
	<div class="row mt20">
		<div class="eight columns">
			<?php if(count($estabelecimentoDestaque1)>0): ?>
				<div class="row mb20">
					<a href="/estabelecimentos/ver/<?= $estabelecimentoDestaque1['Business']['url'] ?>"><img src="<?= $_URL_FILE ?>businesses/fotos/635x250-<?= $estabelecimentoDestaque1['Business']['image'] ?>" style="height: 250px; width:100%;"/></a>
					<div class="box-post-destaque mb5">
						<div class="row">
							<div class="post-destaque-categoria upper bdge">
								<div class="icon-categoria-default"></div>
								<span><a href="/estabelecimentos/<?= $estabelecimentoDestaque1['Business']['type'] ?>/<?= $estabelecimentoDestaque1['Category']['url'] ?>"><?= $estabelecimentoDestaque1['Category']['name'] ?></a></span>
							</div>
						</div>
						<div class="row">
							<div class="post-destaque-titulo bdge"><a href="/estabelecimentos/ver/<?= $estabelecimentoDestaque1['Business']['url'] ?>"><?= $estabelecimentoDestaque1['Business']['name'] ?></a></div>
							
						</div>
						
					</div>
					<span class="descricao f-right "><b>(<?= $estabelecimentoDestaque1['Business']['view']?>) views</b></span>
				</div>
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
										    	<?php foreach($specialtysD as $specialtyd): ?>
										       		<option value="<?= $specialtyd ?>"><?= $specialtyd ?></option>
										        <?php endforeach; ?>
										    </select>
										</label>
									</div>
									<div class="four columns">
										<label class="custom-select">
										    <select name="diferencial">
										    	<option value="">Aberto até</option>
										    	<?php foreach($diferenciaisD as $diferencialD): ?>
										       		<option value="<?= $diferencialD ?>"><?= $diferencialD ?></option>
										        <?php endforeach; ?>
										    </select>
										</label>
									</div>
									<div class="four columns">
										<label class="custom-select">
										    <select name="regiao">
										    	<option value="">Região</option>
										    	<?php foreach($regionsD as $regionD): ?>
										       		<option value="<?= $regionD ?>"><?= $regionD ?></option>
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
			
			<div class="filtroGeral">		
				<!--bloco filtragem por letra-->
				<div class="row box-lista-filtro mt20">
					<h2 class="row color">Lista completa de 'Diversão'</h2>
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
							<?php foreach($estabelecimentos as $estabelecimento): ?>
								<?php if($estabelecimento['Business']['gratuito']=='nao'): ?>
						
									<li>
										<div class="row">
											<div class="ten columns">
												<span class="row titulo"><a class="color" href="/estabelecimentos/ver/<?= $estabelecimento['Business']['url']?>"><?= $estabelecimento['Business']['name']?></a> <span class=" descricao f-right"><b>(<?= $estabelecimento['Business']['view']?>) views</b></span></span>
												<span class="row local"><a href="/estabelecimentos/<?= $estabelecimento['Business']['type']?>/<?= $estabelecimento['Category']['url']?>"><?= $estabelecimento['Category']['name']?></a></span>
												<div class="row mt5">
													<span class="row endereco"><a href="/estabelecimentos/ver/<?= $estabelecimento['Business']['url']?>"><?= $estabelecimento['Business']['address']?></a></span>
													<span class="row descricao"><a href="/estabelecimentos/ver/<?= $estabelecimento['Business']['url']?>"><?= $estabelecimento['Business']['business_hours']?></a></span>
													<span class="row descricao">Telefone(s): <b><?= $estabelecimento['Business']['phone']?></b></span>
													
												</div>
											</div>
											<div class="two columns">
												<?php if(!empty($estabelecimento['Business']['logo'])): ?>
													<a href="/estabelecimentos/ver/<?= $estabelecimento['Business']['url']?>"><img src="<?= $_URL_FILE.'businesses/fotos/'.$estabelecimento['Business']['logo']; ?>"/></a>	
												<?php endif;?>
												<a href="/estabelecimentos/ver/<?= $estabelecimento['Business']['url']?>"><button class="button button-radius button-black3">veja mais</button></a>
											</div>
										</div>
										
									</li>				
								<?php else: ?>
								
								
								<li>
									<div class="row">
										<div class="ten columns">
											<span class="row titulo"><b><?= $estabelecimento['Business']['name']?></b></span>
											<span class="row local"><?= $estabelecimento['Category']['name']?></span>
										</div>
										<div class="two columns">
											
										</div>
									</div>
									<div class="row mt5">
										<span class="row endereco"><?= $estabelecimento['Business']['address']?></span>
										<span class="row descricao"><?= $estabelecimento['Business']['business_hours']?></span>
										<span class="row descricao">Telefone(s): <b><?= $estabelecimento['Business']['phone']?></b></span>
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
		<div class="four columns">
			<div class="row mb10">
				<?php foreach($estabelecimentoDestaque2 as $estabelecimentoDestaque):?>
					<div class="row mb10">
						<a href="">
							<a href="/estabelecimentos/ver/<?= $estabelecimentoDestaque['Business']['url'] ?>"><img class="img-border border" src="<?= $_URL_FILE ?>businesses/fotos/318x177-<?= $estabelecimentoDestaque['Business']['image'] ?>" style="height: 177px; width:100%;"/></a>
							<div class="box-post-destaque">
								<div class="row">
									<div class="post-destaque-categoria upper bdge">
										<div class="icon-categoria-default"></div>
										<span><a href="/estabelecimentos/diversao/<?= $estabelecimentoDestaque['Category']['url'] ?>"><?= $estabelecimentoDestaque['Category']['name'] ?></a></span>
									</div>

								</div>
								<div class="row">
									<div class="post-destaque-titulo bdge"><a href="/estabelecimentos/ver/<?= $estabelecimentoDestaque['Business']['url'] ?>"><?= $estabelecimentoDestaque['Business']['name'] ?></a></div>
									<span class="row mt5 descricao f-right"><b>(<?= $estabelecimentoDestaque['Business']['view']?>) views</b></span>
								</div>
							</div>
						</a>
					</div>
				<?php endforeach; ?>
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
			<div class="row mb20">
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
	</div>
</div>