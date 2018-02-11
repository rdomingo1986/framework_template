<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['SMTPDebug'] = 0;
$config['CharSet'] = "UTF-8";
$config['Host'] = $_ENV['HOSTING_MAIL_HOSTNAME'];
$config['SMTPAuth'] = true;
$config['Username'] = $_ENV['HOSTING_MAIL_EMAIL'];
$config['Password'] = $_ENV['HOSTING_MAIL_PASSWORD'];
$config['SMTPSecure'] = $_ENV['HOSTING_MAIL_ENCRYPT_PROTOCOL'];
$config['Port'] = $_ENV['HOSTING_MAIL_PORT'];
$config['SMTPOptions'] = [
  'ssl' => [
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true
  ]
];