
               <!-- MAIN CONTENT -->
               <div id="content">

                    <div class="row">
                         <div class="col-xs-8 col-sm-7 col-md-7 col-lg-8">
                              <h1 class="page-title txt-color-blueDark">
                                   <a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
									<span>>
										<a href="/bo/comercial">Comercial</a>
									</span>
									<span>>
										<a href="/bo/comercial/red">Red</a>
									</span>
									<span>>
										<a href="/bo/comercial/red_tabla">Listar Afiliados</a>
									</span>
									<span>>
										<a href="/bo/comercial/tipos_de_red_genealogico?id_afiliado=<?php echo $id;?>">Selección de Red</a> > Arbol 1 <?php echo $nombre_red[0]->nombre;?>
									</span>
                              </h1>
                         </div>
                    </div>
                    <!-- widget grid -->
                    <section id="widget-grid" class="">
                    
                         <!-- row -->
                         <div class="row">
                              <!-- NEW WIDGET START -->
                              <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    
                                   <!-- Widget ID (each widget will need unique ID)-->
                                    <div class="jarviswidget jarviswidget-color-purity" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false">
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
                                             <span class="widget-icon"> <i class="fa fa-sitemap"></i> </span>
                                             <h2>Listado dinámico</h2>
                    
                                        </header>
                    
                                        <!-- widget div-->
                                        <div style="height: 35rem; overflow: auto;">
                    
                                             <!-- widget edit box -->
                                             <div class="jarviswidget-editbox">
                                                  <!-- This area used as dropdown edit box -->
                    
                                             </div>
                                             <!-- end widget edit box -->
                    
                                             <!-- widget content -->
                                             <div class="widget-body">
												
												<div id="myTabContent1" class="tab-content padding-10" >
												
													
														<div class="row" >
															<div class="tree1" style="width: 10000rem;">
																<ul>
																	<li>
																		<a style="background: url('<?=$img_perfil?>'); background-size: cover; background-position: center;" href="#"><div class="nombre">Tú</div></a>
																		<ul>
																		<?
																		$aux=0;
																		
																		foreach ($afiliadostree[$id_red] as $key) 
					                                                    {
					                                                    	$aux++;
					                                                    	$key->img ? $img=$key->img : $img="/template/img/empresario.jpg";
					                                                        if($key->debajo_de==$id)
					                                                        {?>
																			<li id="t<?=$key->id_afiliado?>">
																				<a class="quitar" style="background: url('<?=$img?>'); background-size: cover; background-position: center;" onclick="subtree(<?=$key->id_afiliado?>, <?php echo $id_red; ?>)" href="#"></a>
																				<div onclick="detalles(<?=$key->id_afiliado?>)" class="<?=($key->directo==0) ? 'todo' : 'todo1'?>"><?=$key->afiliado?> <?=$key->afiliado_p?><br />Detalles</div>
																			</li>
																			<?}
																		}
																		for ( $i = $aux ; $i < $red_frontales[0]->frontal ; $i++){ ?>
																			<li>
																				<a href="#">Sin afiliados</a>
																			</li>
																		<?} ?>
																		</ul>
																	</li>
																</ul>
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
                              <!-- WIDGET END -->
                         </div>
                         <!-- end row -->
                         <!-- row -->
                         <div class="row">         
	        <!-- a blank row to get started -->
					        <div class="col-sm-12">
					            <br />
					            <br />
					        </div>
				        </div> 
                         <!-- end row -->
                    </section>
                    <!-- end widget grid -->
               </div>
               <!-- END MAIN CONTENT -->
          </div>
          <!-- PAGE RELATED PLUGIN(S) -->
<style type="text/css">
	/*Now the CSS*/
* {margin: 0; padding: 0;}
.nombre{background: rgba(255,255,255,.3); width: 100px; margin-top: -5px; margin-left: -11px;}
.todo{font-size: 11px; width: 100%; background: rgba(0,0,0,.5); margin-top: -4px; color: #FFF; cursor: pointer;}
.todo1{font-size: 11px; width: 100%; background: rgba(70, 120, 250, .8); margin-top: -4px; color: #FFF; cursor: pointer;}
.todo:hover{font-size: 11px; text-decoration: underline; width: 100%; margin-top:-4px; background: rgba(0,0,0,.7); color: #FFF; cursor: pointer;}
.todo1:hover{font-size: 11px; text-decoration: underline; width: 100%; margin-top:-4px; background: rgba(70, 120, 250, 1); color: #FFF; cursor: pointer;}

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
				"autoWidth" : true	
			
		    });
		    /* END COLUMN FILTER */

          })
	function subred(id, red)
	{
		$("#"+id).children(".quitar").attr('onclick','');
		$.ajax({
			type: "POST",
			url: "/bo/usuarios/subred",
			data: {
				id: id,
				red: red
			},
		})
		.done(function( msg )
		{
			$("#"+id).append(msg);
		});
	}

	function subtree(id, red)
	{
		$("#t"+id).children(".quitar").attr('onclick','');
		$.ajax({
			type: "POST",
			url: "/bo/usuarios/subtree",
			data: {
					id: id,
				 	red: red 
				 },
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
		url: "/ov/perfil_red/detalle_usuario",
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
    </script>