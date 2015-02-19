<?php
	class User_has_interesse extends AppModel{
		
		public $name = 'User_has_interesse';
		
		public $belongsTo = array('Interesse'=>array(
			'className'=>'Interesse',
			'foreignKey'=>'interesses_id'
		));
		
		
	}
