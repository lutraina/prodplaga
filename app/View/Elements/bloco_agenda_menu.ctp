<div class="row agenda-lateral">
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
				<?php foreach($schedulesNavs as $schedulesNav): ?>
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
		
		<div class="carousel-menu">
			<ul class="paginacao-programacao-interna">
				
				<?php 
					$montaCalendario = $this->Data->calendar(date('Y-m-d')); 
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
