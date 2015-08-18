<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class modelo_billetera extends CI_Model
{
	function get_estatus($id)
	{
		$q=$this->db->query('SELECT * from billetera where id_user='.$id);
		return $q->result();
	}
	function crea_pswd($id)
	{
		$pswd=strlen($_POST['password']).strrev($_POST['password']);
		$pswd=md5($pswd).$pswd;
		$pswd=md5(strrev($pswd));
		$this->db->query('update billetera set pswd="'.$pswd.'", estatus="ACT" where id_user='.$id);
	}
	function iniciar($id)
	{
		$pswd=strlen($_POST['password']).strrev($_POST['password']);
		$pswd=md5($pswd).$pswd;
		$pswd=md5(strrev($pswd));

		$q=$this->db->query('select * from billetera where pswd="'.$pswd.'" and id_user='.$id);
		return $q->result();
	}
	function sesion($id)
	{
		$q=$this->db->query('select activo from billetera where id_user='.$id);
		return $q->result();
	}
	function activar($id)
	{
		$q=$this->db->query('update billetera set activo="Si" where id_user='.$id);
	}
	function desactivar($id)
	{
		$q=$this->db->query('update billetera set activo="No" where id_user='.$id);
	}
	
	function get_historial_cuenta($id)
	{
		$q=$this->db->query('SELECT  DATE_FORMAT(fecha,"%Y-%m-01") as fecha,sum(puntos) as puntos,sum(valor) as valor FROM comision where id_afiliado="'.$id.'" group by MONTH(fecha)');
		return $q->result();
	}
	
	function get_historial($id)
	{
		$q=$this->db->query('select * from cobro where id_user='.$id.'  and (id_estatus=4 or id_estatus=5)  order by fecha');
		return $q->result();
	}
	function get_monto($id)
	{
		$q=$this->db->query('select sum(monto) as monto from cobro where id_user='.$id.' and id_estatus=4');
		return $q->result();
	}
	
	function get_comisiones($id,$id_red){
		$q=$this->db->query('SELECT sum(c.puntos) as puntos,sum(c.valor) as valor,nombre as nombre FROM comision c,tipo_red t , cat_grupo_producto cp where(c.id_red=cp.id_grupo) 
		and (cp.id_red=t.id) and(t.id='.$id_red.') and c.id_afiliado='.$id.'');
		return $q->result();
	}
	
	function get_total_comisiones_afiliado($id){
		
		$q=$this->db->query('SELECT sum(valor)as valor FROM comision where id_afiliado='.$id.';');
		$comisiones=$q->result();
		return $comisiones[0]->valor;
	}
	
	function get_comisiones_mes($id,$id_red,$fecha){
		$q=$this->db->query('SELECT sum(c.puntos) as puntos,sum(c.valor) as valor,t.nombre as nombre FROM comision c,tipo_red t ,cat_grupo_producto cp where(c.id_red=cp.id_grupo) 
		and (cp.id_red=t.id) and(t.id='.$id_red.') and MONTH("'.$fecha.'")=MONTH(fecha) and c.id_afiliado='.$id.'');
		return $q->result();
	}
	
	function get_cobro($id)
	{
		$q=$this->db->query('select * from cobro where  id_estatus != 4 and id_user='.$id);
		return $q->result();
	}
	
	function get_cobros_total($id)
	{
		$q=$this->db->query('SELECT sum(monto)as monto FROM cobro where  id_estatus=2 and id_user='.$id);
		return $q->result();
	}
	
	function get_cobros_total_afiliado($id)
	{
		$q=$this->db->query('SELECT sum(monto)as monto FROM cobro where  id_estatus=2 and id_user='.$id);
		$cobros=$q->result();
		return $cobros[0]->monto;
	}
	
	function get_cobros_pendientes_total_afiliado($id)
	{
		$q=$this->db->query('SELECT sum(monto)as monto FROM cobro where  id_estatus!=2 and id_user='.$id);
		$cobros=$q->result();
		return $cobros[0]->monto;
	}
	
	function get_cobros_afiliado_mes($id,$fecha)
	{
		$q=$this->db->query('SELECT sum(monto)as monto FROM cobro where  id_estatus=2 and month("'.$fecha.'")=month(fecha_pago) and id_user='.$id);
		return $q->result();
	}
	
	function get_cobros_afiliado_mes_pendientes($id,$fecha)
	{
		$q=$this->db->query('SELECT sum(monto)as monto FROM cobro where  id_estatus!=2 and month("'.$fecha.'")=month(fecha_pago) and id_user='.$id);
		return $q->result();
	}
	
	function get_cobros_afiliado_mes_actual($id)
	{
		$q=$this->db->query('SELECT sum(monto)as monto FROM cobro where  id_estatus=2 and month(now())=month(fecha_pago) and id_user='.$id);
		return $q->result();
	}
	
	function datable($id)
	{
		$q=$this->db->query('select * ,
							(select descripcion from cat_metodo_cobro MP where C.id_metodo=MP.id_metodo) metodo, 
							(select descripcion from cat_estatus CE where CE.id_estatus=C.id_estatus) estado 
							from cobro C where id_user='.$id.' and (id_estatus = 3 or id_estatus = 2) order by fecha');
		return $q->result();
	}
	function get_metodo()
	{
		$q=$this->db->query('select * from cat_metodo_cobro');
		return $q->result();
	}
	function cobrar($id,$cuenta,$titular,$banco,$clabe)
	{
			$dato_cobro=array(
					"id_user"		=>	$id,
					"id_metodo"		=> 	"1",
					"id_estatus"		=> 	"3",
					"monto"			=> 	$_POST['cobro'],
					"cuenta"=> $cuenta,
					"titular"=> $titular,
					"banco"=> $banco,
					"clabe"=> $clabe,
			);
			
			$this->db->insert("cobro",$dato_cobro);
		
	}
	
	function añosCobro($id){
		$q = $this->db->query("select YEAR(fecha) as año from cobro where id_user='$id' group by año");
		return $q->result();
	}
	
	function ValorImpuestos($id, $pais){
		$mes = date("m");
		$q = $this->db->query("select ci.id_impuesto, ci.descripcion, sum(v.costo * (ci.porcentaje/100)) as impuesto 
					from venta v, cross_venta_mercancia cvm, cross_merc_impuesto cmi, cat_impuesto ci, mercancia m 
					where v.id_venta = cvm.id_venta and  cmi.id_mercancia = cvm.id_mercancia and cmi.id_impuesto = ci.id_impuesto and v.id_user = ".$id." and cvm.id_mercancia = m.sku and m.pais = ci.id_pais and ci.estatus = 'ACT' and Month(v.fecha) = '".$mes."' and m.pais = '".$pais."'");
		return $q->result();
	}
	
	function ValorRetenciones(){
		$q = $this->db->query("SELECT * FROM cat_retenciones_historial where year(now())=ano and month(now())=mes");
		$retenciones_regis = $q->result();
		$retenciones = array();
		foreach ($retenciones_regis as $retencion){
		/*	$valor=0;
			if($retencion->duracion == 'ANO'){
				$valor = $retencion->porcentaje / 12;
			}elseif ($retencion->duracion == 'SEM'){
				$valor = $retencion->porcentaje / 4; 
			}elseif ($retencion->duracion == 'MES'){
				$valor = $retencion->porcentaje ; 
			}elseif ($retencion->duracion == 'DIA'){
				$valor = $retencion->porcentaje * 30;
			}*/
			$retencion_cobrar = array('id' => $retencion->id,
									'descripcion' => $retencion->descripcion,
									'valor'   => $retencion->valor);
			$retenciones[] = $retencion_cobrar;
		}
		return $retenciones;
	}
	
	function ValorRetencionesTotales($id){
		$q = $this->db->query("SELECT created FROM users where id=".$id.";");
		$fecha_creacion = $q->result();
		$q = $this->db->query("SELECT descripcion,sum(valor) as valor FROM cat_retenciones_historial  where month('".$fecha_creacion[0]->created."')
										<=mes and year('".$fecha_creacion[0]->created."')<=ano and id_afiliado IN(0,".$id.") group by descripcion");
		$retenciones_regis = $q->result();
		$retenciones = array();
		foreach ($retenciones_regis as $retencion){
			/*	$valor=0;
				if($retencion->duracion == 'ANO'){
				$valor = $retencion->porcentaje / 12;
				}elseif ($retencion->duracion == 'SEM'){
				$valor = $retencion->porcentaje / 4;
				}elseif ($retencion->duracion == 'MES'){
				$valor = $retencion->porcentaje ;
				}elseif ($retencion->duracion == 'DIA'){
				$valor = $retencion->porcentaje * 30;
				}*/
			$retencion_cobrar = array(
					'descripcion' => $retencion->descripcion,
					'valor'   => $retencion->valor);
			$retenciones[] = $retencion_cobrar;
		}
		return $retenciones;
	}
	
	function ValorRetencionesTotalesAfiliado(){
		$q = $this->db->query("SELECT created FROM users where id=2;");
		$fecha_creacion = $q->result();
		$q = $this->db->query("SELECT sum(valor) as valor FROM cat_retenciones_historial  where month('".$fecha_creacion[0]->created."')
										<=mes and year('".$fecha_creacion[0]->created."')<=ano");
		$retenciones = $q->result();
		return $retenciones[0]->valor;
	}
	
	
	function ValorRetenciones_historial($fecha,$id){
		$q = $this->db->query("SELECT * FROM cat_retenciones_historial where year('".$fecha."')=ano and month('".$fecha."')=mes and id_afiliado IN(0,".$id.")");
		$retenciones_regis = $q->result();
		$retenciones = array();
		foreach ($retenciones_regis as $retencion){

			$retencion_cobrar = array('id' => $retencion->id,
					'descripcion' => $retencion->descripcion,
					'valor'   => $retencion->valor);
			$retenciones[] = $retencion_cobrar;
		}
		return $retenciones;
	}
	
	function PagosClientes()
	{
		$q=$this->db->query('select * ,
							(select descripcion from cat_metodo_cobro MP where C.id_metodo=MP.id_metodo) metodo,
							(select descripcion from cat_estatus CE where CE.id_estatus=C.id_estatus) estado
							from cobro C where id_estatus = 3 order by fecha');
		return $q->result();
	}
	
	function añosPagos(){
		$q = $this->db->query("select YEAR(fecha) as año from cobro group by año");
		return $q->result();
	}
	
	function comisionWebPersonal($id_afiliado, $fecha){
		$q=$this->db->query('select sum(valor) as valor from comision_web_personal where MONTH(fecha) = MONTH("'.$fecha.'") and id_afiliado ='.$id_afiliado.'');
		return $q->result();
	}
	
	function get_comisiones_web_personal($id_afiliado){
		$q=$this->db->query('select sum(valor) as valor from comision_web_personal where id_afiliado ='.$id_afiliado.'');
		return $q->result();
	}
	
	function get_historial_cuenta_web_personal($id)
	{
		$q=$this->db->query('SELECT  DATE_FORMAT(fecha,"%Y-%m-01") as fecha, sum(valor) as valor FROM comision_web_personal where id_afiliado = "'.$id.'" group by MONTH(fecha)');
		return $q->result();
	}
}