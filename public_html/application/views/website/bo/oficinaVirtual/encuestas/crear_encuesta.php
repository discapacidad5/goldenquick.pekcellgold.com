<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
				
				<!-- PAGE HEADER -->
				<i class="fa-fw fa fa-pencil-square-o"></i> 
					<a href="/bo/dashboard">Dashboard</a>
				<span>>
					<a href="/bo/comercial">Comercial</a>
				</span>
				<span>>
					<a href="/bo/comercial/oficina_virtual">Oficina Virtual</a>
				</span>
				<span>>
					Crear Encuesta
				</span>
			</h1>
		</div>
	</div>
	<section id="widget-grid" class="">
		<div class="row">
			<article class="col-sm-12 col-md-12 col-lg-12">
			
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false" data-widget-deletebutton="false">
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
									<span class="widget-icon"> <i class="fa fa-check"></i> </span>
									<h2>Preguntas </h2>
				
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
				
										<div class="row">
											<form id="wizard-1" novalidate="novalidate" class="smart-form">
												<div id="bootstrap-wizard-1" class="col-sm-12">
													<div class="form-bootstrapWizard">
														<ul class="bootstrapWizard form-wizard">
															<?php
															for($i=0;$i<$_GET['qty'];$i++)
															{
																if($i==0)
																{
																	echo '	<li class="active" data-target="#step'.($i+1).'">
																				<a href="#tab'.($i+1).'" data-toggle="tab"> <span class="step">'.($i+1).'</span> <span class="title">.</span> </a>
																			</li>';
																}
																else 
																{
																	echo '	<li data-target="#step'.($i+1).'">
																				<a href="#tab'.($i+1).'" data-toggle="tab"> <span class="step">'.($i+1).'</span> <span class="title">.</span> </a>
																			</li>';
																}
																		
															}?>
														</ul>
														<div class="clearfix"></div>
													</div>
													<div class="tab-content">
														<?php
														for($k=0;$k<$_GET['qty'];$k++)
														{
															if($k==0)
															{
																echo '		<div class="tab-pane active" id="tab'.($k+1).'">';
															}
															else
															{
																echo '		<div class="tab-pane" id="tab'.($k+1).'">';
															}
																	
																		echo '	<br>
																				<h3><strong>Pregunta '.($k+1).'</strong></h3>
																					<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="sectpreg-'.($k+1).'">
																						<label class="label">Nombre pregunta '.($k+1).'</label>
																						<label class="input">
																						<input type="text" placeholder="Pregunta"  id="preg-'.$k.'">
																						</label>';
																
																											
																					for($j=0;$j<5;$j++)
																					{
																						echo '<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">
																								<label class="label">Respuesta '.($j+1).'</label>
																								<label class="input">
																								<input type="text" placeholder="Respuesta"  id="resp-'.$k.'-'.$j.'">
																								</label>
																							</section>';
																					}
																					echo '</section>
																					</div>
																				';
														}
														?>
														
													</div>
												</div>
											</form>
											<div class="row">
												<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">
													<div class="col col-lg-8 col-md-8 col-sm-8 col-xs-8"></div>
													<div class="col col-lg-4 col-md-4 col-sm-4 col-xs-4">
														<a onclick="insertar_encuesta()" class="btn btn-success col-lg-12 col-md-12 col-sm-12 col-xs-12">Subir encuesta</a>
													</div>
												</section>
											</div>
										</div>
				
									</div>
									<!-- end widget content -->
				
								</div>
								<!-- end widget div -->
				
							</div>
				<!-- end widget -->
	
			</article>
		</div>
	</section>
</div>
<div class="row">         
	        <!-- a blank row to get started -->
    <div class="col-sm-12">
        <br />
        <br />
    </div>
</div>  
<!-- PAGE RELATED PLUGIN(S) -->
<script src="/template/js/plugin/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="/template/js/plugin/fuelux/wizard/wizard.min.js"></script>
<script>
	function insertar_encuesta()
	{
		
		<?php
			for($n=0;$n<$_GET['qty'];$n++)
			{
				echo 'if($("#preg-'.$n.'").val()=="")
					{
						alert("La pregunta numero '.($n+1).' no se ha definido");
						return;
					}';
			}	
			echo 'var datos={';
				for($n=0;$n<$_GET['qty'];$n++) 
				{
				echo 			''.$n.':
									{
										pregunta:$("#preg-'.$n.'").val(),
										respuestas:
										{';
											for($m=0;$m<5;$m++)
											{
												 echo 	''.$m.':$("#resp-'.$n.'-'.$m.'").val(),';
											}
									echo '}
									},';
					
				}
				echo 'qty:'.$_GET['qty'].',nombre:"'.$_GET['nombre'].'",desc:"'.$_GET['desc'].'"};';
		?>
		$.ajax({
			 data:{info:JSON.stringify(datos)},
	         type: "post",
	         url: "insertar_encuesta",
	         success: function(){
	              alert("La encuesta fue agregada con exito");
	              window.location.href="/bo/comercial/oficina_virtual";
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
	    $.smallBox({
	      title: "Congratulations! Your form was submitted",
	      content: "<i class='fa fa-clock-o'></i> <i>1 seconds ago...</i>",
	      color: "#5F895F",
	      iconSmall: "fa fa-check bounce animated",
	      timeout: 4000
	    });
	    
	  });


})

</script>