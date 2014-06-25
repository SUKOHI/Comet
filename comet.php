<?php

require 'class/comet.php';

$duration = 3;	// skippable (Default: 300)
$sleep = 1;		// skippable (Default: 1 sec)

$comet = new Comet($duration, $sleep);
$value = '';

$comet->watch(function() use ($comet, &$value) {
	
	if($value = file_get_contents('data/data.dat')) {
		
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
