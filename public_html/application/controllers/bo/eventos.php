<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class eventos extends CI_Controller
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
		$this->load->model('bo/model_admin');
		$this->load->model('bo/general');
		$this->load->model('bo/modelo_comercial');
	}
	function index()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		
		if(!$this->general->isAValidUser($id,"oficina"))
		{
			redirect('/auth/logout');
		}

		$style=$this->modelo_dashboard->get_style(1);

		$this->template->set("style",$style);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/bo/header');
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/oficinaVirtual/eventos/index');
	}

	function alta()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		
		if(!$this->general->isAValidUser($id,"oficina"))
		{
			redirect('/auth/logout');
		}
	
		$eventos=$this->modelo_comercial->get_evento();
		$data["eventos"]=$eventos;
		
		$style=$this->modelo_dashboard->get_style(1);
	
		$this->template->set("style",$style);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/oficinaVirtual/eventos/alta',$data);
	}
	function listar()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
	$id=$this->tank_auth->get_user_id();
		
		if(!$this->general->isAValidUser($id,"oficina"))
		{
			redirect('/auth/logout');
		}
	
		$style=$this->modelo_dashboard->get_style(1);
		$eventos=$this->modelo_comercial->get_evento();
		$this->template->set("eventos",$eventos);
		$this->template->set("style",$style);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/oficinaVirtual/eventos/listar');
	}
	
	function nuevo_evento()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
		
	$id=$this->tank_auth->get_user_id();
		
		if(!$this->general->isAValidUser($id,"oficina"))
		{
			redirect('/auth/logout');
		}
		
		$data=$_GET["info"];
		$data=json_decode($data,true);
		$tipo=$data['tipo'];
		$color=$data['color'];
		$nombre=$data['nombre'];
		$desc=$data['descripcion'];
		$dia_ini=$data['dia_ini'];
		$hora_ini=$data['hora_ini'];
		$minuto_ini=$data['minuto_ini'];
		$dia_fin=$data['dia_fin'];
		$hora_fin=$data['hora_fin'];
		$minuto_fin=$data['minuto_fin'];
		$url=addslashes($data['url']);
		$ano_ini=substr($dia_ini, 6);
		$mes_ini=substr($dia_ini, 3,2);
		$dia_ini=substr($dia_ini, 0,2);
		$ano_fin=substr($dia_fin, 6);
		$mes_fin=substr($dia_fin, 3,2);
		$dia_fin=substr($dia_fin, 0,2);
		$inicio=$ano_ini.'-'.$mes_ini.'-'.$dia_ini.' '.$hora_ini.':'.$minuto_ini.':00';
		$fin=$ano_fin.'-'.$mes_fin.'-'.$dia_fin.' '.$hora_fin.':'.$minuto_fin.':00';
		$id=$this->tank_auth->get_user_id();
		$this->db->query('insert into evento (id_tipo,id_color,id_usuario,nombre,descripcion,inicio,fin,lugar,costo,direccion,latitud,longitud,observaciones,url)
						values('.$tipo.','.$color.','.$id.',"'.$nombre.'","'.$desc.'","'.$inicio.'","'.$fin.'","'.$data["lugar"].'",'.$data["costo"].'
						,"'.$data["direccion"].'","0.00000","0.00000","'.$data["observacion"].'","'.$url.'")');
		$id_evento=mysql_insert_id();
	}
	
	function cambiar_estado_evento(){
		$this->db->query("update evento set estatus = '".$_POST['estado']."' where id=".$_POST["id"]);
		return true;
	
	}
	
	function editar_evento(){
		$id              = $this->tank_auth->get_user_id();
		$style           = $this->general->get_style($id);
		$evento	 	 = $this->modelo_comercial->get_evento_id($_POST['id']);
		$this->template->set("evento",$evento);
		$this->template->build('website/bo/oficinaVirtual/eventos/editar');
	}
	
	function actualizar_evento(){
		$correcto=$this->modelo_comercial->actualizar_evento();
		if($correcto){
			echo "Evento Actualizado";
		}
		else{
			echo "No se logro actualizar Evento";
		}
	}
	
	function kill_evento()
	{
		$this->db->query("delete from evento where id=".$_POST["id"]);
	}
	
	function ver(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}

		$id=$this->tank_auth->get_user_id();
		
		if(!$this->general->isAValidUser($id,"oficina"))
		{
			redirect('/auth/logout');
		}
		
		
		$style=$this->general->get_style(1);
		$this->template->set("style",$style);
		
		$eventos=$this->modelo_comercial->get_eventos_activos();
		$data=array();
		$data["eventos"]=$eventos;
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/bo/oficinaVirtual/eventos/ver',$data);
	}
	
	function get_info_evento()
	{
		$evento=$this->modelo_comercial->get_evento_id($_POST["id"]);
		echo "	<table class='table table-striped table-forum hidden-sm hidden-xs'>
					<tr>
						<th class='text-center' colspan='2'><h3 class='text-primary'><strong>NOMBRE</strong></h3></th>
						<th class='text-center' colspan='2'><h4><strong>".$evento[0]->nombre."</strong></h4></th>
					</tr>
					<tr>
						<th class='text-center'><h5 class='text-primary'><strong>LUGAR</strong></h5></th>
						<td class='text-center'><h6>".$evento[0]->lugar."</h6></td>
						<th class='text-center'><h5 class='text-primary'><strong>FECHA Y HORA</strong></h5></th>
						<td class='text-center'><h6>".$evento[0]->inicio."</h6></td>
					</tr>
					<tr>
						<th class='text-center'><h5 class='text-primary'><strong>COSTO</strong></h5></th>
						<td class='text-center'><h6>$ ".$evento[0]->costo."</h6></td>
						<th class='text-center'><h5 class='text-primary'><strong>OBSERVACIONES</strong></h5></th>
						<td class='text-center'><h6>".$evento[0]->observaciones."</h6></td>
					</tr>
					<tr>
						<th class='text-center'><h5 class='text-primary'><strong>DIRECCION</strong></h5></th>
						<td class='text-center'><h6>".$evento[0]->direccion."</h6></td>

					</tr>
				</table>
				<table class='table table-striped table-forum hidden-lg hidden-md'>
					<tr>
						<th class='text-center' colspan='2'><h3 class='text-primary'><strong>NOMBRE</strong></h3></th>
					</tr>
					<tr>
						<th class='text-center' colspan='2'><h4><strong>".$evento[0]->nombre."</strong></h4></th>
					</tr>
					<tr>
						<th class='text-center'><h5 class='text-primary'><strong>LUGAR</strong></h5></th>
						<td class='text-center'><h6>".$evento[0]->lugar."</h6></td>
					</tr>
					<tr>
						<th class='text-center'><h5 class='text-primary'><strong>FECHA Y HORA</strong></h5></th>
						<td class='text-center'><h6>".$evento[0]->inicio."</h6></td>
					</tr>
					<tr>
						<th class='text-center'><h5 class='text-primary'><strong>COSTO</strong></h5></th>
						<td class='text-center'><h6>".$evento[0]->costo."</h6></td>
					</tr>
					<tr>
						<th class='text-center'><h5 class='text-primary'><strong>OBSERVACIONES</strong></h5></th>
						<td class='text-center'><h6>".$evento[0]->observaciones."</h6></td>
					</tr>
					<tr>
						<th class='text-center'><h5 class='text-primary'><strong>DIRECCION</strong></h5></th>
						<td class='text-center'><h6>".$evento[0]->direccion."</h6></td>
					</tr>
				</table>
				<div id='googleMap' style='width:100%;height:100%;'>".$evento[0]->url."
				</div>
				<script>
					$('iframe').each(
					     function(index, elem) {
					         elem.setAttribute('width','100%');
					     }
					 );
				</script>		
				"
			;
	}
}
