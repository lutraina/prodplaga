<div class="agenda row">
	<div class="agenda-lateral">
		<div class="row">
			<div class="row bloco-titulo-categoria">
				<div class="f-left">
					<span class="icon-categoria"></span>
					<span class="titulo-categoria">Agenda</span>
				</div>
			</div>
			<div class="row mt20">
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
									<b><?= $schedulesNav['Category']['name'] ?></b>
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
<!--slide agenda home-->
<script type="text/javascript">
	$(".carousel").jCarouselLite({
	    btnNext: ".next",
	    btnPrev: ".prev",
	    start: <?= $montaCalendario['currentView'] + 2; ?>,
	});
</script>