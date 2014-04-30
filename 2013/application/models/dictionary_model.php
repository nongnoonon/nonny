<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dictionary_model extends CI_Model{
	
	private $CI;
	
	function __construct()
	{
		parent::__construct();
		
		$CI =& get_instance();
		$this->CI = $CI;
	    
	}
        
        function getMandarin( $case , $level = 1 , $stage = 1, $hsk = 1, $mandarin_id = NULL)
        {
            switch ($case){
                
                case "ptest":
                    $mandarin = $this->CI->crud_model->randRecord($this->db->dbprefix('terminology'), array('level_id'=>1, 'stage_id'=>1), 1, 'row');
                    return $mandarin;
                break;
	
		 case "quiz":
                    $mandarin = $this->CI->crud_model->randRecord($this->db->dbprefix('terminology'), array('level_id'=>$level, 'stage_id'=>$stage, 'hsk_id'=>$hsk), 1, 'row');
                    return $mandarin;
                break;
		
		case "match":
		     $match = $this->CI->crud_model->randRecord($this->db->dbprefix('term_meaning'), array('term_id'=>$mandarin_id , 'setdefault' => 1), 1 , 'row');
                    return $match;
		break;
		
            }
        }
	
	function getChoice( $case , $rand , $num = 4 )
	{
		switch ($case){
                
                case "randNotIn":
                    $choice = $this->CI->crud_model->randNotInRecord($this->db->dbprefix('terminology'), $rand , $num);
                    return $choice;
                break;
            
                case "randIn":
                    $choice = $this->CI->crud_model->randInRecord($this->db->dbprefix('terminology'), 'id', $rand);
                    return $choice;
                break;
            }
	}
        
        function getMeaning( $case , $rand , $num = 4)
        {
            switch ($case){
                
                case "randNotIn":
                    $meaning = $this->CI->crud_model->randNotInRecord($this->db->dbprefix('term_meaning'), $rand , $num, 'term_id', 'AND setdefault=1');
                    return $meaning;
                break;
            
                case "randIn":
                    $meaning = $this->CI->crud_model->randInRecord($this->db->dbprefix('term_meaning'), 'term_id', $rand, 'AND setdefault=1');
                    return $meaning;
                break;
            }
        }
        
}