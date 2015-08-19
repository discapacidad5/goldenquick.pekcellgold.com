<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class modelo_general extends CI_Model
{
	function get_mensaje($id)
	{
		$q=$this->db->query("select fecha, titulo, id_mensaje,
			(select descripcion from cat_estatus_msg where id_estatus=id_estatus_msg) estado_mensaje, 
			(select nombre from user_profiles where user_id=enviado) enviado_n, 
			(select apellido from user_profiles where user_id=enviado) enviado_p 
			from mensaje where recibido=".$id." and estatus='ACT'");
		return $q->result();
	}
	function get_afiliados($id)
	{
		$q=$this->db->query("select *,(select nombre from user_profiles where user_id=id_afiliado) afiliado,
			(select apellido from user_profiles where user_id=id_afiliado) afiliado_p
			,(select nombre from user_profiles where user_id=debajo_de) debajo_de_n,
			(select apellido from user_profiles where user_id=debajo_de) debajo_de_p 
			from afiliar where id_red=".$id);
		return $q->result();
	}
	function envia_sms($id)
	{
		$dato_mensaje=array(
	                "enviado"			=> $id,
	                "id_estatus_msg"	=> 1,
	                "recibido"			=> $_POST['dirigido'],
	                "titulo"			=> $_POST['titulo'],
	                "mensaje"			=> $_POST['mensaje'],
	                "estatus"			=> "ACT"
	            );
		$this->db->insert("mensaje",$dato_mensaje);
	}
	function del_sms()
	{
		$this->db->query('update mensaje set estatus="DES" where id_mensaje='.$_POST["id_mensaje"]);
	}
	function get_sms()
	{
		$q=$this->db->query("select mensaje from mensaje where id_mensaje=".$_POST["id_mensaje"]);
		return $q->result();
	}
	function get_encuestas()
	{
		$q_encuestas=$this->db->query("SELECT a.*, b.username, a.id_encuesta veces FROM encuesta a, users b where a.id_usuario=b.id and a.estatus='ACT'");
		$r_encuestas=$q_encuestas->result();
		foreach($r_encuestas as $enc)
		{
			$q_veces=$this->db->query("Select count(*) veces from encuesta_contestada where id_encuesta=".$enc->id_encuesta);
			$r_veces=$q_veces->result();
			$enc->veces=$r_veces[0]->veces;
		}
		return $r_encuestas;
	}
	function get_encuesta($id_encuesta)
	{
		$q=$this->db->query("SELECT id_encuesta, nombre from encuesta where id_encuesta=".$id_encuesta);
		return $q->result();
	}
	function get_preguntas($id_encuesta)
	{
		$q=$this->db->query("SELECT a.id_encuesta, b.pregunta, b.id_pregunta from encuesta a, encuesta_pregunta b 
		where a.id_encuesta=b.id_encuesta and a.id_encuesta=".$id_encuesta);
		return $q->result();
	}
	function get_respuestas($id_encuesta)
	{
		$q=$this->db->query("SELECT a.id_encuesta, c.id_pregunta, c.respuesta, c.id_respuesta from encuesta a, encuesta_pregunta b, encuesta_respuesta c 
		where a.id_encuesta=b.id_encuesta and b.id_pregunta=c.id_pregunta and a.id_encuesta=".$id_encuesta);
		return $q->result();
	}
	function get_pregunta($id_respuesta)
	{
		$q=$this->db->query("SELECT id_pregunta FROM encuesta_respuesta WHERE id_respuesta=".$id_respuesta);
		return $q->result();
	}
	function get_encuestas_contestadas($id_usuario)
	{
		$q=$this->db->query("SELECT a.nombre,b.id id_usuario, b.username, c.fecha, c.id_encuesta_contestada FROM encuesta a, users b, encuesta_contestada c 
		WHERE a.id_encuesta=c.id_encuesta and b.id=c.id_usuario and b.id=".$id_usuario);
		return $q->result();
	}
	function get_resultados_encuesta($id_enc_cont)
	{
		$q=$this->db->query("SELECT a.pregunta, b.respuesta FROM encuesta_pregunta a, encuesta_respuesta b, encuesta_resultado c, encuesta_contestada d  
		WHERE a.id_pregunta=c.id_pregunta and b.id_respuesta=c.id_respuesta and c.id_encuesta_contestada=d.id_encuesta_contestada and d.id_encuesta_contestada=".$id_enc_cont);
		return $q->result();
	}
	function get_se_contesto($id,$user)
	{
		$q=$this->db->query("SELECT * FROM encuesta_contestada WHERE id_encuesta=".$id." and id_usuario=".$user);
		return $q->result();
	}
}