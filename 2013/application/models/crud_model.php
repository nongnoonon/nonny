<?php

class Crud_model extends CI_Model {
	
	function __construct()
	{
		parent::__construct(); 
	}
	
	function createRecord($record, $table) 
	{
		$insert = $this->db->insert($this->db->dbprefix($table), $record);
		return $insert;
	}
	
	function countRecord($table, $where = NULL)
	{
		$table = $this->db->dbprefix($table);
		
		$sql = "SELECT * FROM {$table}";
		
		if(! empty($where))
		{
			$sql .= " WHERE ";
			$loop = count($where);
			foreach($where as $key => $value){
				$sql .= $key . " = '" . $value . "'";
				if($loop > 1){
					$sql .= " and ";	
				}
				$loop = $loop - 1;
			}	
		}
		
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
	
	function readRecordMax($table, $value)
	{
		$table = $this->db->dbprefix($table);
		$this->db->select_max($value);
		$query = $this->db->get($table);
		return $query->row();
		// Produces: SELECT MAX(age) as age FROM members
	}
	
	function randRecord( $table , $where = NULL , $limit = 1, $output = 'result' )
	{
		$table = $this->db->dbprefix($table);
		
		$sql = "SELECT * FROM {$table}";
		
		if(! empty($where))
		{
			$sql .= " WHERE ";
			$loop = count($where);
			foreach($where as $key => $value){
				$sql .= $key . " = '" . $value . "'";
				if($loop > 1){
					$sql .= " and ";	
				}
				$loop = $loop - 1;
			}	
		}
		$sql .= " ORDER BY RAND() LIMIT {$limit}";
		
		$query = $this->db->query($sql);
		return ($output == 'result')? $query->result() : $query->row();
	}
	
	function randNotInRecord( $table , $notIn , $limit = "1" , $where = "id" , $any = NULL)
	{
		$table = $this->db->dbprefix($table);
		
		$sql = "SELECT * FROM {$table}";
		
		if(! empty($notIn))
		{
			$sql .= " WHERE {$where} NOT IN ({$notIn})";	
		}
		
		if(!empty($any)){
			$sql .= " {$any}";
		}
		
		$sql .= " ORDER BY RAND() LIMIT {$limit}";
		
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	function randInRecord( $table , $where , $in , $any = NULL)
	{
		$table = $this->db->dbprefix($table);
		
		$sql = "SELECT * FROM {$table}";
		
		if(! empty($in))
		{
			$sql .= " WHERE {$where} IN ({$in})";	
		}
		
		if(!empty($any)){
			$sql .= " {$any}";
		}
		
		$sql .= " ORDER BY RAND()";
		
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	function searchRecord( $table , $search , $orderBy = "id", $sortBy = TRUE, $startId = NULL, $limit = NULL , $return = TRUE)
	{
		$table = $this->db->dbprefix($table);
		
		$sql = "SELECT * FROM {$table}";
		
		if(! empty($search))
		{
			$sql .= " WHERE ";
			$loop = count($search);
			foreach($search as $key => $value){
				$sql .= "{$key} LIKE '%{$value}%'";
				if($loop > 1){
					$sql .= " or ";	
				}
				$loop = $loop - 1;
			}	
		}
		
		if(! empty($orderBy) and $sortBy === TRUE)
		{
			$sql .= " ORDER BY {$orderBy} ASC";
		} 
		elseif(! empty($orderBy) and $sortBy === FALSE)
		{
			$sql .= " ORDER BY {$orderBy} DESC";
		}
		
		if(! empty($limit) and empty($startId))
		{
			$startId = 0;
			$limit = $limit;
			$sql .= " LIMIT {$startId}, {$limit} ";
		} 
		elseif($limit > 0 and $startId > 0)
		{
			$startId = $startId;
			$limit = $limit;
			$sql .= " LIMIT {$startId}, {$limit} ";
		}
		
		$query = $this->db->query($sql);
		
		return ($return)? $query->result() : $query->row();
	}
	
	function readRecord($table , $where = NULL, $orderBy = NULL, $sortBy = TRUE, $startId = NULL, $limit = NULL, $orAnd = "and" , $enlarge = NULL)
	{
		$table = $this->db->dbprefix($table);
		
		$sql = "SELECT * FROM {$table}";
		
		if(! empty($where))
		{
			$sql .= " WHERE ";
			$loop = count($where);
			foreach($where as $key => $value){
				$sql .= $key . " = '" . $value . "'";
				if($loop > 1){
					$sql .= " {$orAnd} ";	
				}
				$loop = $loop - 1;
			}	
		}
		
		if(! empty($enlarge))
		{
			$sql .= $enlarge;
		}
		
		if(! empty($orderBy) and $sortBy === TRUE)
		{
			$sql .= " ORDER BY {$orderBy} ASC";
		} 
		elseif(! empty($orderBy) and $sortBy === FALSE)
		{
			$sql .= " ORDER BY {$orderBy} DESC";
		}
		
		if(! empty($limit) and empty($startId))
		{
			$startId = 0;
			$limit = $limit;
			$sql .= " LIMIT {$startId}, {$limit} ";
		} 
		elseif($limit > 0 and $startId > 0)
		{
			$startId = $startId;
			$limit = $limit;
			$sql .= " LIMIT {$startId}, {$limit} ";
		}
		
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	function readRecordRow($table, $where = NULL, $orAnd = "and")
	{
		$table = $this->db->dbprefix($table);
		
		$sql = "SELECT * FROM {$table}";
		
		if(! empty($where))
		{
			$sql .= " WHERE ";
			$loop = count($where);
			foreach($where as $key => $value){
				$sql .= $key . " = '" . $value . "'";
				if($loop > 1){
					$sql .= " {$orAnd} ";	
				}
				$loop = $loop - 1;
			}	
		}
		
		$sql .= " LIMIT 1";	

		$query = $this->db->query($sql);
		return $query->row();
	}
	
	function updateRecord($record, $table, $id , $field = 'id') 
	{
		$table = $this->db->dbprefix($table);
		$this->db->where($field, $id);
		$update = $this->db->update($table, $record);
		return $update;
	}
	
	function deleteRecord($table, $id)
	{
		$table = $this->db->dbprefix($table);
		$this->db->where('id', $id);
		$del = $this->db->delete($table);
		return $del;
	}
	
}