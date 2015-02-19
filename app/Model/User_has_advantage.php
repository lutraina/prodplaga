<?php
	class User_has_advantage extends AppModel{
		
		public $name = 'User_has_advantage';
		
		public $belongsTo = array('Advantage'=>array(
			'className'=>'Advantage',
			'foreignKey'=>'advantages_id'
		),'User'=>array(
			'className'=>'User',
			'foreignKey'=>'users_id'
		));
		
		
	}
