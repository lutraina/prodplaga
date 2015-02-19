<?php

class News extends AppModel{
	public $name = "News";
	
	var $belongsTo = array(
	    'Category' => array(
	    'className' => 'Category',
	    'foreignKey' => 'categories_id',
	    )
	);
}
