<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class modelo_premios extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function getPremiosCondicion($id_red){
		$q = $this->db->query("select id, nivel, num_afiliados, frecuencia from premios where id_red =".$id_red);
		return $q->result();
	}
	
	function getPremiosActivos($id_red){
		$q = $this->db->query("select id, nivel, num_afiliados, frecuencia from premios where id_red =".$id_red." and estatus = 'ACT'");
		return $q->result();
	}
	
	function ConsultarPremio($id){
		$q = $this->db->query("select * from premios where id = ".$id);
		return $q->result();
	}
	
	function traerPremios(){
		$q = $this->db->query("select * from premios");
		return $q->result();
	}
	
	function InsertarPremioAfiliado($id_premio,$id_afiliado, $frecuencia){
		if(!$this->consultar_premio_afiliado($id_premio, $id_afiliado, $frecuencia)){
			$datos = array(
					'id_premio' => $id_premio,
					'id_afiliado' => $id_afiliado
			);
			$this->db->insert("cross_premio_usuario", $datos);
			return true;
		}else{
			return false;
		}
	}
	
	function actualizarPremio($id_premio,$nombre,$descripcion,$imagen,$nivel,$num_afiliados,$id_red,$frecuencia){
		
			$datos = array(
					'nombre' => $nombre,
					'descripcion' => $descripcion,
					'imagen' => $imagen,
					'nivel' => $nivel,
					'num_afiliados' => $num_afiliados,
					'id_red' => $id_red,
					'frecuencia' => $frecuencia
			);
			$this->db->where('id', $id_premio);
			$this->db->update("premios", $datos);
		
	}
	
	function consultar_premio_afiliado($id_premio,$id_afiliado,$frecuencia){
		if ($frecuencia=='Mensual'){
			$mes = date("m");
			
			$consulta = "and MONTH(fecha) = ".$mes;
		}
		
		else if ($frecuencia=='Anual'){
			$ano = date("Y");
			$consulta = "and YEAR(fecha) = ".$ano;
		}
		
		$q = $this->db->query("select estado from cross_premio_usuario where id_premio = ".$id_premio." and id_afiliado = ".$id_afiliado." ".$consulta);
		$premio = $q->result();
		
		if(isset($premio[0]->estado)){
			return true;
		}else{
			return false;
		}
	}
	
	function PremiosPendientes(){
		$q = $this->db->query('select cpu.id, u.username, concat(up.nombre," ",up.apellido) as nombre, u.email, concat(ctu.numero) as telefono, concat(c.Name,", ",cdu.estado,", ",cdu.municipio,", ",cdu.colonia,", ",cdu.calle) as direccion, p.nombre as premio, cpu.fecha, cpu.estado
from premios p, users u, user_profiles up, cross_premio_usuario cpu, cross_tel_user ctu, cross_dir_user cdu, Country c
where p.id = cpu.id_premio and cpu.id_afiliado = u.id and u.id = up.user_id and ctu.id_user = u.id and cdu.id_user = u.id and cdu.pais = c.Code and cpu.estado = "Pendiente" group by cpu.id;');
		$premio = $q->result();
		return $premio;
	}
	
	function PremiosTransito(){
		$q = $this->db->query('select cpu.id, u.username, concat(up.nombre," ",up.apellido) as nombre, u.email, concat(ctu.numero) as telefono, concat(c.Name,", ",cdu.estado,", ",cdu.municipio,", ",cdu.colonia,", ",cdu.calle) as direccion, p.nombre as premio, cpu.fecha, cpu.fecha_entrega, cpu.estado
from premios p, users u, user_profiles up, cross_premio_usuario cpu, cross_tel_user ctu, cross_dir_user cdu, Country c
where p.id = cpu.id_premio and cpu.id_afiliado = u.id and u.id = up.user_id and ctu.id_user = u.id and cdu.id_user = u.id and cdu.pais = c.Code and cpu.estado = "EnTransito" group by cpu.id;');
		$premio = $q->result();
		return $premio;
	}
	
	function PremiosEmbarcados(){
		$q = $this->db->query('select cpu.id, u.username, concat(up.nombre," ",up.apellido) as nombre, u.email, concat(ctu.numero) as telefono, concat(c.Name,", ",cdu.estado,", ",cdu.municipio,", ",cdu.colonia,", ",cdu.calle) as direccion, p.nombre as premio, cpu.fecha, cpu.fecha_entrega, cpu.estado
from premios p, users u, user_profiles up, cross_premio_usuario cpu, cross_tel_user ctu, cross_dir_user cdu, Country c
where p.id = cpu.id_premio and cpu.id_afiliado = u.id and u.id = up.user_id and ctu.id_user = u.id and cdu.id_user = u.id and cdu.pais = c.Code and cpu.estado = "Embarcado" group by cpu.id;');
		$premio = $q->result();
		return $premio;
	}
	
	function PremiosEmbarcadosFecha($inicio,$fin){
		$q = $this->db->query('select cpu.id, u.username, concat(up.nombre," ",up.apellido) as nombre, u.email, concat(ctu.numero) as telefono, concat(c.Name,", ",cdu.estado,", ",cdu.municipio,", ",cdu.colonia,", ",cdu.calle) as direccion, p.nombre as premio, cpu.fecha, cpu.fecha_entrega, cpu.estado
from premios p, users u, user_profiles up, cross_premio_usuario cpu, cross_tel_user ctu, cross_dir_user cdu, Country c
where p.id = cpu.id_premio and cpu.id_afiliado = u.id and u.id = up.user_id and ctu.id_user = u.id and cdu.id_user = u.id and cdu.pais = c.Code and cpu.estado = "Embarcado" and cpu.fecha_entrega BETWEEN "'.$inicio.'" AND "'.$fin.'" group by cpu.id;');
		$premio = $q->result();
		return $premio;
	}
	
	function verEstadoPremio($id){
		$query = $this->db->query("select CPU.estado, P.nombre, P.imagen, P.descripcion, TR.nombre nombre_red from cross_premio_usuario CPU, premios P, tipo_red TR 

where id_afiliado=".$id." and estado = 'Pendiente' and CPU.id_premio = P.id and P.id_red = TR.id");
		$query = $query->result();
		return $query;
	}
	
	function cambiarEstadoPremio($id, $fecha, $estado){
		$datos = array(
				'estado' =>  $estado,
				'fecha_entrega' => $fecha
		);
		$this->db->update('cross_premio_usuario',$datos,array('id' => $id));
	}
	
	function cambiarEstadoPremioEmbarcar($id, $estado){
		$datos = array(
				'estado' =>  $estado
		);
		$this->db->update('cross_premio_usuario',$datos,array('id' => $id));
	}
	
	function datosEmail($id_afiliado, $id_premio){
		$q = $this->db->query('select cpu.id, concat(up.nombre," ",up.apellido) as nombre, u.email, p.nombre as premio, p.descripcion, p.imagen
from premios p, users u, user_profiles up, cross_premio_usuario cpu
where p.id = cpu.id_premio and cpu.id_afiliado = u.id and u.id = up.user_id and u.id = '.$id_afiliado.' and p.id = '.$id_premio.' group by cpu.id');
		return $q->result();
	}
	
	function cambiar_estatus($id, $estatus){
		$datos = array(
				'estatus' =>  $estatus
		);
		$this->db->update('premios',$datos,array('id' => $id));
	}
	
	function eliminar($id){
		$this->db->query('delete from premios where id = '.$id);
	}
}