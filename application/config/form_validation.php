<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$CI =& get_instance();

$config['sign-in'] = [
  [
    'field' => 'email',
    'label' => 'email',
    'rules' => [
      'required',
      'valid_email'
    ],
    'errors' => [
      'required' => 'El email es requerido',
      'valid_email' => 'Formato de email inválido'
    ]
  ],
  [
    'field' => 'password',
    'label' => 'password',
    'rules' => [
      'required'
    ],
    'errors' => [
      'required' => 'La contraseña es requerida'
    ]
  ]
];