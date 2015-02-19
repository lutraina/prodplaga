<?php
	class PercentHelper extends AppHelper{
		
		public function _getConvert($valor,$total){
			$percent = $valor / $total * 100;
			return round($percent);
		}
		
		public function _getDescont($de,$por){
			$percent = 100-($por / $de * 100);
			return round($percent);
		}
	}
