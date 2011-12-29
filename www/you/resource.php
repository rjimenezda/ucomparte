<?php 
	if(!isset($_GET['resid'])){
		echo "<script>location.href = 'index.php';</script>";
	}
?>
<script>

function set_meloapunto(data) {
	$("#melodesapunto").hide()
	$("#meloapunto").show()
}

function set_melodesapunto(data) {
	$("#meloapunto").hide()
	$("#melodesapunto").show()
}

function fillresource(data) {
	console.log(data);
	$("#nombre_recurso").text(data.nombre);
	$("#descripcion_recurso").text(data.descripcion);
	$("#tamano").text(data.tamano);
	$("#uploader").append($("<a>").attr("href", "index.php?content=profile&uid="+data.usuario_id).text(data.nombre_usuario + " " + data.apellidos))
	$("#meloapunto_count").text("Se lo han apuntado " + data.meloapuntos + " personas!")
	$("#download").attr("href", data.URL)
}

function get_comments() {
	// Cargar comentarios...
}

// Cargar información
$(function(){ 
$.post("../api/apuntado.php", { recurso_id : <?php echo $_GET['resid']; ?> }, function() {}).success(set_melodesapunto).error(set_meloapunto)
$.post("../api/getresource.php", { recurso_id : <?php echo $_GET['resid']; ?> }, function(){}, "json" ).success(fillresource)

// Eventosss
$("#meloapunto").click(function () {
	$.post("../api/meloapunto.php", { recurso_id : <?php echo $_GET['resid']; ?> }, function(){}, "json" ).success(set_melodesapunto)	
})
$("#melodesapunto").click(function () {
	$.post("../api/melodesapunto.php", { recurso_id : <?php echo $_GET['resid']; ?> }, function(){}, "json" ).success(set_meloapunto)
})
$("#comentar").click(function() {
	$.post("../api/commentresource.php", {recurso_id : <?php echo $_GET['resid']; ?>, contenido : $("#comentario").val() }, function(){}, "json").success(get_comments).error(function() {alert("ERROR POSTING!")})
})
});
// Cargar comentarios 
</script>
<div class="content">
	<div style="float:left; width:600px;margin-top:10px;border-bottom:1px solid #999; padding-bottom:10px;">
    	<img src="images/fileicons/default.png" />
    	<div id="nombre_recurso">Apuntes de proyectos</div>
    	<div id="descripcion_recurso">Descripcion...</div>
    	<div id="tamano">Ocupa...</div>
    	Subido por <span id="uploader"></span>
    	<div id="meloapunto_count"></div>
        <a id="download" href="">Descarga</a>
        <img id="meloapunto" src="images/me_lo_apunto.png" width="50px" alt="Me lo apunto!" title="Me lo apunto!" style="display:none"/>
        <img id="melodesapunto" src="images/me_lo_apunto.png" width="35px" alt="Me lo desapunto!" title="Me lo desapunto!" style="display:none" />
        <div id="comments">
        	</div>
            <input id="comentario" type="text" ></input><input id="comentar" type="button" value="comentar"></input>
    </div>
</div>