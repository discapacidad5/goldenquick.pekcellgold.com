
			<!-- MAIN CONTENT -->
			<div id="content">

				<div class="row">
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
						<h1 class="page-title txt-color-blueDark">
							
							<!-- PAGE HEADER -->
							 
								<a class="backHome" href="/ov/dashboard"> <i class="fa-fw fa fa-home"></i> Menu</a> 
							<span>>
								<a href="/ov/escuela_negocios/eventos"> Eventos</a> > Ver
							</span>
						</h1>
					</div>
				</div>
				<!-- row -->
				<div class="row">
					
					
					
					<div class="col-sm-12 col-md-12 col-lg-12">
				
						<!-- new widget -->
						<div class="jarviswidget jarviswidget-color-blueDark">
				
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
								<span class="widget-icon"> <i class="fa fa-calendar"></i> </span>
								<h2> Mis eventos </h2>
								<div class="widget-toolbar">
									<!-- add: non-hidden - to disable auto hide -->
									<div class="btn-group">
										<button class="btn dropdown-toggle btn-xs btn-default" data-toggle="dropdown">
											Mostrando <i class="fa fa-caret-down"></i>
										</button>
										<ul class="dropdown-menu js-status-update pull-right">
											<li>
												<a href="javascript:void(0);" id="mt">Mes</a>
											</li>
											<li>
												<a href="javascript:void(0);" id="ag">Agenda</a>
											</li>
											<li>
												<a href="javascript:void(0);" id="td">Hoy</a>
											</li>
										</ul>
									</div>
								</div>
							</header>
				
							<!-- widget div-->
							<div>
				
								<div class="widget-body no-padding">
									<!-- content goes here -->
									<div class="widget-body-toolbar">
				
										<div id="calendar-buttons">
				
											<div class="btn-group">
												<a href="javascript:void(0)" class="btn btn-default btn-xs" id="btn-prev"><i class="fa fa-chevron-left"></i></a>
												<a href="javascript:void(0)" class="btn btn-default btn-xs" id="btn-next"><i class="fa fa-chevron-right"></i></a>
											</div>
										</div>
									</div>
									<div id="calendar"></div>
				
									<!-- end content -->
								</div>
				
							</div>
							<!-- end widget div -->
						</div>
						<!-- end widget -->
				
					</div>
				
				</div>
				
				<!-- end row -->

			</div>
			<!-- END MAIN CONTENT -->
		<div class="row">         
         <!-- a blank row to get started -->
	    	<div class="col-sm-12">
	        	<br />
	        	<br />
	        </div>
        </div>
		

		<!-- PAGE RELATED PLUGIN(S) -->
		<script src="/template/js/plugin/fullcalendar/jquery.fullcalendar.min.js"></script>
		<script>
			function ver_evento(id)
			{
				$.ajax({
					data: "id="+id,
					type: "post",
					url: "get_info_evento"
				})
				.done(function(msg){
					
					bootbox.dialog({
						message: msg,
						title: "Información del Evento",
						buttons: {
							success: {
								label: "Aceptar",
								className: "btn-success",
								callback: function() {
									  
								}
							}							
						}
					});
					google.maps.event.addDomListener(window, 'load', initialize);
				});
			}
		</script>		

		<script type="text/javascript">
		
		// DO NOT REMOVE : GLOBAL FUNCTIONS!
		
		$(document).ready(function() {
			
			pageSetUp();
			

			  "use strict";
			
			    var date = new Date();
			    var d = date.getDate();
			    var m = date.getMonth();
			    var y = date.getFullYear();
			
			    var hdr = {
			        left: 'title',
			        center: 'month,agendaWeek,agendaDay',
			        right: 'prev,today,next'
			    };
			
			    
			
			    
			    /* initialize the external events

			    /* initialize the calendar
				 -----------------------------------------------------------------*/
			
			    $('#calendar').fullCalendar({
			
			        header: hdr,
			        buttonText: {
			            prev: '<i class="fa fa-chevron-left"></i>',
			            next: '<i class="fa fa-chevron-right"></i>'
			        },
			
			      
			      
			        
			
			        select: function (start, end, allDay) {
			            var title = prompt('Event Title:');
			            if (title) {
			                calendar.fullCalendar('renderEvent', {
			                        title: title,
			                        start: start,
			                        end: end,
			                        allDay: allDay
			                    }, true // make the event "stick"
			                );
			            }
			            calendar.fullCalendar('unselect');
			        },
			
			        events: [
			        <?php for($i=0;$i<sizeof($eventos);$i++)
						{
						switch($eventos[$i]->color)
						{
							case 1:
								$color="bg-color-darken";
								break;
							case 2:
								$color="bg-color-blue";
								break;
							case 3:
								$color="bg-color-orange";
								break;
							case 6:
								$color="bg-color-red";
								break;
							case 4:
								$color="bg-color-greenLight";
								break;
							case 5:
								$color="bg-color-blueLight";
								break;
						}
						switch($eventos[$i]->tipo)
						{
							case 1:
								$icono="fa-info";
								break;
							case 5:
								$icono="fa-lock";
								break;
							case 2:
								$icono="fa-warning";
								break;
							case 4:
								$icono="fa-user";
								break;
							case 3:
								$icono="fa-check";
								break;
							case 6:
								$icono="fa-clock-o";
								break;
						}
			        	echo 
			        	"{
			        		title: '".$eventos[$i]->nombre."',
				            start: new Date(".substr($eventos[$i]->inicio,0,-15).", ".(substr($eventos[$i]->inicio,5,-12)-1).", ".substr($eventos[$i]->inicio,8,-9).", ".(substr($eventos[$i]->inicio,11,-6)*1).", ".(substr($eventos[$i]->inicio,14,-3)*1)."),
				            end: new Date(".substr($eventos[$i]->fin,0,-15).", ".(substr($eventos[$i]->inicio,5,-12)-1).", ".substr($eventos[$i]->fin,8,-9).", ".(substr($eventos[$i]->fin,11,-6)*1).", ".(substr($eventos[$i]->fin,14,-3)*1)."),
				            description: '".$eventos[$i]->descripcion."<br><h1><a onclick=\"ver_evento(\'".$eventos[$i]->id."\');\">Ver</a></h1>',
				            className: ['event', '".$color."'],
				            icon: '".$icono."'
			        	},";
			        	}
			        ?>
			        ],
			
			        eventRender: function (event, element, icon) {
			            if (!event.description == "") {
			                element.find('.fc-event-title').append("<br/><span class='ultra-light'>" + event.description +
			                    "</span>");
			            }
			            if (!event.icon == "") {
			                element.find('.fc-event-title').append("<i class='air air-top-right fa " + event.icon +
			                    " '></i>");
			            }
			        },
			
			        windowResize: function (event, ui) {
			            $('#calendar').fullCalendar('render');
			        }
			    });
			
			    /* hide default buttons */
			    $('.fc-header-right, .fc-header-center').hide();

			
				$('#calendar-buttons #btn-prev').click(function () {
				    $('.fc-button-prev').click();
				    return false;
				});
				
				$('#calendar-buttons #btn-next').click(function () {
				    $('.fc-button-next').click();
				    return false;
				});
				
				$('#calendar-buttons #btn-today').click(function () {
				    $('.fc-button-today').click();
				    return false;
				});
				
				$('#mt').click(function () {
				    $('#calendar').fullCalendar('changeView', 'month');
				});
				
				$('#ag').click(function () {
				    $('#calendar').fullCalendar('changeView', 'agendaWeek');
				});
				
				$('#td').click(function () {
				    $('#calendar').fullCalendar('changeView', 'agendaDay');
				});			
		
		})

		</script>