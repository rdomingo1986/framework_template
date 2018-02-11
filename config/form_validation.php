<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$CI =& get_instance();
$CI->load->model('ExampleModel', 'example');

$config['validation-rule'] = [
  [
    'field' => 'email',
    'label' => 'email',
    'rules' => [
      'required',
      'min_length[5]',
      'valid_email',
      ['customValidation', [$CI->example, 'customValidation']],
      ['customValidation2', [$CI->example, 'customValidation2']]
    ],
    'errors' => [
      'required' => 'Campo requerido',
      'valid_email' => 'Formato de email inválido',
      'min_length' => 'Minimo 5 caracteres',
      'customValidation' => 'Error personalizado 1',
      'customValidation2' => 'Error personalizado 2'
    ]
  ]
];