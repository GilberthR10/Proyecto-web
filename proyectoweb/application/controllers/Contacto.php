<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacto extends CI_Controller {
		public function __construct()
        {
            parent::__construct();
            $this->load->library("PHPMailer_library"); //cargando mi biblioteca
    }
	public function index()
	{
        $this->mail = new PHPMailer();
        $this->mail->IsSMTP(); // establecemos que utilizaremos SMTP
        $this->mail->SMTPAuth   = false; // habilitamos la autenticación SMTP
        $this->mail->SMTPDebug       = 1;      // Debuger         
        $this->mail->Host       = "localhost";      // establecemos GMail como nuestro servidor SMTP
        $this->mail->Port       = 25;                   // establecemos el puerto SMTP en el servidor de GMail
        $this->mail->Username   = "pruebas@uxagenciadigital.com";  // la cuenta de correo GMail
        $this->mail->Password   = "@_C4d42017x_@";            // password de la cuenta GMail
        $this->mail->SetFrom('pruebas@uxagenciadigital.com', 'Juan Fernando');  //Quien envía el correo
        $this->mail->AddReplyTo("juanff@gmail.com","Juan Fernando");  //A quien debe ir dirigida la respuesta
        $this->mail->Subject    = "Asunto del correo";  //Asunto del mensaje
        $this->mail->Body      = "Cuerpo en HTML<br />";
        $this->mail->AltBody    = "Cuerpo en texto plano";
        $destino = "juanff@gmail.com";
        $this->mail->AddAddress($destino, "Juan Fernando");

//        $this->mail->AddAttachment("images/phpmailer.gif");      // añadimos archivos adjuntos si es necesario
  //      $this->mail->AddAttachment("images/phpmailer_mini.gif"); // tantos como queramos
        if(!$this->mail->Send()) {
            $data["message"] = "Error en el envío: " . $this->mail->ErrorInfo;
        } else {
            $data["message"] = "¡Mensaje enviado correctamente!";
        }
        echo $data['message'];

    //    $this->load->view('sent_mail',$data);
    }
}