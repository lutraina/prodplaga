<script language="javascript">
	$(document).ready(function(){
	    /*
	     * Mostra popup dhtml
	     */
	    /*window.setTimeout(function() {*/
			//$('.nav-principal li').click(function(){
			 //alert('oi');
				//window.setTimeout(function() {
					//$('.banner-dhtml').hide();
				//}, 15000);
			//})
		//}, 2000);
		
		/*.nav-principal li:hover ul{
	display:block;
	background:#EEEEEE;
}
.nav-principal li:hover .reg{
	color:#FFFFFF;
}*/
		/*$('.fechar-popup').click(function(){
			$('.banner-dhtml').hide();
		})*/
	});
</script>




<div class="nav-total">
	<a href="/"><img class="logo-nav" style="margin-top:40px; margin-left:10px;" src="/img/logo_plaga.png"/></a>
	<nav>
		<ul class="nav-principal" style="width:1024px; background-color:#fff; height:40px;">
			<li class="menu_agenda">
				<a class="nav-principal-item reg" href="/agenda">agenda</a>
				<ul class="sub-nav-principal">
					<li class="row">
						<div class="row sub-menu-top">
							<div class="row center">
								<a href="/agenda"> A agenda no cambuí traz pra você a mais completa programação de shows, eventos e os melhores acontecimentos do bairro! </a>
							</div>
						</div>
						<div class="conteudo-sub-menu-top">
							<div class="conteudo">
								<div class="ten columns">
									<div class="row">
										<!--
										<?php echo $this->element('bloco_agenda_menu'); ?>
										-->
										<div class="three columns ">
											<div class="row">
												<span class="dia-num1"><?= date('d')?></span>
												<div class="dia-ext1 bdge">
													<span><?= $this->Data->convertWeek(date('D')); ?></span>
												</div>
											</div>
											<div class="row mt10">
												<div class="two columns"></div>
												<div class="eight columns"><a class="button button-radius button-black5" href="/agenda"><center>Agenda completa</center></a></div>
												<div class="two columns"></div>
											</div>
										</div>
										<!--
										<?php foreach($schedulesNavs as $schedulesNav): ?>
											<div class="three columns">
												<div class="row">
													<h3 class="row"><a href="/agenda/<?= $schedulesNav['Category']['url'] ?>/<?= $schedulesNav['Category']['id'] ?>"><?= $schedulesNav['Category']['name'] ?></a></h3> 
													<div class="five columns f-right">
													</div>
												</div>
												<div class="row sub-box-conteudo">
													<a href="/agenda/ver/<?= $schedulesNav['Schedule']['url'] ?>"> 
														<img class="img-border border" src="<?= $_URL_FILE ?>schedules/fotos/318x177-<?= $schedulesNav['Schedule']['image'] ?>" style="width:100%;height:85px";/>
														<span class="row titulo"><?= $schedulesNav['Schedule']['title'] ?></span>
														<span class="row texto">às <?= date("H:i",strtotime($schedulesNav['Schedule']['schedule'])); ?></span>
													 </a>
												 </div>
											</div>
										<?php endforeach; ?>-->
										<div class="nine columns">
											<ul class="listagem-programacao mt10">
												<?php foreach($schedulesNavs as $schedulesNav): ?>
												<li>
													<div class="row">
														<a href="/agenda/ver/<?= $schedulesNav['Schedule']['url'] ?>"> 
															<b><?= date("d/m") ?> - <?= date("H:i", strtotime($schedulesNav['Schedule']['schedule'])) ?></b>
															- <?= $schedulesNav['Schedule']['title'] ?>
														</a>
													</div>
												</li>
												<?php endforeach ?>
											</ul>
										</div>
										
									</div>
								</div>
								<div class="two columns">
									<div class="f-right">
										<?php if(count($banner_menu_agenda) >=1 ):?>
											<?php foreach($banner_menu_agenda as $banner_menu_age): ?> 
												<?php if($banner_menu_age['Banner']['tipo'] == 'image'): ?>
													<a target="<?= $banner_menu_age['Banner']['target'] ?>" href="<?= $banner_menu_age['Banner']['link'] ?>" class='click' data-click="<?= $banner_menu_age['Banner']['id'] ?>">
														<img src="<?= $_URL_FILE; ?>banners/fotos/<?= $banner_menu_age['Banner']['image'] ?>"  width=" 60" height="170" />
													</a>
												<?php else: ?>	
													<?= $banner_menu_agenda['Banner']['cod'] ?>
												<?php endif; ?>
											<?php endforeach; ?>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</li>
			<li class="menu_vantagens">
				<a class="nav-principal-item reg" href="#?">vantagens</a>
				<ul class="sub-nav-principal">
					<li class="row">
						<div class="row sub-menu-top">
							<div class="row">
								<a href="#?">&nbsp;</a>
							</div>
						</div>
						<div class="conteudo-sub-menu-top">
							<?php if( isset($vantagens['Advantage'])): ?>
								<div class="conteudo">
									<div class="row">
										<div class="row">
											<div class="three columns">
												<?php echo $this->element('bloco_vantagens_dia'); ?>
											</div>
											<div class="nine columns">
												<div class="twelve columns">
													<div class="row">
														<a href="/vantagens/ver/<?= $vantagens['Advantage']['url'] ?>">
															<div class="row">
																<h3 class="row"><?= $vantagens['Advantage']['title'] ?></h3> 
																<span class="row texto mt20"><?= $this->Caracter->_getLimit($vantagens['Advantage']['regulation'], 800)?>...</span>
															</div>										
															<div class="row mt20">
																<div class="botao-cupom-menu">
																	<a href="/vantagens/ver/<?= $vantagens['Advantage']['url'] ?>"><button class="button button-radius button-black">visualizar oferta</button></a>
																</div>
															</div>
														</a>
													</div>
												</div>
												<div class="two columns">
													<div class="f-right">
														<?php if(count($banner_menu_vantagens) >=1 ):?>
															<?php foreach($banner_menu_vantagens as $banner_menu_van): ?> 
																<?php if($banner_menu_van['Banner']['tipo'] == 'image'): ?>
																	<a target="<?= $banner_menu_van['Banner']['target'] ?>" href="<?= $banner_menu_van['Banner']['link'] ?>" class='click' data-click="<?= $banner_menu_van['Banner']['id'] ?>">
																		<img src="<?= $_URL_FILE; ?>banners/fotos/<?= $banner_menu_van['Banner']['image'] ?>"  width=" 60" height="170" />
																	</a>
																<?php else: ?>	
																	<?= $banner_menu_vantagens['Banner']['cod'] ?>
																<?php endif; ?>
															<?php endforeach; ?>
														<?php endif; ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php endif; ?>
						</div>
					</li>
				</ul>
			</li>
			<li class="menu_noticias">
				<a class="nav-principal-item reg" href="/noticias">notícias</a>
				<ul class="sub-nav-principal">
					<li class="row">
						<div class="row sub-menu-top">
							<div class="row">
								<?php foreach($newsNavs['menu'] as $key => $newsNav): ?>
									<a href="/noticias/<?=  $key ?>"><?=  $newsNav ?></a>
								<?php endforeach; ?>
							</div>
						</div>
						<div class="conteudo-sub-menu-top">
							<div class="conteudo">
								<div class="ten columns">
									<div class="row">
										<div class="three columns">
											<h3 class="row mb20">Últimas notícias</h3>
											<div class="row outros-topicos">
												<?php foreach($newsNavs['secundaria'] as $key => $newsNav): ?>
													<a href="/noticias/ver/<?= $newsNav['News']['url'] ?>"> <?=  $newsNav['News']['title'] ?> - <span>leia mais</span> </a>
												<?php endforeach; ?>
											</div>
											<div class="row mt10">
												<div class="two columns"></div>
												<div class="eight columns"><a class="button button-radius button-black5" href="/agenda"><center>Ver Todos</center></a></div>
												<div class="two columns"></div>
											</div>
										</div>
										<?php foreach($newsNavs['destaque'] as $key => $newsNav): ?>
											<div class="three columns">
													<div class="row">
														<h3 class="row"><a href="/noticias/<?= $newsNav['Category']['url']?>"> <?= $newsNav['Category']['name']?> </a></h3> 
														<div class="five columns f-right">
															<a href="/noticias/<?= $newsNav['Category']['url']?>"></a>
														</div>
													</div>
													<div class="row sub-box-conteudo">
														<a href="/noticias/ver/<?= $newsNav['News']['url']?>">
															<img class="img-border border" src="<?= $_URL_FILE ?>news/fotos/318x177-<?= $newsNav['News']['image'] ?>" style="width:100%;height:85px"; /><!--160x70-->
															<span class="row titulo"><?= $newsNav['News']['title']?></span>
															<span class="row texto"><?= $this->Caracter->_getLimit($newsNav['News']['subtitle'], 60)?>...</span>
														</a>
													</div>
											</div>
										<?php endforeach; ?>
									</div>
								</div>
								<div class="two columns">
									<div class="f-right">
										<?php if(count($banner_menu_noticias) >=1 ):?>
											<?php foreach($banner_menu_noticias as $banner_menu_not): ?> 
												<?php if($banner_menu_not['Banner']['tipo'] == 'image'): ?>
													<a target="<?= $banner_menu_not['Banner']['target'] ?>" href="<?= $banner_menu_not['Banner']['link'] ?>" class='click' data-click="<?= $banner_menu_not['Banner']['id'] ?>">
														<img src="<?= $_URL_FILE; ?>banners/fotos/<?= $banner_menu_not['Banner']['image'] ?>"  width=" 60" height="170" />
													</a>
												<?php else: ?>	
													<?= $banner_menu_noticias['Banner']['cod'] ?>
												<?php endif; ?>
											<?php endforeach; ?>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</li>
			<li class="menu_diversao">
				<a class="nav-principal-item reg" href="/estabelecimentos/diversao">Diversão</a>
				<ul class="sub-nav-principal">
					<li class="row">
						<div class="row sub-menu-top">
							<div class="row">
								<?php foreach($businessNavs['diversao'] as $diversaos): ?>
									<a href="/estabelecimentos/diversao/<?= $diversaos['Category']['url'] ?>"><?= $diversaos['Category']['name'] ?></a>
								<?php endforeach; ?>
							</div>
						</div>
						<div class="conteudo-sub-menu-top">
							<div class="conteudo">
								<div class="ten columns">
									<div class="row">
										<div class="three columns bloco-diversao-topo">
											<?php echo $this->element('bloco_form_busca_diversao_topo'); ?>
										</div>
										<div class="nine columns ">
											<div class="row filtro-menu-diversao">
												<?php foreach($businessNavs['diversao_premium'] as $key => $divPremium): ?>
													<?php if($key<3): ?>
													<div class="four columns">
														<div class="row">
															<h3 class="row"><a href="/estabelecimentos/diversao/<?= $divPremium['Category']['url']?>"> <?= $divPremium['Category']['name']?> </a></h3> 
															<div class="five columns f-right">
																<a href="/estabelecimentos/diversao/<?= $divPremium['Category']['url']?>"></a>
															</div>
														</div>
														<div class="row sub-box-conteudo">
															<a href="/estabelecimentos/ver/<?= $divPremium['Business']['url']?>">
																<img class="img-border border" src="<?= $_URL_FILE ?>businesses/fotos/318x177-<?= $divPremium['Business']['image'] ?>" style="width:100%;height:85px"; /><!--160x70-->
																<span class="row titulo"><?= $divPremium['Business']['name'] ?></span>
																<span class="row texto"><?= $divPremium['Business']['address'] ?></span>
															</a>
														</div>
													</div>
													<?php endif; ?>
												<?php endforeach; ?>
											</div>
										</div>	
									</div>
								</div>
								<div class="two columns">
									<div class="f-right">
										<?php if(count($banner_menu_diversao) >=1 ):?>
											<?php foreach($banner_menu_diversao as $banner_menu_div): ?> 
												<?php if($banner_menu_div['Banner']['tipo'] == 'image'): ?>
													<a target="<?= $banner_menu_div['Banner']['target'] ?>" href="<?= $banner_menu_div['Banner']['link'] ?>" class='click' data-click="<?= $banner_menu_div['Banner']['id'] ?>">
														<img src="<?= $_URL_FILE; ?>banners/fotos/<?= $banner_menu_div['Banner']['image'] ?>"  width=" 60" height="170" />
													</a>
												<?php else: ?>	
													<?= $banner_menu_diversao['Banner']['cod'] ?>
												<?php endif; ?>
											<?php endforeach; ?>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</li>
			<li class="menu_gastronomia">
				<a class="nav-principal-item reg" href="/estabelecimentos/gastronomia">gastronomia</a>
				<ul class="sub-nav-principal">
					<li class="row">
						<div class="row sub-menu-top">
							<div class="row">
								<?php foreach($businessNavs['gastronomia'] as $gastronomia): ?>
									<a href="/estabelecimentos/gastronomia/<?= $gastronomia['Category']['url'] ?>"><?= $gastronomia['Category']['name'] ?></a>
								<?php endforeach; ?>	
							</div>
						</div>
						<div class="conteudo-sub-menu-top">
							<div class="conteudo">
								<div class="ten columns">
									<div class="row">
										<div class="three columns bloco-gastronomia-topo">
											<?php echo $this->element('bloco_form_busca_gastronomia_topo'); ?>
										</div>
										<div class="nine columns ">
											<div class="row filtro-menu-gastronomia">
												<?php foreach($businessNavs['gastronomia_premium'] as $gastPremium): ?>
													<div class="four columns">
														<div class="row">
															<h3 class="row"><a href="/estabelecimentos/gastronomia/<?= $gastPremium['Category']['url']?>"> <?= $gastPremium['Category']['name']?> </a></h3> 
															<div class="five columns f-right">
																<a href="/estabelecimentos/gastronomia/<?= $gastPremium['Category']['url']?>"></a>
															</div>
														</div>
														<div class="row sub-box-conteudo">
															<a href="/estabelecimentos/ver/<?= $gastPremium['Business']['url']?>">
																<img class="img-border border" src="<?= $_URL_FILE ?>businesses/fotos/318x177-<?= $gastPremium['Business']['image'] ?>" style="width:100%;height:85px"; /><!--160x70-->
																<span class="row titulo"><?= $gastPremium['Business']['name'] ?></span>
																<span class="row texto"><?= $gastPremium['Business']['address'] ?></span>
															</a>
														</div>
													</div>
												<?php endforeach; ?>
											</div>
										</div>
									</div>
								</div>
								<div class="two columns">
									<div class="f-right">
										<?php if(count($banner_menu_gastronomia) >=1 ):?>
											<?php foreach($banner_menu_gastronomia as $banner_menu_gas): ?> 
												<?php if($banner_menu_gas['Banner']['tipo'] == 'image'): ?>
													<a target="<?= $banner_menu_gas['Banner']['target'] ?>" href="<?= $banner_menu_gas['Banner']['link'] ?>" class='click' data-click="<?= $banner_menu_gas['Banner']['id'] ?>">
														<img src="<?= $_URL_FILE; ?>banners/fotos/<?= $banner_menu_gas['Banner']['image'] ?>"  width=" 60" height="170" />
													</a>
												<?php else: ?>	
													<?= $banner_menu_gastronomia['Banner']['cod'] ?>
												<?php endif; ?>
											<?php endforeach; ?>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</li>
			<li class="menu_servicos">
				<a class="nav-principal-item reg" href="/estabelecimentos/servicos">serviços</a>
				<ul class="sub-nav-principal">
					<li class="row">
						<div class="row sub-menu-top">
							<div class="row">
								<?php foreach($businessNavs['servicos'] as $servicos): ?>
									<a href="/estabelecimentos/servicos/<?= $servicos['Category']['url'] ?>"><?= $servicos['Category']['name'] ?></a>
								<?php endforeach; ?>
							</div>
						</div>
						<div class="conteudo-sub-menu-top">
							<div class="conteudo">
								<div class="ten columns">
									<div class="row">
										<div class="three columns">
											<h3 class="row mb20"><a class="link-plus" href="/estabelecimentos/servicos">+ serviços</a></h3>
											<!--<div class="row outros-topicos">
												<?php foreach($businessNavs['servicos_mais'] as  $servico): ?>
													<a href="estabelecimentos/ver/<?= $servico['Business']['url'] ?>"> <?=  $servico['Business']['name'] ?></a>
												<?php endforeach; ?>
											</div>-->
										</div>
										<?php foreach($businessNavs['servicos_premium'] as $servPremium): ?>
											<div class="three columns">
												<div class="row">
													<h3 class="row"><a href="/estabelecimentos/servicos/<?= $servPremium['Category']['url']?>"> <?= $servPremium['Category']['name']?> </a></h3> 
													<div class="five columns f-right">
														<a href="/estabelecimentos/servicos/<?= $servPremium['Category']['url']?>"></a>
													</div>
												</div>
												<div class="row sub-box-conteudo">
													<a href="/estabelecimentos/ver/<?= $servPremium['Business']['url']?>">
														<img class="img-border border" src="<?= $_URL_FILE ?>businesses/fotos/318x177-<?= $servPremium['Business']['image'] ?>" style="width:100%;height:85px"; /><!--160x70-->
														<span class="row titulo"><?= $servPremium['Business']['name'] ?></span>
														<span class="row texto"><?= $servPremium['Business']['address'] ?></span>
													</a>
												</div>
											</div>
										<?php endforeach; ?>
									</div>
								</div>
								<div class="two columns">
									<div class="f-right">
										<?php if(count($banner_menu_servicos) >=1 ):?>
											<?php foreach($banner_menu_servicos as $banner_menu_ser): ?> 
												<?php if($banner_menu_ser['Banner']['tipo'] == 'image'): ?>
													<a target="<?= $banner_menu_ser['Banner']['target'] ?>" href="<?= $banner_menu_ser['Banner']['link'] ?>" class='click' data-click="<?= $banner_menu_ser['Banner']['id'] ?>">
														<img src="<?= $_URL_FILE; ?>banners/fotos/<?= $banner_menu_ser['Banner']['image'] ?>"  width=" 60" height="170" />
													</a>
												<?php else: ?>	
													<?= $banner_menu_servicos['Banner']['cod'] ?>
												<?php endif; ?>
											<?php endforeach; ?>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</li>
			<li class="menu_moda-e-estilo">
				<a class="nav-principal-item reg" href="/estabelecimentos/moda-e-estilo">Moda</a>
				<ul class="sub-nav-principal">
					<li class="row">
						<div class="row sub-menu-top">
							<div class="row">
								<?php foreach($businessNavs['moda'] as $modas): ?>
									<a href="/estabelecimentos/moda-e-estilo/<?= $modas['Category']['url'] ?>"><?= $modas['Category']['name'] ?></a>
								<?php endforeach; ?>
							</div>
						</div>
						<div class="conteudo-sub-menu-top">
							<div class="conteudo">
								<div class="ten columns">
									<div class="row">
										<div class="three columns">
											<h3 class="row mb20"><a class="link-plus" href="/estabelecimentos/moda-e-estilo">+ moda</a></h3>
											<!--<div class="row outros-topicos">
												<?php foreach($businessNavs['moda_mais'] as $moda): ?>
													<a href="estabelecimentos/ver/<?= $moda['Business']['url'] ?>"> <?=  $moda['Business']['name'] ?></a>
												<?php endforeach; ?>
											</div>-->
										</div>
										<?php foreach($businessNavs['moda_premium'] as $modPremium): ?>
											<div class="three columns">
												<div class="row">
													<h3 class="row"><a href="/estabelecimentos/moda-e-estilo/<?= $modPremium['Category']['url']?>"> <?= $modPremium['Category']['name']?> </a></h3> 
													<div class="five columns f-right">
														<a href="/estabelecimentos/moda-e-estilo/<?= $modPremium['Category']['url']?>"></a>
													</div>
												</div>
												<div class="row sub-box-conteudo">
													<a href="/estabelecimentos/ver/<?= $modPremium['Business']['url']?>">
														<img class="img-border border" src="<?= $_URL_FILE ?>businesses/fotos/318x177-<?= $modPremium['Business']['image'] ?>" style="width:100%;height:85px"; /><!--160x70-->
														<span class="row titulo"><?= $modPremium['Business']['name'] ?></span>
														<span class="row texto"><?= $modPremium['Business']['address'] ?></span>
													</a>
												</div>
											</div>
										<?php endforeach; ?>
									</div>
								</div>
								<div class="two columns">
									<div class="f-right">
										<?php if(count($banner_menu_moda) >=1 ):?>
											<?php foreach($banner_menu_moda as $banner_menu_mod): ?> 
												<?php if($banner_menu_mod['Banner']['tipo'] == 'image'): ?>
													<a target="<?= $banner_menu_mod['Banner']['target'] ?>" href="<?= $banner_menu_mod['Banner']['link'] ?>" class='click' data-click="<?= $banner_menu_mod['Banner']['id'] ?>">
														<img src="<?= $_URL_FILE; ?>banners/fotos/<?= $banner_menu_mod['Banner']['image'] ?>"  width=" 60" height="170" />
													</a>
												<?php else: ?>	
													<?= $banner_menu_moda['Banner']['cod'] ?>
												<?php endif; ?>
											<?php endforeach; ?>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</li>
			<li class="menu_bem-estar">
				<a class="nav-principal-item reg" href="/estabelecimentos/bem-estar">Bem Estar</a>
				<ul class="sub-nav-principal">
					<li class="row">
						<div class="row sub-menu-top">
							<div class="row">
								<?php foreach($businessNavs['bem'] as $bems): ?>
									<a href="/estabelecimentos/moda-e-estilo/<?= $bems['Category']['url'] ?>"><?= $bems['Category']['name'] ?></a>
								<?php endforeach; ?>
							</div>
						</div>
						<div class="conteudo-sub-menu-top">
							<div class="conteudo">
								<div class="ten columns">
									<div class="row">
										<div class="three columns">
											<h3 class="row mb20"><a class="link-plus" href="/estabelecimentos/bem-estar">+ bem estar</a></h3>
											<!--<div class="row outros-topicos">
												<?php foreach($businessNavs['bem_mais'] as $bem): ?>
													<a href="estabelecimentos/ver/<?= $bem['Business']['url'] ?>"> <?=  $bem['Business']['name'] ?></a>
												<?php endforeach; ?>
											</div>-->
										</div>
										<?php foreach($businessNavs['bem_premium'] as $bemPremium): ?>
											<div class="three columns">
												<div class="row">
													<h3 class="row"><a href="/estabelecimentos/moda-e-estilo/<?= $bemPremium['Category']['url']?>"> <?= $bemPremium['Category']['name']?> </a></h3> 
													<div class="five columns f-right">
														<a href="/estabelecimentos/moda-e-estilo/<?= $bemPremium['Category']['url']?>"></a>
													</div>
												</div>
												<div class="row sub-box-conteudo">
													<a href="/estabelecimentos/ver/<?= $bemPremium['Business']['url']?>">
														<img class="img-border border" src="<?= $_URL_FILE ?>businesses/fotos/318x177-<?= $bemPremium['Business']['image'] ?>" style="width:100%;height:85px"; /><!--160x70-->
														<span class="row titulo"><?= $bemPremium['Business']['name'] ?></span>
														<span class="row texto"><?= $bemPremium['Business']['address'] ?></span>
													</a>
												</div>
											</div>
										<?php endforeach; ?>
									</div>
								</div>
								<div class="two columns">
									<div class="f-right">
										<?php if(count($banner_menu_bem) >=1 ):?>
											<?php foreach($banner_menu_bem as $banner_menu_be): ?> 
												<?php if($banner_menu_be['Banner']['tipo'] == 'image'): ?>
													<a target="<?= $banner_menu_be['Banner']['target'] ?>" href="<?= $banner_menu_be['Banner']['link'] ?>" class='click' data-click="<?= $banner_menu_be['Banner']['id'] ?>">
														<img src="<?= $_URL_FILE; ?>banners/fotos/<?= $banner_menu_be['Banner']['image'] ?>"  width=" 60" height="170" />
													</a>
												<?php else: ?>	
													<?= $banner_menu_bem['Banner']['cod'] ?>
												<?php endif; ?>
											<?php endforeach; ?>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</li>
			<li class="menu_educacao">
				<a class="nav-principal-item reg" href="/estabelecimentos/educacao">Educação</a>
				<ul class="sub-nav-principal">
					<li class="row">
						<div class="row sub-menu-top">
							<div class="row">
								<?php foreach($businessNavs['educacao'] as $educacaos): ?>
									<a href="/estabelecimentos/educacao/<?= $educacaos['Category']['url'] ?>"><?= $educacaos['Category']['name'] ?></a>
								<?php endforeach; ?>
							</div>
						</div>
						<div class="conteudo-sub-menu-top">
							<div class="conteudo">
								<div class="ten columns">
									<div class="row">
										<div class="three columns">
											<h3 class="row mb20"><a class="link-plus" href="/estabelecimentos/educacao">+ educação</a></h3>
											<!--<div class="row outros-topicos">
												<?php foreach($businessNavs['edu_mais'] as $educacao): ?>
													<a href="estabelecimentos/ver/<?= $educacao['Business']['url'] ?>"> <?=  $educacao['Business']['name'] ?></a>
												<?php endforeach; ?>
											</div>-->
										</div>
										<?php foreach($businessNavs['edu_premium'] as $eduPremium): ?>
											<div class="three columns">
												<div class="row">
													<h3 class="row"><a href="/estabelecimentos/educacao/<?= $eduPremium['Category']['url']?>"> <?= $eduPremium['Category']['name']?> </a></h3> 
													<div class="five columns f-right">
														<a href="/estabelecimentos/educacao/<?= $eduPremium['Category']['url']?>"></a>
													</div>
												</div>
												<div class="row sub-box-conteudo">
													<a href="/estabelecimentos/ver/<?= $eduPremium['Business']['url']?>">
														<img class="img-border border" src="<?= $_URL_FILE ?>businesses/fotos/318x177-<?= $eduPremium['Business']['image'] ?>" style="width:100%;height:85px"; /><!--160x70-->
														<span class="row titulo"><?= $eduPremium['Business']['name'] ?></span>
														<span class="row texto"><?= $eduPremium['Business']['address'] ?></span>
													</a>
												</div>
											</div>
										<?php endforeach; ?>
									</div>
								</div>
								<div class="two columns">
									<div class="f-right">
										<?php if(count($banner_menu_educacao) >=1 ):?>
											<?php foreach($banner_menu_educacao as $banner_menu_edu): ?> 
												<?php if($banner_menu_edu['Banner']['tipo'] == 'image'): ?>
													<a target="<?= $banner_menu_edu['Banner']['target'] ?>" href="<?= $banner_menu_edu['Banner']['link'] ?>" class='click' data-click="<?= $banner_menu_edu['Banner']['id'] ?>">
														<img src="<?= $_URL_FILE; ?>banners/fotos/<?= $banner_menu_edu['Banner']['image'] ?>"  width=" 60" height="170" />
													</a>
												<?php else: ?>	
													<?= $banner_menu_educacao['Banner']['cod'] ?>
												<?php endif; ?>
											<?php endforeach; ?>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</li>
			<li class="menu_pet-e-agro">
				<a class="nav-principal-item reg" href="/estabelecimentos/pet-e-agro">Pet</a>
				<ul class="sub-nav-principal">
					<li class="row">
						<div class="row sub-menu-top">
							<div class="row">
								<?php foreach($businessNavs['pet'] as $pets): ?>
									<a href="/estabelecimentos/pet-e-agro/<?= $pets['Category']['url'] ?>"><?= $pets['Category']['name'] ?></a>
								<?php endforeach; ?>
							</div>
						</div>
						<div class="conteudo-sub-menu-top">
							<div class="conteudo">
								<div class="ten columns">
									<div class="row">
										<div class="three columns">
											<h3 class="row mb20"><a class="link-plus" href="/estabelecimentos/pet-e-agro">+ pet </a></h3>
											<!--<div class="row outros-topicos">
												<?php foreach($businessNavs['pet_mais'] as $pet): ?>
													<a href="estabelecimentos/ver/<?= $pet['Business']['url'] ?>"> <?=  $pet['Business']['name'] ?></a>
												<?php endforeach; ?>
											</div>-->
										</div>
										<?php foreach($businessNavs['pet_premium'] as $petPremium): ?>
											<div class="three columns">
												<div class="row">
													<h3 class="row"><a href="/estabelecimentos/pet-e-agro/<?= $petPremium['Category']['url']?>"> <?= $petPremium['Category']['name']?> </a></h3> 
													<div class="five columns f-right">
														<a href="/estabelecimentos/pet-e-agro/<?= $petPremium['Category']['url']?>"></a>
													</div>
												</div>
												<div class="row sub-box-conteudo">
													<a href="/estabelecimentos/ver/<?= $petPremium['Business']['url']?>">
														<img class="img-border border" src="<?= $_URL_FILE ?>businesses/fotos/318x177-<?= $petPremium['Business']['image'] ?>" style="width:100%;height:85px"; /><!--160x70-->
														<span class="row titulo"><?= $petPremium['Business']['name'] ?></span>
														<span class="row texto"><?= $petPremium['Business']['address'] ?></span>
													</a>
												</div>
											</div>
										<?php endforeach; ?>
									</div>
								</div>
								<div class="two columns">
									<div class="f-right">
										<?php if(count($banner_menu_pet) >=1 ):?>
											<?php foreach($banner_menu_pet as $banner_menu_pe): ?> 
												<?php if($banner_menu_pe['Banner']['tipo'] == 'image'): ?>
													<a target="<?= $banner_menu_pe['Banner']['target'] ?>" href="<?= $banner_menu_pe['Banner']['link'] ?>" class='click' data-click="<?= $banner_menu_pe['Banner']['id'] ?>">
														<img src="<?= $_URL_FILE; ?>banners/fotos/<?= $banner_menu_pe['Banner']['image'] ?>"  width=" 60" height="170" />
													</a>
												<?php else: ?>	
													<?= $banner_menu_pet['Banner']['cod'] ?>
												<?php endif; ?>
											<?php endforeach; ?>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</li>
			<li class="menu_casa">
				<a class="nav-principal-item reg" href="/estabelecimentos/casa">Casa</a>
				<ul class="sub-nav-principal">
					<li class="row">
						<div class="row sub-menu-top">
							<div class="row">
								<?php foreach($businessNavs['casa'] as $casas): ?>
									<a href="/estabelecimentos/casa/<?= $casas['Category']['url'] ?>"><?= $casas['Category']['name'] ?></a>
								<?php endforeach; ?>
							</div>
						</div>
						<div class="conteudo-sub-menu-top">
							<div class="conteudo">
								<div class="ten columns">
									<div class="row">
										<div class="three columns">
											<h3 class="row mb20"><a class="link-plus" href="/estabelecimentos/pet-e-agro">+ casa</a></h3>
											<!--<div class="row outros-topicos">
												<?php foreach($businessNavs['casa_mais'] as $casa): ?>
													<a href="estabelecimentos/ver/<?= $casa['Business']['url'] ?>"> <?=  $casa['Business']['name'] ?></a>
												<?php endforeach; ?>
											</div>-->
										</div>
										<?php foreach($businessNavs['casa_premium'] as $casaPremium): ?>
											<div class="three columns">
												<div class="row">
													<h3 class="row"><a href="/estabelecimentos/casa/<?= $casaPremium['Category']['url']?>"> <?= $casaPremium['Category']['name']?> </a></h3> 
													<div class="five columns f-right">
														<a href="/estabelecimentos/casa/<?= $petPremium['Category']['url']?>"></a>
													</div>
												</div>
												<div class="row sub-box-conteudo">
													<a href="/estabelecimentos/ver/<?= $casaPremium['Business']['url']?>">
														<img class="img-border border" src="<?= $_URL_FILE ?>businesses/fotos/318x177-<?= $casaPremium['Business']['image'] ?>" style="width:100%;height:85px"; /><!--160x70-->
														<span class="row titulo"><?= $casaPremium['Business']['name'] ?></span>
														<span class="row texto"><?= $casaPremium['Business']['address'] ?></span>
													</a>
												</div>
											</div>
										<?php endforeach; ?>
									</div>
								</div>
								<div class="two columns">
									<div class="f-right">
										<?php if(count($banner_menu_casas) >=1 ):?>
											<?php foreach($banner_menu_casas as $banner_menu_casa): ?> 
												<?php if($banner_menu_casa['Banner']['tipo'] == 'image'): ?>
													<a target="<?= $banner_menu_pe['Banner']['target'] ?>" href="<?= $banner_menu_casa['Banner']['link'] ?>" class='click' data-click="<?= $banner_menu_casa['Banner']['id'] ?>">
														<img src="<?= $_URL_FILE; ?>banners/fotos/<?= $banner_menu_casa['Banner']['image'] ?>"  width=" 60" height="170" />
													</a>
												<?php else: ?>	
													<?= $banner_menu_casas['Banner']['cod'] ?>
												<?php endif; ?>
											<?php endforeach; ?>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</li>			
			<li class="menu_autos">
				<a class="nav-principal-item reg" href="/estabelecimentos/autos">Autos</a>
				<ul class="sub-nav-principal">
					<li class="row">
						<div class="row sub-menu-top">
							<div class="row">
								<a href="/autos">Classificados</a>
								<?php foreach($businessNavs['autos'] as $autos): ?>
									<a href="/estabelecimentos/autos/<?= $autos['Category']['url'] ?>"><?= $autos['Category']['name'] ?></a>
								<?php endforeach; ?>
							</div>
						</div>
						<div class="conteudo-sub-menu-top">
							<div class="conteudo">
								<div class="ten columns">
									<div class="row">
										<div class="three columns">
											<h3 class="row mb20"><a class="link-plus" href="/estabelecimentos/autos">+ autos</a></h3>
											<!--<div class="row outros-topicos">
												<?php foreach($businessNavs['autos_mais'] as $auto): ?>
													<a href="estabelecimentos/ver/<?= $auto['Business']['url'] ?>"> <?=  $auto['Business']['name'] ?></a>
												<?php endforeach; ?>
											</div>-->
										</div>
										<?php foreach($businessNavs['autos_premium'] as $autoPremium): ?>
											<div class="three columns">
												<div class="row">
													<h3 class="row"><a href="/estabelecimentos/autos<?= $autoPremium['Category']['url']?>"> <?= $autoPremium['Category']['name']?> </a></h3> 
													<div class="five columns f-right">
														<a href="/estabelecimentos/autos<?= $autoPremium['Category']['url']?>"></a>
													</div>
												</div>
												<div class="row sub-box-conteudo">
													<a href="/estabelecimentos/ver/<?= $autoPremium['Business']['url']?>">
														<img class="img-border border" src="<?= $_URL_FILE ?>businesses/fotos/318x177-<?= $autoPremium['Business']['image'] ?>" style="width:100%;height:85px"; /><!--160x70-->
														<span class="row titulo"><?= $autoPremium['Business']['name'] ?></span>
														<span class="row texto"><?= $autoPremium['Business']['address'] ?></span>
													</a>
												</div>
											</div>
										<?php endforeach; ?>
										
		
									</div>
								</div>
								<div class="two columns">
									<div class="f-right">
										<?php if(count($banner_menu_autos) >=1 ):?>
											<?php foreach($banner_menu_autos as $banner_menu_auto): ?> 
												<?php if($banner_menu_auto['Banner']['tipo'] == 'image'): ?>
													<a target="<?= $banner_menu_auto['Banner']['target'] ?>" href="<?= $banner_menu_auto['Banner']['link'] ?>" class='click' data-click="<?= $banner_menu_auto['Banner']['id'] ?>">
														<img src="<?= $_URL_FILE; ?>banners/fotos/<?= $banner_menu_auto['Banner']['image'] ?>"  width=" 60" height="170" />
													</a>
												<?php else: ?>	
													<?= $banner_menu_autos['Banner']['cod'] ?>
												<?php endif; ?>
											<?php endforeach; ?>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</li>
			<li class="menu_imoveis">
				<a class="nav-principal-item reg" href="/estabelecimentos/imoveis">Imóveis</a>
				<ul class="sub-nav-principal">
					<li class="row">
						<div class="row sub-menu-top">
							<div class="row">
								<a href="/imoveis">Classificados</a>
								<?php foreach($businessNavs['imoveis'] as $imoveis): ?>
									<a href="/estabelecimentos/imoveis/<?= $imoveis['Category']['url'] ?>"><?= $imoveis['Category']['name'] ?></a>
								<?php endforeach; ?>
							</div>
						</div>
						<div class="conteudo-sub-menu-top">
							<div class="conteudo">
								<div class="ten columns">
									<div class="row">
										<div class="three columns">
											<h3 class="row mb20"><a class="link-plus" href="/estabelecimentos/imoveis">+ imóveis</a></h3>
											<!--<div class="row outros-topicos">
												<?php foreach($businessNavs['imoveis_mais'] as $imoveis): ?>
													<a href="estabelecimentos/ver/<?= $imoveis['Business']['url'] ?>"> <?=  $imoveis['Business']['name'] ?></a>
												<?php endforeach; ?>
											</div>-->
										</div>
										<?php foreach($businessNavs['imoveis_premium'] as $imoPremium): ?>
											<div class="three columns">
												<div class="row">
													<h3 class="row"><a href="/estabelecimentos/autos<?= $autoPremium['Category']['url']?>"> <?= $imoPremium['Category']['name']?> </a></h3> 
													<div class="five columns f-right">
														<a href="/estabelecimentos/imoveis<?= $imoPremium['Category']['url']?>"></a>
													</div>
												</div>
												<div class="row sub-box-conteudo">
													<a href="/estabelecimentos/ver/<?= $imoPremium['Business']['url']?>">
														<img class="img-border border" src="<?= $_URL_FILE ?>businesses/fotos/318x177-<?= $imoPremium['Business']['image'] ?>" style="width:100%;height:85px"; /><!--160x70-->
														<span class="row titulo"><?= $imoPremium['Business']['name'] ?></span>
														<span class="row texto"><?= $imoPremium['Business']['address'] ?></span>
													</a>
												</div>
											</div>
										<?php endforeach; ?>
									</div>
								</div>
								<div class="two columns">
									<div class="f-right">
										<?php if(count($banner_menu_imoveis) >=1 ):?>
											<?php foreach($banner_menu_imoveis as $banner_menu_imovel): ?> 
												<?php if($banner_menu_imovel['Banner']['tipo'] == 'image'): ?>
													<a target="<?= $banner_menu_imovel['Banner']['target'] ?>" href="<?= $banner_menu_imovel['Banner']['link'] ?>" class='click' data-click="<?= $banner_menu_imovel['Banner']['id'] ?>">
														<img src="<?= $_URL_FILE; ?>banners/fotos/<?= $banner_menu_imovel['Banner']['image'] ?>"  width=" 60" height="170" />
													</a>
												<?php else: ?>	
													<?= $banner_menu_imoveis['Banner']['cod'] ?>
												<?php endif; ?>
											<?php endforeach; ?>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</li>
		</ul>
	</nav>
</div>