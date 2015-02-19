<?php
	class DataHelper extends AppHelper{
		
		
		

		
		
		public function intervalo($data1=null,$data2=null){
			

			if($data2==null){
				
				if(strtotime($data2) > strtotime('25-06-2013 00:00:00')){
					date_default_timezone_set("US/Mountain");
				}
							$data2 = date('Y-m-d H:i:s');
			}
			
			$unix_data1 = strtotime($data1);
			$unix_data2 = strtotime($data2);
			
			$tempo = round(($unix_data2 - $unix_data1) / 60);
			$time = ' H';
			
			if($tempo<60){
				$time = ' min';
			}else{
				$tempo = round(($unix_data2 - $unix_data1) / 3600);
				$time = ' h';
				if($tempo>24){
					$tempo = round($tempo / 24);
					if($tempo>1)
						$time = ' dias';
					else
						$time = ' dia';
				}
			
			}
			return $tempo.$time.' atrás';
			 
		}
		
		public function convertWeek($weekDay=null){
			if($weekDay == 'Mon')
				return 'Segunda';
			elseif($weekDay == 'Tue')
				return 'Terça';
			elseif($weekDay == 'Wed')
				return 'Quarta';
			elseif($weekDay == 'Thu')
				return 'Quinta';
			elseif($weekDay == 'Fri')
				return 'Sexta';
			elseif($weekDay == 'Sat')
				return 'Sábado';
			elseif($weekDay == 'Sun')
				return 'Domingo';
			
		}
		
		public function calendar($date=null,$filtro='all/0/'){
			
			if($date ==null)
				$date = date("Y-m-d");
			
			$dia = substr($date,8,2);
			$mes = substr($date,5,2);
			$ano = substr($date,0,4);
			
			
			
			/*
			 * Pega o mes anterior e o próximo
			 * se for menor que 10 acrescenta um (0) antes do numero
			 * se for menor que ZERO o mes anterior vira 12 se for maior que 13 o mes atual vira 12
			 * 
			 * A data anterior sempre será a partir da data atual do servidor e nunca da data vindoura da view.
			 * */
			 
			$mesAtual =  date('m');
			$mesAnterior  = $mesAtual-1;
			$mesProximo  = $mesAtual+1;
			if($mesAnterior == 0){
				$mesAnterior = 12;
				
			}
			if($mesProximo == 13){
				$mesProximo = 01;
				
			}
			if($mesAnterior < 10){
				$mesAnterior = '0'.$mesAnterior;
			}
			if($mesProximo < 10){
				$mesProximo = '0'.$mesProximo;
			}
			// Fim do mes anterior e próximo
			
			
			/*
			 * Pega 5 dias Anteriores a data current Ou seja a data clicada pelo usuário
			 * */		
			if(date('d') - 5 <=0 ){
				$diasAnteriores = $this->GetNumeroDias($mesAnterior,$ano)-5;
			}else{
				$diasAnteriores = date('d') - 5;
			}
			// Fim dos 5 dias anteriores
			
			/*
			 * Quantidade de vezes que o loop vai passar e imprimir os dias, ou seja a soma dos meses atual, próximo e anterior
			 * é descontado 5 dias do mes anterior e count pasas a valer a partir do resultado. Ex: dia atual 01/08 mes anterior começa a partir de 26/07 
			 * */
			$countCal = $this->GetNumeroDias($mesAnterior,$ano) + $this->GetNumeroDias($mesAtual,$ano) + $this->GetNumeroDias($mesProximo,$ano);
			
			/*
			 * Cria um current do mes, já que estamos trabalhando com 3 meses diferentes
			 * array(mesAnterior, mesAtual(vem da view), mesPróximo)
			 * */
			$mesesCal = array($this->GetNumeroDias($mesAnterior,$ano), $this->GetNumeroDias($mesAtual,$ano),$this->GetNumeroDias($mesProximo,$ano));
			
			
			/*
			 * Elementos mostrados no carrossel
			 * */
			 
			 if($mes < $mesAtual){
				$countCalendarioView = $dia - $diasAnteriores -3; 	
			 }else if($mes > $mesAtual){
			 	$countCalendarioView = $this->GetNumeroDias($mes,$ano) + ($this->GetNumeroDias($mes,$ano) - $diasAnteriores) + ($dia -4); 	
			 }else{
			 	$countCalendarioView = $this->GetNumeroDias($mes,$ano) - $diasAnteriores + ($dia -2);
			 }
			
			
			
			/*
			 * Começa o loop do calendário
			 * 
			 * 
			 * */
			$mesCount = 0;
			$diaCal = $diasAnteriores;
			$mesCurrent = array($mesAnterior,$mesAtual,$mesProximo);
			$nomeMes = 'start';
			
			
			
			
			
			
			for($i=$diasAnteriores; $i <= $countCal; $i++){
					
					
					if($diaCal > $mesesCal[$mesCount]){
						$diaCal = 1;
						$mesCount++;
					}
					
					if($diaCal < 10){
						$diaCal = '0'.$diaCal;
					}
					
					//dia current	
					if($dia.$mes == $diaCal.$mesCurrent[$mesCount] ){
						$current = 'current';
						
					}else{
						$current = ' ';
					}
					//mostra o nome do dia Ex: Segunda
					$diaSemana = $this->convertWeek(date("D",strtotime($ano.'-'.$mesCurrent[$mesCount].'-'.$diaCal)));
					
					//mostra o mês se o dia for 1
					if($diaCal==1 || $nomeMes == 'start'){
						$nomeMes = $this->GetNomeMes($mesCurrent[$mesCount]);
					}else{
						$nomeMes = ' ';
					}
				
				
				$diasCalendario[] =  
					'<li class="relative '.$current.'">
						<a href="/agenda/'.$filtro.'/'.$ano.'-'.$mesCurrent[$mesCount].'-'.$diaCal.'">
							<span class="mes-num2">'.$nomeMes.'</span>
							<span class="dia-num2">'.$diaCal.'</span>
							<div class="dia-ext2">
								<span>'.$diaSemana.'</span>
							</div>
						</a>
					</li>';
				$diaCal++;
			}

			return array('currentView'=>$countCalendarioView,'dias'=>$diasCalendario);
		}


		public function GetNumeroDias( $mes =null, $ano =null )
		{

			return cal_days_in_month(CAL_GREGORIAN, $mes, $ano); 
		}
		 
		public function GetNomeMes( $mes )
		{
		     $meses = array( '01' => "Janeiro", '02' => "Fevereiro", '03' => "Março",
		                     '04' => "Abril",   '05' => "Maio",      '06' => "Junho",
		                     '07' => "Julho",   '08' => "Agosto",    '09' => "Setembro",
		                     '10' => "Outubro", '11' => "Novembro",  '12' => "Dezembro"
		                     );
		 
		      if( $mes >= 01 && $mes <= 12)
		        	return $meses[$mes];
		 
		        return "Mês deconhecido";
		 
		}		
	}

