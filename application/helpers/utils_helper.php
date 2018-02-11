<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utils {

  public static function randomMd5Hash($parameters = []) {
    if(!array_key_exists('databaseTable', $parameters) && !array_key_exists('databaseField', $parameters)) {
      return md5(md5(time() . time() . time()));
      exit;
    }
    $CI =& get_instance();
    do {
      $md5Hash = md5(time() . time() . time());
      $res = $CI->db->select($parameters['databaseFieldID'])
        ->from($parameters['databaseTable'])
        ->where($parameters['databaseField'], $md5Hash)
        ->get()
        ->num_rows();
    }while($res != 0);
    return $md5Hash;
  }

  public static function generateRandomString($length) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
  }
}