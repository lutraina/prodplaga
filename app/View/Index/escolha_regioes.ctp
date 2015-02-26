<?php
header('Content-Type: text/html; charset=utf-8');

 if($_SERVER['REMOTE_ADDR'] == '83.154.194.160' || $_SERVER['REMOTE_ADDR'] == '::1'){ ?>
 		
 	<img style="font-size:24px;" src="img/green_arrow_down_21x21.gif" alt="Faça a sua escolha"> Escolha a sua região :


<ul>
	<?php foreach($regioes as $regiao){ ?>
		<a href="/regiao/<?= utf8_encode($regiao['Regions']['nome_sistema']) ?>/">
			<li style="font-size:18px; width:400px;">
				<?php print_r($regiao['Regions']['nome_regiao']); ?>
			</li>	
		</a>
	<?php } ?>
</ul>

<?php } else {
	
	echo 'site em andamento';
	
}
	