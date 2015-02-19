<?php

	class Category extends AppModel{
		//other code
		public $name = "Category";
		
		var $hasMany = array(
			    'Schedule' => array(
			    'className' => 'Schedule',
			    'foreignKey' => 'categories_id',
			    'dependent'=> true,
			    'order'=>array('schedule'=>'ASC'),
		    ),
		    
		    'News' => array(
			    'className' => 'News',
			    'foreignKey' => 'categories_id',
			    'dependent'=> true,
			    'order'=>array('News.id'=>'DESC'),
		    ),		    
		    
		    'Business' => array(
			    'className' => 'Business',
			    'foreignKey' => 'categories_id',
			    'dependent'=> true,
			    
		    )
			
			
		);
}
