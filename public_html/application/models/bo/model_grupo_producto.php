<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class model_grupo_producto extends CI_Model
{
function __construct()
	{
		parent::__construct();
	}
	
	function Categorias(){
		$categorias = $this->db->query('select gp.id_grupo, tr.nombre as id_red, gp.descripcion, gp.estatus 
				from cat_grupo_producto gp, tipo_red tr where gp.id_red = tr.id');
		return $categorias->result();
	}
	
	function  CrearCategoria(){
		$datos = array(
				'descripcion' => $_POST['nombre'],
				'id_red'	  => $_POST['red'],
				'estatus'	  => $_POST['estado']
		);
		$this->db->insert('cat_grupo_producto', $datos);
		return true;
	}
	
	function ConsultarCategoria($id){
		$categoria = $this->db->query('select * from cat_grupo_producto where id_grupo = '.$id.'');
		return $categoria->result();
	}
	
	function actualizar_categoria(){
		$datos = array(
				'descripcion' => $_POST['nombre'],
				'id_red'	  => $_POST['red'],
				'estatus'	  => $_POST['estado']
		);
		$this->db->where('id_grupo', $_POST['id']);
		$this->db->update('cat_grupo_producto', $datos);
		return true;
	}
	
	function eliminar_categoria(){
		$this->db->query("delete from cat_grupo_producto where id_grupo=".$_POST["id"]);
		return true;
	}
	
	function cambiar_estatus_categoria(){
		
		$this->db->query("update cat_grupo_producto set estatus = '".$_POST['estado']."' where id_grupo=".$_POST["id"]);
		return true;
	}
	
	function VerificarCategoria($id_categoria){
		$q = $this->db->query("select nombre from producto where id_grupo = ".$id_categoria);
		$pro = $q->result();
		if(isset($pro[0]->nombre)){
			return false;
		}
		
		$q = $this->db->query("select nombre from servicio where id_red = ".$id_categoria);
		$pro = $q->result();
		if(isset($pro[0]->nombre)){
			return false;
		}
		
		$q = $this->db->query("select nombre from combinado where id_red = ".$id_categoria);
		$pro = $q->result();
		if(isset($pro[0]->nombre)){
			return false;
		}
		
		return true;
	}
}