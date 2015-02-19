
	$(document).ready(function(){
		$('.click').click(function(){
			var baner = $(this);
			$.ajax({
			    url:'/clicks/count_click/Click/'+baner.attr('data-click'),
			    type:'POST',
				 	beforeSend: function(){
				  },
				  	success: function(content) {
						return true;
				  },
				  	error: function(content) {
						return false;
				  }		   
	
			});		
		})
	})
	