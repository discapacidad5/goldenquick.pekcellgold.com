
<!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
				
				<!-- PAGE HEADER -->
				<i class="fa-fw fa fa-pencil-square-o"></i> 
				<a href='/dashboard'>Dashboard</a>
				<span>> 
					Carrito 
				</span>

			</h1>
		</div>
	</div>
	<div class="row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="well">
					<div class="row">
						<form class="smart-form" id="reporte-form" method="post">
							<div class="row">
								<section class="col col-lg-2 col-md-2 col-sm-6 col-xs-12">
									<label class="input">
										<a id="eliminar_carro" class="btn btn-primary btn-sm col-xs-12 col-lg-12 col-md-12 col-sm-12" onclick="show_todos()"><i class='fa fa-search '></i>Todos</a>
									</label>
								</section>
								<section class="col col-lg-2 col-md-2 col-sm-6 col-xs-12">
									<label class="input">
										<a id="eliminar_carro" class="btn btn-primary btn-sm col-xs-12 col-lg-12 col-md-12 col-sm-12" onclick="show_prod()"><i class='fa fa-search '></i>Productos</a>
									</label>
								</section>
								<section class="col col-lg-2 col-md-2 col-sm-6 col-xs-12">
									<label class="input">
										<a id="eliminar_carro" class="btn btn-primary btn-sm col-xs-12 col-lg-12 col-md-12 col-sm-12" onclick="show_serv()"><i class='fa fa-search '></i>Servicios</a>
									</label>
								</section>
								<section class="col col-lg-2 col-md-2 col-sm-6 col-xs-12">
									<label class="input">
										<a id="eliminar_carro" class="btn btn-primary btn-sm col-xs-12 col-lg-12 col-md-12 col-sm-12" onclick="show_comb()"><i class='fa fa-search '></i>Combinados</a>
									</label>
								</section>			
								<section class="col col-lg-2 col-md-2 col-sm-6 col-xs-12" id="busquedatodos">
									<label class="input"> <i class="icon-append fa fa-search"></i>
										<input type="text" placeholder="Buscar" name="busqueda4" id="busqueda4" onchange="busqueda_merc(4)">
										<b class="tooltip tooltip-bottom-right">Busqueda</b> 
									</label>
								</section>
								<section class="col col-lg-2 col-md-2 col-sm-6 col-xs-12" id="busquedaprod" style="display: none;">
									<label class="input"> <i class="icon-append fa fa-search"></i>
										<input type="text" placeholder="Buscar" name="busqueda1" id="busqueda1" onchange="busqueda_merc(1)">
										<b class="tooltip tooltip-bottom-right">Busqueda</b> 
									</label>
								</section>
								<section class="col col-lg-2 col-md-2 col-sm-6 col-xs-12" id="busquedaserv" style="display: none;">
									<label class="input"> <i class="icon-append fa fa-search"></i>
										<input type="text" placeholder="Buscar" name="busqueda2" id="busqueda2" onchange="busqueda_merc(2)">
										<b class="tooltip tooltip-bottom-right">Busqueda</b> 
									</label>
								</section>
								<section class="col col-lg-2 col-md-2 col-sm-6 col-xs-12" id="busquedacomb" style="display: none;">
									<label class="input"> <i class="icon-append fa fa-search"></i>
										<input type="text" placeholder="Buscar" name="busqueda3" id="busqueda3" onchange="busqueda_merc(3)">
										<b class="tooltip tooltip-bottom-right">Busqueda</b> 
									</label>
								</section>
								<section class="col col-lg-2 col-md-2 col-sm-6 col-xs-12" id="buscartodos">
									<label class="input">
										<a id="eliminar_carro" class="btn btn-primary btn-sm col-xs-12 col-lg-12 col-md-12 col-sm-12" onclick="busqueda_merc(4)"><i class='fa fa-search '></i>Buscar</a>
									</label>
								</section>
								<section class="col col-lg-2 col-md-2 col-sm-6 col-xs-12" id="buscarprod" style="display: none;">
									<label class="input">
										<a id="eliminar_carro" class="btn btn-primary btn-sm col-xs-12 col-lg-12 col-md-12 col-sm-12" onclick="busqueda_merc(1)"><i class='fa fa-search '></i>Buscar</a>
									</label>
								</section>
								<section class="col col-lg-2 col-md-2 col-sm-6 col-xs-12" id="buscarserv" style="display: none;">
									<label class="input">
										<a id="eliminar_carro" class="btn btn-primary btn-sm col-xs-12 col-lg-12 col-md-12 col-sm-12" onclick="busqueda_merc(2)"><i class='fa fa-search '></i>Buscar</a>
									</label>
								</section>
								<section class="col col-lg-2 col-md-2 col-sm-6 col-xs-12" id="buscarcomb" style="display: none;">
									<label class="input">
										<a id="eliminar_carro" class="btn btn-primary btn-sm col-xs-12 col-lg-12 col-md-12 col-sm-12" onclick="busqueda_merc(3)"><i class='fa fa-search '></i>Buscar</a>
									</label>
								</section>
							</div>
							<div class="row" id="ver_carrito">
								<section class="col-lg-10 col-md-8 col-sm-6 hidden-xs"></section>
								<section class="col col-lg-2 col-md-4 col-sm-6 col-xs-12" id="buscarcomb">
									<label class="input">
										<a class="btn btn-warning btn-sm col-xs-12 col-lg-12 col-md-12 col-sm-12" onclick="ver_cart()"><i class='fa fa-shopping-cart'></i>&nbsp;Carrito (0)</a>
									</label>
								</section>
							</div>
						</form>
					</div>
				</div>
			</article>	


			<!-- NEW COL START -->
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				
				<div class="well">
					<div class="row" id="mercancias">
						<?php
							$total=sizeof($prod)+sizeof($serv)+sizeof($comb);
							$fila=0;
							for($productos=0;$productos<sizeof($prod);$productos++)
							{
								if($fila%4==0)
								{
									echo '<div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">';
								}
								echo'<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 well div_merca" style="text-align:center; height:20%;">
										<div class"row">
											<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
											<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10" style="height:30%;">
												<img class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:30%;" src="'.$prod[$productos]->ruta.'">
											</div>
											<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
										</div>
										<p><h1><strong>'.$prod[$productos]->nombre.'</strong></h1></p>
										
										<p><h3>$ '.$prod[$productos]->costo.'</h3></p>
										
										<p class="hidden-sm hidden-xs hidden-md">
											<a class="btn btn-success btn-lg col-lg-6" href="javascript:void(0);" onclick="detalles('.$prod[$productos]->id.',1)"><i class="fa fa-shopping-cart"></i>&nbsp;Detalles</a>
											<a class="btn btn-primary btn-lg col-lg-6" href="javascript:void(0);" onclick="compra_prev('.$prod[$productos]->id.',1)"><i class="fa fa-shopping-cart"></i>&nbsp;Añadir</a>
										</p>
										<p class="hidden-sm hidden-xs hidden-lg">
											<a class="btn btn-success col-md-6" href="javascript:void(0);" onclick="detalles('.$prod[$productos]->id.',1)"><i class="fa fa-shopping-cart"></i>&nbsp;Detalles</a>
											<a class="btn btn-primary col-md-6" href="javascript:void(0);" onclick="compra_prev('.$prod[$productos]->id.',1)"><i class="fa fa-shopping-cart"></i>&nbsp;Añadir</a>
										</p>
										<p class="hidden-lg hidden-xs hidden-md">
											<a class="btn btn-success btn-sm col-sm-6" href="javascript:void(0);" onclick="detalles('.$prod[$productos]->id.',1)"><i class="fa fa-shopping-cart"></i>&nbsp;Detalles</a>
											<a class="btn btn-primary btn-sm col-sm-6" href="javascript:void(0);" onclick="compra_prev('.$prod[$productos]->id.',1)"><i class="fa fa-shopping-cart"></i>&nbsp;Añadir</a>
										</p>
										<p class="hidden-sm hidden-lg hidden-md">
											<a class="btn btn-success btn-xs col-xs-6" href="javascript:void(0);" onclick="detalles('.$prod[$productos]->id.',1)"><i class="fa fa-shopping-cart"></i>&nbsp;Detalles</a>
											<a class="btn btn-primary btn-xs col-xs-6" href="javascript:void(0);" onclick="compra_prev('.$prod[$productos]->id.',1)"><i class="fa fa-shopping-cart"></i>&nbsp;Añadir</a>
										</p>
									</div>';
									$fila++;
								if($fila%4==0)
								{
									echo '</div>';
								}
								
							}
									
							for($servicios=0;$servicios<sizeof($serv);$servicios++)
							{
								if($fila%4==0)
								{
									echo '<div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">';
								}
								echo'<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 well div_merca" style="text-align:center; height:10%; ">
										<div class="row">
											<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
											<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10" style="height:30%;">
												<img class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:30%;" src="'.$serv[$servicios]->ruta.'">
											</div>
											<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
										</div>
										<p><h1><strong>'.$serv[$servicios]->nombre.'</strong></h1></p>
										
										<p><h3>$ '.$serv[$servicios]->costo.'</h3></p>
										
										<p class="hidden-sm hidden-xs hidden-md">
											<a class="btn btn-success btn-lg col-lg-6" href="javascript:void(0);" onclick="detalles('.$serv[$servicios]->id.',2)"><i class="fa fa-plus"></i>&nbsp;Detalles</a>
											<a class="btn btn-primary btn-lg col-lg-6" href="javascript:void(0);" onclick="compra_prev('.$serv[$servicios]->id.',2)"><i class="fa fa-shopping-cart"></i>&nbsp;Añadir</a>
										</p>
										<p class="hidden-sm hidden-xs hidden-lg">
											<a class="btn btn-success col-md-6" href="javascript:void(0);" onclick="detalles('.$serv[$servicios]->id.',2)"><i class="fa fa-plus"></i>&nbsp;Detalles</a>
											<a class="btn btn-primary col-md-6" href="javascript:void(0);" onclick="compra_prev('.$serv[$servicios]->id.',2)"><i class="fa fa-shopping-cart"></i>&nbsp;Añadir</a>
										</p>
										<p class="hidden-lg hidden-xs hidden-md">
											<a class="btn btn-success btn-sm col-sm-6" href="javascript:void(0);" onclick="detalles('.$serv[$servicios]->id.',2)"><i class="fa fa-plus"></i>&nbsp;Detalles</a>
											<a class="btn btn-primary btn-sm col-sm-6" href="javascript:void(0);" onclick="compra_prev('.$serv[$servicios]->id.',2)"><i class="fa fa-shopping-cart"></i>&nbsp;Añadir</a>
										</p>
										<p class="hidden-sm hidden-lg hidden-md">
											<a class="btn btn-success btn-xs col-xs-6" href="javascript:void(0);" onclick="detalles('.$serv[$servicios]->id.',2)"><i class="fa fa-plus"></i>&nbsp;Detalles</a>
											<a class="btn btn-primary btn-xs col-xs-6" href="javascript:void(0);" onclick="compra_prev('.$serv[$servicios]->id.',2)"><i class="fa fa-shopping-cart"></i>&nbsp;Añadir</a>
										</p>
									</div>';
								$fila++;
								if($fila%4==0)
								{
									echo '</div>';
								}
								
							}
						
							for($combinados=0;$combinados<sizeof($comb);$combinados++)
							{
								if($fila%4==0)
								{
									echo '<div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">';
								}
								echo'<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 well div_merca" style="text-align:center; height:20%; ">
										<div class="row">
											<div class="col-lg-1 col-md-1 col-sm-2 col-xs-1"></div>
											<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10" style="height:30%;">
												<img class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:30%;" src="'.$comb[$combinados]->ruta.'">
											</div>
											<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
										</div>
										<p><h1><strong>'.$comb[$combinados]->nombre.'</strong></h1></p>
										
										<p><h2>'.$comb[$combinados]->n_prod.' + '.$comb[$combinados]->n_serv.'</h2></p>
										
										<p><h3>$ '.$comb[$combinados]->costo.'</h3></p>
										
										<p class="hidden-sm hidden-xs hidden-md">
											<a class="btn btn-success btn-lg col-lg-6" href="javascript:void(0);" onclick="detalles('.$comb[$combinados]->id.',3)"><i class="fa fa-shopping-cart"></i>&nbsp;Detalles</a>
											<a class="btn btn-primary btn-lg col-lg-6" href="javascript:void(0);" onclick="compra_prev('.$comb[$combinados]->id.',3)"><i class="fa fa-shopping-cart"></i>&nbsp;Añadir</a>
										</p>
										<p class="hidden-sm hidden-xs hidden-lg">
											<a class="btn btn-success col-md-6" href="javascript:void(0);" onclick="detalles('.$comb[$combinados]->id.',3)"><i class="fa fa-shopping-cart"></i>&nbsp;Detalles</a>
											<a class="btn btn-primary col-md-6" href="javascript:void(0);" onclick="compra_prev('.$comb[$combinados]->id.',3)"><i class="fa fa-shopping-cart"></i>&nbsp;Añadir</a>
										</p>
										<p class="hidden-lg hidden-xs hidden-md">
											<a class="btn btn-success btn-sm col-sm-6" href="javascript:void(0);" onclick="detalles('.$comb[$combinados]->id.',3)"><i class="fa fa-shopping-cart"></i>&nbsp;Detalles</a>
											<a class="btn btn-primary btn-sm col-sm-6" href="javascript:void(0);" onclick="compra_prev('.$comb[$combinados]->id.',3)"><i class="fa fa-shopping-cart"></i>&nbsp;Añadir</a>
										</p>
										<p class="hidden-sm hidden-lg hidden-md">
											<a class="btn btn-success btn-xs col-xs-6" href="javascript:void(0);" onclick="detalles('.$comb[$combinados]->id.',3)"><i class="fa fa-shopping-cart"></i>&nbsp;Detalles</a>
											<a class="btn btn-primary btn-xs col-xs-6" href="javascript:void(0);" onclick="compra_prev('.$comb[$combinados]->id.',3)"><i class="fa fa-shopping-cart"></i>&nbsp;Añadir</a>
										</p>
									</div>';
									$fila++;
								if($fila%4==0)
								{
									echo '</div>';
								}
									
							}
							if($fila%4!=0)
							{
								echo'</div>';
							}
										
						?>
					</div>
				</div>
										
			</article>
				
				<!-- NEW WIDGET START -->
						<!-- WIDGET END -->
		


		</div>
	
	</div>
	<div class="row">         
         <!-- a blank row to get started -->
    	<div class="col-sm-12">
        	<br />
        	<br />
        </div>
    </div>
	


		
<!-- END MAIN CONTENT -->

<!-- PAGE RELATED PLUGIN(S) -->
<script src="/template/js/plugin/datatables/jquery.dataTables.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.colVis.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.tableTools.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
		<script src="/template/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
		<script src="/template/js/plugin/bootbox/bootbox.min.js"></script>
		
		<script type="text/javascript">
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
							})
				    }
				});
			}
			function compra_prev(id,tipo)
			{
				var datos={'id':id,'tipo':tipo};
				$.ajax({
					data: {info:JSON.stringify(datos)},
					type: "get",
					url: "add_carrito",
					success: function(msg){
				            
				             bootbox.dialog({
								message: msg,
								title: "Descripcion",
								className: "div_info_merc",
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
						$("#buscartodos").hide();
						$("#buscarprod").show();
						$("#buscarserv").hide();
						$("#buscarcomb").hide();
						$("#busquedatodos").hide();
						$("#busquedaprod").show();
						$("#busquedaserv").hide();
						$("#busquedacomb").hide();
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
						$("#buscartodos").hide();
						$("#buscarprod").hide();
						$("#buscarserv").show();
						$("#buscarcomb").hide();
						$("#busquedatodos").hide();
						$("#busquedaprod").hide();
						$("#busquedaserv").show();
						$("#busquedacomb").hide();
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
						$("#buscartodos").hide();
						$("#buscarprod").hide();
						$("#buscarserv").hide();
						$("#buscarcomb").show();
						$("#busquedatodos").hide();
						$("#busquedaprod").hide();
						$("#busquedaserv").hide();
						$("#busquedacomb").show();

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
						$("#buscartodos").show();
						$("#buscarprod").hide();
						$("#buscarserv").hide();
						$("#buscarcomb").hide();
						$("#busquedatodos").show();
						$("#busquedaprod").hide();
						$("#busquedaserv").hide();
						$("#busquedacomb").hide();

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
			function comprar(id,tipo)
			{
				var dist=$("#comprar input[type='radio']:checked").val();
				var qty=$("#cantidad").val();
				if(!dist)
				{
					alert('Seleccione un proveedor')
				}
				else
				{
					if(qty>5||qty<1)
					{
						alert('La cantidad de mercancia de un tipo añadida al carrito debe de estar entre 1 y 5');
					}
					else
					{
						var datos={'id':id,'tipo':tipo,'qty':qty,'dist':dist};
						$.ajax({
							data:{info:JSON.stringify(datos)},
							type: 'get',
							url: 'add_merc',
							success: function(msg){
								alert("Se ha añadido al carrito");
								$("#ver_carrito").html(msg);
							}
						});
					}
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
							})
					}
				});
			}
		</script>

		<script type="text/javascript">
		
		// DO NOT REMOVE : GLOBAL FUNCTIONS!
		
		$(document).ready(function() {
			
			pageSetUp();
			
			/* // DOM Position key index //
		
			l - Length changing (dropdown)
			f - Filtering input (search)
			t - The Table! (datatable)
			i - Information (records)
			p - Pagination (paging)
			r - pRocessing 
			< and > - div elements
			<"#id" and > - div with an id
			<"class" and > - div with a class
			<"#id.class" and > - div with an id and class
			
			Also see: http://legacy.datatables.net/usage/features
			*/	

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
			
			/* COLUMN FILTER  */
		    var otable = $('#datatable_fixed_column').DataTable({
		    	//"bFilter": false,
		    	//"bInfo": false,
		    	//"bLengthChange": false
		    	//"bAutoWidth": false,
		    	//"bPaginate": false,
		    	//"bStateSave": true // saves sort state using localStorage
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
				"autoWidth" : true,
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_datatable_fixed_column) {
						responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_datatable_fixed_column.respond();
				}		
			
		    });
		    
		    // custom toolbar
		    $("div.toolbar").html('<div class="text-right"><img src="/template/img/logo.png" alt="SmartAdmin" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');
		    	   
		    // Apply the filter
		    $("#datatable_fixed_column thead th input[type=text]").on( 'keyup change', function () {
		    	
		        otable
		            .column( $(this).parent().index()+':visible' )
		            .search( this.value )
		            .draw();
		            
		    } );
		    /* END COLUMN FILTER */   
	    
			/* COLUMN SHOW - HIDE */
			$('#datatable_col_reorder').dataTable({
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'C>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
				"autoWidth" : true,
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_datatable_col_reorder) {
						responsiveHelper_datatable_col_reorder = new ResponsiveDatatablesHelper($('#datatable_col_reorder'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_datatable_col_reorder.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_datatable_col_reorder.respond();
				}			
			});
			
			/* END COLUMN SHOW - HIDE */
	
			/* TABLETOOLS */
			$('#datatable_tabletools').dataTable({
				
				// Tabletools options: 
				//   https://datatables.net/extensions/tabletools/button_options
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
		        "oTableTools": {
		        	 "aButtons": [
		             "copy",
		             "csv",
		             "xls",
		                {
		                    "sExtends": "pdf",
		                    "sTitle": "SmartAdmin_PDF",
		                    "sPdfMessage": "SmartAdmin PDF Export",
		                    "sPdfSize": "letter"
		                },
		             	{
	                    	"sExtends": "print",
	                    	"sMessage": "Generated by SmartAdmin <i>(press Esc to close)</i>"
	                	}
		             ],
		            "sSwfPath": "/template/js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
		        },
				"autoWidth" : true,
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_datatable_tabletools) {
						responsiveHelper_datatable_tabletools = new ResponsiveDatatablesHelper($('#datatable_tabletools'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_datatable_tabletools.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_datatable_tabletools.respond();
				}
			});
			
			$('#startdate').datepicker({
				dateFormat : 'dd.mm.yy',
				prevText : '<i class="fa fa-chevron-left"></i>',
				nextText : '<i class="fa fa-chevron-right"></i>',
				onSelect : function(selectedDate) {
					$('#finishdate').datepicker('option', 'minDate', selectedDate);
				}
			});
			
			$('#finishdate').datepicker({
				dateFormat : 'dd.mm.yy',
				prevText : '<i class="fa fa-chevron-left"></i>',
				nextText : '<i class="fa fa-chevron-right"></i>',
				onSelect : function(selectedDate) {
					$('#startdate').datepicker('option', 'maxDate', selectedDate);
				}
			});
			/* END TABLETOOLS */
		
		})

		</script>