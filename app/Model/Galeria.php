<?php	
    /**
     * Model que referencia a tabela Modas
     *
     * @package 	app.model
	 * @version     2.0
     * @author  	@alexrili
     */ 
    class Galeria extends AppModel{
        public $name = "Galeria";
		
        public $hasMany = array(
           'File'=> array(
                'className'=>'File',
                'foreignKey' => 'galerias_id',
                'order'      => 'File.ordem ASC'
            	)
			);
            
    } // END