<?php

class Comet {
	
	private $_end_time, 
		$_sleep, 
		$_result, 
		$_stop_flag, 
		$_is_timeout;
	
	public function __construct($duration=300, $sleep=1) {

		$this->_end_time = time() + $duration;
		$this->_sleep = $sleep;
		
	}
	
	public function watch($closure) {
		
		$this->_value = null;
		$this->_result = false;
		$this->_stop_flag = false;
		$this->_is_timeout = false;
		
		while(1 == 1) {

			if($closure()) {
				
				$this->_value = $value;
				$this->_result = true;
				return;
				
			} else if($this->_end_time < time()) {
				
				$this->_is_timeout = true;
				return;
				
			} else if($this->_stop_flag) {
				
				return;
				
			}
		
			sleep($this->_sleep);
			
		}
		
	}
	
	public function getResult() {
		
		return $this->_result;
		
	}
	
	public function isTimeout() {
		
		return $this->_is_timeout;
		
	}
	
	public function getHttpStatus() {
		
		return $this->_http_status;
		
	}
	
	public function stop() {
		
		$this->_stop_flag = true;
		
	}
	
}

/*** Example

	require 'comet.php';
	
	$duration = 3;	// skippable (Default: 300)
	$sleep = 1;		// skippable (Default: 1 sec)
	
	$comet = new Comet($duration, $sleep);
	$value = '';
	
	$comet->watch(function() use ($comet, &$value) {
		
		if($value = file_get_contents('data.dat')) {
			
			return true;	// When data exist, return true;
			
		}
		
		// $comet->stop();
		
	});
	
	if($comet->getResult()) {
		
		echo json_encode($value);
		
	} else if($comet->isTimeout()) {
		
		header('HTTP', true, 408);
		echo json_encode('timeout');
		
	} else {	// Stopped
		
		echo json_encode(null);
		
	}

***/
