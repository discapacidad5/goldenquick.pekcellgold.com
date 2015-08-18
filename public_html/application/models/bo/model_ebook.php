<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class model_ebook extends CI_Model
{
	function __construct(){
		parent::__construct();
	}
	
	function CrearEbook($id, $grupo, $nombre, $descripcion, $ruta){
		$datos = array(
			'id_usuario' => $id,
			'id_grupo'   => $grupo,
			'id_tipo'    => '1',
			'descripcion'	=> $descripcion,
			'ruta'  => $ruta,
			'status' => 'ACT',
			'nombre_publico' => $nombre
		);
		$this->db->insert('archivo',$datos);
		return mysql_insert_id();
	}
	
	function CargarImagenEbook($ebook, $url, $nombre_completo, $nombre, $extencion){
		
		$datos = array(
				'url' => $url,
				'nombre_completo'   => $nombre_completo,
				'nombre'    => $nombre,
				'extencion'	=> $extencion,
				'estatus' => 'ACT'
		);
		$this->db->insert('cat_img',$datos);
		
		$img = mysql_insert_id();
		
		$datos2 = array(
				'id_archivo' => $ebook,
				'id_img'   => $img
		);
		$this->db->insert('cross_img_archivo',$datos2);
	}
	
	function eliminararchivo($id){
		$this->db->query('delete from archivo where id_archivo='.$id);
	}
	
	function ebooks()
	{
		$q=$this->db->query('SELECT a.descripcion grupo, up.nombre usuario_nombre, up.apellido usuario_apellido, c.fecha fecha,c.nombre_publico n_publico,c.descripcion descripcion,c.ruta ruta, d.url img, c.id_archivo id, c.status estado
								FROM cat_grupo a, users b, archivo c, cat_img d, cross_img_archivo e, user_profiles up 
								WHERE c.id_tipo=1 and a.id=c.id_grupo and b.id=c.id_usuario and d.id_img=e.id_img and c.id_archivo=e.id_archivo and up.user_id = b.id');
		return $q->result();
	}
	
	function CambiarEstado($id, $estado){
		$this->db->query("update archivo set status ='".$estado."' where id_archivo = '$id'");
	}
	
	function EliminarEbook($id){
		//cross_img_archivo
		$q = $this->db->query("select * from cross_img_archivo where id_archivo = ".$id);
		$cross = $q->result();
		$img = $cross[0]->id_img;
		$this->db->query("delete from cross_img_archivo where id_archivo =".$id);
		
		//cat_img
		$q = $this->db->query("select * from cat_img where id_img = ".$img);
		$cross = $q->result();
		
		$url_imagen = $cross[0]->url;
		$this->db->query("delete from cat_img where id_img =".$img);
		
		$url_ebook = $this->consultar_ebook($id);
		$this->eliminararchivo($id);
		
		$urls = array($url_imagen,$url_ebook[0]->ruta);
		return $urls;
	}
	
	function consultar_ebook($id){
		$q = $this->db->query("select * from archivo where id_archivo = ".$id);
		return $q->result();
	}
	
	function ebook($id){
		$q=$this->db->query('SELECT e.id_archivo, e.id_usuario, e.id_grupo, e.descripcion, e.nombre_publico, e.ruta, img.url , img.nombre_completo , e.status
		FROM archivo e, cat_img img, cross_img_archivo cia
		WHERE cia.id_img = img.id_img and cia.id_archivo= e.id_archivo and e.id_archivo ='.$id);
		return $q->result();
	}
	
	function ActualizarEbook($id_archivo, $id, $grupo, $nombre, $descripcion, $ruta){
		$archivo = $this->consultar_ebook($id_archivo);
		$this->load->helper("file");
		unlink($_SERVER['DOCUMENT_ROOT'].$archivo[0]->ruta);
		$datos = array(
				'id_grupo'   => $grupo,
				'descripcion'	=> $descripcion,
				'ruta'  => $ruta,
				'status' => 'ACT',
				'nombre_publico' => $nombre
		);
		$this->db->where('id_archivo', $id_archivo);
		$this->db->update('archivo', $datos);
		
	}
	
	function ActualizarEbook2($id_archivo, $grupo, $nombre, $descripcion){
	
		$datos = array(
				'id_grupo'   => $grupo,
				'descripcion'	=> $descripcion,
				'nombre_publico' => $nombre
		);
		$this->db->where('id_archivo', $id_archivo);
		$this->db->update('archivo', $datos);
	
	}
	
	function ActualizarImagenEbook($ebook, $url, $nombre_completo, $nombre, $extencion){
		$this->load->helper("file");
		$q = $this->db->query("select * from cross_img_archivo where id_archivo = ".$ebook);
		$cross = $q->result();
		
		$q = $this->db->query("select * from cat_img where id_img = ".$cross[0]->id_img);
		$archivo = $q->result();
		
		unlink($_SERVER['DOCUMENT_ROOT'].$archivo[0]->url);
		
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
