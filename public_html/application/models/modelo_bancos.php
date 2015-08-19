<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class modelo_bancos extends CI_Model
{
	function crear_banco($banco, $cuenta, $pais, $clabe)
	{
		$q = $this->db->query("SELECT id_banco FROM cat_banco where descripcion = '".$banco."' and cuenta = '".$cuenta."'");
		$banco_con = $q->result();
		
		if(!isset($banco_con[0]->id_banco)){
			$datos = array(
					'descripcion' => $banco,
					'id_pais'	=> $pais,
					'cuenta'   => $cuenta,
					'clave'		=> $clabe,
					'estatus'	=> 'ACT'
			);
			
			$this->db->insert("cat_banco", $datos);
		}
	}
	
	function Bancos(){
		$q = $this->db->query("SELECT cb.id_banco, p.Name as pais , cb.descripcion as nombre, cb.cuenta, cb.clave, cb.estatus FROM cat_banco cb, Country p where cb.id_pais = p.Code order by cb.id_pais");
		$banco_con = $q->result();
		return $banco_con;
	}
	
	function ConsultarTransacionBanco($id){
		$q = $this->db->query("SELECT id_banco FROM cuenta_pagar_banco_historial where id_banco = ".$id);
		$banco_con = $q->result();
		return $banco_con;
	}
	
	function EliminarBanco($id){
		$this->db->query("delete from cat_banco where id_banco = ".$id);
	}
	
	function CambiarEstadoBanco($id, $estado){
		$this->db->query("update cat_banco set estatus = '".$estado."' where id_banco = ".$id);
	}
	
	function Banco($id){
		$q = $this->db->query("SELECT * FROM cat_banco where id_banco = ".$id);
		$banco_con = $q->result();
		return $banco_con;
	}
	
	function actualizar_banco($id ,$banco, $cuenta, $pais, $clabe)
	{
		$datos = array(
					'descripcion' => $banco,
					'id_pais'	=> $pais,
					'cuenta'   => $cuenta,
					'clave'		=> $clabe,
					'estatus'	=> 'ACT'
			);
			
		$this->db->update('cat_banco', $datos, "id_banco = ".$id);
	}
	
}