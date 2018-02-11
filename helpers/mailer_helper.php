<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require APPPATH.'libraries/phpmailer/src/Exception.php';
require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
require APPPATH.'libraries/phpmailer/src/SMTP.php';

class Mailer {

  public static function sendMail($parameters) {
    $CI =& get_instance();
    $CI->load->config('mailer');

    $SMTPDebug = $CI->config->item('SMTPDebug');
    $CharSet = $CI->config->item('CharSet');
    $Host = $CI->config->item('Host');
    $SMTPAuth = $CI->config->item('SMTPAuth');
    $Username = $CI->config->item('Username');
    $Password = $CI->config->item('Password');
    $SMTPSecure = $CI->config->item('SMTPSecure');
    $Port = $CI->config->item('Port');
    $SMTPOptions = $CI->config->item('SMTPOptions');

    $mail = new PHPMailer(true);                             
    try {
      
      $mail->SMTPDebug = $SMTPDebug;                         
      $mail->CharSet = $CharSet;
      $mail->isSMTP();                                     
      $mail->Host = $Host;  
      $mail->SMTPAuth = $SMTPAuth;                            
      $mail->Username = $Username;         
      $mail->Password = $Password;         
      $mail->SMTPSecure = $SMTPSecure;     
      $mail->Port = $Port;                 
      $mail->SMTPOptions = $SMTPOptions;
  
      $mail->setFrom($Username, 'Notifications');

      foreach($parameters['mails'] AS $email) {
        $mail->addAddress($email);
      }
      
      $mail->isHTML(true);                              
      $mail->Subject = $parameters['subject'];
      $mail->Body    = $parameters['body'];
      $mail->AltBody = 'Alternative text for no HTML mail clients';
  
      $mail->send();
    } catch (Exception $e) {
      throw new Exception($mail->ErrorInfo);
    }
  }
}
?>