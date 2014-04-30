<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['ga_profile_id']		= 'ga:54213456'; // GA profile id
$config['ga_email']				= 'keattisak.soodsoi@gmail.com'; // GA Account mail
$config['ga_password']		= 'nopz@310140236387'; // GA Account password

$config['cache_data']	= true; // request will be cached
$config['cache_folder']	= FCPATH.'/files/ga_files/'; // read/write
$config['clear_cache']	= array('date', '1 day ago'); // keep files 1 day

$config['debug']		= false; // print request url if true