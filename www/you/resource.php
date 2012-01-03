<?php 
	if(!isset($_GET['resid'])){
		echo "<script>location.href = 'index.php';</script>";
	}
?>
<script>

function get_profile_picture(uid) {
	imagepath = ""
	$.get("users_images/3.jpg").error(function() { imagepath = "users_images/default.png" }).success(function() { imagepath = "users_images/"+uid+".png" })
	return imagepath;
}

function set_meloapunto(data) {
	$("#melodesapunto").hide()
	$("#meloapunto").show()
}

function set_melodesapunto(data) {
	$("#meloapunto").hide()
	$("#melodesapunto").show()
}

function fillresource(data) {
	if (data == null) {
		location.href = 'index.php';
	}
	console.log(data);
	$("#nombre_recurso").text(data.nombre);
	$("#descripcion_recurso").text(data.descripcion);
	$("#tamano").text(data.tamano);
	$("#uploader").append($("<a style='color:#900;'>").attr("href", "index.php?content=profile&uid="+data.usuario_id).text(data.nombre_usuario + " " + data.apellidos))
	$("#meloapunto_count").text("Se lo han apuntado " + data.meloapuntos + " personas!")
	$("#download").attr("href", data.URL)
}

function fill_comments(data) {
	if (data != null) {
	$("#comments").empty();
	commentwidget = '<div style="float:left; width:595px; margin-top:15px; border-bottom:1px solid #999; padding-top: 10px;"><div style="float:left; width:23px;"><a href="#"><img src="profilepic.php?uid=%UID%" width="23px" height="23px" /></a></div><div style="float:left; margin-left:8px;padding-top:1px; width:469px;"><div style="float: left; width:469px"><a href="index.php?content=profile&uid=%UID%"><font style="color:#900; margin-left:10px;">%NAME%</font></a><font style="color:#999; margin-left:10px;">%DATE%</font> </div><div style="float:left; width:469px"><font style="color:#999; margin-left:10px;">%BODY%</font></div></div></div>';
	$.each(data, function(i, comment) {
		console.log(comment)
		content = commentwidget.replace("%UID%", comment.usuario_id)
		content = content.replace("%NAME%", comment.nombre + " " + comment.apellidos)
		content = content.replace("%DATE%", comment.fecha)
		content = content.replace("%BODY%", comment.contenido)
		$("#comments").append(content)
		});
	} else {
		$("#comments").append("Nadie ha comentado, sé el primero!!!");
	}
}

function get_comments() {
	$.post("../api/getresourcecomments.php", { recurso_id : <?php echo $_GET['resid']; ?> }, function(){}, "json" ).success(fill_comments)
}

// Cargar información
$(function(){ 
$.post("../api/apuntado.php", { recurso_id : <?php echo $_GET['resid']; ?> }, function() {}).success(set_melodesapunto).error(set_meloapunto)
$.post("../api/getresource.php", { recurso_id : <?php echo $_GET['resid']; ?> }, function(){}, "json" ).success(fillresource)
get_comments();
// Cargar comentarios

// Eventosss
$("#meloapunto").click(function () {
	$.post("../api/meloapunto.php", { recurso_id : <?php echo $_GET['resid']; ?> }, function(){}, "json" ).success(set_melodesapunto)	
})
$("#melodesapunto").click(function () {
	$.post("../api/melodesapunto.php", { recurso_id : <?php echo $_GET['resid']; ?> }, function(){}, "json" ).success(set_meloapunto)
})
$("#comentar").click(function() {
	$.post("../api/commentresource.php", {recurso_id : <?php echo $_GET['resid']; ?>, contenido : $("#comentario_input").val() }, function(){}, "json").success(get_comments).error(function() {alert("ERROR POSTING!")})
})
}); 
</script>
<div class="content">
	<div style="float:left; width:600px;margin-top:10px;border-bottom:1px solid #999; padding-bottom:10px;">
        <div style="float:left; width:256px; margin-left: 5px; margin-top: 5px;">
    	    <img src="images/fileicons/default.png" />
        </div>
    	<div id="nombre_recurso" style="float:left;font-weight:bold;margin-bottom:5px;margin-top: 5px; width:335px">Apuntes de proyectos</div>
    	<div id="descripcion_recurso" style="float:left;width:335px">Descripcion...</div>
    	<div id="tamano" style="float:left;font-size:10px;margin-bottom: 5px;width:335px">Ocupa...</div>
    	<div style="float:left;width:335px">Subido por <span id="uploader"></span></div>
    	<div id="meloapunto_count" style="float:left;margin-top: 5px;width:335px; margin-bottom:5px;"></div>
        <div style="float:left;width:335px">
            <div style="float:left;margin-top:2px;">
                <a id="download" href="">Descargar</a>
            </div>
            <div style="float:left; margin-left: 2px;">
                <img id="meloapunto" src="images/me_lo_apunto.png" width="50px" alt="Me lo apunto!" title="Me lo apunto!" style="display:none"/>
                <img id="melodesapunto" src="images/me_lo_desapunto.png" width="50px" alt="Me lo desapunto!" title="Me lo desapunto!" style="display:none" />
            </div>
        </div>
        <div id="comments" style="float:left; width:595px; margin-left:5px; margin-top:5px;">
        </div>
        <div style="float:left; width:595px; margin-left:5px; margin-top:5px;">
            <input id="comentario_input" class="masthead-search" type="text" style="width:500px" /><button id="comentar" class="button-primary" type="button" style="margin-left:15px; margin-top:3px;">Comentar</button>
        </div>
    </div>

</div>
