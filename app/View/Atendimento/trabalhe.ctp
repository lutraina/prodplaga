</div>



<div class="atendimento">
	<div class="box-menu-atendimento">
		<ul class="menu-atendimento">
			<li><a href="/atendimento/contato">entre em contato</a></li>
			<li class="current"><a href="/atendimento/trabalhe">trabalhe conosco</a></li>
			<li><a href="/atendimento/anuncie">anuncie em nosso site</a></li>
		</ul>
	</div>
	<div class="row mt20">
		<div class="eight columns">
			<div class="row">
				<span class="icon-categoria"></span><span class="titulo-categoria">Trabalhe Conosco</span>
			</div>
			<div class="row texto mt10">
				Envie seu curriculo para rh@nocambui.com.br
			</div>
		</div>
		<div class="four columns">
			<div class="box-informacoes">
				<div class="row">
					<span class="icon-categoria"></span><span class="titulo-categoria">Informações</span>
				</div>
				<div class="row texto mt10">
					<?= $atendimentos['Atendimento']['texto']?>
				</div>
				<!--
				<div class="row texto mt10">
					<h3 class="row">Endereço</h3>
					<?= $atendimentos['Atendimento']['endereco']?>
				</div>
				<div class="row mt10">
					<img src="/img/maps-atendiemnto.png" width="100%" />
				</div>
				-->
				<div class="row texto mt10">
					<h3 class="row">Telefone</h3>
					<?= $atendimentos['Atendimento']['telefone']?>
				</div>
				<div class="row texto mt10">
					<h3 class="row">E-mail para Contato</h3>
					<?= $atendimentos['Atendimento']['email']?>
				</div>
			</div>
		</div>
	</div>
</div>
