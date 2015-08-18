						<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget" id="wid-id-2" data-widget-editbutton="false" data-widget-deletebutton="false">
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
								
				
								<!-- widget div-->
								<div>
				
									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
				
									</div>
									<!-- end widget edit box -->
				
									<!-- widget content -->
									<div class="widget-body fuelux">
				
										<div class="wizard">
											<ul class="steps form-wizard">
											<?php
												for($i = 0; $i < $_POST ['cantidad']; $i ++) {
													if ($i == 0) { ?>
														<li class="active" data-target="#step<?php echo ($i + 1); ?>">
															<span class="badge badge-info">1</span>Pregunta <?php echo ($i + 1); ?><span class="chevron"></span>
														</li>
													<?php } else { ?>
														<li data-target="#step<?php echo ($i + 1); ?>">
															<span class="badge badge-info"><?php echo ($i + 1); ?></span>Pregunta <?php echo ($i + 1); ?><span class="chevron"></span>
														</li>
													<?php }
												} ?>
											</ul>
										
											<div class="actions">
												<button type="button" class="btn btn-sm btn-primary btn-prev">
													<i class="fa fa-arrow-left"></i>Anterior
												</button>
												<button type="button" class="btn btn-sm btn-success btn-next" data-last="Crear Encuesta">
													Siguiente<i class="fa fa-arrow-right"></i>
												</button>
											</div>
										</div>
										<div class="step-content">
											<form id="wizard-1" novalidate="novalidate" class="smart-form">
												<?php for($k = 0; $k < $_POST ['cantidad']; $k ++) {
														if ($k == 0) { ?>
															<div class="step-pane active" id="step<?php echo ($k+1); ?>">
														<?php  } else { ?>
															<div class="step-pane" id="step<?php echo ($k+1); ?>">
														<?php } ?>
																<br>
																	<h3><strong>Pregunta <?php echo ($k+1); ?></strong></h3>
																	<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="sectpreg-<?php echo ($k + 1); ?>">
																		<label class="label">Pregunta</label>
																		<label class="input">
																			<input type="text" placeholder="Pregunta"  id="preg-<?php echo $k; ?>" required>
																		</label>
																		<?php for($j = 0; $j < 5; $j ++) { ?>
																			<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">
																				<label class="label">Opcion <?php echo ($j+1); ?></label>
																				<label class="input">
																					<input type="text" placeholder="Respuesta"  id="resp-<?php echo $k."-".$j; ?>" required>
																				</label>
																			</section>
																		<?php } ?>
																	</section>
																</div>
															<?php }	?>
													
											</form>
											
										</div>
										
									</div>
									<!-- end widget content -->
				
								</div>
								<!-- end widget div -->
				
							</div>
							<!-- end widget -->
				
	

<script src="/template/js/plugin/jquery-form/jquery-form.min.js"></script>
<script src="/template/js/validacion.js"></script>
<script src="/template/js/plugin/fuelux/wizard/wizard.min.js"></script>
<script>
	function insertar_encuesta()
	{
		
		<?php
		for($n = 0; $n < $_POST ['cantidad']; $n ++) {
			echo 'if($("#preg-' . $n . '").val()=="")
					{
						alert("La pregunta numero ' . ($n + 1) . ' no se ha definido");
						return;
					}';
		}
		echo 'var datos={';
		for($n = 0; $n < $_POST ['cantidad']; $n ++) {
			echo '' . $n . ':
									{
										pregunta:$("#preg-' . $n . '").val(),
										respuestas:
										{';
			for($m = 0; $m < 5; $m ++) {
				echo '' . $m . ':$("#resp-' . $n . '-' . $m . '").val(),';
			}
			echo '}
									},';
		}
		echo 'cantidad:' . $_POST ['cantidad'] . ',nombre:"' . $_POST ['nombre'] . '",desc:"' . $_POST ['descripcion'] . '"};';
		?>
		$.ajax({
			 data:{info:JSON.stringify(datos)},
	         type: "post",
	         url: "insertar_encuesta",
	         success: function(){
	        	 $.smallBox({
	       	      title: "Felicitaciones! La encuesta se a creado",
	       	      content: "<i class='fa fa-clock-o'></i> <i></i>",
	       	      color: "#5F895F",
	       	      iconSmall: "fa fa-check bounce animated",
	       	      timeout: 4000
	       	    });
	              window.location.href="listar";
	         }
		});
	
	}
</script>

<script type="text/javascript">

// DO NOT REMOVE : GLOBAL FUNCTIONS!

$(document).ready(function() {
	
	pageSetUp();
	
	

	//Bootstrap Wizard Validations

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
	    insertar_encuesta()
	    
	  });


})

</script>