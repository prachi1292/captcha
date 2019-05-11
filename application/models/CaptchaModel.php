<?php
Class CaptchaModel extends CI_Model{
	
	function addRecord($table_name,$data) {
        	$this->db->insert($table_name, $data);
        	$insert_id = $this->db->insert_id();
 			return $insert_id;
 }
	
}
?>