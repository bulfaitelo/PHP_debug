<?php
/**  
* Classe PHP_debug, para depuração de variaveis e Classes.
* Arquivo PHP_debug.class.php 
* @author Thiago Rodrigues @bulfaitelo
* @version 0.3;
* @category Debug;
*/


class PHP_debug {

	/** 
	 * @var string $time Varivel utilizada para armazenar o valor atual do tempo para determinar o tempo de execução da Função PHP_debug 
	 * @var boll $set_debug_var variavel responsavel por ativar ou desativar o debug.
	 */
	private $time;
	private $set_debug_var;

	

	/**
	 * Define o local de trabalho, com isso inibe a função de Debug
	 * @param bool|true Define se o debug vai estár ativo ou não;
	**/
	public function PHP_debug($var = true){
		$this->set_debug_var = $var;
	}
	/**
	 * Função a qual recebe e retorna as informações detalhadas da variavel recebida no teste, como por exemplo tempo de execução, uso de memória, tipo de variáel
	 * @param mixed $variavel  Recebe a variavel, vetor que vai ser debugado, 
	 * @param string|null $var_name Recebe a variavel e imprime seu respectivo nome.
	 * @param bool|null $break Define se vai executar um break ou exit no final do debug
	 * @return string Retorna as informações detalhadas da variavel recebida.
	**/	
	public function debug($variavel = null, $var_name = null, $break = null){		
	    $backtrace = debug_backtrace();
	    $line = $backtrace[0]['line'];
	    $file = $backtrace[0]['file'];
		$var_name = htmlspecialchars($var_name);
		if($this -> use_debug() == true){
			if($variavel){
				$this -> startExec();				 				
				echo "<pre style='background-color:#EBEBEB; padding: 3px; border: 1px solid silver; border-radius: 10px; z-index: 100;'>\n"; 
				if($var_name){
					echo "<b>Variavel Recebida:</b> <b style='color: blue;'>$var_name</b><br />";				
				}
				if($line){
					echo "<b>Linha debug: {$line} </b> ";
				}
				if($file){
					echo "<b>Arquivo debug : {$file} </b> <br>";
				}
				if(!is_object($variavel)){
					echo "<b>Memory:</b>"; echo"<b style='color: green;' >".$this -> sizeofvar($variavel). "</b>";
				}
				echo "<br /><b>Variavel Saida</b>: ";
				strip_tags(var_dump($variavel)); 
				echo "<b>Tempo de Execucao </b> <b style ='color: red;' >".$this -> endExec()."</b>";
				echo"</pre>\n ";						
			}
			else{
				echo"<pre style='background-color:#EBEBEB; padding: 3px; border: 1px solid silver; border-radius: 10px; z-index: 100; '>\n";
				echo "<b>Variavel Recebida:</b> <b style='color: blue;'>$var_name</b> <br><b>Variavel Saida</b>: ";
				echo "<b style ='color: red;'>Null</b> \n";
				echo "</pre>";
			}
			if($break){
				break;exit(); 
			}
		}
	}	

	/**
	 * Define o local de trabalho, com isso inibe a função de Debug
	 * @param bool|true Define se o debug vai estár ativo ou não;
	**/
	public function use_debug(){
		return $this->set_debug_var;
	}

	/**
	 * Recebe um numero em bits e tranforma em suas respcivas casas decimais, isso é, kb, mb ...
 	 * @param int $size Recebe o valor em bit
	 * @return retorna o valor na formatado por exemplo em b, Kb, Gb, Tb.
	**/
	private function convert_memory_use($size){
		 $unit=array('b','kb','mb','gb','tb','pb');
    	 return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
	}

	/**
	 * Determina a o tamanho da variavel em Bit.
	 * @param string $var Recebe a varaivel a ser analisada
	 * @return retorna o tamanho da variavel recebida.
	**/
	private function sizeofvar($var) {
	    $start_memory = memory_get_usage();
	    $tmp = unserialize(serialize($var));
	    return $this-> convert_memory_use(memory_get_usage() - $start_memory);
	}

	/**
	 * Obtem o tempo atual do sistema
	 * @return time, retorna o tempo atual do servidor.
	**/
	private function getTime(){
	      return microtime(TRUE);
	   }
	    
    /**
     * Calcula o tempo inicial que a função foi chamada
     * @return null
    **/
	private function startExec(){	      
	      $this->time = $this -> getTime();
	   }
	    
    /**
     * Calcula o tempo de execução da função.
     * @return int Retorna o tempo de execução do script
    **/
	private function endExec(){	            
	      $finalTime = $this->getTime();
	      $execTime = $finalTime - $this->time;
	      return number_format($execTime, 6) . ' s';
	   }	
	
}
// ================================================ ]

?>