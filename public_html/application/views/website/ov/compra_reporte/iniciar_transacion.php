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
      <a class="navbar-brand titulo_carrito" href="/ov/dashboard" > Dashboard &nbsp;</a> 
      
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
					<div class="col-lg-3 col-md-3 col-sm-5 rightSidebar">
					  <h4 class="caps"><a href="carrito?tipo=<?=$_GET["tipo"]?>"><i class="fa fa-chevron-left"></i> Volver al carrito </a></h4>
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
								<div class="form-bootstrapWizard">
									<ul class="bootstrapWizard form-wizard">
										<li class="active" data-target="#step1">
											<a href="#tab1" data-toggle="tab"> <span class="step">1</span> <span class="title">Datos para Envio</span> </a>
										</li>
										<li data-target="#step2">
											<a href="#tab2" data-toggle="tab"> <span class="step">2</span> <span class="title">Facturaci&oacute;n</span> </a>
										</li>
										<li data-target="#step3">
											<a href="#tab3" data-toggle="tab"> <span class="step">3</span> <span class="title">Forma de Pago</span> </a>
										</li>
										<li data-target="#step4">
											<a href="#tab4" data-toggle="tab"> <span class="step">4</span> <span class="title">Confirmar</span> </a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="tab-content">
									<div class="tab-pane active" id="tab1">
										<br>
										<h3><strong>1 </strong> - Datos para envio</h3>
	
										<div class="row">
	
							                <div class="col-xs-12 col-sm-6">
							                  <div class="form-group required">
							                    <label for="InputName">Nombre <sup>*</sup> </label>
							                    <input required type="text" class="form-control" name="nombre_envio" id="nombre_envio" placeholder="Nombre" value="<?=$direccion[0]->nombre?>">
							                  </div>
							                  <div class="form-group required">
							                    <label for="InputLastName">Apellidos <sup>*</sup> </label>
							                    <input required type="text" class="form-control" name="apellido_envio" id="apellido_envio" placeholder="Apellidos" value="<?=$direccion[0]->apellido?>">
							                  </div>
							                  <div class="form-group required">
							                    <label for="InputEmail">Correo<sup>*</sup>  </label>
							                    <input required type="text" class="form-control" name="correo_envio" id="correo_envio" placeholder="correo@dominio.com" value="<?=$direccion[0]->email?>">
							                  </div>
							                  <div class="form-group">
							                    <label for="InputCompany">Compa&ntilde;ia </label>
							                    <input type="text" class="form-control" name="compania_envio" id="compania_envio" placeholder="Compañia">
							                  </div>
							                  <div class="form-group required">
							                    <label for="InputMobile">Telefono Celular</label>
							                    <input type="tel"  name="celular_envio" class="form-control" id="celular_envio">
							                  </div>
							                  <div class="form-group">
							                    <label for="InputAdditionalInformation">Informacion Adicional</label>
							                    <textarea rows="3" cols="26" name="info_envio" id="info_envio" class="form-control" id="InputAdditionalInformation"></textarea>
							                  </div>
							                </div>
							                <div class="col-xs-12 col-sm-6">
							                  
							                  <div class="form-group required">
							                    <label for="InputCountry">País<sup>*</sup> </label>
							                      <select required class="form-control" required aria-required="true" id="pais_envio" name="pais_envio">
							                      	<option value="">Selecciona un Pais</option>
							                      	<?foreach ($pais as $key)
													  {
														  if($key->Code==$direccion[0]->pais)
														  {?>
															<option value="<?=$key->Code?>" selected>
																<?=$key->Name?>
															</option>
														   <?}else{?>
														   	<option value="<?=$key->Code?>">
																<?=$key->Name?>
															</option>
														  <?}
													  }?>
							                      </select>
							                  </div>
							                  <div class="form-group required">
							                    <label for="InputZip">Codigo Postal <sup>*</sup> </label>
							                    <input required type="text" class="form-control" name="cp_envio" id="cp_envio" placeholder="" value="<?=$direccion[0]->cp?>">
							                  </div>
							                  <div class="form-group required">
							                    <label for="InputAddress">Calle<sup>*</sup> </label>
							                    <input required type="text" class="form-control" name="calle_envio" id="calle_envio" placeholder="Calle" value="<?=$direccion[0]->calle?>">
							                  </div>
							                  <div class="form-group required">
							                    <label for="InputAddress2">Colonia<sup>*</sup> </label>
							                    <input required type="text" class="form-control" name="colonia_envio" id="colonia_envio" placeholder="Colonia" value="<?=$direccion[0]->colonia?>">
							                  </div>
							                  <div class="form-group required">
							                    <label for="InputCity">Municipio <sup>*</sup> </label>
							                    <input required type="text" class="form-control" name="municipio_envio" id="municipio_envio" placeholder="Municipio" value="<?=$direccion[0]->municipio?>">
							                  </div>
							                  <div class="form-group required">
							                    <label for="InputCity">Estado <sup>*</sup> </label>
							                    <input required type="text" class="form-control" name="estado_envio" id="estado_envio" placeholder="Estado" value="<?=$direccion[0]->estado?>">
							                  </div>
							                  
							                  
							                </div>
							                  
							               
										</div>
	
									</div>
									<div class="tab-pane" id="tab2">
										<br>
										<h3><strong>2</strong> - Facturaci&oacute;n</h3>
	
										<div class="row">
	
											<div class="col-xs-12 col-sm-12">
								                <label class="checkbox-inline" for="checkboxes-0">
								                  <input name="envio_dir" id="envio_dir" value="1" type="checkbox">
								                  Facturar a la direccion de envio </label>
								                <hr>
								            </div>
							                <div class="col-xs-12 col-sm-6">
							                  <div class="form-group required">
							                    <label for="InputName">Nombre <sup>*</sup> </label>
							                    <input required type="text" class="form-control" name="nombre_fac" id="nombre_fac" placeholder="Nombre" value="<?=$direccion[0]->nombre?>">
							                  </div>
							                  <div class="form-group required">
							                    <label for="InputLastName">Apellidos <sup>*</sup> </label>
							                    <input required type="text" class="form-control" name="apellido_fac" id="apellido_fac" placeholder="Apellidos" value="<?=$direccion[0]->apellido?>">
							                  </div>
							                  <div class="form-group required">
							                    <label for="InputMobile">RFC<sup>*</sup></label>
							                    <input  required type="tel"  class="form-control" name="rfc_fac" id="rfc_fac" value="<?=$direccion[0]->keyword?>">
							                  </div>
							                  <div class="form-group required">
							                    <label for="InputEmail">Correo<sup>*</sup>  </label>
							                    <input required type="text" class="form-control" name="correo_fac" id="correo_fac" placeholder="correo@dominio.com" value="<?=$direccion[0]->email?>">
							                  </div>
							                  <div class="form-group">
							                    <label for="InputCompany">Compa&ntilde;ia </label>
							                    <input type="text" class="form-control" name="compania_fac" id="compania_fac" placeholder="Compañia">
							                  </div>
							                  <div class="form-group required">
							                    <label for="InputMobile">Telefono Celular</label>
							                    <input type="tel"  name="celular_fac" class="form-control" id="celular_fac">
							                  </div>
							                  
							                </div>
							                <div class="col-xs-12 col-sm-6">
							                  
							                  <div class="form-group required">
							                    <label for="InputCountry">País<sup>*</sup> </label>
							                      <select required class="form-control" required aria-required="true" id="pais_fac" name="pais_fac">
							                      <option value="">Selecciona un Pais</option>
							                      <?foreach ($pais as $key)
												  {
													  if($key->Code==$direccion[0]->pais)
													  {?>
														<option value="<?=$key->Code?>" selected>
															<?=$key->Name?>
														</option>
													   <?}else{?>
													   	<option value="<?=$key->Code?>">
															<?=$key->Name?>
														</option>
													  <?}
												  }?>
	                     						 </select>
							                  </div>
							                  <div class="form-group required">
							                    <label for="InputZip">Codigo Postal <sup>*</sup> </label>
							                    <input required type="text" class="form-control" name="cp_fac" id="cp_fac" placeholder="" value="<?=$direccion[0]->cp?>">
							                  </div>
							                  <div class="form-group required">
							                    <label for="InputAddress">Calle<sup>*</sup> </label>
							                    <input required type="text" class="form-control" name="calle_fac" id="calle_fac" placeholder="Calle" value="<?=$direccion[0]->calle?>">
							                  </div>
							                  <div class="form-group required">
							                    <label for="InputAddress2">Colonia<sup>*</sup> </label>
							                    <input required type="text" class="form-control" name="colonia_fac" id="colonia_fac" placeholder="Colonia" value="<?=$direccion[0]->colonia?>">
							                  </div>
							                  <div class="form-group required">
							                    <label for="InputCity">Municipio <sup>*</sup> </label>
							                    <input required type="text" class="form-control" name="municipio_fac" id="municipio_fac" placeholder="Municipio" value="<?=$direccion[0]->municipio?>">
							                  </div>
							                  <div class="form-group required">
							                    <label for="InputCity">Estado <sup>*</sup> </label>
							                    <input required type="text" class="form-control" name="estado_fac" id="estado_fac" placeholder="Estado" value="<?=$direccion[0]->estado?>">
							                  </div>
							                  
							                  
							                </div>
										</div>
									</div>
									<div class="tab-pane" id="tab3">
										<br>
										<h3><strong>3</strong> - Forma de Pago</h3>
										<div class="row userInfo">
										<? if($_GET['tipo']==3)
									  	{?>
								  			
											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group required" style="text-align:center;">
								  				<section class="col col-lg-12 col-sm-12 col-xs-12 col-md-12">
								  				<p><strong>Selecciona la fecha de la siguente compra</strong></p>
													<label class="input"> <i class="icon-append fa fa-calendar"></i>
														<input class="form-control" type="text" name="startdate" id="startdate" required="" placeholder="Fecha de compra">
													</label>
												</section>
								  			</div>
								  			<select class="form-control" required aria-required="true" id="pago" name="pago" style="display:none;">
				                                  <option value="5">Deposito en Efectivo</option>
				                                  <option value="1" selected="">Tarjeta de Credito</option>
				                                  <option value="2">Tarjeta de Debito</option>
				                                  <option value="3">Paypal</option>
			                                </select>
											<div class="panel-body">
					                        	<p>Todas las transacciones son seguras y encriptadas. Para saber mas, por favor ve nuestra politica de privacidad.</p>
					                          	<br>
					                          	<div class="panel open">
					                            	<div class="creditCard">
					                              		<div class="cartBottomInnerRight paymentCard"> 
					                              		</div>
					                              		<div class="col-xs-12 col-sm-6">
										                  <div class="form-group required">
											                  <label for="InputCountry">Banco<sup>*</sup> </label>
										                      <select class="form-control" required aria-required="true" id="banco_taj" name="banco_taj_c">
								                                  <option value="">Banco</option>
								                                  <option value="1">01 - VISA</option>
								                                  <option value="2">02 - Master Card</option>
								                                  <option value="3">03 - American Express</option>
							                                  </select>
				                  						  </div>
										                  <div class="form-group required">
										                    <label for="InputLastName">Numero de la Tarjeta<sup>*</sup> </label>
										                    <input required id="numero_taj_c" class="form-control" type="text" name="numero_taj_c">
										                  </div>
				                  							
										                  <div class="form-group required">
										                    <label for="InputZip">Titular de la Tarjeta <sup>*</sup> </label>
										                    <input required type="text" class="form-control" name="titular_taj_c" id="titular_taj_c">
										                  </div>
				                  
										                </div>
										                <div class="col-xs-12 col-sm-6">
				                  
				                  
										                  <div class="form-group required">
										                  	<div class="col-xs-12 col-sm-6">
											                    <label for="InputAddress">Mes de Vencimineto<sup>*</sup> </label>
											                    <select class="form-control" required aria-required="true" name="mes_taj_c" id="mes_taj_c">
							                                      <option value="">Month</option>
							                                      <option value="1">01 - Enero</option>
							                                      <option value="2">02 - Febrero</option>
							                                      <option value="3">03 - Marzo</option>
							                                      <option value="4">04 - Abril</option>
							                                      <option value="5">05 - Mayo</option>
							                                      <option value="6">06 - Junio</option>
							                                      <option value="7">07 - Julio</option>
							                                      <option value="8">08 - Agosto</option>
							                                      <option value="9">09 - Septiembre</option>
							                                      <option value="10">10 - Octubre</option>
							                                      <option value="11">11 - Noviembre</option>
							                                      <option value="12">12 - Diciembre</option>
							                                    </select>
											                </div>
											                <div class="col-xs-12 col-sm-6">
											                    <label for="InputAddress">A&ntilde;o de vencimiento<sup>*</sup> </label>
											                    <select class="form-control" required aria-required="true" name="ano_taj_c" id="ano_taj_c">
							                                      <option value="">Año</option>
							                                      <option value="2013">2013</option>
							                                      <option value="2014">2014</option>
							                                      <option value="2015">2015</option>
							                                      <option value="2016">2016</option>
							                                      <option value="2017">2017</option>
							                                      <option value="2018">2018</option>
							                                      <option value="2019">2019</option>
							                                      <option value="2020">2020</option>
							                                      <option value="2021">2021</option>
							                                      <option value="2022">2022</option>
							                                      <option value="2023">2023</option>
							                                    </select>
											                </div>
										                  </div>
										                  <div class="form-group required">
										                    <label for="InputAddress2">Codigo de Verificacion<sup>*</sup> </label>
										                    <input required type="text" class="form-control" name="code_taj_c" id="code_taj_c">
										                  </div>
						                  				 </div>
						                  				 <div class="form-group">
										                    <input type="checkbox" name="salvar_taj_c" id="salvar_taj_c">
												            <label for="saveInfoid">&nbsp;Guardar la información de mi tarjeta de Crédito</label>
										                  </div>
										               </div>
		                              		
						                              	
						                             
						                            <!--creditCard-->
						                            
						                          	</div>
												</div>
											<? } 
											else
											{?>
									            <div class="col-lg-12">
												  	
									               <p>Seleccione el metodo para pagar su orden.</p>
									                <hr>
									            </div>
									            <select class="form-control" required aria-required="true" id="pago" name="pago" style="display:none;">
					                                  <option value="5" selected="">Deposito en Efectivo</option>
					                                  <option value="1">Tarjeta de Credito</option>
					                                  <option value="2">Tarjeta de Debito</option>
					                                  <option value="3">Paypal</option>
				                                </select>
									            <div class="col-xs-12 col-sm-12">
									                <div class="paymentBox">
									                  <div class="panel-group paymentMethod" id="accordion">
									                  	<div class="panel panel-default">
									                      <div class="panel-heading panel-heading-custom">
									                        <h4 class="panel-title"> <a class="masterCard" data-toggle="collapse" id="pago_1" data-parent="#accordion" href="#collapseOne"> <span class="numberCircuil">Opcion 1</span> <strong>Deposito en Efectivo</strong> </a> </h4>
									                      </div>
									                      <div id="collapseOne" class="panel-collapse collapse in">
									                        <div class="panel-body">
									                          <p>Todas las transacciones son seguras y encriptadas. Para saber mas, por favor ve nuestra politica de privacidad.</p>
									                          <br>
									                          <div class="panel open">
									                          	
									                              
									                           </div>
									                         </div>
									                      </div>
									                    </div>
									                    <div class="panel panel-default">
									                      <div class="panel-heading panel-heading-custom">
									                        <h4 class="panel-title"> <a class="masterCard" data-toggle="collapse" id="pago_2" data-parent="#accordion" href="#collapseTwo"> <span class="numberCircuil">Opcion 2</span> <strong>Tarjeta de Credito</strong> </a> </h4>
									                      </div>
									                      <div id="collapseTwo" class="panel-collapse collapse">
									                         <div class="panel-body">
									                          <p>Todas las transacciones son seguras y encriptadas. Para saber mas, por favor ve nuestra politica de privacidad.</p>
									                          <br>
									                          <div class="panel open">
									                          	
									                            <div class="creditCard">
									                              <div class="cartBottomInnerRight paymentCard"> 
									                              </div>
									                              <div class="col-xs-12 col-sm-6">
													                  <div class="form-group required">
														                  <label for="InputCountry">Banco<sup>*</sup> </label>
													                      <select class="form-control" required aria-required="true" id="banco_taj_c" name="banco_taj_c">
											                                  <option value="">Banco</option>
											                                  <option value="1">01 - VISA</option>
											                                  <option value="2">02 - Master Card</option>
											                                  <option value="3">03 - American Express</option>
										                                  </select>
							                  						  </div>
							                  						  
													                  <div class="form-group required">
													                    <label for="InputLastName">Numero de la Tarjeta<sup>*</sup> </label>
													                    <input required id="numero_taj_c" class="form-control" type="text" name="numero_taj_c">
													                  </div>
							                  						  <div class="form-group required">
													                    <label for="InputZip">Titular de la Tarjeta <sup>*</sup> </label>
													                    <input required type="text" class="form-control" name="titular_taj_c" id="titular_taj_c">
													                  </div>
							                  
													                </div>
													                <div class="col-xs-12 col-sm-6">
							                  
							                  
													                  <div class="form-group required">
													                  	<div class="col-xs-12 col-sm-6">
														                    <label for="InputAddress">Mes de Vencimineto<sup>*</sup> </label>
														                    <select class="form-control" required aria-required="true" name="mes_taj_c" id="mes_taj_c">
										                                      <option value="">Month</option>
										                                      <option value="1">01 - Enero</option>
										                                      <option value="2">02 - Febrero</option>
										                                      <option value="3">03 - Marzo</option>
										                                      <option value="4">04 - Abril</option>
										                                      <option value="5">05 - Mayo</option>
										                                      <option value="6">06 - Junio</option>
										                                      <option value="7">07 - Julio</option>
										                                      <option value="8">08 - Agosto</option>
										                                      <option value="9">09 - Septiembre</option>
										                                      <option value="10">10 - Octubre</option>
										                                      <option value="11">11 - Noviembre</option>
										                                      <option value="12">12 - Diciembre</option>
										                                    </select>
														                </div>
														                <div class="col-xs-12 col-sm-6">
														                    <label for="InputAddress">A&ntilde;o de vencimiento<sup>*</sup> </label>
														                    <select class="form-control" required aria-required="true" name="ano_taj_c" id="ano_taj_c">
										                                      <option value="">Año</option>
										                                      <option value="2013">2013</option>
										                                      <option value="2014">2014</option>
										                                      <option value="2015">2015</option>
										                                      <option value="2016">2016</option>
										                                      <option value="2017">2017</option>
										                                      <option value="2018">2018</option>
										                                      <option value="2019">2019</option>
										                                      <option value="2020">2020</option>
										                                      <option value="2021">2021</option>
										                                      <option value="2022">2022</option>
										                                      <option value="2023">2023</option>
										                                    </select>
														                </div>
													                  </div>
													                  <div class="form-group required">
													                    <label for="InputAddress2">Codigo de Verificacion<sup>*</sup> </label>
													                    <input required type="text" class="form-control" name="code_taj_c" id="code_taj_c">
													                  </div>
									                  				 </div>
									                  				 <div class="form-group">
													                    <input type="checkbox" name="salvar_taj_c" id="salvar_taj_c">
															            <label for="saveInfoid">&nbsp;Guardar la información de mi tarjeta de Crédito</label>
													                  </div>
													            	</div>
									                         	</div> 
									                         </div>
									                      </div>
									                    </div>
									                    <div class="panel panel-default">
									                      <div class="panel-heading panel-heading-custom">
									                        <h4 class="panel-title"> <a class="masterCard" data-toggle="collapse" id="pago_3" data-parent="#accordion" href="#collapseThree"> <span class="numberCircuil">Opcion 3</span> <strong>Tarjeta de Debito</strong> </a> </h4>
									                      </div>
									                      <div id="collapseThree" class="panel-collapse collapse">
									                        <div class="panel-body">
									                          <p>Todas las transacciones son seguras y encriptadas. Para saber mas, por favor ve nuestra politica de privacidad.</p>
									                          <br>
									                          <div class="panel open">
									                          	
									                            <div class="creditCard">
									                              <div class="cartBottomInnerRight paymentCard"> 
									                              </div>
									                              <div class="col-xs-12 col-sm-6">
													                  <div class="form-group required">
														                  <label for="InputCountry">Banco<sup>*</sup> </label>
													                      <select class="form-control" required aria-required="true" id="banco_taj" name="banco_taj">
											                                  <option value="">Banco</option>
											                                  <option value="1">01 - VISA</option>
											                                  <option value="2">02 - Master Card</option>
											                                  <option value="3">03 - American Express</option>
										                                  </select>
							                  						  </div>
							                  						  
													                  <div class="form-group required">
													                    <label for="InputLastName">Numero de la Tarjeta<sup>*</sup> </label>
													                    <input required id="numero_taj" class="form-control" type="text" name="numero_taj">
													                  </div>
							                  
							                  						  <div class="form-group required">
													                    <label for="InputZip">Titular de la Tarjeta <sup>*</sup> </label>
													                    <input required type="text" class="form-control" name="titular_taj" id="titular_taj">
													                  </div>
													                </div>
													                <div class="col-xs-12 col-sm-6">
							                  
													                  <div class="form-group required">
													                  	<div class="col-xs-12 col-sm-6">
														                    <label for="InputAddress">Mes de Vencimineto<sup>*</sup> </label>
														                    <select class="form-control" required aria-required="true" name="mes_taj" id="mes_taj">
										                                      <option value="">Month</option>
										                                      <option value="1">01 - Enero</option>
										                                      <option value="2">02 - Febrero</option>
										                                      <option value="3">03 - Marzo</option>
										                                      <option value="4">04 - Abril</option>
										                                      <option value="5">05 - Mayo</option>
										                                      <option value="6">06 - Junio</option>
										                                      <option value="7">07 - Julio</option>
										                                      <option value="8">08 - Agosto</option>
										                                      <option value="9">09 - Septiembre</option>
										                                      <option value="10">10 - Octubre</option>
										                                      <option value="11">11 - Noviembre</option>
										                                      <option value="12">12 - Diciembre</option>
										                                    </select>
														                </div>
														                <div class="col-xs-12 col-sm-6">
														                    <label for="InputAddress">A&ntilde;o de vencimiento<sup>*</sup> </label>
														                    <select class="form-control" required aria-required="true" name="ano_taj" id="ano_taj">
										                                      <option value="">Año</option>
										                                      <option value="2013">2013</option>
										                                      <option value="2014">2014</option>
										                                      <option value="2015">2015</option>
										                                      <option value="2016">2016</option>
										                                      <option value="2017">2017</option>
										                                      <option value="2018">2018</option>
										                                      <option value="2019">2019</option>
										                                      <option value="2020">2020</option>
										                                      <option value="2021">2021</option>
										                                      <option value="2022">2022</option>
										                                      <option value="2023">2023</option>
										                                    </select>
														                </div>
													                  </div>
													                  <div class="form-group required">
													                    <label for="InputAddress2">Codigo de Verificacion<sup>*</sup> </label>
													                    <input required type="text" class="form-control" name="code_taj" id="code_taj">
													                  </div>
									                  				 </div>
									                  				 <div class="form-group">
													                    <input type="checkbox" name="salvar_taj" id="salvar_taj">
															            <label for="saveInfoid">&nbsp;Guardar la información de mi tarjeta de Crédito</label>
													                  </div>
													            	</div>
									                         	</div> 
									                         </div>
									                      </div>
									                    </div>
														
									                    <div class="panel panel-default">
									                      <div class="panel-heading panel-heading-custom">
									                        <h4 class="panel-title"> <a data-toggle="collapse" id="pago_4" data-parent="#accordion" href="#collapseFour"> <span class="numberCircuil">Opcion 4</span><strong> PayPal</strong> </a> </h4>
									                      </div>
									                      <div id="collapseFour" class="panel-collapse collapse">
									                        <div class="panel-body">
									                          <p> Todas las transacciones son seguras y encriptadas. Para saber mas, por favor ve nuestra politica de privacidad.</p>
									                          <br>
									                          
									                          <label class="radio-inline" for="radios-3">
									                            <input name="radios" id="radios-3" value="4" type="radio">
									                            <img src="images/site/payment/paypal-small.png" height="18" alt="paypal"> Comprar con Paypal </label>
									                          <div class="form-group">
									                            <label for="CommentsOrder2">Agrega comentarios acerca de tu orden</label>
									                            <textarea id="CommentsOrder2" class="form-control" name="CommentsOrder2" cols="26" rows="3"></textarea>
									                          </div>
									                          <div class="form-group clearfix">
									                            <label class="checkbox-inline" for="checkboxes-0">
									                              <input name="checkboxes" id="checkboxes-0" value="1" type="checkbox">
									                              He leído y acepto los <a href="terms-conditions.html">Terminos y Condiciones</a> </label>
									                          </div>
									                          <div class="pull-right"> <a href="" class="btn btn-primary btn-small " > Procesar pago &nbsp; <i class="fa fa-arrow-circle-right"></i> </a> </div>
									                        </div>
									                       </div>
									                    </div>
									                    
									                    
									                    
									                  </div>
									                </div>
									                
									                <!--/row--> 
									                
									            </div>
											<?}?>
            							</div>
									</div>
									<div class="tab-pane" id="tab4">
										<br>
										<h3><strong>4</strong> - Confirmar</h3>
										<div class="row userInfo">
                
							                <div class="col-lg-12">
							                    <h2 class="block-title-2"> Review Order </h2>
							                </div>
							                
							            
							            
							            	<div class="col-xs-12 col-sm-12">
							                      <div class="cartContent w100 checkoutReview ">
							                        <table class="cartTable table-responsive"   style="width:100%">
							                          <tbody>
							                          	<tr class="CartProduct cartTableHeader">
							                              <th style="width:15%"> Product </th>
							                              <th class="checkoutReviewTdDetails"  >Details</th>
							                              <th style="width:10%" >Unit Price</th>
							                              <th class="hidden-xs" style="width:5%">QNT</th>
							                              <th class="hidden-xs" style="width:10%" >Discount</th>
							                              <th style="width:15%">Total</th>
							                              <th></th>
							                            </tr>
							                          	<?php
										                  	if($this->cart->contents())
															{
																$cantidad=0;
																foreach ($this->cart->contents() as $items) 
																{
																	$total=$items['qty']*$items['price']; ?>	
																	
																	<tr class="CartProduct">
												                        <td  class="CartProductThumb"><div> <a href=""><img src="<?php echo $compras[$cantidad]['imagen']; ?>"></a> </div></td>
												                        <td ><div class="CartDescription">
												                        	<h4> <a href=""><?php echo $compras[$cantidad]['nombre']; ?> </a> </h4>
												                         	</div>
												                         </td>
												                         <td class="delete"><div class="price "><?php echo $items['price']; ?></div></td>
												                         <td class="hidden-xs"><?php echo $items['qty']; ?></td>
												                         <td class="hidden-xs">0</td>
												                         <td class="price"><?php echo $total; ?></td>
												                         <td>
												                         	<form method="post" action="https://stg.gateway.payulatam.com/ppp-web-gateway/">
												                         	 <?php 
													                         	 $valortotal= $items['price']*$items['qty'];
													                         	 $time = $items['options']['time'];
													                         	 $firma = md5("6u39nqhq8ftd0hlvnjfs66eh8c~500238~".$time."~".$valortotal."~USD");?>
																				  <input name="merchantId"    type="hidden"  value="500238"   >
																				  <input name="accountId"     type="hidden"  value="500538" >
																				  <input name="description"   type="hidden"  value="<?php echo $compras[$cantidad]['nombre']; ?>"  >
																				  <input name="referenceCode" type="hidden"  value="<?php echo $time; ?>" >
																				  <input name="amount"        type="hidden"  value="<?php echo $valortotal;	?>"   >
																				  <input name="tax"           type="hidden"  value="0"  >
																				  <input name="taxReturnBase" type="hidden"  value="0" >
																				  <input name="currency"      type="hidden"  value="USD" >
																				  <input name="signature"     type="hidden"  value="<?php echo $firma; ?>"  >
																				  <input name="test"          type="hidden"  value="1" >
																				  <input name="buyerEmail"    type="hidden"  value="edixon.hernandez.c@gmail.com" >
																				  <input name="responseUrl"    type="hidden"  value="http://oficina.pekcellgold.com/ov/compras/carrito_menu" >
																				  <input name="confirmationUrl"    type="hidden"  value="http://oficina.pekcellgold.com/ov/compras/completar_compra" >
																				  <input name="Submit"        type="submit"  value="Enviar" id="enviar">
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
							                      
							                      <div class="w100 costDetails">
							                        <div class="table-block" id="order-detail-content">
							                          <table class="std table" id="cart-summary">
							                            <tr >
							                              <td>Costo de productos</td>
							                              <td  class="price">$<?=$this->cart->total() ?></td>
							                            </tr>
							                            <tr style="" >
							                              <td>Costo de Envio</td>
							                              <td  class="price"><span class="success">Envio Gratis!</span></td>
							                            </tr>
							                            
							                            <tr >
							                              <td > Total </td>
							                              <td id="total-price" class="price">$<?=$this->cart->total() ?> </td>
							                            </tr>
							                            <tbody>
							                            </tbody>
							                          </table>
							                        </div>
							                      </div>
							                      
							                      <input type="submit" value="¡¡Comprar!!" class="btn btn-lg btn-success" style="float:right;">
							                      <!--/costDetails-->
							                      
							
							          
							          <!--/row-->
							  
							          
							        			</div>
							                
							                
							                </div>
							           </div>
									</div>
	
									<div class="form-actions">
										<div class="row">
											<div class="col-sm-12">
												<ul class="pager wizard no-margin">
													<!--<li class="previous first disabled">
													<a href="javascript:void(0);" class="btn btn-lg btn-default"> First </a>
													</li>-->
													<li class="previous disabled">
														<a href="javascript:void(0);" class="btn btn-lg btn-default"> Previous </a>
													</li>
													<!--<li class="next last">
													<a href="javascript:void(0);" class="btn btn-lg btn-primary"> Last </a>
													</li>-->
													<li class="next">
														<a href="javascript:void(0);" class="btn btn-lg txt-color-darken"> Next </a>
													</li>
												</ul>
											</div>
										</div>
									</div>
	
								</div>
						</form>
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
	<script type="text/javascript">

	function ProcesarCompra($id){
			

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
			
		</script>