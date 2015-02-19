<!-- BANNER TOPO  => banner como o da clinica Shalon que tem 728 x 90 -->


<div class="row sub-header2" style="height:90px;">
	<div class=" columns">
		<a href="/"><img  style="width:125px; height:48px;" class="logo" src="/img/logo_plaga.png" /></a>
	</div>
	
		 
</div>
 
<div class="row sub-header4">
	<div style="width:729px; margin-top:35px;">
		<!--<img style="width:100%" class="banner1" src="/img/banner1.jpg" />-->
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<ins class="adsbygoogle"
			     style="display:inline-block;width:729px;height:89px"
			     data-ad-client="ca-pub-4475543678910973"
			     data-ad-slot="9710819406"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>
</div>

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
		    	
		    		$('.resultado-newsletter').html('Aguarde...');
		    		
		
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