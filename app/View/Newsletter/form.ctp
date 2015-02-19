<div class="four columns">
	<span class="texto-newsletter">Receba nossas atualizações:</span>
</div>
<div class="five columns">
	<form id="form-newsletter" method="post"><input type="text" placeholder="e-mail" name="email" class="input-shadow input-newsletter" /></form>
	<span class="ico-input-newsletter"></span>
</div>
<div class="two columns">
	<button class="button button-radius button-black-top upper mt3 button-newsletter">assinar</button>
</div>
<div class="one column"></div>


<script>
	$(".input-newsletter").keypress(function(event) {
	
		if (event.which == 13 ) {

			return false;
		  }
		})    
	$('.button-newsletter').click(function(){
			
			$("#form-newsletter").ajaxForm({
				
		        url: '/newsletter/cadastro/',
		    	beforeSend:function(){
		    	
		    		$('.resultado-newsletter').html('Agurade...');
		    		
		
		    	},
		        success: function(data) {
					$('.resultado-newsletter').html(data);
		        	
		        },
		        error: function(){
		            mensagem.html('Erro com o arquivo');
		            }
		 
			}).submit()
	       
		})
</script>