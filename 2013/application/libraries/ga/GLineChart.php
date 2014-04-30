<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @brief Main class
 *
 * This is the mainframe of the wrapper
 *
 * @version 0.5.2
 */
 
class GLineChart extends GCApi{
		
	function __construct($width = 200, $height = 200){
		$this -> setProperty('cht', 'lc');
		$this -> setDimensions($width, $height);		
	}
	public function getUrl() {
		$retStr = parent::getUrl();
		return $retStr;
	}
}