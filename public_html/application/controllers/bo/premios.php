<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class premios extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('bo/modelo_dashboard');
		$this->load->model('bo/general');
		$this->load->model('general');
		$this->load->model('modelo_premios');
		$this->load->model('model_tipo_red');
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}

		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"logistica"))
		{
			redirect('/auth/logout');
		}

		$style=$this->modelo_dashboard->get_style(1);

		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/bo/header');
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/logistico2/premios/index');
	}
	
	function premios_pendientes(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"logistica"))
		{
			redirect('/auth/logout');
		}
		$style=$this->modelo_dashboard->get_style(1);
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		$premios = $this->modelo_premios->PremiosPendientes();
		
		$this->template->set("style",$style);
		$this->template->set("premios",$premios);
		
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/logistico2/premios/premios_pendientes');
	}
	
	function surtir()
	{
		$this->modelo_premios->cambiarEstadoPremio($_POST['id_premio'], $_POST['fecha'],'EnTransito');
	}
	
	function premios_transito(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
	
		if(!$this->general->isAValidUser($id,"logistica"))
		{
			redirect('/auth/logout');
		}
		$style=$this->modelo_dashboard->get_style(1);
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		$premios = $this->modelo_premios->PremiosTransito();
	
		$this->template->set("style",$style);
		$this->template->set("premios",$premios);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/logistico2/premios/premios_transito');
	}
	
	function embarcar()
	{
		if(isset($_POST['id']))
			$this->modelo_premios->cambiarEstadoPremioEmbarcar($_POST['id'],'Embarcado');
	}
	
	function premios_embarcados(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
	
		if(!$this->general->isAValidUser($id,"logistica"))
		{
			redirect('/auth/logout');
		}
		$style=$this->modelo_dashboard->get_style(1);
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		//$premios = $this->modelo_premios->PremiosEmbarcados();
	
		$this->template->set("style",$style);
		//$this->template->set("premios",$premios);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/logistico2/premios/premios_embarcados');
	}
	
	function embarcados(){
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"logistica"))
		{
			redirect('/auth/logout');
		}
		echo "<h1 class='text-success'>Premios Entregados</h1>";
		if(isset($_POST)){
			if($_POST['inicio'] == ''){
				echo "<h1 class='alert alert-danger'>Seleciona un rango de fecha para consultar</h1>";
			}elseif ($_POST['fin'] == ''){
				echo "<h1 class='alert alert-danger'>Seleciona un rango de fecha para consultar</h1>";
			}else{
				
				//var_dump($_POST);
				$premios = $this->modelo_premios->PremiosEmbarcadosFecha($_POST['inicio'],$_POST['fin']);
				
				$this->template->set("premios",$premios);
				$this->template->build('website/bo/logistico2/premios/embarcados');
			}
		}
	}
	
	function listar(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
	
		if($usuario[0]->id_tipo_usuario!=1)
		{
			redirect('/auth/logout');
		}
	
		$id              = $this->tank_auth->get_user_id();
		$style           = $this->general->get_style($id);
		$premios = $this->modelo_premios->traerPremios();
		$redes = $this->model_tipo_red->listarTodos();
		
		$this->template->set("style",$style);
		$this->template->set("redes",$redes);
		$this->template->set("premios",$premios);
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/bo/premios/index');
	}
	
	function nuevo_premio(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
	
		if($usuario[0]->id_tipo_usuario!=1)
		{
			redirect('/auth/logout');
		}
	
		$id              = $this->tank_auth->get_user_id();
		$style           = $this->general->get_style($id);
		$redes 	 		 = $this->model_tipo_red->listarTodos();
	
		$this->template->set("style",$style);
		$this->template->set("redes",$redes);
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/bo/premios/nuevo');
	}
	
	function crear_premio(){
		
		$red = $this->model_tipo_red->traerRed($_POST['red']);
	
		if ($_POST['nombre']==""){
			$error = "Debe agregar un nombre a la categoria.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/premios/nuevo_premio');
		}
		
		else if ($_POST['desc_frm']==""){
			$error = "Debe escribir una descripcion para la informacion.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/premios/nuevo_premio');
		}
		
		else if ($_POST['nivel']>$red[0]->profundidad || $_POST['nivel']<=0){
			if ($_POST['nivel']<=0) $error = "El nivel de profundidad no puede ser igual o menor a 0.";
			else $error = "La red solo cuenta con una capacidad de profundidad de ".$red[0]->profundidad." niveles.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/premios/nuevo_premio');
		}
		
		for ($i = 0; $i<$_POST['nivel']; $i++){
			if ($i==0){
				$frontales_por_nivel = $red[0]->frontal;
			}
			else $frontales_por_nivel = $frontales_por_nivel * $red[0]->frontal;
				
			if ($_POST['cantidad']>$frontales_por_nivel){
				$contador_de_errores = 1;
			}
			else $contador_de_errores = 0;
		}
		
		if ($contador_de_errores == 1 || $_POST['cantidad']<=0){
			if ($_POST['cantidad']<=0) $error = "La cantidad de afiliados necesarios no puede ser igual o menor a 0.";
			else	$error = "La cantidad máxima de afiliados necesarios que se puede tener en el nivel ".$_POST['nivel']." es ".$frontales_por_nivel.".";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/premios/nuevo_premio');
		}
		
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}
		//echo 'heey';
		$id=$this->tank_auth->get_user_id();
		
		if(!$this->general->isAValidUser($id,"oficina"))
		{
			redirect('/auth/logout');
		}
		
		//Checamos si el directorio del usuario existe, si no, se crea
		if(!is_dir(getcwd()."/media/premios"))
		{
			mkdir(getcwd()."/media/premios", 0777);
		}
		
		$ruta="/media/premios/";
		//definimos la ruta para subir la imagen
		$config['upload_path'] 		= getcwd().$ruta;
		$config['allowed_types'] 	= 'jpg|png|gif|jpeg';
		
		//Cargamos la libreria con las configuraciones de arriba
		$this->load->library('upload', $config);
		//echo 'heey 2';
		//Preguntamos si se pudo subir el archivo "foto" es el nombre del input del dropzone
		if (!$this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			
			$error = "El tipo de archivo que esta cargando no esta permitido.";
			
			$this->session->set_flashdata('error', $error);
			redirect('/bo/premios/nuevo_premio');
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$nombre=$data['upload_data']['file_name'];
			$nombre=$data['upload_data']['file_name'];
			$filename=strrev($nombre);
			$explode=explode(".",$filename);
			$nombre=strrev($explode[1]);
			$extencion=strrev($explode[0]);
			$ext=strtolower($extencion);
			$descripcion = $_POST['desc_frm'];
			$descripcion = htmlentities($descripcion);
			//echo 'se supone que se debo de subir';
				
			//echo 'insert into noticia (id_usuario,nombre,contenido,imagen) values ('.$id.',"'.$_POST['nombre_frm'].'","'.$_POST['desc_frm'].'","'.$ruta.$_POST['file_nme'].'")';
			$this->db->query('insert into premios (nombre,descripcion,imagen,nivel,num_afiliados,id_red,frecuencia,estatus)
				values ("'.$_POST['nombre'].'","'.$descripcion.'","'.$ruta.$nombre.".".$ext.'","'.$_POST['nivel'].'","'.$_POST['cantidad'].'","'.$_POST['red'].'","'.$_POST['frecuencia'].'","'.ACT.'")');
			//echo 'ptm';
		
		
		}

		$success = "El premio ha sido agregado satisfactoriamente.";
		$this->session->set_flashdata('success', $success);
		redirect("/bo/premios/listar");
	
	}
	
	function editar(){
		$id              = $this->tank_auth->get_user_id();
		$style           = $this->general->get_style($id);
		$redes 	 		 = $this->model_tipo_red->listarTodos();
		$premio = $this->modelo_premios->ConsultarPremio($_POST['id']);
		
		$this->template->set("redes",$redes);
		$this->template->set("premio",$premio);
		$this->template->build('website/bo/premios/editar');
	}
	
	function actualizar(){
		
		$red = $this->model_tipo_red->traerRed($_POST['red']);
		
		if ($_POST['nombre']==""){
			$error = "Debe escribir un nombre a la categoria.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/premios/listar');
		}
		
		else if ($_POST['desc_frm']==""){
			$error = "Debe escribir una descripcion para la informacion.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/premios/listar');
		}
		
		else if ($_POST['nivel']>$red[0]->profundidad || $_POST['nivel']<=0){
			if ($_POST['nivel']<=0) $error = "El nivel de profundidad no puede ser igual o menor a 0.";
			else $error = "La red solo cuenta con una capacidad de profundidad de ".$red[0]->profundidad." niveles.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/premios/listar');
		}
		
		for ($i = 0; $i<$_POST['nivel']; $i++){
			if ($i==0){
				$frontales_por_nivel = $red[0]->frontal;
			}
			else $frontales_por_nivel = $frontales_por_nivel * $red[0]->frontal;
			
			if ($_POST['cantidad']>$frontales_por_nivel){
				$contador_de_errores = 1; 
			}
			else $contador_de_errores = 0;
		}
		
		if ($contador_de_errores == 1 || $_POST['cantidad']<=0){
			if ($_POST['cantidad']<=0) $error = "La cantidad de afiliados necesarios no puede ser igual o menor a 0.";
			else	$error = "La cantidad máxima de afiliados necesarios que se puede tener en el nivel ".$_POST['nivel']." es ".$frontales_por_nivel.".";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/premios/listar');
		}
		
		$id_premio = $_POST['id'];
		$nivel= $_POST['nivel'];
		$num_afiliados= $_POST['cantidad'];
		$id_red= $_POST['red'];
		$frecuencia= $_POST['frecuencia'];
		
		if ($_POST['file_nme']==""){
			$imagen = $_POST['nombre_completo'];
			$descripcion = $_POST['desc_frm'];
			$descripcion = htmlentities($descripcion);
			
			$this->modelo_premios->actualizarPremio($id_premio,$_POST['nombre'],$descripcion,$imagen,$nivel,$num_afiliados,$id_red,$frecuencia);
		}
		else {
			$ruta="/media/premios/";
			//definimos la ruta para subir la imagen
			$config['upload_path'] 		= getcwd().$ruta;
			$config['allowed_types'] 	= 'jpg|png|gif|jpeg';
			
			//Cargamos la libreria con las configuraciones de arriba
			$this->load->library('upload', $config);
			//echo 'heey 2';
			//Preguntamos si se pudo subir el archivo "foto" es el nombre del input del dropzone
			if (!$this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());
				var_dump($error);
				exit();
				//$error = "El tipo de archivo que esta cargando no esta permitido.";
				
				$this->session->set_flashdata('error', $error);
				redirect('/bo/premios/listar');
			}
			else
			{	
				if(unlink($_SERVER['DOCUMENT_ROOT'].$_POST['file'])){
						
				}
				
					$data = array('upload_data' => $this->upload->data());
					$nombre=$data['upload_data']['file_name'];
					$nombre=$data['upload_data']['file_name'];
					$filename=strrev($nombre);
					$explode=explode(".",$filename);
					$nombre=strrev($explode[1]);
					$extencion=strrev($explode[0]);
					$ext=strtolower($extencion);
					$imagen = $ruta.$nombre.".".$ext;
				
	
				$descripcion = $_POST['desc_frm'];
				$descripcion = htmlentities($descripcion);
				
				$this->modelo_premios->actualizarPremio($id_premio,$_POST['nombre'],$descripcion,$imagen,$nivel,$num_afiliados,$id_red,$frecuencia);
			}
		}
		$success = "El premio ha sido actualizado satisfactoriamente.";
		$this->session->set_flashdata('success', $success);
		redirect("/bo/premios/listar");
	
	}
	
	function eliminar(){
		$this->modelo_premios->eliminar($_POST['id']);
		
		if(unlink($_SERVER['DOCUMENT_ROOT'].$_POST['file'])){
			
		}
		$success = "El premio ha sido eliminado satisfactoriamente.";
		$this->session->set_flashdata('success', $success);
		redirect("/bo/premios/listar");
	}
	
	function cambiar_estatus(){
		$correcto = $this->modelo_premios->cambiar_estatus($_POST['id'], $_POST['estatus']);
		echo "";
	}
}