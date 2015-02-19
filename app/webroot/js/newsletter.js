	$(document).ready( function() {
		// validate signup form on keyup and submit
		$("#FormNewsletter").validate({
			rules: {
				"data[Newsletter][email]": {
					required: true,
					email: true,
				},			
			},
			messages: {			
				"data[Newsletter][email]": {
					required: "Este campo é obrigatório!",
					email: "Digite um e-mail válido!"
				},
			}
		});
		
		
	    $('#FormNewsletter').ajaxForm({
			beforeSerialize:function($form, options){
				jQuery('#respostaNewsletter').html('<img src="/img/loader.gif" align="absmiddle">');			
			}, 
	   		success:function(content){  			
	  			jQuery('#respostaNewsletter').html(content);	  			
	  		},
	  		error:function(content){
	  			
	  		}
	    });
							
	});