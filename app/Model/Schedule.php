<?php

	class Schedule extends AppModel{
		//other code
		public $name = "Schedule";
		
		var $belongsTo = array(
		    'Category' => array(
		    'className' => 'Category',
		    'foreignKey' => 'categories_id',
		    
		    )
			
		);
}
