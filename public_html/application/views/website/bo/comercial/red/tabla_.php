 <div id="content">
	 <div class="row">
						<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
						<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
							<span>>
								<a href="/bo/comercial">Comercial</a> > <a href="/bo/comercial/red">Red</a>
								> Listado Consecutivo
							</span>
			</h1>
						</div>
	</div>
	
	<?php if($this->session->flashdata('error')) {
		echo '<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-check"></i>
								<strong>Error </strong> '.$this->session->flashdata('error').'
			</div>'; 
	}
?>		
	<section id="widget-grid" class="">
	  <div id="myTabContent1" class="tab-content padding-10" style="margin-bottom: 6rem;">
		<div class="row">
			<!-- NEW COL START -->
			<article class="col-sm-12 col-md-12 col-lg-12">
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false" data-widget-colorbutton="false"	>
					<header>
						<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
						<h2>Listar Consecutivo</h2>				
						
					</header>

					<!-- widget div-->
					<div>
			<div class="row col-xs-12 col-md-12 col-sm-12 col-lg-12 pull-right">
				
				<div class="col-xs-0 col-md-6 col-sm-0 col-lg-5">
					
				</div>
				
				<div class="col-xs-4 col-md-1 col-sm-2 col-lg-1">
				<center>	
					<a title="Bloquear" style="cursor: pointer;" class="txt-color-gray"><i class="fa fa-unlock fa-3x"></i></a>
					<br>Bloquear
					</center>
				</div>
				<div class="col-xs-4 col-md-1 col-sm-2 col-lg-1">
					<center>
						<a title="Desbloquear" style="cursor: pointer;" class="txt-color-gray"><i class="fa fa-lock fa-3x"></i></a>
						<br>Desbloquear
					</center>
				</div>
				
				<div class="col-xs-4 col-md-1 col-sm-2 col-lg-1">
					<center>
					<a title="Editar" style="cursor: pointer;" class="txt-color-blue"><i class="fa fa-pencil fa-3x"></i></a>
					<br>Editar
					</center>
				</div>
				
				<div class="col-xs-4 col-md-1 col-sm-2 col-lg-1">
					<center>
					<a title="Sustituir" style="cursor: pointer;" class="txt-color-green"><i class="fa fa-exchange fa-3x"></i></a>
					<br>Sustituir
					</center>
				</div>
				
				<div class="col-xs-4 col-md-1 col-sm-2 col-lg-1">
					<center>
						<a title="Genealogico" style="cursor: pointer;" class="txt-color-gray"><i class="fa fa-sitemap fa-3x"></i></a>
						<br>Genealogico
					</center>
				</div>
				
				<div class="col-xs-4 col-md-1 col-sm-2 col-lg-1">
					<center>
						<a title="Arbol 1" style="cursor: pointer;" class="txt-color-red"><i class="fa fa-sitemap fa-3x"></i></a>
						<br>Arbol 1
					</center>
				</div>
				
				<div class="col-xs-4 col-md-1 col-sm-2 col-lg-1">
					<center>
						<a title="Arbol 2" style="cursor: pointer;" class="txt-color-green"><i class="fa fa-sitemap fa-3x"></i></a>
						<br>Arbol 2
					</center>
				</div>
				
			</div>
			<form name="formulario" action="/bo/comercial/actualizar_tabla" method="post" class="smart-form">
			
			<div class="row col-xs-11 col-md-4 col-sm-4 col-lg-2 smart-form" style="padding-left: 6.8%;">
			<br>
				<br>
			
					<section style="width: 100%;">
						Campos de Busqueda
						<label class="select"> 
							<select name="campos_de_busqueda" id="campos_de_busqueda" onChange="Activar_Casilla()">
								<option value='---'> ---
								<option value='id_buscado_option'> Id
								<option value='nombre_buscado_option'> Nombre o Apellido
								<option value='apellido_buscado_option'> Apellido
								<option value='username_buscado_option'> Username
								<option value='email_buscado_option'> e-mail
							</select>
						</label>
					</section>
					
					<section class="col col-6" style="display: none;">
					<input class="hide"  name = "id_red" id = "id_red" value='<?= $id_red?>'>
				</section>
				<br>
			</div>
			
			<div class="row col-xs-12 col-md-12 col-sm-12 col-lg-12">
				
				<section  style="width: 100%; padding-left: 1%;" >
				
					<label class="input col col-xs-12 col-sm-6 col-md-6 col-lg-2">Id 
						<input class="form-control" name="id_buscado" id="id_buscado" type="text" disabled>
					</label>
				
					<label class="input col col-xs-12 col-sm-6 col-md-6 col-lg-2">Nombre o Apellido
						<input class="form-control" name="nombre_buscado" id="nombre_buscado" type="text" disabled="disabled">
					</label>
				
						<label class="input col col-xs-12 col-sm-6 col-md-6 col-lg-2">Apellido 
						<input class="form-control" name="apellido_buscado" id="apellido_buscado" type="text" disabled="disabled">
					</label>
				
						<label class="input col col-xs-12 col-sm-6 col-md-6 col-lg-2">Username 
						<input class="form-control" name="username_buscado" id="username_buscado" type="text" disabled="disabled">
					</label>
				
						<label  class="input col col-xs-12 col-sm-6 col-md-6 col-lg-2">e-mail
						<input class="form-control" name="email_buscado" id="email_buscado" type="text" disabled="disabled">
					</label>
					
				<label  class="input col col-xs-12 col-md-12">
					</label>
					<button type="submit" class="hide" style="margin-right: 4.5%;" id="buscar" disabled="disabled">Buscar</button>
					
				</section>
				
				
			</div>
			<br>
			
			</form>
			<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
				<thead>
					<tr>
						<th>ID</th>
		                <th data-class="expand">Imagen</th>
		                <th data-hide="phone">Usuario</th>
			            <th data-hide="phone,tablet">Nombre</th>
			            <th data-hide="phone,tablet">Apellido</th>
				        <th data-hide="phone,tablet">e-mail</th>
				        <th data-hide="phone">Tipo usuario</th>
				        <th>Accion</th>
			        </tr>
			    </thead>
			    <tbody>
				     <?foreach ($afiliados as $afiliado) {
				          									        	?>
				      <tr>
				        <td><?php echo $afiliado->id;?></td>
				        
				       <? 
				       $afiliados_imagen="/template/img/empresario.jpg";
				       foreach ($image as $img) {
				       	   if($img->id_user==$afiliado->id){
								$cadena=explode(".", $img->img);
								if($cadena[0]=="user")
								{
									$afiliados_imagen=$img->url;
								}
				       	   }
						}?>
				        
		                <td><img style="width: 10rem; height: 10rem;" src="<?php echo $afiliados_imagen?>"></img></td>
		                <td><?php echo $afiliado->username?></td>
			            <td><?php echo $afiliado->nombre?></td>
			            <td><?php echo $afiliado->apellido?></td>
				        <td><?php echo $afiliado->email?></td>
				        <td><?php echo $afiliado->descripcion?></td>
				        <td>
				        	
				        	<?if($afiliado->estatus=='Desactivado'){?>
				        	<a title="Desbloquear" style='cursor: pointer;' onclick="estado_afiliado(1,<?=$afiliado->id?>)" class="txt-color-gray"><i class="fa fa-lock fa-3x"></i></a>
							<?}else{?>
							<a title="Bloquear" style='cursor: pointer;' onclick="estado_afiliado(2,<?=$afiliado->id?>)" class="txt-color-gray"><i class="fa fa-unlock fa-3x"></i></a>
							<?}?>
							
					        <a title="Editar" style='cursor: pointer;' onclick="modificar_afiliado(<?php echo $afiliado->id;?>)" class="txt-color-blue"><i class="fa fa-pencil fa-3x"></i></a>
					        <a title="Sustituir" style='cursor: pointer;' onclick="sustituir_afiliado(<?php echo $afiliado->id;?>)" class="txt-color-green"><i class="fa fa-exchange fa-3x"></i></a>
					        <a title="Genealogico" style='cursor: pointer;' href="/bo/comercial/tipos_de_red_grafico_1?id_afiliado=<?php echo $afiliado->id;?>" class="txt-color-gray"><i class="fa fa-sitemap fa-3x"></i></a>
					        <a title="Arbol 1" style='cursor: pointer;' href="/bo/comercial/tipos_de_red_genealogico?id_afiliado=<?php echo $afiliado->id;?>" class="txt-color-red"><i class="fa fa-sitemap fa-3x"></i></a>
					        <a title="Arbol 2" style='cursor: pointer;' href="/bo/comercial/tipos_de_red_grafico_2?id_afiliado=<?php echo $afiliado->id;?>" class="txt-color-green"><i class="fa fa-sitemap fa-3x"></i></a>
						</td>
				        
				    </tr>
				 <?} ?>
			</tbody>
			</table>
	</div>
	</div>
	</article>
	</div>
	</div>
	</section>
</div>
<script src="/template/js/plugin/morris/raphael.min.js"></script>
		<script src="/template/js/plugin/morris/morris.min.js"></script>

		<script src="/template/js/plugin/datatables/jquery.dataTables.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.colVis.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.tableTools.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
		<script src="/template/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>

<script type="text/javascript">

var responsiveHelper_dt_basic = undefined;
			          									        	
function modificar_afiliado(id_afiliado)
{
		
$.ajax({
	type: "POST",
	url: "/bo/comercial/get_detalle_usuario",
	data: {id:id_afiliado},
})
.done(function( msg )
{
	bootbox.dialog({
	message: msg,
	title: 'Modificar Afiliado',
})//fin done ajax
});//Fin callback bootbox
}

function sustituir_afiliado(id_afiliado)
{
		
$.ajax({
	type: "POST",
	url: "/bo/comercial/get_formulario_usuario",
	data: {id:id_afiliado},
})
.done(function( msg )
{
	bootbox.dialog({
	message: msg,
	title: 'Modificar Afiliado',
})//fin done ajax
});//Fin callback bootbox
}

function estado_afiliado(estatus, id_afiliado)
{
		
$.ajax({
	type: "POST",
	url: "/bo/comercial/cambiar_estado_afiliado",
	data: {id:id_afiliado, 
		estatus: estatus
	},
})
.done(function( msg )
{
	//location.href = "/bo/comercial/red_tabla";
	bootbox.dialog({
	  message: "La modificación del estado en el afiliado ha sido exitosa.",
	  title: "Cambiar estado del afiliado",
	  buttons: {
	    success: {
	      label: "Ok",
	      className: "btn-success",
	      callback: function() {
	    	  location.href="/bo/comercial/red_tabla?id_red="+<?=$id_red?>+"";
	      }
	    }
	  }
	})
});//Fin callback bootbox
}

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
    $("div.toolbar").html('<div class="text-right"><img src="img/logo.png" alt="SmartAdmin" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');
    	   
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
            "sSwfPath": "js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
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
	
	/* END TABLETOOLS */

})

function Activar_Casilla(){
	var campos_de_busqueda = $("#campos_de_busqueda").val();
	 
	 document.formulario.id_buscado.disabled = true;
	 document.formulario.id_buscado.value = '';
	 document.formulario.nombre_buscado.disabled = true;
	 document.formulario.nombre_buscado.value = '';
	 document.formulario.apellido_buscado.disabled = true;
	 document.formulario.apellido_buscado.value = '';
	 document.formulario.username_buscado.disabled = true;
	 document.formulario.username_buscado.value = '';
	 document.formulario.email_buscado.disabled = true;
	 document.formulario.email_buscado.value = '';
	 document.formulario.buscar.disabled = true;

	if(campos_de_busqueda == "---"){
			document.formulario.buscar.disabled = true;
	}
	else if(campos_de_busqueda == "id_buscado_option"){
		document.formulario.id_buscado.disabled=false;
		document.formulario.buscar.disabled = false;
	}
	else if(campos_de_busqueda == "nombre_buscado_option"){
		document.formulario.nombre_buscado.disabled=false;
		document.formulario.buscar.disabled = false;
	}
	else if(campos_de_busqueda == "apellido_buscado_option"){
		document.formulario.apellido_buscado.disabled=false;
		document.formulario.buscar.disabled = false;
	}
	else if(campos_de_busqueda == "username_buscado_option"){
		document.formulario.username_buscado.disabled=false;
		document.formulario.buscar.disabled = false;
	}
	else if(campos_de_busqueda == "email_buscado_option"){
		document.formulario.email_buscado.disabled=false;
		document.formulario.buscar.disabled = false;
	}	
}

function Actualizar_Tabla(){
	
	var id_red = $("#id_red").val();
	var id_buscado = $("#id_buscado").val();
	var nombre_buscado = $("#nombre_buscado").val();
	var apellido_buscado = $("#apellido_buscado").val();
	var username_buscado = $("#username_buscado").val();
	var email_buscado = $("#email_buscado").val();
	
	if(document.formulario.id_buscado.disabled==true){id_buscado = '';}
	if(document.formulario.nombre_buscado.disabled==true){nombre_buscado = '';}
	if(document.formulario.apellido_buscado.disabled==true){apellido_buscado = '';}
	if(document.formulario.username_buscado.disabled==true){username_buscado = '';}
	if(document.formulario.email_buscado.disabled==true){email_buscado = '';}
	
	if(nombre_buscado.length <= 3 && document.formulario.nombre_buscado.disabled==false){
		alert("el nombre debe contener al menos 4 letras");
	}
	else if(apellido_buscado.length <= 3 && document.formulario.apellido_buscado.disabled==false){
		alert("el apellido debe contener al menos 4 letras");
	}
	else if(username_buscado.length <= 3 && document.formulario.username_buscado.disabled==false){
		alert("el username debe contener al menos 4 letras");
	}
	else if(email_buscado.length <= 9 && document.formulario.email_buscado.disabled==false){
		alert("el email debe contener al menos 10 letras");
	}

}
</script>