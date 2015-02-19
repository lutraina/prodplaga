<?php
	class User_has_favorito extends AppModel{
		
		public $name = 'User_has_favorito';
		
		public $belongsTo = array(
		'Galeria'=>array(
			'className'=>'Galeria',
			'foreignKey'=>'galerias_id',
		));
		
		public $hasMany = array(
           'File'=> array(
                'className'=>'File',
                'foreignKey' => 'galerias_id',
                'order'      => 'File.ordem ASC'
            	)
			);
		
		
	}
