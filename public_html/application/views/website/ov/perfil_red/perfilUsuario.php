
<!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
					<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
				<span>>
					Perfil
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
				<div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false"
          data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-sortable="false"
          data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false">
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
						<h2>   Perfil Usuario</h2>

					</header>

					<!-- widget div-->
					<div>

						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->

						</div>
						<!-- end widget edit box -->
						<!-- widget content -->
						<div class="widget-body no-padding smart-form">
                <fieldset>
									<legend> Editar Perfil</legend>
                  <div class="contenidoBotones">
										<div class="row">
											<div class="col-sm-1">
											</div>
											<div class="col-sm-3">
												<a href="/ov/perfil_red/perfil">
													<div class="minh well well-sm txt-color-white text-center link_dashboard primary botones">
														<i class="fa fa-user fa-4x"></i>
														<h1>Datos Personales</h1>
													</div>
												</a>
											</div>
											<div class="col-sm-3 link">
												<a href="/auth/change_password">
													<div class="minh well well-sm txt-color-white text-center link_dashboard primary botones">
														<i class="fa fa-unlock fa-4x"></i>
														<h1>Cambiar Contraseña</h1>
													</div>
												</a>
											</div>
											<div class="col-sm-3 link">
												<a href="/ov/perfil_red/foto">
													<div class="minh well well-sm txt-color-white text-center link_dashboard primary botones">
														<i class="fa fa-camera fa-4x"></i>
														<h1>Foto</h1>
													</div>
												</a>
											</div>
										 </div>
									</div>
								</fieldset>
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
<!-- PAGE RELATED PLUGIN(S) -->
<script src="/template/js/plugin/jquery-form/jquery-form.min.js"></script>
<script type="text/javascript">

// DO NOT REMOVE : GLOBAL FUNCTIONS!

$(document).ready(function() {

	pageSetUp();

	var $checkoutForm = $('#checkout-form').validate({
	// Rules for form validation
		rules : {
			nombre : {
				required : true
			},
			lname : {
				required : true
			},
			email : {
				required : true,
				email : true
			},
			phone : {
				required : true
			},
			country : {
				required : true
			},
			city : {
				required : true
			},
			code : {
				required : true,
				digits : true
			},
			address : {
				required : true
			},
			name : {
				required : true
			},
			card : {
				required : true,
				creditcard : true
			},
			cvv : {
				required : true,
				digits : true
			},
			month : {
				required : true
			},
			year : {
				required : true,
				digits : true
			}
		},

		// Messages for form validation
		messages : {
			fname : {
				required : 'Please enter your first name'
			},
			lname : {
				required : 'Please enter your last name'
			},
			email : {
				required : 'Please enter your email address',
				email : 'Please enter a VALID email address'
			},
			phone : {
				required : 'Please enter your phone number'
			},
			country : {
				required : 'Please select your country'
			},
			city : {
				required : 'Please enter your city'
			},
			code : {
				required : 'Please enter code',
				digits : 'Digits only please'
			},
			address : {
				required : 'Please enter your full address'
			},
			name : {
				required : 'Please enter name on your card'
			},
			card : {
				required : 'Please enter your card number'
			},
			cvv : {
				required : 'Enter CVV2',
				digits : 'Digits only'
			},
			month : {
				required : 'Select month'
			},
			year : {
				required : 'Enter year',
				digits : 'Digits only please'
			}
		},

		// Do not change code below
		errorPlacement : function(error, element) {
			error.insertAfter(element.parent());
		}
	});
})
function actualiza()
{
	$.ajax({
		type: "POST",
		url: "/ov/cabecera/actualizar",
		data: $('#checkout-form').serialize()
	})
	.done(function( msg ) {
	alert( "Datos actualizados: "+msg);
	location.href='';
	});
}
</script>
