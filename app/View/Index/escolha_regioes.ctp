<?php
//header('Content-Type: text/html; charset=utf-8');

 if($_SERVER['REMOTE_ADDR'] == '83.154.194.160' 
 || $REMOTE_ADDR == '201.82.175.227' 
 || $REMOTE_ADDR =='134.90.138.4' 
 || $REMOTE_ADDR ==  '193.252.157.50' 
 || $_SERVER['REMOTE_ADDR'] == '::1'){ ?>
 		
 	<img style="font-size:24px;" src="img/green_arrow_down_21x21.gif" alt="Faça a sua escolha"> Escolha a sua região :

<div style="margin-bottom:50px;">
<ul>
	<?php foreach($regioes as $regiao){ ?>
		<a href="/regiao/<?= utf8_encode($regiao['Regions']['nome_sistema']) ?>/">
			<li style="font-size:18px; width:400px;">
				<?php print_r($regiao['Regions']['nome_regiao']); ?>
			</li>	
		</a>
	<?php } ?>
</ul>
</div>
<?php } else {
	
	echo 'site em andamento';
	
}
	