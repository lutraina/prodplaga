<?php

	class Imovei extends AppModel{
		//other code
		public $name = "Imovei";
		
		public $hasMany = array(
           'File'=> array(
                'className'=>'File',
                'foreignKey' => 'imoveis_id',
                'order'      => 'File.ordem ASC'
            	)
			);
}
