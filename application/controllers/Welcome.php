<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __Construct(){
	 	parent::__Construct ();
		$this->load->database(); // load database
	   	$this->load->model('locationsModel'); // load model 
	 }
	public function index()
	{
		$this->data['transaksi'] = $this->locationsModel->getDataTransaksi();
		$this->data['occupancy'] = $this->locationsModel->getDataOccupancy();
		$this->data['vlr'] = $this->locationsModel->getVLR();
		$this->load->view('welcome_message', $this->data);
	}
	public function detaildaily()
	{
		$this->data['dailytraffic'] = $this->locationsModel->getdailyTRAFFIC();
		$this->data['dailyvlr'] = $this->locationsModel->getdailyVLR();
		$this->data['maxamount'] = $this->locationsModel->getMaxAmount();
		$this->load->view('detaildaily', $this->data);
	}

	public function detailmonthly()
	{
		$this->data['dailytraffic'] = $this->locationsModel->getdailyTRAFFIC();
		$this->data['dailyvlr'] = $this->locationsModel->getdailyVLR();
		$this->data['maxamount'] = $this->locationsModel->getMaxAmount();
		$this->load->view('detailmonthly', $this->data);
	}

	public function detailweekly()
	{
		$this->data['dailytraffic'] = $this->locationsModel->getdailyTRAFFIC();
		$this->data['dailyvlr'] = $this->locationsModel->getdailyVLR();
		$this->data['maxamount'] = $this->locationsModel->getMaxAmount();
		$this->load->view('detailweekly', $this->data);
	}


}
