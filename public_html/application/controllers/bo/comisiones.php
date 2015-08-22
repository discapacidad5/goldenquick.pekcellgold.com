<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
// Ventas
//Cantidad
//Comisiones
//%Comision
class comisiones extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('bo/modelo_dashboard');
		$this->load->model('bo/model_comisiones');
		$this->load->model('bo/model_mercancia');
		$this->load->model('bo/model_admin');
		$this->load->model('bo/general');
	}
	function index()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if($usuario[0]->id_tipo_usuario!=1)
		{
			redirect('/auth/logout');
		}

		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);

		$style=$this->modelo_dashboard->get_style($id);

		$this->template->set("style",$style);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/bo/header');
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/comisiones/main_dashboard');
	}

/*############################################################
####################  UNO            ########################
############################################################
BONO DE INICIO RÁPIDO
*/
	function uno()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if($usuario[0]->id_tipo_usuario!=1)
		{
			redirect('/auth/logout');
		}

		$style=$this->modelo_dashboard->get_style($id);

		$this->template->set("style",$style);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/bo/header');
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/comisiones/menu_bono1');
	}
	function parcial_uno()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if($usuario[0]->id_tipo_usuario!=1)
		{
			redirect('/auth/logout');
		}

		$id=$this->tank_auth->get_user_id();
		if(isset($_POST['from'])&&isset($_POST['to']))
		{

			$ventas           = $this->model_comisiones->get_venta();
			$ventas2          = $this->model_comisiones->get_venta2();
			$id_users         = $this->model_comisiones->get_id_user();
			$rango        	  = $this->model_comisiones->get_rango();
			$ventaxuser       = array();
			$from             = $_POST['from'];
			$to               = $_POST['to'];
			$afiliados        = array();
			$comisiones       = array();
			$id_ventas        = array();
			$puntos           = array();
			$sponsor          = array();
			$nombres          = array();
			$cuentas          = array();
			$primer_sandwich  = array();
			$totales          = 0;
			$segundo_sandwich = array();

			//Sacamos los ids de los usuarios que haya comprado en la fecha establecida
			foreach ($id_users as $key)
			{	
				//obtenemos los ids de los afiliados de dichos usuarios
				$afiliados[$key->id_user]  = $this->model_comisiones->get_afiliados($key->id_user);
				//obtenemos los ids de las ventas de dichos usuarios
				$ventaxuser[$key->id_user] = $this->model_comisiones->get_id_venta($key->id_user);
				$nombres[$key->id_user]    = $this->model_comisiones->get_nombre($key->id_user);
				$cuentas[$key->id_user]    = $this->model_comisiones->get_id_venta($key->id_user);
			}

			foreach ($ventaxuser as $key)
			{
				foreach ($key as $key2)
					$puntos[$key2->id_venta]=$this->model_comisiones->get_comisiones($key2->id_venta);
			}

			foreach ($id_users as $key)
			{
				$totales=0;
            	foreach ($ventaxuser[$key->id_user] as $ids_ventas)
				{
					for ($i=0;$i<sizeof($ventaxuser[$key->id_user][0]);$i++)
					{
						if(isset($puntos[$ids_ventas->id_venta][$i]->puntos))
						$totales+=$puntos[$ids_ventas->id_venta][$i]->puntos;
					}
					$primer_sandwich[$key->id_user]=$totales;
				}
			}

			foreach ($id_users as $key)
			{	
				$comision=0;
				foreach ($afiliados[$key->id_user] as $values2)
				{
					if($values2->directo==1)
					{
						$comision+=(0.30*$primer_sandwich[$values2->id_afiliado]);
					}
					if($values2->debajo_de==$key->id_user)
					{
						foreach ($afiliados[$values2->id_afiliado] as $values1)
						{
							if($values1->debajo_de==$values2->id_afiliado)
							{
								$comision+=(0.10*$primer_sandwich[$values1->id_afiliado]);
							}
						}
					}
				}
				$segundo_sandwich[$key->id_user]=$comision+$primer_sandwich[$key->id_user];
			}

			$this->template->set("ventas",$ventas);
			$this->template->set("ventas2",$id_users);
			$this->template->set("nombres",$nombres);
			$this->template->set("primer_sandwich",$primer_sandwich);
			$this->template->set("segundo_sandwich",$segundo_sandwich);
			$this->template->set("from",$from);
			$this->template->set("to",$to);
			$this->template->set("rango",$rango);
		}

		$usuario=$this->general->get_username($id);
		$style=$this->modelo_dashboard->get_style($id);
		$this->template->set("style",$style);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/bo/header');
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/comisiones/parcial1');
	}
	function final_uno()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if($usuario[0]->id_tipo_usuario!=1)
		{
			redirect('/auth/logout');
		}

		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);

		$style=$this->modelo_dashboard->get_style($id);

		$this->template->set("style",$style);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/bo/header');
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/comisiones/final1');
	}
/*#########################################################################################################################################
####################  UNO    FIN     ######################################################################################################
###########################################################################################################################################
*/

/*########################################################################################################################################
####################  DOS            #####################################################################################################
##########################################################################################################################################

BONO AUTOCOMPRA
*/
	function dos()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if($usuario[0]->id_tipo_usuario!=1)
		{
			redirect('/auth/logout');
		}

		$style=$this->modelo_dashboard->get_style($id);

		$this->template->set("style",$style);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/bo/header');
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/comisiones/menu_bono2');
	}
	function parcial_dos()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if($usuario[0]->id_tipo_usuario!=1)
		{
			redirect('/auth/logout');
		}

		$id=$this->tank_auth->get_user_id();
		if(isset($_POST['from'])&&isset($_POST['to']))
		{

			$ventas           = $this->model_comisiones->get_venta();
			$ventas2          = $this->model_comisiones->get_venta2();
			$id_users         = $this->model_comisiones->get_id_user();
			$rango        	  = $this->model_comisiones->get_rango();
			$ventaxuser       = array();
			$from             = $_POST['from'];
			$to               = $_POST['to'];
			$afiliados        = array();
			$comisiones       = array();
			$id_ventas        = array();
			$puntos           = array();
			$sponsor          = array();
			$nombres          = array();
			$cuentas          = array();
			$primer_sandwich  = array();
			$totales          = 0;
			$directos		  = array();
			$directos2		  = array();
			$directos_suma	  = 0;
			$directos2_suma	  = 0;
			$segundo_sandwich = array();
			$totales	 	  = array();
			$mil			  = array();

			//Sacamos los ids de los usuarios que haya comprado en la fecha establecida
			foreach ($id_users as $key)
			{	
				//obtenemos los ids de los afiliados de dichos usuarios
				$afiliados[$key->id_user]  = $this->model_comisiones->get_afiliados($key->id_user);
				//obtenemos los ids de las ventas de dichos usuarios
				$ventaxuser[$key->id_user] = $this->model_comisiones->get_id_venta($key->id_user);
				$nombres[$key->id_user]    = $this->model_comisiones->get_nombre($key->id_user);
				$cuentas[$key->id_user]    = $this->model_comisiones->get_id_venta($key->id_user);
			}

			foreach ($ventaxuser as $key)
			{
				foreach ($key as $key2)
					$puntos[$key2->id_venta]=$this->model_comisiones->get_comisiones($key2->id_venta);
			}
		
		//SACAMOS PRIMERO LOS PUNTOS DE LOS USUARIOS QUE HAYAN REALIZADO COMPRAS
			foreach ($id_users as $key)
			{
				$totales=0;
            	foreach ($ventaxuser[$key->id_user] as $ids_ventas)
				{
					for ($i=0;$i<sizeof($ventaxuser[$key->id_user][0]);$i++)
					{
						if(isset($puntos[$ids_ventas->id_venta][$i]->puntos))
						$totales+=$puntos[$ids_ventas->id_venta][$i]->puntos;
					}
					$primer_sandwich[$key->id_user]=$totales;
				}
			}

			//A partir de los usuarios con compras iniciamos el foreach
			foreach ($id_users as $key)//AQUI ESTAN LOS SUJETOS A
			{
				//Variable que guardara las comisiones totales de dicho usuario
				$comision=0;
				$izq=0;
				$der=0;
				$comision2=0;
				//Obtenemos los afiliados de dicho usuario (En la consulta evaluamos que hayan realizado compras)
				foreach ($afiliados[$key->id_user] as $values2)//OBTENEMOS LOS SUJETOS B
				{
					//Revizamos si el afiliado B que esta siendo evaluado es directo del sujeto A
					if($values2->directo==1)
					{
						$directos[$values2->id_afiliado]=$primer_sandwich[$values2->id_afiliado];
					}
				}
				if(isset($directos))//Checamos que cumplan con las reglas del bono
				{
					arsort($directos);//ordenamos de mayor a menor las comisiones de los afiliados
					if(sizeof($directos)>=4)//revizamos que exitan al menos 4 directos
					{
						$i=0;//por si hay mas de 4 directos
						foreach ($directos as $clave => $valor)//obtenemos los arrays keys y los values de los directos que contiene puntajes y ids
						{
							if($i<4)//por si hay mas de 4 directos
							{
								foreach ($afiliados[$clave] as $values3)//obtenemos afiliados de mis 4 directos
								{
									//Revizamos si el afiliado B que esta siendo evaluado es directo del sujeto A
									if($values3->directo==1)
									{
										//guardamos los directos de mis directos con sus puntos
										$totales+=$primer_sandwich[$values3->id_afiliado];
									}
								}
							}
							$i++;
						}
						$directos_suma+=$totales;
					}
					unset($directos);//Checamos que cumplan con las reglas del bono
					//REPETIMOS EL PASO 1 PARA MIS SEGUNDOS AFILIADOS
					if(isset($directos2))
					{
						arsort($directos2);
						if(sizeof($directos2)>=4)
						{
							$i=0;
							foreach ($directos2 as $clave => $valor)
							{
								if($i<4)
								{
									foreach ($afiliados[$clave] as $values3)
									{
										if($values3->directo==1)
										{
											$totales+=$primer_sandwich[$values3->id_afiliado];
										}
									}
								}
								$i++;
							}
							$directos2_suma+=$totales;
						}
						unset($directos2);				
					}	
				}
				//sort($directos);
				//print_r($directos);
				//print_r($rsort);
				$segundo_sandwich[$key->id_user]=$totales;
				$totales=0;
			}
			$this->template->set("ventas",$ventas);
			$this->template->set("ventas2",$id_users);
			$this->template->set("nombres",$nombres);
			$this->template->set("primer_sandwich",$primer_sandwich);
			$this->template->set("segundo_sandwich",$segundo_sandwich);
			$this->template->set("from",$from);
			$this->template->set("to",$to);
			$this->template->set("rango",$rango);
		}

		$usuario=$this->general->get_username($id);
		$style=$this->modelo_dashboard->get_style($id);
		$this->template->set("style",$style);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/bo/header');
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/comisiones/parcial2');
	}
	function final_dos()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if($usuario[0]->id_tipo_usuario!=1)
		{
			redirect('/auth/logout');
		}


		$style=$this->modelo_dashboard->get_style($id);

		$this->template->set("style",$style);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/bo/header');
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/comisiones/final2');
	}

/*#########################################################################################################################################
####################  DOS    FIN     ######################################################################################################
###########################################################################################################################################
*/

/*########################################################################################################################################
####################  TRES            ####################################################################################################
##########################################################################################################################################
*/

	function tres()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if($usuario[0]->id_tipo_usuario!=1)
		{
			redirect('/auth/logout');
		}

		$style=$this->modelo_dashboard->get_style($id);

		$this->template->set("style",$style);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/bo/header');
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/comisiones/menu_bono3');
	}
	function parcial_tres()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if($usuario[0]->id_tipo_usuario!=1)
		{
			redirect('/auth/logout');
		}

		$id=$this->tank_auth->get_user_id();
		if(isset($_POST['from'])&&isset($_POST['to']))
		{

			$ventas           = $this->model_comisiones->get_venta();
			$ventas2          = $this->model_comisiones->get_venta2();
			$id_users         = $this->model_comisiones->get_id_user();
			$rango        	  = $this->model_comisiones->get_rango();
			$ventaxuser       = array();
			$from             = $_POST['from'];
			$to               = $_POST['to'];
			$afiliados        = array();
			$comisiones       = array();
			$id_ventas        = array();
			$puntos           = array();
			$sponsor          = array();
			$nombres          = array();
			$cuentas          = array();
			$primer_sandwich  = array();
			$totales          = 0;
			$segundo_sandwich = array();

			//Sacamos los ids de los usuarios que haya comprado en la fecha establecida
			foreach ($id_users as $key)
			{
				//obtenemos los ids de los afiliados de dichos usuarios
				$afiliados[$key->id_user]  = $this->model_comisiones->get_afiliados($key->id_user);
				//obtenemos los ids de las ventas de dichos usuarios
				$ventaxuser[$key->id_user] = $this->model_comisiones->get_id_venta($key->id_user);
				$nombres[$key->id_user]    = $this->model_comisiones->get_nombre($key->id_user);
				$cuentas[$key->id_user]    = $this->model_comisiones->get_id_venta($key->id_user);
			}

			foreach ($ventaxuser as $key)
			{
				foreach ($key as $key2)
					$puntos[$key2->id_venta]=$this->model_comisiones->get_comisiones($key2->id_venta);
			}
		
		//SACAMOS PRIMERO LOS PUNTOS DE LOS USUARIOS QUE HAYAN REALIZADO COMPRAS
			foreach ($id_users as $key)
			{
				$totales=0;
            	foreach ($ventaxuser[$key->id_user] as $ids_ventas)
				{
					for ($i=0;$i<sizeof($ventaxuser[$key->id_user][0]);$i++)
					{
						if(isset($puntos[$ids_ventas->id_venta][$i]->puntos))
						$totales+=$puntos[$ids_ventas->id_venta][$i]->puntos;
					}
					$primer_sandwich[$key->id_user]=$totales;
				}
			}

			//A partir de los usuarios con compras iniciamos el foreach
			foreach ($id_users as $key)//AQUI ESTAN LOS SUJETOS A
			{	
				//Variable que guardara las comisiones totales de dicho usuario
				$comision=0;
				$izq=0;
				$der=0;
				$comision2=0;
				//Obtenemos los afiliados de dicho usuario (En la consulta evaluamos que hayan realizado compras)
				foreach ($afiliados[$key->id_user] as $values2)//OBTENEMOS LOS SUJETOS B
				{
					//Revizamos si el afiliado B que esta siendo evaluado es directo del sujeto A y esta debajo del mismo
					if($values2->directo==1&&$values2->debajo_de==$key->id_user)
					{
						//OBTENEMOS LA SUMATORIA DE LOS PUNTOS DE LAS DOS PATAS

						if($values2->lado==0)
						{
							foreach ($afiliados[$values2->id_afiliado] as $values1)
							{
								$comision+=$primer_sandwich[$values1->id_afiliado];
							}
							$izq=$comision;
						}
						if($values2->lado==1)
						{
							foreach ($afiliados[$values2->id_afiliado] as $values1)
							{
								$comision2+=$primer_sandwich[$values1->id_afiliado];
							}
							$der=$comision2;
						}

					}
				}
				//checamos que ambas patas tengas mas de 200 puntos
				if ($izq>=200&&$der>=200)
				{
					$diferencia=0;
					$comision=0;
					if($izq<$der)
					{
						$diferencia=$izq-$der;
						if($nombres[$key->id_user]->paquete==1)
						{
							$comision=($izq*0.08)*2;
						}
						if($nombres[$key->id_user]->paquete==2)
						{
							$comision=($izq*0.10)*2;
						}
						if($nombres[$key->id_user]->paquete==3)
						{
							$comision=($izq*0.12)*2;
						}
						if($nombres[$key->id_user]->paquete==4)
						{
							$comision=($izq*0.15)*2;
						}
					}
					if($der<$izq||$der==$izq)
					{
						$diferencia=$izq-$der;
						if($nombres[$key->id_user]->paquete==1)
						{
							$comision=($der*0.08)*2;
						}
						if($nombres[$key->id_user]->paquete==2)
						{
							$comision=($der*0.10)*2;
						}
						if($nombres[$key->id_user]->paquete==3)
						{
							$comision=($der*0.12)*2;
						}
						if($nombres[$key->id_user]->paquete==4)
						{
							$comision=($der*0.15)*2;
						}
					}
					$segundo_sandwich[$key->id_user]=$comision;
				}
				else
				$segundo_sandwich[$key->id_user]=0;
			}
			$this->template->set("ventas",$ventas);
			$this->template->set("ventas2",$id_users);
			$this->template->set("nombres",$nombres);
			$this->template->set("primer_sandwich",$primer_sandwich);
			$this->template->set("segundo_sandwich",$segundo_sandwich);
			$this->template->set("from",$from);
			$this->template->set("to",$to);
			$this->template->set("rango",$rango);
		}

		$usuario=$this->general->get_username($id);
		$style=$this->modelo_dashboard->get_style($id);
		$this->template->set("style",$style);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/bo/header');
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/comisiones/parcial3');
	}
	function final_tres()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if($usuario[0]->id_tipo_usuario!=1)
		{
			redirect('/auth/logout');
		}

		$style=$this->modelo_dashboard->get_style($id);

		$this->template->set("style",$style);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/bo/header');
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/comisiones/final3');
	}
/*#########################################################################################################################################
####################  TRES   FIN     ######################################################################################################
###########################################################################################################################################
*/

/*########################################################################################################################################
####################  CUATRO         #####################################################################################################
##########################################################################################################################################
*/
	function cuatro()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if($usuario[0]->id_tipo_usuario!=1)
		{
			redirect('/auth/logout');
		}

		$style=$this->modelo_dashboard->get_style($id);

		$this->template->set("style",$style);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/bo/header');
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/comisiones/menu_bono4');
	}
	function parcial_cuatro()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if($usuario[0]->id_tipo_usuario!=1)
		{
			redirect('/auth/logout');
		}

		$id=$this->tank_auth->get_user_id();
		if(isset($_POST['from'])&&isset($_POST['to']))
		{

			$ventas           = $this->model_comisiones->get_venta();
			$ventas2          = $this->model_comisiones->get_venta2();
			$id_users         = $this->model_comisiones->get_id_user();
			$rango        	  = $this->model_comisiones->get_rango();
			$ventaxuser       = array();
			$from             = $_POST['from'];
			$to               = $_POST['to'];
			$afiliados        = array();
			$comisiones       = array();
			$id_ventas        = array();
			$puntos           = array();
			$sponsor          = array();
			$nombres          = array();
			$cuentas          = array();
			$primer_sandwich  = array();
			$totales          = 0;
			$segundo_sandwich = array();

			//Sacamos los ids de los usuarios que haya comprado en la fecha establecida
			foreach ($id_users as $key)
			{	
				//obtenemos los ids de los afiliados de dichos usuarios
				$afiliados[$key->id_user]  = $this->model_comisiones->get_afiliados($key->id_user);
				//obtenemos los ids de las ventas de dichos usuarios
				$ventaxuser[$key->id_user] = $this->model_comisiones->get_id_venta($key->id_user);
				$nombres[$key->id_user]    = $this->model_comisiones->get_nombre($key->id_user);
				$cuentas[$key->id_user]    = $this->model_comisiones->get_id_venta($key->id_user);
			}

			foreach ($ventaxuser as $key)
			{
				foreach ($key as $key2)
					$puntos[$key2->id_venta]=$this->model_comisiones->get_comisiones($key2->id_venta);
			}
		
		//SACAMOS PRIMERO LOS PUNTOS DE LOS USUARIOS QUE HAYAN REALIZADO COMPRAS
			foreach ($id_users as $key)
			{
				$totales=0;
            	foreach ($ventaxuser[$key->id_user] as $ids_ventas)
				{
					for ($i=0;$i<sizeof($ventaxuser[$key->id_user][0]);$i++)
					{
						if(isset($puntos[$ids_ventas->id_venta][$i]->puntos))
						$totales+=$puntos[$ids_ventas->id_venta][$i]->puntos;
					}
					$primer_sandwich[$key->id_user]=$totales;
				}
			}

			//A partir de los usuarios con compras iniciamos el foreach
			foreach ($id_users as $key)//AQUI ESTAN LOS SUJETOS A
			{	
				//Variable que guardara las comisiones totales de dicho usuario
				$comision=0;
				$izq=0;
				$der=0;
				$comision2=0;
				//Obtenemos los afiliados de dicho usuario (En la consulta evaluamos que hayan realizado compras)
				foreach ($afiliados[$key->id_user] as $values2)//OBTENEMOS LOS SUJETOS B
				{
					//Revizamos si el afiliado B que esta siendo evaluado es directo del sujeto A y esta debajo del mismo
					if($values2->directo==1&&$values2->debajo_de==$key->id_user)
					{
						//OBTENEMOS LA SUMATORIA DE LOS PUNTOS DE LAS DOS PATAS

						if($values2->lado==0)
						{
							foreach ($afiliados[$values2->id_afiliado] as $values1)
							{
								$comision+=$primer_sandwich[$values1->id_afiliado];
							}
							$izq=$comision;
						}
						if($values2->lado==1)
						{
							foreach ($afiliados[$values2->id_afiliado] as $values1)
							{
								$comision2+=$primer_sandwich[$values1->id_afiliado];
							}
							$der=$comision2;
						}

					}
				}
				//checamos que ambas patas tengas mas de 200 puntos
				if ($izq>=200&&$der>=200)
				{
					$diferencia=0;
					$comision=0;
					if($izq<$der)
					{
						$diferencia=$izq-$der;
						if($nombres[$key->id_user]->paquete==1)
						{
							$comision=$izq*0.08;
						}
						if($nombres[$key->id_user]->paquete==2)
						{
							$comision=$izq*0.10;
						}
						if($nombres[$key->id_user]->paquete==3)
						{
							$comision=$izq*0.12;
						}
						if($nombres[$key->id_user]->paquete==4)
						{
							$comision=$izq*0.15;
						}
					}
					if($der<$izq||$der==$izq)
					{
						$diferencia=$izq-$der;
						if($nombres[$key->id_user]->paquete==1)
						{
							$comision=$der*0.08;
						}
						if($nombres[$key->id_user]->paquete==2)
						{
							$comision=$der*0.10;
						}
						if($nombres[$key->id_user]->paquete==3)
						{
							$comision=$der*0.12;
						}
						if($nombres[$key->id_user]->paquete==4)
						{
							$comision=$der*0.15;
						}
					}
					$segundo_sandwich[$key->id_user]=$comision;
				}
				else
				$segundo_sandwich[$key->id_user]=0;
			foreach ($segundo_sandwich as $key => $value)
			{
				if($primer_sandwich[$key]>=130&&$primer_sandwich[$key]<=199&&$segundo_sandwich[$key]>=10000&&$segundo_sandwich[$key]<=29999)
				{
					//Rangos en cross_rango_user el 1 es sin rango
					if($rango[$key]->id_rango==2)//ORO
					{
						foreach ($afiliados as $value2)
						{
							if ($values2->directo==1&&$values2->debajo_de==$key->id_user)
							{
								
							}
						}
					}
					if($rango[$key]->id_rango==3)//ZAFIRO
					{

					}
					if($rango[$key]->id_rango==3)//RUBI
					{

					}
					if($rango[$key]->id_rango==3)//ESMERALDA
					{

					}
					if($rango[$key]->id_rango==3)//DIAMANTE WORLD
					{

					}
					if($rango[$key]->id_rango==3)
					{

					}
				}
			}
			foreach ($segundo_sandwich as $key => $value)
			{
				//Rangos en cross_rango_user el 1 es sin rango
				if($rango[$key]->id_rango==2)//ORO
				{
					foreach ($afiliados as $value2)
					{
						if ($values2->directo==1&&$values2->debajo_de==$key->id_user)
						{
							
						}
					}
				}
				if($rango[$key]->id_rango==3)//ZAFIRO
				{

				}
				if($rango[$key]->id_rango==3)//RUBI
				{

				}
				if($rango[$key]->id_rango==3)//ESMERALDA
				{

				}
				if($rango[$key]->id_rango==3)//DIAMANTE WORLD
				{

				}
				if($rango[$key]->id_rango==3)
				{

				}
			}


			}
			$this->template->set("ventas",$ventas);
			$this->template->set("ventas2",$id_users);
			$this->template->set("nombres",$nombres);
			$this->template->set("primer_sandwich",$primer_sandwich);
			$this->template->set("segundo_sandwich",$segundo_sandwich);
			$this->template->set("from",$from);
			$this->template->set("to",$to);
			$this->template->set("rango",$rango);
		}

		$usuario=$this->general->get_username($id);
		$style=$this->modelo_dashboard->get_style($id);
		$this->template->set("style",$style);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/bo/header');
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/comisiones/parcial4');
	}
	function final_cuatro()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if($usuario[0]->id_tipo_usuario!=1)
		{
			redirect('/auth/logout');
		}


		$style=$this->modelo_dashboard->get_style($id);

		$this->template->set("style",$style);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/bo/header');
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/comisiones/final4');
	}
	function cinco()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if($usuario[0]->id_tipo_usuario!=1)
		{
			redirect('/auth/logout');
		}

		$style=$this->modelo_dashboard->get_style($id);

		$this->template->set("style",$style);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/bo/header');
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/comisiones/menu_bono1');
	}
	function parcial_cinco()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}
		
			$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if($usuario[0]->id_tipo_usuario!=1)
		{
			redirect('/auth/logout');
		}

		$id=$this->tank_auth->get_user_id();
		if(isset($_POST['from'])&&isset($_POST['to']))
		{

			$ventas           = $this->model_comisiones->get_venta();
			$ventas2          = $this->model_comisiones->get_venta2();
			$id_users         = $this->model_comisiones->get_id_user();
			$rango        	  = $this->model_comisiones->get_rango();
			$ventaxuser       = array();
			$from             = $_POST['from'];
			$to               = $_POST['to'];
			$afiliados        = array();
			$comisiones       = array();
			$id_ventas        = array();
			$puntos           = array();
			$sponsor          = array();
			$nombres          = array();
			$cuentas          = array();
			$primer_sandwich  = array();
			$totales          = 0;
			$segundo_sandwich = array();

			//Sacamos los ids de los usuarios que haya comprado en la fecha establecida
			foreach ($id_users as $key)
			{	
				//obtenemos los ids de los afiliados de dichos usuarios
				$afiliados[$key->id_user]  = $this->model_comisiones->get_afiliados($key->id_user);
				//obtenemos los ids de las ventas de dichos usuarios
				$ventaxuser[$key->id_user] = $this->model_comisiones->get_id_venta($key->id_user);
				$nombres[$key->id_user]    = $this->model_comisiones->get_nombre($key->id_user);
				$cuentas[$key->id_user]    = $this->model_comisiones->get_id_venta($key->id_user);
			}

			foreach ($ventaxuser as $key)
			{
				foreach ($key as $key2)
					$puntos[$key2->id_venta]=$this->model_comisiones->get_comisiones($key2->id_venta);
			}
		
		//SACAMOS PRIMERO LOS PUNTOS DE LOS USUARIOS QUE HAYAN REALIZADO COMPRAS
			foreach ($id_users as $key)
			{
				$totales=0;
            	foreach ($ventaxuser[$key->id_user] as $ids_ventas)
				{
					for ($i=0;$i<sizeof($ventaxuser[$key->id_user][0]);$i++)
					{
						if(isset($puntos[$ids_ventas->id_venta][$i]->puntos))
						$totales+=$puntos[$ids_ventas->id_venta][$i]->puntos;
					}
					$primer_sandwich[$key->id_user]=$totales;
				}
			}

			//A partir de los usuarios con compras iniciamos el foreach
			foreach ($id_users as $key)//AQUI ESTAN LOS SUJETOS A
			{	
				//Variable que guardara las comisiones totales de dicho usuario
				$comision=0;
				$izq=0;
				$der=0;
				$comision2=0;
				//Obtenemos los afiliados de dicho usuario (En la consulta evaluamos que hayan realizado compras)
				foreach ($afiliados[$key->id_user] as $values2)//OBTENEMOS LOS SUJETOS B
				{
					//Revizamos si el afiliado B que esta siendo evaluado es directo del sujeto A y esta debajo del mismo
					if($values2->directo==1&&$values2->debajo_de==$key->id_user)
					{
						//OBTENEMOS LA SUMATORIA DE LOS PUNTOS DE LAS DOS PATAS

						if($values2->lado==0)
						{
							foreach ($afiliados[$values2->id_afiliado] as $values1)
							{
								$comision+=$primer_sandwich[$values1->id_afiliado];
							}
							$izq=$comision;
						}
						if($values2->lado==1)
						{
							foreach ($afiliados[$values2->id_afiliado] as $values1)
							{
								$comision2+=$primer_sandwich[$values1->id_afiliado];
							}
							$der=$comision2;
						}

					}
				}
				//checamos que ambas patas tengas mas de 200 puntos
				if ($izq>=200&&$der>=200)
				{
					$diferencia=0;
					$comision=0;
					if($izq<$der)
					{
						$diferencia=$izq-$der;
						if($nombres[$key->id_user]->paquete==1)
						{
							$comision=$izq*0.08;
						}
						if($nombres[$key->id_user]->paquete==2)
						{
							$comision=$izq*0.10;
						}
						if($nombres[$key->id_user]->paquete==3)
						{
							$comision=$izq*0.12;
						}
						if($nombres[$key->id_user]->paquete==4)
						{
							$comision=$izq*0.15;
						}
					}
					if($der<$izq||$der==$izq)
					{
						$diferencia=$izq-$der;
						if($nombres[$key->id_user]->paquete==1)
						{
							$comision=$der*0.08;
						}
						if($nombres[$key->id_user]->paquete==2)
						{
							$comision=$der*0.10;
						}
						if($nombres[$key->id_user]->paquete==3)
						{
							$comision=$der*0.12;
						}
						if($nombres[$key->id_user]->paquete==4)
						{
							$comision=$der*0.15;
						}
					}
					$segundo_sandwich[$key->id_user]=$comision;
				}
				else
				$segundo_sandwich[$key->id_user]=0;
			}
			$this->template->set("ventas",$ventas);
			$this->template->set("ventas2",$id_users);
			$this->template->set("nombres",$nombres);
			$this->template->set("primer_sandwich",$primer_sandwich);
			$this->template->set("segundo_sandwich",$segundo_sandwich);
			$this->template->set("from",$from);
			$this->template->set("to",$to);
			$this->template->set("rango",$rango);
		}

		$usuario=$this->general->get_username($id);
		$style=$this->modelo_dashboard->get_style($id);
		$this->template->set("style",$style);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/bo/header');
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/comisiones/parcial5');
	}
	function final_cinco()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		$categorias  = $this->model_mercancia->CategoriasMercancia();
		
		if($usuario[0]->id_tipo_usuario!=1)
		{
			redirect('/auth/logout');
		}

		$style=$this->modelo_dashboard->get_style($id);

		$this->template->set("style",$style);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/bo/header');
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/comisiones/final5');
	}
	
	function editar()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if($usuario[0]->id_tipo_usuario!=1)
		{
			redirect('/auth/logout');
		}
		
		if(!isset($_GET['id'])){
			redirect('/bo/configuracion/comisiones');
		}
	
		$style=$this->modelo_dashboard->get_style($id);
		$profundidad  = $this->model_admin->get_Profundidad_tipo_red($_GET['id']) + 1;
		$configuracion_red = $this->model_admin->get_config_red_comision($_GET['id']);
		$categoria = $this->model_mercancia->CategoriaMercancia($_GET['id']);
		
		$this->template->set("style",$style);
		$this->template->set("profundidad",$profundidad);
		$this->template->set("configuracion",$configuracion_red);
		$this->template->set("categoria",$categoria);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/configuracion/Comision/comisiones');
	}
	
	function actualizar_comisiones(){
		if(isset($_POST['categoria'])){
			$porcentaje = 0;
			foreach ($_POST['configuracion'] as $valor){
				$porcentaje = $porcentaje + $valor;
			}
			if($porcentaje > 100){
				$error = "La Configuracion no se ha podido actualizar, debido a que la suma de los porcentajes es mayor al 100%";
				$this->session->set_flashdata('error', $error);
			}else{
				$id_categoria = $_POST['categoria'];
				
				$this->model_admin->new_Config_Comision($id_categoria);
				$correcto = "La configuracion ha sido actualizada.";
				$this->session->set_flashdata('correcto', $correcto);
			}
		}else{
			$error = "La Configuracion no se ha podido actualizar";
			$this->session->set_flashdata('error', $error);
		}
		
		redirect('bo/configuracion/comisiones');
	}
}