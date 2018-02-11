<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Example extends CI_Controller {

	function __construct() {
    parent::__construct();
    $this->load->model('ExampleModel','example');
    header('Content-Type: application/json');
  }

  public function exampleFunction() {
    echo json_encode($this->example->exampleFunction());
  }

  public function signIn() {
    echo json_encode($this->example->signIn());
  }

  public function signOut() {
    echo json_encode($this->example->signOut());
  }
}
