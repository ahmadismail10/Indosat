<?php

class locationsModel extends CI_Model {
 
 function getLocations(){
  $this->db->select("LONG, LAT"); 
  $this->db->from('utilisasi_sa_surabaya');
  $this->db->where('MICRO_CLUSTER !=', 'MC-GRESIK');
  $query = $this->db->get();
  return $query->result();
 }
 
}
?>