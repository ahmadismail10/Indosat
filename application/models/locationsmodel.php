<?php

class locationsModel extends CI_Model {
 
 function getLocations(){
  $this->db->select("LONG, LAT"); 
  $this->db->from('utilisasi_sa_surabaya');
  $this->db->where('MICRO_CLUSTER =', 'MC-SURABAYA_1_1');
  $query = $this->db->get();
  return $query->result();
 }

 function getMaxAmount()
 {
 	$query = $this->db->query("SELECT MAX(AMOUNT_DEBIT) FROM `TRX_OUTLET`");
 	return $query->result();
 }
}
?>