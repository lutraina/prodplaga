<?php

	class Business extends AppModel{
		//other code
		public $name = "Business";
		
		var $belongsTo = array(
		    'Category' => array(
		    'className' => 'Category',
		    'foreignKey' => 'categories_id',
		    
		    )
			
		);
		
		public $hasMany = array(
           'File'=> array(
                'className'=>'File',
                'foreignKey' => 'businesses_id',
                'order'      => 'File.ordem ASC'
            	),
           'AbasBusiness'=> array(
                'className'=>'AbasBusiness',
                'foreignKey' => 'business_id',
                'order'      => 'AbasBusiness.ordem ASC'
            	),
		);
}
