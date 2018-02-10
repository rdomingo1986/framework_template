<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExampleModel extends CI_Model {

	public function exampleFunction() {

    return [
      'status' => 'success', // or error
      'message' => '',
      'code' => 0,
      'data' => []
    ];
	}
}
