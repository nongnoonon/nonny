<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @brief Main class
 *
 * This is the mainframe of the wrapper
 *
 * @version 0.5.2
 */
 
class GOverlappedBarChart extends GCApi{
	function __construct($width = 200, $height = 200){
		$this -> setChartType('o', 'v');
		$this->setDimensions($width, $height);			
	}
	public function setHorizontal($isHorizontal = true){
		if($isHorizontal){
			$this -> setChartType('o', 'h');
		}
		else{
			$this -> setChartType('o', 'v');
		}
	}
}