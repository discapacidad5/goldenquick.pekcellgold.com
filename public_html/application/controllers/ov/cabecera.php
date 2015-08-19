<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class cabecera extends CI_Controller
{
	function __construct()

	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('ov/model_cabecera');
		$this->load->model('ov/general');
		$this->load->model('model_emails_departamentos');
	}
	function tablero()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}
		$id=$this->tank_auth->get_user_id();
		$style=$this->general->get_style($id);
		$usuario=$this->general->get_username($id);

		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/ov/header');
        $this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/cabecera/tablero');
	}
	function actualizar()
	{
		$id=$this->tank_auth->get_user_id();
		$this->model_cabecera->actualizar($id);
	}

	function archivo()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$style=$this->general->get_style($id);
		$archivos=$this->model_cabecera->get_files($id);

		$this->template->set("style",$style);
		$this->template->set("archivos",$archivos);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/ov/header');
        $this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/cabecera/archivero');
	}

	function sube_archivo()
	{


		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}
		$id=$this->tank_auth->get_user_id();

		//Checamos si el directorio del usuario existe, si no, se crea
		if(!is_dir(getcwd()."/media/".$id))
		{
			mkdir(getcwd()."/media/".$id, 0777);
		}

		$ruta="/media/".$id."/";
		//definimos la ruta para subir la imagen
		$config['upload_path'] 		= getcwd().$ruta;
		$config['allowed_types'] 	= 'hqx|cpt|csv|bin|dms|lha|lzh|exe|class|psd|so|sea|dll|oda|pdf|ai|eps|ps|smi|smil|mif|xls|ppt|pptx|wbxml|wmlc|dcr|dir|dxr|dvi|gtar|gz|php|php4|php3|phtml|phps|js|swf|sit|tar|tgz|xhtml|xht|zip|mid|midi|mpga|mp2|mp3|mp4|aif|aiff|aifc|ram|rm|rpm|ra|rv|wav|bmp|gif|jpeg|jpg|jpe|png|tiff|tif|css|html|htm|shtml|txt|text|log|rtx|rtf|xml|xsl|mpeg|mpg|mpe|qt|mov|avi|movie|doc|docx|xlsx|word|xl|eml|json';

		//Cargamos la libreria con las configuraciones de arriba
		$this->load->library('upload', $config);

		//Preguntamos si se pudo subir el archivo "foto" es el nombre del input del dropzone
		if (!$this->upload->do_upload("foto"))
		{
			$error = array('error' => $this->upload->display_errors());
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$this->model_cabecera->file_user($id,$data["upload_data"]);
		}

	}

	function del_file_multiple()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}

		$this->model_cabecera->del_file_multiple();
	}
	function del_file()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}
		$this->model_cabecera->del_file();
		if(unlink(getcwd().$_POST['url']))
			echo "Su archivo fue borrado con exito";
	}

	function email()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		$style=$this->general->get_style($id);
		
		$datos_departamentos = $this->model_emails_departamentos->buscar();
		
  		$this->template->set("style",$style);
		$this->template->set("usuario",$usuario);
		$this->template->set("datos_departamentos",$datos_departamentos);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/cabecera/view_email');
		
		
	}
	function envia_mail()
	{
		$this->load->library('Email');

		$id=$this->tank_auth->get_user_id();
		$email=$this->model_cabecera->get_mail($id);
		$email=$email[0]->email;

		$usuario=$this->general->get_username($id);
		$nombre=$usuario[0]->nombre." ".$usuario[0]->apellido;

		$this->email->from($email, $nombre);
			
		$this->email->to($_POST['departamento']);
		$mensaje=$_POST['mensaje'];
		$this->email->message($mensaje);
		$this->email->subject($_POST['subject']);
		
	    $files = array();
        $fdata = $_FILES["userfile"];
        if (is_array($fdata["name"])) {//This is the problem
                for ($i = 0; $i < count($fdata['name']); ++$i) {
                        $files[] = array(
                            'name' => $fdata['name'][$i],
                            'tmp_name' => $fdata['tmp_name'][$i],
                        );
                }
        } else {
                $files[] = $fdata;
        }

        foreach ($files as $file) {
        	$this->email->attach($file['tmp_name'], 'attachment',$file['name']);
                // uploaded location of file is $file['tmp_name']
                // original filename of file is $file['file']
        }

		if($this->email->send()){
			echo "Se ha enviado el email Exitosamente .";
		}else{
			echo "Error enviando el email .<br>Porfavor verificar la informacion e intentar nuevamente .";
		}
	}
	function send_mail(){
		
			$email=$_POST['emaild'];
			//if(this->spamcheck($email)==true){
			$to='giovanna.rugerio@devdrem.com';								//send to primary email
			$name= $_POST['named'];
			$departamento= $_POST['departamento'];
			switch($departamento)
			{
				case "general": $departamento="Dirección general"; break;
				case "comercial": $departamento="Dirección comercial"; break;
				case "soporte": $departamento="Soporte técnico"; break;
			}
		
			$subject= $_POST['subject'].'. '.$departamento;
			
			$message = wordwrap($_POST['message'], 70, "\r\n")."\n".' Atentamente: '.$name."\n".$departamento;
			$headers = 'From:'. $email . "\r\n";
			if(isset($_POST['copy']))
			{
				$headers .= 'CC:'. $email . "\r\n";
			}
			mail($to, $subject, $message, $headers);
	}
	function compartir()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$style=$this->general->get_style($id);
		$archivos=$this->model_cabecera->get_files_compartido();

		$this->template->set("style",$style);
		$this->template->set("archivos",$archivos);
		$this->template->set("id",$id);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/ov/header');
        $this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/cabecera/compartir');
	}
	function comparte_archivo()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}

		$this->model_cabecera->compartir(0);
	}
	function sube_archivo_compartido()
	{


		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}
		$id=$this->tank_auth->get_user_id();

		//Checamos si el directorio del usuario existe, si no, se crea
		if(!is_dir(getcwd()."/media/".$id))
		{
			mkdir(getcwd()."/media/".$id, 0777);
		}

		$ruta="/media/".$id."/";
		//definimos la ruta para subir la imagen
		$config['upload_path'] 		= getcwd().$ruta;
		$config['allowed_types'] 	= 'hqx|cpt|csv|bin|dms|lha|lzh|exe|class|psd|so|sea|dll|oda|pdf|ai|eps|ps|smi|smil|mif|xls|ppt|pptx|wbxml|wmlc|dcr|dir|dxr|dvi|gtar|gz|php|php4|php3|phtml|phps|js|swf|sit|tar|tgz|xhtml|xht|zip|mid|midi|mpga|mp2|mp3|mp4|aif|aiff|aifc|ram|rm|rpm|ra|rv|wav|bmp|gif|jpeg|jpg|jpe|png|tiff|tif|css|html|htm|shtml|txt|text|log|rtx|rtf|xml|xsl|mpeg|mpg|mpe|qt|mov|avi|movie|doc|docx|xlsx|word|xl|eml|json';

		//Cargamos la libreria con las configuraciones de arriba
		$this->load->library('upload', $config);

		//Preguntamos si se pudo subir el archivo "foto" es el nombre del input del dropzone
		if (!$this->upload->do_upload("foto"))
		{
			$error = array('error' => $this->upload->display_errors());
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$this->model_cabecera->file_user($id,$data["upload_data"]);
			$id_archivero=mysql_insert_id();
			$this->model_cabecera->compartir($id_archivero);


		}

	}
	
}
?>