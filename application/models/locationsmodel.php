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

 function getDataTransaksi()
 {
 	$query = $this->db->query("SELECT ORGANIZATION_NAME FROM `TRX_OUTLET` WHERE MONTH(TANGGAL)=9 GROUP BY ORGANIZATION_ID ORDER BY AVG(AMOUNT_DEBIT) ASC LIMIT 5");
 	return $query->result();
 }
 function getDataOccupancy()
 {
 	$query = $this->db->query("SELECT CELLID FROM `UTILISASI_SA_SURABAYA` WHERE MICRO_CLUSTER='MC-Surabaya_1_1' GROUP BY SITEID ORDER BY HSDPA_USER_W36 ASC LIMIT 5");
 	return $query->result();
 }
 function getVLR()
 {
 	$query = $this->db->query("call growth_vlr('2017-09-27')");
 	return $query->result();
 }
}
?>