<?php

	/**
	 * Controller responsavel pelos usuarios do sistema
	 *
	 * @package       app.Controller.UsersController
	 * @version       2.0
	 * @author		  Alex Ribeiro <alex@onload.com.br>
	 */
	class ClicksController extends ClicksAppController{
		public $name = "Clicks";
		
		/**
		 * Metodo onde são colocadas configurações para os components
		 */
		 
		public function count_click($model=null,$id=null){
			$this->autoRender = false;
			$this->loadModel($model);
			$this->$model->save( array($model=>array('click'=>1,'banners_id'=>$id)));

		}

		public function count_click_slide($model=null,$id=null){
			$this->autoRender = false;
			$this->loadModel($model);
			
			
			$this->$model->updateAll(
			    array($model.'.clicks' => $model.'.clicks + '. 1),                    
			    array($model.'.id' => $id)
			);
			
			
		}		

	}

