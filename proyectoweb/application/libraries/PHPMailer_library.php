<?php
// creacion de libreria que cargar el phpmailer
class PHPMailer_library
{
   function PHPMailer_library()
   {
       require_once('PHPMailer/class.phpmailer.php');
       require_once('PHPMailer/class.smtp.php'); 

   }
}
?>