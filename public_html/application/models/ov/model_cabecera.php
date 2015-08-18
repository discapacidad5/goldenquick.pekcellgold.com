<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class model_cabecera extends CI_Model
{
	function actualizar($id)
	{
		$this->db->query("update estilo_usuario set bg_color='".$_POST['bg_color']."', btn_1_color='".$_POST['color_1']."', btn_2_color='".$_POST['color_2']."' where id_usuario=".$id);
	}
	function get_files($id)
	{
		$q=$this->db->query(' SELECT * from archivero where id_user='.$id);
		return $q->result();
	}
	function get_mail($id)
	{
		$q=$this->db->query(' SELECT email from users where id='.$id);
		return $q->result();
	}
	function file_user($id,$data)
	{
		$explode=explode(".",$data["file_name"]);
		$nombre=$explode[0];
		$extencion=$explode[1];
		$dato_file=array(
				"id_user"			=>	$id,
				"nombre"			=>	$nombre,
				"extencion"			=>	$extencion,
				"nombre_completo"	=>	$data["file_name"],
                "url"				=>	"/media/".$id."/".$data["file_name"],
                "tamano"			=>	$data["file_size"]
            );
		$this->db->insert("archivero",$dato_file);
	}
	function del_file_multiple()
	{
		foreach ($_post["archivo"] as $file) 
		{
			$this->db->query('delete form archivero where id_archivero='.$file);
		}
	}
	function del_file()
	{
		$this->db->query('delete from archivero where id_archivero='.$_POST["id_archivero"]);
	}
	function del_file_compartir()
	{
		$this->db->query('delete from archivero where id_archivero='.$_POST["id_archivero"]);
		$this->db->query('delete from compartir where id_archivero='.$_POST["id_archivero"]);
	}
	function compartir($id)
	{
		if(!isset($_POST["id_archivero"]))$_POST["id_archivero"]=$id;
		$dato_file=array(
				"id_archivero"		=>	$_POST["id_archivero"],
				"estatus"			=>	"ACT"
            );
		$this->db->insert("compartir",$dato_file);
	}
	function get_files_compartido()
	{
		$q=$this->db->query(' SELECT *, (select nombre from user_profiles where user_id=id_user) compartido_n, 
			(select apellido from user_profiles where user_id=id_user) compartido_p
		 from compartir A left join archivero C on A.id_archivero=C.id_archivero');
		return $q->result();
	}
}