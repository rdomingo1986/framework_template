<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersModel extends CI_Model {

  public function signIn() {
    $res = $this->db->where([
      'email' => $this->input->post('email'),
      'password' => md5($this->input->post('password'))
    ])
    ->get('users')
    ->row();

    if(!isset($res)) {
      return [
        'status' => 'error',
        'message' => 'Usuario y/o clave inválidas'
      ];
    }

    $this->session->set_userdata([
      'id' => $res->id
    ]);

    return [
      'status' => 'success',
      'message' => 'Bienvenido al sistema'
    ];
  }

  public function signOut() {
    $this->session->sess_destroy();

    return [
      'status' => 'success',
      'message' => 'Hasta pronto'
    ];
  }
}
