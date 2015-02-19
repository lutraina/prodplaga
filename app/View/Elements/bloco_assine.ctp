<!--popup-->
	<div id="boxes2" class="avaliacao">
		<div id="dialog2" class="window">
			<div class="boxes-header">
				<h2>Assinar newsletter</h2>
				<a href="#" class="close">Fechar [X]</a><br />
			</div>
			<div class="row mt20">
				<div class="row resultado-newsletter2">
					<div class="four columns">
						<span class="texto-newsletter">Receba nossas atualizações:</span>
					</div>
					<div class="five columns">
						<form id="form-newsletter2" method="post"><input type="text" placeholder="e-mail" name="email" class="input-shadow input-newsletter" /></form>
						<span class="ico-input-newsletter"></span>
					</div>
					<div class="two columns">
						<button class="button button-radius button-black-top upper mt3 button-newsletter2">assinar</button>
					</div>
					<div class="one column"></div>
				</div>
			</div>
			
		</div>
		<!-- Máscara para cobrir a tela -->
		<div id="mask"></div>
	</div>
<script type="text/javascript">

$(document).ready(function() {	

	$('a[name=modal2]').click(function(e) {
		e.preventDefault();
		
		var id = $(this).attr('href');
	
		var maskHeight = $(document).height();
		var maskWidth = $(window).width();
	
		$('#mask').css({'width':maskWidth,'height':maskHeight});

		$('#mask').fadeIn(1000);	
		$('#mask').fadeTo("slow",0.8);	
	
		//Get the window height and width
		var winH = $(window).height();
		var winW = $(window).width();
              
		$(id).css('top',  winH/2-$(id).height()/2);
		$(id).css('left', winW/2-$(id).width()/2);
	
		$(id).fadeIn(2000); 
	
	});
	
	$('.window .close').click(function (e) {
		e.preventDefault();
		
		$('#mask').hide();
		$('.window').hide();
	});		
	
	$('#mask').click(function () {
		$(this).hide();
		$('.window').hide();
	});			
	
});

</script>
<!-- Fim Janela Modal com caixa de diálogo -->  

<script>
$(".input-newsletter").keypress(function(event) {
	
		if (event.which == 13 ) {

			return false;
		  }
		})    
	$('.button-newsletter2').click(function(){
			$("#form-newsletter2").ajaxForm({
				
		        url: '/newsletter/cadastro/assine',
		    	beforeSend:function(){
		    	
		    		$('.resultado-newsletter2').html('Agurade...');
		    		
		
		    	},
		        success: function(data) {
					$('.resultado-newsletter2').html(data);
		        	
		        },
		        error: function(){
		            mensagem.html('Erro com o arquivo');
		            }
		 
			}).submit()
	       
		})
</script>