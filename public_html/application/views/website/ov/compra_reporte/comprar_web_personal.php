<link href="/cart/HTML/assets/css/style.css" rel="stylesheet">
<link href="/cart/HTML/assets/css/skin-6.css" rel="stylesheet">

<!-- css3 animation effect for this template -->
<link href="/cart/HTML/assets/css/animate.min.css" rel="stylesheet">

<!-- styles needed by carousel slider -->
<link href="/cart/HTML/assets/css/owl.carousel.css" rel="stylesheet">
<link href="/cart/HTML/assets/css/owl.theme.css" rel="stylesheet">

<!-- styles needed by checkRadio -->
<link href="/cart/HTML/assets/css/ion.checkRadio.css" rel="stylesheet">
<link href="/cart/HTML/assets/css/ion.checkRadio.cloudy.css" rel="stylesheet">

<!-- styles needed by mCustomScrollbar -->
<link href="/cart/HTML/assets/css/jquery.mCustomScrollbar.css" rel="stylesheet">

<!-- Just for debugging purposes. -->
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

<!-- include pace script for automatic web page progress bar  -->

<script>
    paceOptions = {
      elements: true
    };
</script>
<script src="/cart/HTML/assets/js/pace.min.js"></script>
<div class="row">         
         <!-- a blank row to get started -->
    	<div class="col-sm-12">
        	<br />
        	<br />
        </div>
    </div>
 <div class="navbar navbar-tshop navbar-fixed-top megamenu" role="navigation" id="cart_cont">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only"> Toggle navigation </span> <span class="icon-bar"> </span> <span class="icon-bar"> </span> <span class="icon-bar"> </span> </button>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-cart"> <i class="fa fa-shopping-cart colorWhite"> </i> <span class="cartRespons colorWhite"> Cart (<?php echo $this->cart->total_items(); ?> ) </span> </button>
      
      <!-- this part for mobile -->
      <div class="search-box pull-right hidden-lg hidden-md hidden-sm">
        <div class="input-group">
          <button class="btn btn-nobg getFullSearch" type="button"> <i class="fa fa-search"> </i> </button>
        </div>
        <!-- /input-group --> 
        
      </div>
    </div>
    
    <!-- this part is duplicate from cartMenu  keep it for mobile -->
    <div class="navbar-cart  collapse">
      <div class="cartMenu  hidden-lg col-xs-12 hidden-md hidden-sm">
        <div class="w100 miniCartTable scroll-pane">
          <table  >
            <tbody>
            	 <?php
                  	if($this->cart->contents())
					{
						$cantidad=0; 
						foreach ($this->cart->contents() as $items) 
						{
							$total=$items['qty']*$items['price'];	
							echo '<tr class="miniCartProduct"> 
									<td style="width:20%" class="miniCartProductThumb"><div> <a href=""> <img src="'.$compras[$cantidad]['imagen'].'" alt="img"> </a> </div></td>
									<td style="width:40%"><div class="miniCartDescription">
				                        <h4> <a href=""> '.$compras[$cantidad]['nombre'].'</a> </h4>
				                        <div class="price"> <span> '.$items['price'].' </span> </div>
				                      </div></td>
				                    <td  style="width:10%" class="miniCartQuantity"><a > X '.$items['qty'].' </a></td>
				                    <td  style="width:15%" class="miniCartSubtotal"><span>'.$total.'</span></td>
				                    <td  style="width:5%" class="delete"><a onclick="quitar_producto(\''.$items['rowid'].'\')"> x </a></td>
								</tr>';
								$cantidad++; 
						} 
					}
				?>
             
            </tbody>
          </table>
        </div>
        <!--/.miniCartTable-->
        
        <div class="miniCartFooter  miniCartFooterInMobile text-right">
          <h3 class="text-right subtotal"> Subtotal: $<?php echo $this->cart->total(); ?> </h3>
          <a class="btn btn-sm btn-danger" onclick="ver_cart()"> <i class="fa fa-shopping-cart"> </i> VER CARRITO </a>
        </div>
        <!--/.miniCartFooter--> 
        
      </div>
      <!--/.cartMenu--> 
    </div>
    <!--/.navbar-cart-->
    
    <div class="navbar-collapse collapse">
      
      
      <!--- this part will be hidden for mobile version -->
      <div class="nav navbar-nav navbar-right hidden-xs">
        <div class="dropdown  cartMenu "> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-shopping-cart"> </i> <span class="cartRespons"> Cart (<?php echo $this->cart->total_items(); ?> ) </span> <b class="caret"> </b> </a>
          <div class="dropdown-menu col-lg-4 col-xs-12 col-md-4 ">
            <div class="w100 miniCartTable scroll-pane">
              <table> 
                <tbody>
                  <?php
                  	if($this->cart->contents())
					{
						$cantidad=0;
						foreach ($this->cart->contents() as $items) 
						{
							$total=$items['qty']*$items['price'];	
							echo '<tr class="miniCartProduct"> 
									<td style="width:20%" class="miniCartProductThumb"><div> <a href=""> <img src="'.$compras[$cantidad]['imagen'].'" alt="img"> </a> </div></td>
									<td style="width:40%"><div class="miniCartDescription">
				                        <h4> <a href=""> '.$compras[$cantidad]['nombre'].'</a> </h4>
				                        <div class="price"> <span> '.$items['price'].' </span> </div>
				                      </div></td>
				                    <td  style="width:10%" class="miniCartQuantity"><a > X '.$items['qty'].' </a></td>
				                    <td  style="width:15%" class="miniCartSubtotal"><span>'.$total.'</span></td>
				                    <td  style="width:5%" class="delete"><a onclick="quitar_producto(\''.$items['rowid'].'\')"> x </a></td>
								</tr>'; 
								$cantidad++;
						} 
					}
                  
                   ?>
                </tbody>
              </table>
            </div> 
            <!--/.miniCartTable-->
            
            <div class="miniCartFooter text-right">
              <h3 class="text-right subtotal"> Subtotal: $<?php echo $this->cart->total(); ?> </h3>
              <a class="btn btn-sm btn-danger" onclick="ver_cart()"> <i class="fa fa-shopping-cart"> </i> VER CARRITO </a> 
            </div>
            <!--/.miniCartFooter--> 
            
          </div>
          <!--/.dropdown-menu--> 
        </div>
        <!--/.cartMenu-->
        
        <div class="search-box">
          <div class="input-group">
            <button class="btn btn-nobg getFullSearch" type="button"> <i class="fa fa-search"> </i> </button>
          </div>
          <!-- /input-group --> 
          
        </div>
        <!--/.search-box --> 
      </div>
      <!--/.navbar-nav hidden-xs--> 
    </div>
    <!--/.nav-collapse --> 
</div>
<div class="row">
	<div class="container main-container" style="background-color: #fff;"> 
		
		<article class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top: 3%; padding-bottom: 5%;">
			<div class="row">
				<div class="row">
					<div class="col-lg-9 col-md-9 col-sm-7">
					  <h1 class="section-title-inner"><span><i class="glyphicon glyphicon-shopping-cart"></i> Comprar</span></h1>
					</div>
				</div> <!--/.row-->
				<!-- widget edit box -->
				<div class="jarviswidget-editbox">
					<!-- This area used as dropdown edit box -->
	
				</div>
				<!-- end widget edit box -->
	
				<!-- widget content -->
				<div class="widget-body">
	
					<div class="row">
						<? /*if(isset($_GET['usr']))
						{ ?>
							<form id="wizard-1" novalidate="novalidate" action="hacer_compra?tipo=<?=$_GET["tipo"]?>&usr=<?=$_GET["usr"]?>" method="post">
						<? } else {?>
							<form id="wizard-1" novalidate="novalidate" action="hacer_compra?tipo=<?=$_GET["tipo"]?>" method="post">
						<? } */?>
							<div id="bootstrap-wizard-1" class="col-sm-12">
								<div class="tab-content">
									<div class="tab-pane active" id="tab1">
										<br>
								
										<div class="row userInfo">
                
							                <div class="col-lg-12">
							                    <h2 class="block-title-2"> Productos </h2>
							                </div>
							            <div class="col-xs-12 col-sm-12 col-lg-12">
							                      <div class="cartContent w100 checkoutReview">
							                        <table id="dt_basic" class="table table-striped table-hover" width="100%">
							                          <thead>
							                          	<tr class="CartProduct cartTableHeader">
							                              <th data-hide="phone,tablet"> Productos </th>
							                              <th data-class="expand" class="checkoutReviewTdDetails" >Detalles</th>
							                              <th data-hide="phone,tablet" >Valor Unitario</th>
							                              <th data-hide="phone,tablet" >Cantidad</th>
							                              <th data-hide="phone,tablet" >Descuento</th>
							                              <th data-hide="phone">Subtotal<th>
							                              <th data-hide="phone">Impuestos</th>
							                              <th data-hide="phone">Total</th>
							                              <th data-hide="phone" ></th>
							                            </tr>
							                            </thead>
							                            <tbody>
							                          	<?php
										                  	if($this->cart->contents())
															{
																$cantidad=0;
																foreach ($this->cart->contents() as $items) 
																{
																	$impuesto = $this->modelo_compras->ImpuestoMercancia($items['id'], $items['price'])*$items['qty'];	
																	$total=$items['qty']*$items['price']; ?>	
																	
																	<tr>
												                        <td  class="CartProductThumb">
												                        	<div>
												                        		<a href=""><img  src="<?php echo $compras[$cantidad]['imagen']; ?>"></a> 
												                        	</div>
												                        </td>
												                        <td>
												                        	<div class="CartDescription">
												                        		<h4><?php echo $compras[$cantidad]['nombre']; ?></h4>
												                         	</div>
												                         </td>
												                         <td class="price">$ <?echo number_format($items['price'],2)?></td>
												                         <td class="price"><?php echo $items['qty']; ?></td>
												                         <td class="price">$ 0</td>
												                         <td class="price">$ <?echo number_format($total,2)?></td>
												                         <td></td>
												                         <td class="price">$ <?echo number_format($impuesto,2)?></td>
												                         <td class="price">$ <?echo number_format($total+$impuesto,2)?></td>
												                         <td>
												                         	<form id="form-payu" method="post" action="https://stg.gateway.payulatam.com/ppp-web-gateway">
												                         	 <?php 
													                         	 $valortotal= $total+$impuesto;
													                         	 $valortotal = $valortotal + (0.045 * $valortotal);
													                         	 $time = $items['options']['time'].$items['id'];
													                         	 $firma = md5("6u39nqhq8ftd0hlvnjfs66eh8c~500238~".$time."~".$valortotal."~USD");
													                         	 $id_usuario = $id;
													                         	 if(isset($_GET['usr'])){
													                         	 	$id_usuario = $_GET['usr'];
													                         	 }
													                         	 $email=$this->general->get_email($id_usuario);
													                         	 ?>
																				  <input name="merchantId"    type="hidden"  value="500238" >
																				  <input name="accountId"     type="hidden"  value="500538" >
																				  <input name="description"   type="hidden"  value="<?php echo $compras[$cantidad]['nombre']; ?>"  >
																				  <input name="referenceCode" type="hidden"  value="<?php echo $time; ?>" >
																				  <input name="amount"        type="hidden"  value="<?php echo $valortotal; ?>"   >
																				  <input name="tax"           type="hidden"  value="0"  >
																				  <input name="taxReturnBase" type="hidden"  value="0" >
																				  <input name="currency"      type="hidden"  value="USD" >
																				  <input name="signature"     type="hidden"  value="<?php echo $firma; ?>"  >
																				  <input name="test"     type="hidden"  value="1"  >
																				  <input name="extra1"      type="hidden"  value="<?php echo $items['id']."-".$items['qty']; //ponerle id_venta?>" id="extra">
																				  <input name="extra2"      type="hidden"  value="<?php echo $id_usuario; ?>" >
																				  <input name="buyerEmail"    type="hidden"  value="<?php echo $email[0]->email; ?>" >
																				  <input name="responseUrl"    type="hidden"  value="http://www.oficina.pekcellgold.com/ov/compras/carrito_menu" >
																				  <input name="confirmationUrl"    type="hidden"  value="http://www.oficina.pekcellgold.com/ov/compras/registrarVentaWebPersonal" >
																				  <input type="submit"  value="Enviar" id="enviar" class="hide">
																				  <a onclick="enviar_payulatam('<?php echo $_GET['username']; ?>', '<?php echo $items['id']; ?>', '<?php echo $items['qty'] ?>' , <?php echo $dni; ?>)" class="btn btn-block btn-success" >Pago PayuLatam</a>
																				  <br><a class="btn btn-block btn-danger" onclick="consignacion(<?php echo $dni; ?>,<?php echo $id_usuario; ?>,<?php echo $items['id']; ?>,<?php echo $items['qty']; ?>)"> Pago Por Banco</a>
																			</form>	
												                         </td>
												                      </tr>
												                      
																	<?php $cantidad++;
																} 
															}
										                  
										                   ?>
						
							                          </tbody>
							                        </table>
							                      </div>
							                      <!--cartContent-->
							                  
							                      
							
							          
							          <!--/row-->
							  
							          
							        			</div>
							                
							                
							                </div>
							           </div>
									</div>
	
								</div>
					</div>
	
				</div>
				<!-- end widget content -->
	
			</div>
			<!-- end widget div -->
		</article>
	</div>
</div>
<div class="row">         
         <!-- a blank row to get started -->
    	<div class="col-sm-12">
        	<br />
        	<br />
        </div>
    </div>
    <script type="text/javascript" src="/cart/HTML/assets/js/smoothproducts.min.js"></script> 
    <script src="/template/js/plugin/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
    <script src="/template/js/plugin/fuelux/wizard/wizard.min.js"></script>
    
<script src="/template/js/plugin/dropzone/dropzone.min.js"></script>
	<script src="/template/js/plugin/markdown/markdown.min.js"></script>
	<script src="/template/js/plugin/markdown/to-markdown.min.js"></script>
	<script src="/template/js/plugin/markdown/bootstrap-markdown.min.js"></script>
	<script src="/template/js/plugin/datatables/jquery.dataTables.min.js"></script>
	<script src="/template/js/plugin/datatables/dataTables.colVis.min.js"></script>
	<script src="/template/js/plugin/datatables/dataTables.tableTools.min.js"></script>
	<script src="/template/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
	<script src="/template/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
	<script src="/template/js/validacion.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {


		/* BASIC ;*/
			var responsiveHelper_dt_basic = undefined;
			var responsiveHelper_datatable_fixed_column = undefined;
			var responsiveHelper_datatable_col_reorder = undefined;
			var responsiveHelper_datatable_tabletools = undefined;
			
			var breakpointDefinition = {
				tablet : 1024,
				phone : 480
			};

			$('#dt_basic').dataTable({
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
					"t"+
					"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
				"autoWidth" : true,
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_dt_basic) {
						responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_dt_basic.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_dt_basic.respond();
				}
			});

		/* END BASIC */

		/* BASIC ;*/
			var responsiveHelper_dt_basic = undefined;
			var responsiveHelper_datatable_fixed_column = undefined;
			var responsiveHelper_datatable_col_reorder = undefined;
			var responsiveHelper_datatable_tabletools = undefined;
			
			var breakpointDefinition = {
				tablet : 1024,
				phone : 480
			};

			$('#dt_basic_paquete').dataTable({
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
					"t"+
					"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
				"autoWidth" : true,
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_dt_basic) {
						responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_dt_basic.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_dt_basic.respond();
				}
			});

		/* END BASIC */

		pageSetUp();

	})
	

		function enviar_payulatam(id_usuario, id, cantidad, dni){
			//#form-payu
			
			$.ajax({
				data: { usr : id_usuario, id_mercancia : id, cantidad : cantidad, dni : dni },
				type: "post",
				url: "GuardarVentaWebPersonal",
				success: function(msg){
					$("#extra").val(msg);
					$("#enviar").click();
					  
			    }
			});
		}
			function detalles(id,tipo)
			{
				var datos={'id':id,'tipo':tipo};
				$.ajax({
					data: {info:JSON.stringify(datos)},
					type: "get",
					url: "muestra_mercancia",
					success: function(msg){
				             
				             bootbox.dialog({
								message: msg,
								title: "Descripcion",
								className: "div_info_merc",
								buttons: {
									success: {
										label: "Ok",
										className: "btn-success",
										callback: function() {
											}
									}
								}
							})
				    }
				});
			}
			
			function compra_prev(id,tipo,desc)
			{
				var datos={'id':id,'tipo':tipo,'desc':desc};
				$.ajax({
					data: {info:JSON.stringify(datos)},
					type: "get",
					url: "add_carrito",
					success: function(msg){
				            
				             bootbox.dialog({
								message: msg,
								title: "Descripcion",
								className: "div_info_merc",
								buttons: {
									danger: {
										label: "Cancelar",
										className: "btn-danger",
										callback: function() {
											}
									}
								}
							})
				    }
				});
			}
		</script>
		<script type="text/javascript">
			function show_prod()
			{
				$.ajax({
					type: "get",
					url: "show_productos",
					success:function(msg){
						$("#mercancias").html(msg);
					
					}
				});
			}
			function show_serv()
			{
				$.ajax({
					type: "get",
					url: "show_servicios",
					success:function(msg){
						$("#mercancias").html(msg);
						
					}
				});
			}
			function show_prom()
			{
				$.ajax({
					type: "get",
					url: "show_promocion",
					success:function(msg){
						$("#mercancias").html(msg);
						

					}
				});
			}
			function show_comb()
			{
				$.ajax({
					type: "get",
					url: "show_combinados",
					success:function(msg){
						$("#mercancias").html(msg);
						

					}
				});
			}
			function show_todos()
			{
				$.ajax({
					type: "get",
					url: "show_todos",
					success:function(msg){
						$("#mercancias").html(msg);
				
					}
				});
			}
			function busqueda_merc(tipo)
			{
				
				switch(tipo)
				{
					case 1:
						var buscando=$("#busqueda1").val();
						$.ajax({
							data:'buscar='+buscando,
							type:"get",
							url:"buscar_producto",
							success: function(msg){
								$("#mercancias").html(msg);
							}
						});
						break;
					case 2:
						var buscando=$("#busqueda2").val();
						$.ajax({
							data:'buscar='+buscando,
							type:"get",
							url:"buscar_servicio",
							success: function(msg){
								$("#mercancias").html(msg);
							}
						});
						break;
					case 3:
						var buscando=$("#busqueda3").val();
						$.ajax({
							data:'buscar='+buscando,
							type:"get",
							url:"buscar_combinado",
							success: function(msg){
								$("#mercancias").html(msg);
							}
						});
						break;
					case 4:
						var buscando=$("#busqueda4").val();
						$.ajax({
							data:'buscar='+buscando,
							type:"get",
							url:"buscar_todo",
							success: function(msg){
								$("#mercancias").html(msg);
							}
						});
						break;
					default:
						
				}
			}
		</script>
		<script>
			function comprar(id,tipo,desc,min,max)
			{
				
				var qty=$("#cantidad").val();
				if(qty>max||qty<min)
				{
					bootbox.dialog({
						message: 'La cantidad de pedido de esta mercancia debe estar entre '+min+' y '+max,
						title: "Error",
						className: "",
						buttons: {
							danger: {
							label: "Ok!",
							className: "btn-danger",
							callback: function() {
								}
							}
						}
					});
				}
				else
				{
					var datos={'id':id,'tipo':tipo,'qty':qty,'desc':desc};
					$.ajax({
						data:{info:JSON.stringify(datos)},
						type: 'get',
						url: 'add_merc',
						success: function(msg){
							if(msg=="Error")
							{
								bootbox.dialog({
									message: "¡Ooops! El producto se ha agotado, intente mas tarde porfavor.",
									title: "Error",
									className: "",
									buttons: {
										danger: {
										label: "Ok!",
										className: "btn-danger",
										callback: function() {
											}
										}
									}
								});
							}
							else
							{
								bootbox.dialog({
									message: "El producto se ha añadido al carrito",
									title: "Exito",
									className: "",
									buttons: {
										success: {
										label: "Ok!",
										className: "btn-success",
										callback: function() {
												bootbox.hideAll();
											}
										}
									}
								});
								$("#cart_cont").html(msg);
							}			
						}
					});
					
				}
			}
			function ver_cart()
			{
				$.ajax({
					type: 'get',
					url: 'ver_carrito',
					success: function(msg){
			 			bootbox.dialog({
								message: msg,
								title: "Ver carro",
								className: "",
								buttons: {
									success: {
									label: "Aceptar",
									className: "btn-success",
									callback: function() {
										}
									}
								}
							})
					}
				});
			}
			function to_buy()
			{
				<?php 
					if(isset($_GET['tipo']))
					{
						if($_GET['tipo']==3)
						{
							echo 'var tipo=3;';
						}
						else {
							echo 'var tipo=1;';
						}
					}
					else
					{
						echo 'var tipo=1;';
					}
				?>
				$.ajax({
					type: "get",
					data: "tipo="+tipo,
					url: 'por_comprar',
					success: function(msg){
						bootbox.dialog({
							message: msg,
							title: "Metodo de pago",
							className: "",
						
						});
							$('#startdate').datepicker({
								dateFormat : "yy-mm-dd",
								prevText : '<i class="fa fa-chevron-left"></i>',
								nextText : '<i class="fa fa-chevron-right"></i>',
								changeMonth: false,
								numberOfMonths: 1,
								//defaultDate: "1970-01-01",
								changeYear: false,
								
							}); 
							$('#bootstrap-wizard-1').bootstrapWizard({
							    'tabClass': 'form-wizard',
							    'onNext': function (tab, navigation, index) {
							      var $valid = $("#wizard-1").valid();
							      if (!$valid) {
							        $validator.focusInvalid();
							        return false;
							      } else {
							        $('#bootstrap-wizard-1').find('.form-wizard').children('li').eq(index - 1).addClass(
							          'complete');
							        $('#bootstrap-wizard-1').find('.form-wizard').children('li').eq(index - 1).find('.step')
							        .html('<i class="fa fa-check"></i>');
							      }
							    }
							  });
					}
				
				});
			}
			
			function completar_compra(id)
			{
				switch(id)
				{
					case 1:
						var banco=$("#banco_taj").val();
						var tipo=$("#tipo_taj").val();
						var numero=$("#numero_taj").val();
						var titular=$("#titular_taj").val();
						var mes=$("#mes_taj").val();
						var ano=$("#ano_taj").val();
						var codigo=$("#code_taj").val();
							var fecha=0;
						<?php 
							if(isset($_GET['usr']))
							{
								echo 'var comprador='.$_GET['usr'].';';
							}
							else {
								echo 'var comprador=0;';
							}
						?>
						if($('#saveInfoid').prop('checked'))
						{
							var salvar=1
						}
						else
						{
							var salvar=0
						}
						if(!banco)
						{
							alert('Seleccione una empresa bancaria');
						}
						else
						{
							if(!tipo)
							{
								alert('Seleccione una tipo de tarjeta');
							}
							else
							{
								if(!numero)
								{
									alert('El campo numero es obligatorio');
								}
								else
								{
									if(!titular)
									{
										alert('El nombre del titular es obligatorio');
									}
									else
									{
										if(!mes)
										{
											alert('Seleccione un mes');
										}
										else
										{
											if(!ano)
											{
												alert('Seleccione un año');
											}
											else
											{
												if(!codigo)
												{
													alert('El codigo de seguridad es obligatorio');
												}
												else
												{
													var datos={'id':id,'fecha':fecha,'banco':banco,'tipo':tipo,'numero':numero,'titular':titular,'mes':mes,'ano':ano,'codigo':codigo,'salvar':salvar,'comprador':comprador};
													$.ajax({
														data:{info:JSON.stringify(datos)},
														type: 'get',
														url: 'completar_compra',
														success: function(){
															alert("La compra fue un exito!");
															window.location.href='/ov/compras/carrito_menu'
														}
													});
												}
											}
										}
									}
								}
							}
						}
						break;
					case 5:
						var banco=$("#banco_taj").val();
						var tipo=$("#tipo_taj").val();
						var numero=$("#numero_taj").val();
						var titular=$("#titular_taj").val();
						var mes=$("#mes_taj").val();
						var ano=$("#ano_taj").val();
						var codigo=$("#code_taj").val();
						
							var fecha=$("#startdate").val();
						<?php 
							if(isset($_GET['usr']))
							{
								echo 'var comprador='.$_GET['usr'].';';
							}
							else {
								echo 'var comprador=0;';
							}
						?>
						if($('#saveInfoid').prop('checked'))
						{
							var salvar=1
						}
						else
						{
							var salvar=0
						}
						if(!banco)
						{
							alert('Seleccione una empresa bancaria');
						}
						else
						{
							if(!tipo)
							{
								alert('Seleccione una tipo de tarjeta');
							}
							else
							{
								if(!numero)
								{
									alert('El campo numero es obligatorio');
								}
								else
								{
									if(!titular)
									{
										alert('El nombre del titular es obligatorio');
									}
									else
									{
										if(!mes)
										{
											alert('Seleccione un mes');
										}
										else
										{
											if(!ano)
											{
												alert('Seleccione un año');
											}
											else
											{
												if(!codigo)
												{
													alert('El codigo de seguridad es obligatorio');
												}
												else
												{
													var datos={'id':id,'fecha':fecha,'banco':banco,'tipo':tipo,'numero':numero,'titular':titular,'mes':mes,'ano':ano,'codigo':codigo,'salvar':salvar,'comprador':comprador};
													$.ajax({
														data:{info:JSON.stringify(datos)},
														type: 'get',
														url: 'completar_compra',
														success: function(){
															alert("La compra fue un exito!");
															window.location.href='/ov/compras/carrito_menu'
														}
													});
												}
											}
										}
									}
								}
							}
						}
						break;
					default:
						break;
				}
			}
			function quitar_producto(id)
			{
				$.ajax({
					data:'id='+id,
					type:"get",
					url:"quitar_producto",
					success: function(msg){
						$("#contenido_carro").html(msg);
						$.ajax({
					
							type:"get",
							url:"actualizar_nav",
							success: function(msg){
								
								$("#cart_cont").html(msg);
							}
						});
						
						
						alert('La mercancia se ha borrado del carrito');
					}
				});
				
			}
			
			function show_grupo_prod()
			{
				var grupo=$("#grupo_prod").val();
				$.ajax({
					data:'grupo='+grupo,
					type:"get",
					url:"show_prod_grup",
					success: function(msg){
						$("#mercancias").html(msg);
					}
				});
			}
			$("#pago_1").click(function(){
				$("#pago").val("5");
			});
			$("#pago_2").click(function(){
				$("#pago").val("1");
			});
			$("#pago_3").click(function(){
				$("#pago").val("2");
			});
			$("#pago_4").click(function(){
				$("#pago").val("3");
			});
		</script>
		<script>
			$(document).ready(function(){
			     var $validator = $("#wizard-1").validate({
			    
			    rules: {
			      email: {
			        required: true,
			        email: "Your email address must be in the format of name@domain.com"
			      },
			      fname: {
			        required: true
			      },
			      lname: {
			        required: true
			      },
			      country: {
			        required: true
			      },
			      city: {
			        required: true
			      },
			      postal: {
			        required: true,
			        minlength: 4
			      },
			      wphone: {
			        required: true,
			        minlength: 10
			      },
			      hphone: {
			        required: true,
			        minlength: 10
			      }
			    },
			    
			    messages: {
			      fname: "Please specify your First name",
			      lname: "Please specify your Last name",
			      email: {
			        required: "We need your email address to contact you",
			        email: "Your email address must be in the format of name@domain.com"
			      }
			    },
			    
			    highlight: function (element) {
			      $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
			    },
			    unhighlight: function (element) {
			      $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
			    },
			    errorElement: 'span',
			    errorClass: 'help-block',
			    errorPlacement: function (error, element) {
			      if (element.parent('.input-group').length) {
			        error.insertAfter(element.parent());
			      } else {
			        error.insertAfter(element);
			      }
			    }
			  });
			  
			  $('#bootstrap-wizard-1').bootstrapWizard({
			    'tabClass': 'form-wizard',
			    'onNext': function (tab, navigation, index) {
			      var $valid = $("#wizard-1").valid();
			      if (!$valid) {
			        $validator.focusInvalid();
			        return false;
			      } else {
			        $('#bootstrap-wizard-1').find('.form-wizard').children('li').eq(index - 1).addClass(
			          'complete');
			        $('#bootstrap-wizard-1').find('.form-wizard').children('li').eq(index - 1).find('.step')
			        .html('<i class="fa fa-check"></i>');
			        
			      }
			    }
			  });
			  
		
			// fuelux wizard
			  var wizard = $('.wizard').wizard();
			  
			  wizard.on('finished', function (e, data) {
			    //$("#fuelux-wizard").submit();
			    //console.log("submitted!");
			    $.smallBox({
			      title: "Congratulations! Your form was submitted",
			      content: "<i class='fa fa-clock-o'></i> <i>1 seconds ago...</i>",
			      color: "#5F895F",
			      iconSmall: "fa fa-check bounce animated",
			      timeout: 4000
			    });
			    
			  });
			  $('#startdate').datepicker({
					dateFormat : "yy-mm-dd",
					prevText : '<i class="fa fa-chevron-left"></i>',
					nextText : '<i class="fa fa-chevron-right"></i>',
					changeMonth: false,
					numberOfMonths: 1,
					//defaultDate: "1970-01-01",
					changeYear: false,
					
				}); 
});


	function consignacion(dni, id_afiliado, id, cant){
		
		$.ajax({
						data:{
							dni: dni,
							id_afiliado: id_afiliado,
							id_mercancia : id,
							cantidad : cant
							},
						type:"post",
						url:"/ov/compras/SelecioneBancoWebPersonal?usr=<?php if(isset($_GET['usr'])){ echo $_GET['usr']; } else { echo '0'; } ?>",
						success: function(msg){
							bootbox.dialog({
								message: msg,
								title: "Selecione Banco",
								className: "",
								buttons: {
									success: {
									label: "Aceptar",
									className: "hide",
									callback: function() {
										 window.location="/bo/administracion/login_web_personal";
										}
									}
								}
							})
						}
					});
					
	}
		
		</script>