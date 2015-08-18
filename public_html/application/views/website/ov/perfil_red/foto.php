
            <!-- MAIN CONTENT -->
        <div id="content">
           <div class="row">
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                    <h1 class="page-title txt-color-blueDark">
                       	<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
				<span>
				> <a href="/ov/perfil_red/">Perfil</a>
				>
					Foto
				</span>
                    </h1>
                </div>
            </div>
                <section id="widget-grid" class="">

                    <!-- row -->
                    <div class="row">

                        <!-- NEW WIDGET START -->
                        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-6">

                            <!-- Widget ID (each widget will need unique ID)-->
                            <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false"
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
                                    <span class="widget-icon"> <i class="fa fa-comments"></i> </span>
                                    <h2>Tomar foto</h2>

                                </header>

                                <!-- widget div-->
                                <div>

                                    <!-- widget edit box -->
                                    <div class="jarviswidget-editbox">
                                        <!-- This area used as dropdown edit box -->
                                        <input class="form-control" type="text">
                                    </div>
                                    <!-- end widget edit box -->

                                    <!-- widget content -->
                                    <div class="widget-body">
                                    <div id="mensaje">
                                    </div>
                                        <div id='botonera'>
                                            <button class="btn btn-info" id='botonIniciar' type='button' >Iniciar  <li class="fa fa-play"></li></button>
                                            <button class="btn btn-warning" id='botonDetener' type='button' value = 'Detener'>Detener  <li class="fa fa-pause"></li></button>
                                            <button class="btn btn-success" id='botonFoto' type='button' value = 'Foto'>Capturar  <li class="fa fa-camera"></li></button>
                                        </div><br />
                                        <div class="contenedor">
                                            <div class="titulo">Cámara</div>
                                            <video id="camara" autoplay controls></video>
                                        </div>
                                        <div class="contenedor">
                                            <div class="titulo">Foto</div>
                                            <canvas id="foto" style="display:none" ></canvas>

                                          <form METHOD="POST" ENCTYPE="multipart/form-data" action="/ov/perfil_red/sube_foto_tomar/0" id="uploadPicture" name="picture">
                                          </form>

                                        </div>

                                    </div>
                                    <!-- end widget content -->

                                </div>
                                <!-- end widget div -->

                            </div>
                            <!-- end widget -->

                        </article>
                        <!-- WIDGET END -->

                        <!-- NEW WIDGET START -->
                        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-6">

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
                                    <span class="widget-icon"> <i class="fa fa-comments"></i> </span>
                                    <h2>Carga tu foto personal</h2>

                                </header>

                                <!-- widget div-->
                                <div>

                                    <!-- widget edit box -->
                                    <div class="jarviswidget-editbox">
                                        <!-- This area used as dropdown edit box -->
                                        <input class="form-control" type="text">
                                    </div>
                                    <!-- end widget edit box -->

                                    <!-- widget content -->
                                    <div class="widget-body">
                                        <form action="upload.php" class="dropzone dz-clickable" id="personal">
                                        <div class="dz-message">
                                        <br /><br /><br /><br /><br /><br />
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                        </div>
                                        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                            <h1>Arrastra tu imágen o da clic para cargarla</h1>
                                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                            </div><i class="fa fa-file-image-o fa-5x"></i>
                                        </div>
                                        </div></form>
                                    </div>
                                    <!-- end widget content -->

                                </div>
                                <!-- end widget div -->

                            </div>
                            <!-- end widget -->

                        </article>
                        <!-- WIDGET END -->

                        <!-- NEW WIDGET START
                        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-6">

                             Widget ID (each widget will need unique ID)
                            <div class="jarviswidget" id="wid-id-2">
                                widget options:
                                    usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                                    data-widget-colorbutton="false"
                                    data-widget-editbutton="false"
                                    data-widget-togglebutton="false"
                                    data-widget-deletebutton="false"
                                    data-widget-fullscreenbutton="false"
                                    data-widget-custombutton="false"
                                    data-widget-collapsed="true"
                                    data-widget-sortable="false"

                                <header>
                                    <span class="widget-icon"> <i class="fa fa-comments"></i> </span>
                                    <h2>Carga tu foto de fondo</h2>

                                </header>

                                 widget div
                                <div>

                                     widget edit box
                                    <div class="jarviswidget-editbox">
                                         This area used as dropdown edit box
                                        <input class="form-control" type="text">
                                    </div>
                                     end widget edit box

                                     widget content
                                    <div class="widget-body">
                                        <form action="upload.php" class="dropzone dz-clickable" id="fondo">
                                        <div class="dz-message">
                                        <br /><br /><br /><br /><br /><br />
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                        </div>
                                        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                            <h1>Arrastra tu imágen o da clic para cargarla</h1>
                                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                            </div><i class="fa fa-file-image-o fa-5x"></i>
                                        </div>
                                        </div></form>
                                    </div>
                                     end widget content

                                </div>
                                 end widget div

                            </div>
                             end widget
                        </article>
                         WIDGET END -->

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
        <!-- END MAIN PANEL -->
<style>
.titulo{ font-size: 12pt; font-weight: bold;}
#camara, #fotonavigator
{
    width: 100%;
    border: 1px solid #000;
}

</style>
<!-- PAGE RELATED PLUGIN(S) -->
<script src="/template/js/plugin/dropzone/dropzone.min.js"></script>
<script type="text/javascript">

// DO NOT REMOVE : GLOBAL FUNCTIONS!

$(document).ready(function() {

    pageSetUp();


    Dropzone.autoDiscover = false;
    $("#personal").dropzone({
        paramName: "foto",
        url: "/ov/perfil_red/sube_foto/0",
        addRemoveLinks : true,
        maxFilesize: 5,
        dictResponseError: 'Error uploading file!',
    });

    Dropzone.autoDiscover = false;
    $("#fondo").dropzone({
        paramName: "foto",
        url: "/ov/perfil_red/sube_foto/1",
        addRemoveLinks : true,
        maxFilesize: 5,
        dictResponseError: 'Error uploading file!',
    });


});

</script>
<script>

$(document).ready(function(){
//Nos aseguramos que estén definidas
//algunas funciones básicas
window.URL = window.URL || window.webkitURL;
navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia ||
function() {
    alert('Su navegador no soporta está aplicación.');
};

//Este objeto guardará algunos datos sobre la cámara
window.datosVideo = {
    'StreamVideo': null,
    'url': null
}

$('#botonIniciar').on('click', function(e) {

    //Pedimos al navegador que nos da acceso a
    //algún dispositivo de video (la webcam)
    navigator.getUserMedia({
        'audio': false,
        'video': true
    }, function(streamVideo) {
        datosVideo.StreamVideo = streamVideo;
        datosVideo.url = window.URL.createObjectURL(streamVideo);
        $('#camara').attr('src', datosVideo.url);

    }, function() {
        alert('No fue posible obtener acceso a la cámara.');
    });

});

$('#botonDetener').on('click', function(e) {

    if (datosVideo.StreamVideo) {
        datosVideo.StreamVideo.stop();
        window.URL.revokeObjectURL(datosVideo.url);
    }

});

    $('#botonFoto').on('click', function(e) {
    var oCamara, oFoto, oContexto, w, h;

    oCamara = $('#camara');
    oFoto = $('#foto');
    w = oCamara.width();
    h = oCamara.height();
    oFoto.attr({
        'width': w,
        'height': h
    });
    oContexto = oFoto[0].getContext('2d');
    oContexto.drawImage(oCamara[0], 0, 0, w, h);

    var canvas = document.getElementById('foto');
    var dataURL = canvas.toDataURL();

    $('#uploadPicture').html("<img id='picture' src='"+dataURL+"'></img><input style='display:none;' id='pictureToUpload' name='foto' value='"+dataURL+"' type='text'/></input>");

    $.ajax({
            type: "POST",
            url: "/ov/perfil_red/sube_foto_tomar/0",
            enctype: 'multipart/form-data',
            data: {
                foto: dataURL
            }
    }).done(function(msg)
		{
		
		if(msg == "1"){
			$("#mensaje").html('<div class="alert alert-success fade in">'+
	                '<button class="close" data-dismiss="alert">'+
	                '                 ×  '+
	                '</button>'+
	                '<i class="fa-fw fa fa-check"></i>'+
	                 '<strong>Felicitaciones !</strong> Se ha cambiado la foto de perfil.'+
	               '</div>')
			
		}else{
			$("#mensaje").html('<div class="alert alert-error fade in">'+
	                '<button class="close" data-dismiss="alert">'+
	                '                 ×  '+
	                '</button>'+
	                '<i class="fa-fw fa fa-check"></i>'+
	                 '<strong>Lo Lametamos !</strong>No se ha cambiado la foto de tu perfil.'+
	               '</div>')
		}
	});

});
});
</script>
