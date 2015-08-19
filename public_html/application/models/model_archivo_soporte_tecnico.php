<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_archivo_soporte_tecnico extends CI_Model{

	function __construct() {
		parent::__construct();


	}
	
	function BuscarTipo($tipo){
		$q = $this->db->query("select * from cat_tipo_archivo where descripcion = '".$tipo."'");
		$tipo = $q->result();
		return $tipo[0]->id_tipo;
	}

	function CrearArchivo($id, $grupo, $tipo,$nombre, $descripcion, $ruta, $id_red){
		
		$id_tipo = $this->BuscarTipo($tipo);
		$datos = array(
				'id_usuario' => $id,
				'id_grupo'   => $grupo,
				'id_tipo'    => $id_tipo,
				'descripcion'	=> $descripcion,
				'ruta'  => $ruta,
				'status' => 'ACT',
				'nombre_publico' => $nombre,
				'id_red' => $id_red
		);
		$this->db->insert('archivo_soporte_tecnico',$datos);
		return mysql_insert_id();
	}
	
	function Archivos($id_red)
	{
		$q=$this->db->query('SELECT CGST.descripcion grupo, concat(UP.nombre," ",UP.apellido) usuario,AST.fecha fecha,
AST.nombre_publico n_publico, CTA.descripcion tipo, AST.descripcion descripcion,AST.ruta ruta, 
AST.id_archivo id, AST.status estado
FROM cat_grupo_soporte_tecnico CGST, user_profiles UP, archivo_soporte_tecnico AST, cat_tipo_archivo CTA
WHERE CGST.id = AST.id_grupo and UP.user_id= AST.id_usuario and CTA.id_tipo = AST.id_tipo and CGST.tipo = "INF" and AST.id_red ='.$id_red.' and CGST.estatus="ACT" ');
		return $q->result();
	}
	
	function Archivos_usuarios($id_red)
	{
		$q=$this->db->query('SELECT CGST.descripcion grupo, concat(UP.nombre," ",UP.apellido) usuario,AST.fecha fecha,
AST.nombre_publico n_publico, CTA.descripcion tipo, AST.descripcion descripcion,AST.ruta ruta,
AST.id_archivo id, AST.status estado
FROM cat_grupo_soporte_tecnico CGST, user_profiles UP, archivo_soporte_tecnico AST, cat_tipo_archivo CTA
WHERE CGST.id = AST.id_grupo and UP.user_id= AST.id_usuario and CTA.id_tipo = AST.id_tipo and CGST.tipo = "INF" and AST.id_red ='.$id_red.' and CGST.estatus="ACT" and AST.status="ACT"');
		return $q->result();
	}
	
	function CambiarEstado($id, $estado){
		$this->db->query("update archivo_soporte_tecnico set status ='".$estado."' where id_archivo = '$id'");
	}
	
	function consultar_archivo($id){
		$q = $this->db->query("select * from archivo_soporte_tecnico where id_archivo = ".$id);
		return $q->result();
	}
	
	function EliminarArchivo($id){
		$url = $this->consultar_archivo($id);
		$this->db->query('delete from archivo_soporte_tecnico where id_archivo='.$id);
		return $url[0]->ruta;
	}
	
	function ActualizarArchvo($id_archivo, $id, $grupo, $tipo ,$nombre, $descripcion, $ruta, $estado){
		
		$archivo = $this->consultar_archivo($id_archivo);
		$this->load->helper("file");
		unlink($_SERVER['DOCUMENT_ROOT'].$archivo[0]->ruta);
		
		$extencion = $this->BuscarTipo($tipo);
		if ($extencion == null){
			return false;
		}
		
		$datos = array(
				'id_usuario' => $id,
				'id_grupo'   => $grupo,
				'id_tipo' => $extencion,
				'descripcion'	=> $descripcion,
				'ruta'  => $ruta,
				'status' => $estado,
				'nombre_publico' => $nombre
		);
		$this->db->where('id_archivo', $id_archivo);
		$this->db->update('archivo_soporte_tecnico', $datos);
	}
	
	function ActualizarArchivo2($id_archivo, $id,$grupo, $nombre, $descripcion, $estado){
	
		$datos = array(
				'id_usuario' => $id,
				'id_grupo'   => $grupo,
				'descripcion'	=> $descripcion,
				'status' => $estado,
				'nombre_publico' => $nombre
		);
		$this->db->where('id_archivo', $id_archivo);
		$this->db->update('archivo_soporte_tecnico', $datos);
	
	}
	
	function get_video()
	{
		$q=$this->db->query('SELECT AST.id_archivo id, AST.id_grupo id_grp, CGST.descripcion grupo, U.username usuario, AST.fecha fecha,
AST.nombre_publico n_publico, AST.descripcion descripcion, AST.ruta ruta, CI.url img, AST.id_tipo tipo,
AST.status 
FROM cat_grupo_soporte_tecnico CGST, users U, archivo_soporte_tecnico AST, cross_img_archivo_soporte_tecnico CIA, cat_img CI 
WHERE AST.id_tipo in (2,21) and CGST.id = AST.id_grupo and U.id = AST.id_usuario and AST.id_archivo = CIA.id_archivo 
and CI.id_img = CIA.id_img');
		return $q->result();
	}
	
	function get_video_usuarios()
	{
		$q=$this->db->query('SELECT AST.id_archivo id, AST.id_grupo id_grp, CGST.descripcion grupo, U.username usuario, AST.fecha fecha,
AST.nombre_publico n_publico, AST.descripcion descripcion, AST.ruta ruta, CI.url img, AST.id_tipo tipo,
AST.status
FROM cat_grupo_soporte_tecnico CGST, users U, archivo_soporte_tecnico AST, cross_img_archivo_soporte_tecnico CIA, cat_img CI
WHERE AST.id_tipo in (2,21) and CGST.id = AST.id_grupo and U.id = AST.id_usuario and AST.id_archivo = CIA.id_archivo
and CI.id_img = CIA.id_img and AST.status="ACT"');
		return $q->result();
	}
	
	function get_comments()
	{
		$q=$this->db->query('SELECT CVST.*, U.username FROM comentario_video_soporte_tecnico CVST, users U 
WHERE CVST.autor = U.id 
order by fecha DESC;');
		return $q->result();
	}
	
}