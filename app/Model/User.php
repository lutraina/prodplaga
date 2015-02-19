<?php
App::uses('AuthComponent', 'Controller/Component');
	class User extends AppModel{
		//other code
		public $name = "User";
		public $validate = array(
			'username'=>array(
				'rule'=>'notEmpty',
				'message'=>'Informe um usuário'
			),
			'oldpassword'=>array(
				'rule'=>'notEmpty',
				'message'=>'Você precisa informar sua senha atual.'
			),
			'password'=>array(
			    'Not empty'=>array(
			        'rule'=>'notEmpty',
			        'message'=>'Digite uma senha'
			    ),
			    'Match passwords'=>array(
			        'rule'=>'matchPasswords',
			        'message'=>'As senhas digitadas não são iguais'
			    )
			),
			'password_confirmation'=>array(
			    'Not empty'=>array(
			        'rule'=>'notEmpty',
			        'message'=>'Confirme sua senha'
			    )
			)
		);
		
		
		public $hasMany = array(
           'Convite'=> array(
                'className'=>'Convite',
                'foreignKey' => 'users_id',
                
            	)
			);	
	
	public function matchPasswords($data) {
	    if ($data['password'] == $this->data['User']['password_confirmation']) {
	        return true;
	    }
	    $this->invalidate('password_confirmation', 'As senhas não são iguais.');
	    return false;
	}
		
        public function beforeSave($options = array()) {
            if (isset($this->data['User']['password'])) {
                $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
            }
            return true;
        }
    }
