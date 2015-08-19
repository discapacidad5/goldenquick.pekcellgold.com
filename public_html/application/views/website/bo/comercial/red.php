
<!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
				
				<!-- PAGE HEADER -->
				<i class="fa-fw fa fa-pencil-square-o"></i> 
					<a href="/bo/dashboard">Dashboard</a>
				<!--<span>>
					<a href="/bo/comercial">Módulo comercial</a>
				</span>-->
				<span>>
					Red
				</span>
			</h1>
		</div>
	</div>
	<section id="widget-grid" class="">
		<!-- START ROW -->
		<div class="row">
			<!-- NEW COL START -->
			<article class="col-sm-12 col-md-12 col-lg-12">
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false" data-widget-colorbutton="false"	>
					<!-- widget options:
						usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
						
						data-widget-colorbutton="false"	
						data-widget-editbutton="false"
						data-widget-togglebutton="false"
						data-widget-deletebutton="false"
						data-widget-fullscreenbutton="false"
						data-widget-custombutton="false"
						data-widget-collapsed="true" 
						data-widget-sortable="false"
						
					-->
					<header>
						<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
						<!--<h2>Datos personales</h2>-->				
						
					</header>

					<!-- widget div-->
					<div>
						
						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->
							
						</div>
						<!-- end widget edit box -->
						<!-- widget content -->
						<div class="widget-body">
							<ul id="myTab1" class="nav nav-tabs bordered">
								<li class="active">
									<a href="#s1" data-toggle="tab">Alta / Baja / Cambio</a>
								</li>
								<li>
									<a href="#s2" data-toggle="tab">Listado consecutivo</a>
								</li>
								<li>
									<a href="#s3" data-toggle="tab">Genealógico</a>
								</li>
								<li>
									<a href="#s4" data-toggle="tab">Gráfico</a>
								</li>
								<li>
									<a href="#s5" data-toggle="tab">Nuevos afiliados</a>
								</li>
								<li>
									<a href="#s6" data-toggle="tab">Preregistros</a>
								</li>
							</ul>
							<div id="myTabContent1" class="tab-content padding-10">
								<div class="tab-pane fade in active" id="s1">
									<div class="row">
										<div class="col-xs-12 col-md-6 col-sm-4 col-lg-3 pull-right">
											Detalles <a title="Editar" href="#" class="txt-color-blue"><i class="fa fa-eye"></i></a>
											Detalles en red <a title="Editar" href="#" class="txt-color-blue"><i class="fa fa-sitemap"></i></a>
											Permisos <a title="Permisos" href="#" class="txt-color-blue"><i class="fa fa-unlock"></i></a>
											Eliminar <a title="Eliminar" href="#" class="txt-color-red"><i class="fa fa-trash-o"></i></a> 
											Activar <a title="Activar" href="#" class="txt-color-blue"><i class="fa fa-check"></i></a> 
											Desactivar <a title="Desactivar" href="#" class="txt-color-blue"><i class="fa fa-times"></i></a>
										</div>
									</div>
									<div class="row">&nbsp;</div>
									<table id="datatable_abc" class="table table-striped table-bordered" width="100%">
								        <thead>
								            <tr>
								            	<th class="text-center">ID</th>
								            	<th class="text-center">Imágen</th>
							                    <th class="text-center">Usuario</th>
							                    <th class="text-center">Correo</th>
							                    <th class="text-center">Tipo</th>
							                    <th class="text-center">Nombre</th>
							                    <th class="text-center">Apellido</th>
							                    <th class="text-center">Acción</th>
								            </tr>
								        </thead>
			
								        <tbody>
								        	<?foreach ($users as $user) {
								        	?>
								            <tr>
								                <td><?=$user->id?></td>
								                <td class="no-padding"><img src="<?=($user->url) ? $user->url : '/template/img/empresario.jpg' ?>" alt="<?=$user->username?>" style="max-height: 90px"></td>
								                <td><?=$user->username?></td>
								                <td><?=$user->email?></td>
								                <td><?=$user->tipo_usuario?></td>
								                <td><?=$user->nombre?></td>
								                <td><?=$user->apellido?></td>
								                <td>
								                <a title="Detalles" href="#" onclick="detalle_usuario(<?=$user->id?>)" class="txt-color-blue"><i class="fa fa-eye"></i></a>
								                <?if($user->tipo_usuario!='Administrador'){?><a onclick="detalle_red(<?=$user->id?>)" title="Detalles en red" href="#" class="txt-color-blue"><i class="fa fa-sitemap"></i></a><?}?>
								                <a title="Permisos" href="#" onclick="perfil_permiso(<?=$user->id?>)" class="txt-color-blue"><i class="fa fa-unlock"></i></a>
								                <?if($user->id_estatus==2){?>
								                <a title="Activar" href="#" onclick="activar(<?=$user->id?>)" class="txt-color-blue"><i class="fa fa-check"></i></a>
								                <?}else{?>
								                <a title="Desactivar" href="#" onclick="desactivar(<?=$user->id?>)" class="txt-color-red"><i class="fa fa-times"></i></a>
								                <?}?>
								                <a title="Eliminar" href="#" onclick="eliminar(<?=$user->id?>)" class="txt-color-red"><i class="fa fa-trash-o"></i></a>
								            	</td>
								            </tr>
								            <?}?>
								        </tbody>
									</table>
								</div>
								<div class="tab-pane fade" id="s2">
									<table id="datatable_listado" class="table table-striped table-bordered" width="100%">
								        <thead>
								            <tr>
								            	<th>Consecutivo</th>
							                    <th>Nombre</th>
							                    <th>Apellido</th>
							                    <th>Afiliado por ti</th>
								            </tr>
								        </thead>
			
								        <tbody>
								        	<?foreach ($afiliados as $afiliado) {
								        	?>
								            <tr>
								                <td><?=$afiliado->id_afiliado?></td>
								                <td><?=$afiliado->afiliado?></td>
								                <td><?=$afiliado->afiliado_p?></td>
								                <td><?echo $afiliado->directo ? 'Si':'No' ?></td>
								            </tr>
								            <?}?>
								        </tbody>
									</table>
								</div>
								<div class="tab-pane fade" id="s3">
									<div class="tree smart-form">
                                    <ul>
                                        <li>
                                            <span><i class="fa fa-lg fa-folder-open"></i>Tú</span>
                                            <ul>
                                                <?
                                                    foreach ($afiliados as $key) 
                                                    {
                                                        if($key->debajo_de==$id)
                                                        {?>
                                                        	<li id="<?=$key->id_afiliado?>" class="parent_li" role="treeitem" style="display: list-item;">
                                                    			<span class="quitar" onclick="subred(<?=$key->id_afiliado?>)"><i class="fa fa-lg fa-plus-circle"></i> <?=$key->afiliado?> <?=$key->afiliado_p?></span>
                                                			</li>
                                                        <?}
                                                           
                                                    }
                                                 ?>
                                             </ul>
                                        </li>
                                    </ul>
                              	</div>
								</div>
								<div class="tab-pane fade" id="s4">
									<div class="row">
										<div class="tree1">
											<ul>
												<li>
													<a style="background: url('<?=$img_perfil?>'); background-size: cover; background-position: center;" href="#"><div class="nombre">Tú</div></a>
													<ul>
													<?foreach ($afiliados as $key) 
                                                    {
                                                    	$key->img ? $img=$key->img : $img="/template/img/empresario.jpg";
                                                        if($key->debajo_de==$id)
                                                        {?>
														<li id="t<?=$key->id_afiliado?>">
															<a class="quitar" style="background: url('<?=$img?>'); background-size: cover; background-position: center;" onclick="subtree(<?=$key->id_afiliado?>)" href="#"><div class="nombre"><?=$key->afiliado?> <?=$key->afiliado_p?></div></a>
															<div onclick="detalles(<?=$key->id_afiliado?>)" class="todo">Detalles</div>
														</li>
														<?}
													}?>
													</ul>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="s5">
									<table id="datatable_nuevos" class="table table-striped table-bordered" width="100%">
								        <thead>
								            <tr>
								            	<th>Consecutivo</th>
							                    <th>Nombre</th>
							                    <th>Apellido</th>
							                    <th>Afiliado por ti</th>
								            </tr>
								        </thead>
			
								        <tbody>
								        	<?foreach ($afiliados as $afiliado) {
								        	?>
								            <tr>
								                <td><?=$afiliado->id_afiliado?></td>
								                <td><?=$afiliado->afiliado?></td>
								                <td><?=$afiliado->afiliado_p?></td>
								                <td><?echo $afiliado->directo ? 'Si':'No' ?></td>
								            </tr>
								            <?}?>
								        </tbody>
									</table>
								</div>
								<div class="tab-pane fade" id="s6">
									<div class="row">
										<div class="col-xs-2 col-md-2 col-sm-2 col-lg-2 pull-right">
											<a target="_blank" class="btn btn-success" href="/bo/comercial/reporte_preregistro">
											<i class="fa fa-file-excel-o"></i>
											Crear Excel
											</a>
										</div>
									</div>
									<table id="datatable_pre" class="table table-striped table-bordered" width="100%">
								        <thead>
								            <tr>
								            	<th>Consecutivo</th>
							                    <th>Cédula</th>
							                    <th>Nombre</th>
							                    <th>Correo</th>
							                    <th>Celular</th>
							                    <th>Invitado por</th>
							                    <th>Fecha</th>
								            </tr>
								        </thead>
			
								        <tbody>
								        	<?foreach ($preregistro as $key) {
								        	?>
								            <tr>
								                <td><?=$key->id_preregistro?></td>
								                <td><?=$key->cedula?></td>
								                <td><?=$key->nombre?></td>
								                <td><?=$key->correo?></td>
								                <td><?=$key->celular?></td>
								                <td><?=$key->invitado_por?></td>
								                <td><?=$key->fecha?></td>
								            </tr>
								            <?}?>
								        </tbody>
									</table>
									<div class="row">
										<div class="col-xs-4 col-md-4 col-sm-2 col-lg-2 pull-right">
											<a target="_blank" class="btn btn-success" href="/bo/comercial/reporte_preregistro">
											<i class="fa fa-file-excel-o"></i>
											Crear Excel
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- end widget content -->
						
					</div>
					<!-- end widget div -->
				</div>
				<!-- end widget -->
			</article>
			<!-- END COL -->
		</div>
		<div class="row">         
	        <!-- a blank row to get started -->
	        <div class="col-sm-12">
	            <br />
	            <br />
	        </div>
        </div>            
		<!-- END ROW -->
	</section>
	<!-- end widget grid -->
</div>
<!-- END MAIN CONTENT -->
<style type="text/css">
	/*Now the CSS*/
* {margin: 0; padding: 0;}
.nombre{background: rgba(255,255,255,.5); width: 100px; margin-top: -5px; margin-left: -11px;}
.todo{font-size: 13px;width: 100%; background: rgba(0,0,0,.5); margin-top: 0%; color: #FFF; cursor: pointer;}
.todo:hover{font-size: 13px;text-decoration: underline; width: 100%; margin-top: 0%; background: rgba(0,0,0,.5); color: #FFF; cursor: pointer;}
.tree1 ul {
	padding-top: 20px; position: relative;
	
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

.tree1 li {
	float: left; text-align: center;
	list-style-type: none;
	position: relative;
	padding: 20px 5px 0 5px;
	
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

/*We will use ::before and ::after to draw the connectors*/

.tree1 li::before, .tree1 li::after{
	content: '';
	position: absolute; top: 0; right: 50%;
	border-top: 3px solid #ccc;
	width: 50%; height: 20px;
}
.tree1 li::after{
	right: auto; left: 50%;
	border-left: 3px solid #ccc;
}

/*We need to remove left-right connectors from elements without 
any siblings*/
.tree1 li:only-child::after, .tree1 li:only-child::before {
	display: none;
}

/*Remove space from the top of single children*/
.tree1 li:only-child{ padding-top: 0;}

/*Remove left connector from first child and 
right connector from last child*/
.tree1 li:first-child::before, .tree1 li:last-child::after{
	border: 0 none;
}
/*Adding back the vertical connector to the last nodes*/
.tree1 li:last-child::before{
	border-right: 3px solid #ccc;
	border-radius: 0 5px 0 0;
	-webkit-border-radius: 0 5px 0 0;
	-moz-border-radius: 0 5px 0 0;
}
.tree1 li:first-child::after{
	border-radius: 5px 0 0 0;
	-webkit-border-radius: 5px 0 0 0;
	-moz-border-radius: 5px 0 0 0;
}

/*Time to add downward connectors from parents*/
.tree1 ul ul::before{
	content: '';
	position: absolute; top: 0; left: 50%;
	border-left: 3px solid #ccc;
	width: 0; height: 20px;
}

.tree1 li a{

	height: 100px;
	width: 100px;
	border: 1px solid #ccc;
	padding: 5px 10px;
	text-decoration: none;
	color: #000;
	font-size: 13px;
	display: inline-block;
	
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

/*Time for some hover effects*/
/*We will apply the hover effect the the lineage of the element also*/
.tree1 li a:hover, .tree1 li a:hover+ul li a {
	background: #c8e4f8; color: #000; border: 1px solid #94a0b4;
}
/*Connector styles on hover*/
.tree1 li a:hover+ul li::after, 
.tree1 li a:hover+ul li::before, 
.tree1 li a:hover+ul::before, 
.tree1 li a:hover+ul ul::before{
	border-color:  #94a0b4;
}

/*Thats all. I hope you enjoyed it.
Thanks :)*/
</style>
<style type="text/css" media="screen">
        	#chart table{margin: 0 auto; color: #FFF;}
        </style>
		<script src="/template/js/plugin/datatables/jquery.dataTables.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.colVis.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.tableTools.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
		<script src="/template/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
         
        <script type="text/javascript">
          
          // DO NOT REMOVE : GLOBAL FUNCTIONS!
          
          $(document).ready(function() {
               
               pageSetUp();
               
               // PAGE RELATED SCRIPTS
          
               $('.tree > ul').attr('role', 'tree').find('ul').attr('role', 'group');
               $('.tree').find('li:has(ul)').addClass('parent_li').attr('role', 'treeitem').find(' > span').attr('title', 'Collapse this branch').on('click', function(e) {
                    var children = $(this).parent('li.parent_li').find(' > ul > li');
                    if (children.is(':visible')) {
                         children.hide('fast');
                         $(this).attr('title', 'Expand this branch').find(' > i').removeClass().addClass('fa fa-lg fa-plus-circle');
                    } else {
                         children.show('fast');
                         $(this).attr('title', 'Collapse this branch').find(' > i').removeClass().addClass('fa fa-lg fa-minus-circle');
                    }
                    e.stopPropagation();
               });            
          
          	/* COLUMN FILTER  */
		    var otable = $('#datatable_abc').DataTable({
		    	//"bFilter": false,
		    	//"bInfo": false,
		    	//"bLengthChange": false
		    	//"bAutoWidth": false,
		    	//"bPaginate": false,
		    	//"bStateSave": true // saves sort state using localStorage
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
				"autoWidth" : true	
			
		    });
		    /* END COLUMN FILTER */

		    	/* COLUMN FILTER  */
		    var otable = $('#datatable_listado').DataTable({
		    	//"bFilter": false,
		    	//"bInfo": false,
		    	//"bLengthChange": false
		    	//"bAutoWidth": false,
		    	//"bPaginate": false,
		    	//"bStateSave": true // saves sort state using localStorage
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
				"autoWidth" : true	
			
		    });
		    /* END COLUMN FILTER */

		    	/* COLUMN FILTER  */
		    var otable = $('#datatable_nuevos').DataTable({
		    	//"bFilter": false,
		    	//"bInfo": false,
		    	//"bLengthChange": false
		    	//"bAutoWidth": false,
		    	//"bPaginate": false,
		    	//"bStateSave": true // saves sort state using localStorage
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
				"autoWidth" : true	
			
		    });
		    /* END COLUMN FILTER */

		    	/* COLUMN FILTER  */
		    var otable = $('#datatable_pre').DataTable({
		    	//"bFilter": false,
		    	//"bInfo": false,
		    	//"bLengthChange": false
		    	//"bAutoWidth": false,
		    	//"bPaginate": false,
		    	//"bStateSave": true // saves sort state using localStorage
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
				"autoWidth" : true	
			
		    });
		    /* END COLUMN FILTER */

          })
	function subred(id)
	{
		$("#"+id).children(".quitar").attr('onclick','');
		$.ajax({
			type: "POST",
			url: "/bo/comercial/subred",
			data: {id: id},
		})
		.done(function( msg )
		{
			$("#"+id).append(msg);
		});
	}

	function estatus(tipo,id)
	{
		alert(tipo,id);
	}
	function subtree(id)
	{
		$("#t"+id).children(".quitar").attr('onclick','');
		$.ajax({
			type: "POST",
			url: "/bo/comercial/subtree",
			data: {id: id},
		})
		.done(function( msg )
		{
			$("#t"+id).append(msg);
		});
	}
        jQuery(document).ready(function() {
            
            /* Custom jQuery for the example */
            $("#show-list").click(function(e){
                e.preventDefault();
                
                $('#list-html').toggle('fast', function(){
                    if($(this).is(':visible')){
                        $('#show-list').text('Hide underlying list.');
                        $(".topbar").fadeTo('fast',0.9);
                    }else{
                        $('#show-list').text('Show underlying list.');
                        $(".topbar").fadeTo('fast',1);                  
                    }
                });
            });
            
            $('#list-html').text($('#org').html());
            
            $("#org").bind("DOMSubtreeModified", function() {
                $('#list-html').text('');
                
                $('#list-html').text($('#org').html());
                
                prettyPrint();                
            });
        });
function detalles(id)
{
	$.ajax({
		type: "POST",
		url: "/bo/comercial/detalle_usuario",
		data: {id: id},
	})
	.done(function( msg )
	{
		bootbox.dialog({
			message: msg,
			title: "Detalles",
			buttons: {
				success: {
				label: "Cerrar!",
				className: "btn-success",
				callback: function() {
					//location.href="";
					}
				}
			}
		});
	});
}
function detalle_usuario(id)
{
	$.ajax({
		type: "POST",
		url: "/bo/comercial/get_detalle_usuario",
		data: {id: id},
	})
	.done(function( msg )
	{
		bootbox.dialog({
			message: msg,
			title: "Detalles",
			buttons: {
				success: {
				label: "Cerrar!",
				className: "btn-success",
				callback: function() {
					//location.href="";
					}
				}
			}
		});
	});
}
function perfil_permiso(id)
{
	$.ajax({
		type: "POST",
		url: "/bo/comercial/perfil_permiso",
		data: {id: id},
	})
	.done(function( msg )
	{
		bootbox.dialog({
			message: msg,
			title: "Detalles",
			buttons: {
				success: {
				label: "Actualizar!",
				className: "btn-success",
				callback: function() {
						$.ajax({
							type: "POST",
							url: "/bo/comercial/actualiza_perfil",
							data: $('#perfil_123').serialize(),
						})
						.done(function( msg )
						{
							bootbox.dialog({
								message: msg,
								title: "Detalles",
								buttons: {
									success: {
									label: "Cerrar!",
									className: "btn-success",
									callback: function() {
										location.href="";
										}
									}
								}
							});
						});
					}
				},
				danger: {
				label: "Cerrar!",
				className: "btn-danger",
				callback: function() {

					}
			}
			},
		});
	});
}
function get_permisos(id)
{
	$.ajax({
		type: "POST",
		url: "/bo/comercial/get_permisos",
		data: {id: id},
	})
	.done(function( msg )
	{
		bootbox.dialog({
			message: msg,
			title: "Permisos",
			buttons: {
				success: {
				label: "Cerrar!",
				className: "btn-success",
				callback: function() {
					//location.href="";
					}
				}
			}
		});
	});
}
function new_perfil(id)
{
		bootbox.dialog({
			message: '<div class="row"><form class="smart-form" id="datos_perfil" action ="/bo/comercial/new_perfil" method="POST">'
			+'<section class="col col-6">Grupo del perfil'
				+'<label class="select">'
					+'<select name="grupo">'
					+'<?foreach ($grupos as $key){?>'
					+'<option value="<?=$key->id_grupo?>"><?=$key->descripcion?></option>'
					+'<?}?></select>'
				+'</label>'
			+'</section>'
			+'<section class="col col-6">'
	            +'<label class="input">Nombre del perfil'
	                +'<input type="text" name="perfil">'
	            +'</label>'
	        +'</section>'
	        +'<div class="row"><section class="col col-6">Permisos del grupo Backoffice'
	       	+'<?foreach ($permisos as $key){if($key->id_grupo==1){?>'
			+'<label class="checkbox">'
				+'<input value="<?=$key->id_permiso?>" name="permiso[]" type="checkbox">'
				+'<i></i><?=$key->nombre?></label>'	
				+'<?}}?>'						
			+'</section>'
			+'<section class="col col-6">Permisos del grupo Oficina virtual'
	       	+'<?foreach ($permisos as $key){if($key->id_grupo==2){?>'
			+'<label class="checkbox">'
				+'<input value="<?=$key->id_permiso?>" name="permiso[]" type="checkbox">'
				+'<i></i><?=$key->nombre?></label>'
				+'<?}}?>'
			+'</section>'
			+'</div></form></div>'
			,
			title: "Permisos",
			buttons: {
				success: {
				label: "Crear!",
				className: "btn-success",
				callback: function() {
						$.ajax({
							type: "POST",
							url: "/bo/comercial/new_perfil",
							data: $("#datos_perfil").serialize(),
						})
						.done(function( msg )
						{
							bootbox.dialog({
								message: msg,
								title: "Perfiles",
								buttons: {
									success: {
									label: "Cerrar!",
									className: "btn-success",
									callback: function() {
										location.href="";
										}
									}
								}
							});
						});
					}
				},
				danger: {
				label: "Cerrar!",
				className: "btn-danger",
				callback: function() {

					}
				}
			}
		});
}
function del_perfil()
{
	bootbox.dialog({
			message: '<div class="row"><form class="smart-form" id="datos_perfil" action ="/bo/comercial/del_perfil" method="POST">'
			+'<section class="col col-6">Selecciona el perfil que deseas borrar'
				+'<label class="select">'
					+'<select name="perfil">'
					+'<?foreach ($perfiles as $key){?>'
					+'<option value="<?=$key->id_perfil?>"><?=$key->descripcion?></option>'
					+'<?}?></select>'
				+'</label>'
			+'</section>'
			+'</form></div>'
			,
			title: "Permisos",
			buttons: {
				success: {
				label: "Borrar!",
				className: "btn-success",
				callback: function() {
						$.ajax({
							type: "POST",
							url: "/bo/comercial/del_perfil",
							data: $("#datos_perfil").serialize(),
						})
						.done(function( msg )
						{
							bootbox.dialog({
								message: msg,
								title: "Perfiles",
								buttons: {
									success: {
									label: "Cerrar!",
									className: "btn-success",
									callback: function() {
										location.href="";
										}
									}
								}
							});
						});
					}
				},
				danger: {
				label: "Cerrar!",
				className: "btn-danger",
				callback: function() {

					}
				}
			}
		});
}
function desactivar(id)
{
	bootbox.dialog({
			message: "Confirme que desactivará al usuario con el id <b>"+id+"</b>",
			title: "Atención",
			buttons: {
				success: {
				label: "Desactivar!",
				className: "btn-success",
				callback: function() {
						$.ajax({
							type: "POST",
							url: "/bo/comercial/desactiva_usuario",
							data: {id: id},
						})
						.done(function( msg )
						{
							bootbox.dialog({
								message: msg,
								title: "Atención",
								buttons: {
									success: {
									label: "Cerrar!",
									className: "btn-success",
									callback: function() {
										location.href="";
										}
									}
								}
							});
						});
					}
				},
				danger: {
				label: "Cancelar!",
				className: "btn-danger",
				callback: function() {
					}
				}
			},
		});
}
function activar(id)
{
	bootbox.dialog({
			message: "Confirme que activará al usuario con el id <b>"+id+"</b>",
			title: "Atención",
			buttons: {
				success: {
				label: "Actualizar!",
				className: "btn-success",
				callback: function() {
						$.ajax({
							type: "POST",
							url: "/bo/comercial/activa_usuario",
							data: {id: id},
						})
						.done(function( msg )
						{
							bootbox.dialog({
								message: msg,
								title: "Atención",
								buttons: {
									success: {
									label: "Cerrar!",
									className: "btn-success",
									callback: function() {
										location.href="";
										}
									}
								}
							});
						});
					}
				},
				danger: {
				label: "Cancelar!",
				className: "btn-danger",
				callback: function() {
					}
				}
			},
		});
}
function eliminar(id)
{
	bootbox.dialog({
			message: "Confirme que <b>eliminará</b> al usuario con el id <b>"+id+"</b>",
			title: "Atención",
			buttons: {
				success: {
				label: "Eliminar!",
				className: "btn-success",
				callback: function() {
						$.ajax({
							type: "POST",
							url: "/bo/comercial/del_user",
							data: {id: id},
						})
						.done(function( msg )
						{
							bootbox.dialog({
								message: msg,
								title: "Atención",
								buttons: {
									success: {
									label: "Cerrar!",
									className: "btn-success",
									callback: function() {
										//location.href="";
										}
									}
								}
							});
						});
					}
				},
				danger: {
				label: "Cancelar!",
				className: "btn-danger",
				callback: function() {
					}
				}
			},
		});
}
function detalle_red(id)
{
	$.ajax({
		type: "POST",
		url: "/bo/comercial/detalle_red",
		data: {id: id},
	})
	.done(function( msg )
	{
		bootbox.dialog({
			message: msg,
			title: "Detalles de afiliación",
			buttons: {
				success: {
				label: "Cambiar posición!",
				className: "btn-success",
				callback: function() {

					$.ajax({
							type: "POST",
							url: "/bo/comercial/cambia_posicion",
							data: $("#edita_posicion").serialize(),
						})
						.done(function( msg )
						{
							bootbox.dialog({
								message: msg,
								title: "Atención",
								buttons: {
									success: {
									label: "Cerrar!",
									className: "btn-success",
									callback: function() {
										//location.href="";
										}
									}
								}
							});
						});
					}
				},
				danger: {
				label: "Cerrar!",
				className: "btn-danger",
				callback: function() {
					}
				}
			}
		});
	});
}
    </script>