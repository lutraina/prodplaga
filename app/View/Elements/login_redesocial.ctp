<div class="row mt5">
	<div class="four columns">
		<a href="<?= $facebook_auth_url ?>"><img src="/img/login-facebook.png" /></a>
	</div>
	<div class="four columns">
					<?php
					    echo $this->Form->create('User', array('type' => 'post', 'action' => 'login'));
					    echo $this->Form->hidden('Twitter.login', array('label' => false,'value' => '1'));
					    echo $this->Form->submit("Login with twitter",array('class'=>'login-twitters', 'label' => false, 'type' => 'image', 'src' => '/img/login-twitter.png'));
					    echo $this->Form->end();
					?>
	</div>
	<div class="four columns">
		<a href="<?= $gplus_authurl ?>"><img src="/img/login-googleplus.png" /></a>
	</div>
</div>