
<!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
					<a class="backHome" href="/ov"><i class="fa fa-home"></i> Menu</a> 
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
				<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false">
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
						<h2>Datos personales</h2>

					</header>

					<!-- widget div-->
					<div>

						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->

						</div>
						<!-- end widget edit box -->
						<!-- widget content -->
						<div class="widget-body no-padding">

							<form method="POST" action="/perfil_red/actualizar" id="checkout-form" class="smart-form" novalidate="novalidate">
								<fieldset>
									<legend>Oficina virtual</legend>
									<div class="row">
										<section class="col col-3">
											<label class="input">
												Color de fondo
												<input type="color" name="bg_color" value="<?=$style[0]->bg_color?>">
											</label>
										</section>
										<section class="col col-3">
											<label class="input">
												Color de botones primarios
												<input type="color" name="color_1" value="<?=$style[0]->btn_1_color?>">
											</label>
										</section>
										<section class="col col-3">
											<label class="input">
												Color de botones secundarios
												<input type="color" name="color_2" value="<?=$style[0]->btn_2_color?>">
											</label>
										</section>
									</div>
								</fieldset>
								<footer>
									<button type="button" onclick="actualiza()" class="btn btn-primary">
										Actualizar
									</button>
								</footer>
							</form>

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
		url: "/index.php/ov/cabecera/actualizar",
		data: $('#checkout-form').serialize()
	})
	.done(function( msg ) {
	location.href='';
	});
}
</script>
