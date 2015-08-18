<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class modelo_dashboard extends CI_Model
{
	function get_style($id)
	{
		$q=$this->db->query('select * from estilo_usuario where id_usuario = '.$id);
		return $q->result();
	}
	function get_images($id)
	{
		$q=$this->db->query('select (select nombre_completo from cat_img b where a.id_img=b.id_img) img, (select url from cat_img b where a.id_img=b.id_img) url from cross_img_user a where id_user = '.$id);
		return $q->result();
	}
	function get_red($id)
	{
		$q=$this->db->query('select id_red, debajo_de as id_usuario from afiliar where id_afiliado ='.$id.' and directo=1');
		$q=$q->result();
		return $q;

	}
	function get_ultima($id)
	{
		$q=$this->db->query('select ultima_sesion from user_profiles where user_id = '.$id);
		$q=$q->result();
		return $q[0]->ultima_sesion;
	}

  function get_user_phone($id){
		$q=$this->db->query('select numero from cross_tel_user where id_user = '.$id);
    $q=$q->result();
		return $q[0]->numero;
  }

  function get_user_email($id){
		$q=$this->db->query('select email from users where id = '.$id);
    $q=$q->result();
		return $q[0]->email;
  }

  function get_user_name($id){
		$q=$this->db->query('select username from users where id = '.$id);
    $q=$q->result();
		return $q[0]->username;
  }

   function get_user_country_code($id){
		$q=$this->db->query('SELECT code2 FROM cross_dir_user u ,Country c
                          where u.pais=c.code
                          and u.id_user='.$id.';
                        ');
    $q=$q->result();
		return $q[0]->code2;
  }
  
  function get_user_country($id){
  	$q=$this->db->query('SELECT pais FROM cross_dir_user where id_user='.$id.';
                        ');
  	$q=$q->result();
  	return $q[0]->pais;
  }

}
