<?php
	class VideoHelper extends AppHelper{
		
		public function _getConvert($link=null){
			
			$convert = explode('=', $link);
			
			return 'http://www.youtube.com/v/'.$convert[1];
		}
		public function _getThumb($link=null){
			
			$convert = explode('=', $link);
			
			return 'http://i1.ytimg.com/vi/'.$convert[1].'/default.jpg';
		}		
	}
