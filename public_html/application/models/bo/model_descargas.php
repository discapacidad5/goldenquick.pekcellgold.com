<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class model_descargas extends CI_Model
{
	function __construct(){
		parent::__construct();
	}
	
	function BuscarTipo($tipo){
		$q = $this->db->query("select * from cat_tipo_archivo where descripcion = '".$tipo."'");
		$tipo = $q->result();
		return $tipo[0]->id_tipo;
	}
	
	function CrearArchivo($id, $grupo, $tipo,$nombre, $descripcion, $ruta){
		$id_tipo = $this->BuscarTipo($tipo);
		$datos = array(
			'id_usuario' => $id,
			'id_grupo'   => $grupo,
			'id_tipo'    => $id_tipo,
			'descripcion'	=> $descripcion,
			'ruta'  => $ruta,
			'status' => 'ACT',
			'nombre_publico' => $nombre
		);
		$this->db->insert('archivo',$datos);
		return mysql_insert_id();
	}
	
	function EliminarArchivo($id){
		$url = $this->consultar_archivo($id);
		$this->db->query('delete from archivo where id_archivo='.$id);
		return $url[0]->ruta;
	}
	
	function Archivos()
	{
		$q=$this->db->query('SELECT a.descripcion grupo, concat(b.nombre," ",b.apellido) usuario,c.fecha fecha,c.nombre_publico n_publico, cta.descripcion tipo, c.descripcion descripcion,c.ruta ruta, c.id_archivo id, c.status estado 
							FROM cat_grupo a, user_profiles b, archivo c, cat_tipo_archivo cta
							WHERE a.id = c.id_grupo and b.user_id= c.id_usuario and cta.id_tipo = c.id_tipo and a.tipo = "DES"');
		return $q->result();
	}
	
	function CambiarEstado($id, $estado){
		$this->db->query("update archivo set status ='".$estado."' where id_archivo = '$id'");
	}
	

	function consultar_archivo($id){
		$q = $this->db->query("select * from archivo where id_archivo = ".$id);
		return $q->result();
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
				'id_grupo'   => $grupo,
				'id_usuario' => $id,
				'id_tipo' => $extencion,
				'descripcion'	=> $descripcion,
				'ruta'  => $ruta,
				'status' => $estado,
				'nombre_publico' => $nombre
		);
		$this->db->where('id_archivo', $id_archivo);
		$this->db->update('archivo', $datos);
	}
	
	function ActualizarArchivo2($id_archivo, $id,$grupo, $nombre, $descripcion, $estado){
	
		$datos = array(
				'id_grupo'   => $grupo,
				'id_usuario' => $id,
				'descripcion'	=> $descripcion,
				'status' => $estado,
				'nombre_publico' => $nombre
		);
		$this->db->where('id_archivo', $id_archivo);
		$this->db->update('archivo', $datos);
	
	}
	
	function ActualizarImagenEbook($ebook, $url, $nombre_completo, $nombre, $extencion){
	
		$q = $this->db->query("select * from cross_img_archivo where id_archivo = ".$ebook);
		$cross = $q->result();
		
		$datos = array(
				'url' => $url,
				'nombre_completo'   => $nombre_completo,
				'nombre'    => $nombre,
				'extencion'	=> $extencion,
				'estatus' => 'ACT'
		);
		$this->db->where('id_img', $cross[0]->id_img);
		$this->db->update('cat_img', $datos);
	}
}
