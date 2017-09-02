<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soporte extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
		public function __construct()
        {
                parent::__construct();
     //           $this->load->Model('soporte_model');
                $this->load->Model('globables_model');
                $this->load->helper('url_helper');
            
                // agregar dos nuevos helpers. Uno poara el form y otro para la validacion 
                $this->load->helper('form');
                $this->load->library('form_validation');
                $this->ruta="./imagenes/clientes";
                // Preguntar si la session esta activa
            //if (!$this->session->userdata('id')) redirect("login");
            
        }

    // funcion de uso para el ingreso y la modificacion en el momento que se este ejecutando el formulario
    // se invoca tanto en el registro como en la modifiacion y retorna el nombrte del archivo para
    // aplicarlo tanto el insert como en el update
    
 
    
	public function index()
	{
		// en la plantilla cargar las urls		
        $data["titulo"]="Soportes";
        $data["descripcion"]="Este modulo ver los soportes registrados por usuarios del sistema";
        $data["imagen"]="clientes.jpg";
        // traer todos los datos de la tabla
        $data["lista"]=$this->soporte_model->listar_registros();
        
        $data["nombreusuario"]=$this->session->userdata('nombre')." ".$this->session->userdata('apellido');
         $data["idusuario"]=$this->session->userdata('id');
        
		$this->load->view('soporte',$data);
	}
    
    public function registro()
	{
		// en la plantilla cargar las urls		
        $data["titulo"]="Registro de Soporte";
        $data["descripcion"]="Por favor ingrese su inquetud sobre el sistema";
        $data["imagen"]="clientes.jpg";
        $data["mensajes"]="";
        
        
        $this->form_validation->set_rules('asunto','<strong>Asunto</strong>','required');
        $this->form_validation->set_rules('descrip','Descripcion','required');
        $this->form_validation->set_rules('correo','Correo electronico','required');
        
        // podemos validar si se ejecuto el boton "guardar"
        if ($this->form_validation->run()===FALSE) {
            
        } else {
            // realice algun proceso de insercion
            // ANTES DE INSERTAR, PASAR EL NOMBRE DEL ARCHIVO
            $this->soporte_model->ingresar();
            $data["mensajes"]="Su soporte ha sido ingresado con exito";

            
        }
        
        $this->load->view('soporte_formulario',$data);
	}
    

    // funcion general de envio del Correo
    // para el envio inicial al cliente que se genero el soporte y enviarle ala persona administradora del sistema que se genero un soporte y debe dare solucion
    // y despues para indicar que una vez realiza la solucion se le envie otro correo al cliente

    public function enviarcorreo(){

        // invocar la libreria que ejecuta el phpmailer e instanciarla
        $this->load->library('PHPMailer_library');
        $this->mail=new PHPMailer();

        // configurar los parametros
        // decirle que va usar smtp
        $this->mail->isSMTP();
        // trazabilidad esto es valido cuando este en pruebas
        $this->mail->SMTPDebug = 2;
        // indicar el servidor de correo
        $this->mail->Host = "localhost";
        // indicar que force la autenticacion via smtp
        $this->mail->SMTPAuth = false;
        // usuario de acceso al correo
        $this->mail->Username = "pruebas@uxagenciadigital.com";
        // clave de acceso al correo
        $this->mail->Password = "@_C4d42017x_@";
        // puerto de acceso al servidor
        $this->mail->Port = 25;
        // asignar el remitente
        $this->mail->setFrom('pruebas@uxagenciadigital.com', 'prueba de envio de correo');
        // si desea que por defecto todo correo se replique a otro
        $this->mail->addReplyTo('juanff@gmail.com', 'Replica correo');
        // agregar los correos a los cuales se van a enviar
        if (isset($correo1)) $this->mail->addAddress($correo1);
        if (isset($correo2)) $this->mail->addAddress($correo2);
        // enviar a correo com prueba
        $this->mail->addAddress("juanff@gmail.com","Copia de seguridad");
        // armar el asunto
        $this->mail->Subject = 'Asunto prueba';
        // armar el cuerpo
        $this->mail->Body = 'Cuerpo del correo ';
        // enviar el correo 
        if (!$this->mail->send()) {
            echo "Error de envio: " . $this->mail->ErrorInfo;
        } else {
            echo "Correo enviado con exito";
        }

    }
    
}











