<?php

	class AbasBusiness extends AppModel{
		//other code
		public $name = "AbasBusiness";
		public $order = "AbasBusiness.order asc";
		
		var $belongsTo = array(
		    'Business'
		);
		
		 
}
