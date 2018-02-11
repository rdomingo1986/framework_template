<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		if(!isset($this->session->id)) {
			redirect(base_url());
		}
		$this->load->view('Dashboard/dashboard_view');
	}
}
