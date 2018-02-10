<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProjectHooks {

  private $rules = [
    'class' => [
      'function_1' => [
        'validateSignIn' => true
      ],
      'function_2' => [
        'validationRule' => 'rule-name'
      ],
      'function_3' => [
        'validateSignIn' => true,
        'validationRule' => 'rule-name'
      ]
    ]
  ];

  public function __construct() { }

  public function isSignIn() {
    $CI =& get_instance();
    
    if(isset($this->rules[ strtolower($CI->router->class) ][ strtolower($CI->router->method) ]['validateSignIn'])) {
      if(!isset($CI->session->id)) {
        header('Content-Type: application/json');
        echo json_encode([
          'status' => 'sessionError',
          'messages' => 'You don\'t have a session in the server',
          'code' => 900,
          'data' => []
        ]);
        exit;
      }
    }
  }

  public function validateInputData() {
    $CI =& get_instance();

    if(isset($this->rules[ strtolower($CI->router->class) ][ strtolower($CI->router->method) ]['validationRule'])) {
      $rule = $this->rules[ strtolower($CI->router->class) ][ strtolower($CI->router->method) ]['validationRule'];
      if($CI->form_validation->run($rule) === false) {
        header('Content-Type: application/json');
        echo json_encode([
          'status' => 'validationError',
          'messages' => 'You have errors in your input data',
          'code' => 800,
          'data' => $CI->form_validation->error_array()
        ]);
        exit;
      }
    }
  }
}
