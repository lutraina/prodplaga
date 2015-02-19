<?php

	class Auto extends AppModel{
		//other code
		public $name = "Auto";
		
		public $hasMany = array(
           'File'=> array(
                'className'=>'File',
                'foreignKey' => 'autos_id',
                'order'      => 'File.ordem ASC'
            	)
			);
}
