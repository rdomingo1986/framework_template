<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct() {
    parent::__construct();
    $this->load->model('UsersModel','users');
    header('Content-Type: application/json');
  }

  public function signIn() {
    echo json_encode($this->users->signIn());
  }

  public function signOut() {
    echo json_encode($this->users->signOut());
  }
}
