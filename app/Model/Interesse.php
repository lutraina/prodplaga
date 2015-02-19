<?php
	class Interesse extends AppModel{
		
		public $name = 'Interesse';
		
		public $hasMany = array('User_has_interesse'=>array(
			'className'=>'User_has_interesse',
			'foreignKey'=>'interesses_id'
		));
		
		
	}
