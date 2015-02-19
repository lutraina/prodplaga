<?php	
    /**
     * Model que referencia a tabela Modas
     *
     * @package 	app.model
	 * @version     2.0
     * @author  	@alexrili
     */ 
    class File extends AppModel{
        public $name = "File";
        public $belongsTo = array(
           'Galeria'=> array(
                'className'=>'Galeria',
                'foreignKey' => 'galerias_id'
            )
        );
		
    } // END