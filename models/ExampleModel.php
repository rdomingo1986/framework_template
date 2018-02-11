<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExampleModel extends CI_Model {

	public function exampleFunction() {
    
    return [
      'status' => 'success', // or error
      'message' => '',
      'code' => 0,
      'data' => $this->input->post()
    ];
  }

  public function signIn() {
    $this->session->set_userdata(['id' => 1]);

    return [
      'status' => 'success', // or error
      'message' => '',
      'code' => 0,
      'data' => []
    ];
  }

  public function signOut() {
    $this->session->sess_destroy();

    return [
      'status' => 'success', // or error
      'message' => '',
      'code' => 0,
      'data' => []
    ];
  }
  
  public function customValidation() {
    return true; 
  }

  public function customValidation2() {
    return true; 
  }
}
