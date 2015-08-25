<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class modelo_premios extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function getPremiosCondicion($id_red){
		$q = $this->db->query("select id, nivel, num_afiliados from premios where id_red =".$id_red);
		return $q->result();
	}
	
	function ConsultarPremio($id){
		$q = $this->db->query("select * from premios where id = ".$id);
		return $q->result();
	}
	
	function InsertarPremioAfiliado($id_premio,$id_afiliado){
		if(!$this->consultar_premio_afiliado($id_premio, $id_afiliado)){
			$datos = array(
					'id_premio' => $id_premio,
					'id_afiliado' => $id_afiliado
			);
			$this->db->insert("cross_premio_usuario", $datos);
		}
	}
	
	function consultar_premio_afiliado($id_premio,$id_afiliado){
		$q = $this->db->query("select estado from cross_premio_usuario where id_premio = ".$id_premio." and id_afiliado = ".$id_afiliado);
		$premio = $q->result();
		if(isset($premio[0]->estado)){
			return true;
		}else{
			return false;
		}
	}
}