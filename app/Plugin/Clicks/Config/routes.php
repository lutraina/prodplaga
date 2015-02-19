<?php
	
	Router::connect('/clicks/count_click/*', array('plugin'=>'clicks', 'controller' => 'clicks', 'action' => 'count_click'));
	Router::connect('/clicks/count_click_slide/*', array('plugin'=>'clicks', 'controller' => 'clicks', 'action' => 'count_click_slide'));
	
	