<?php session_start();
$_SESSION['usuario_id'] = 1; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script>

function bind_events() {
	// CSS is for pussies
	$("textarea").each(function(){ this.style.width = "100%"; this.style.height = "100px"; this.style.marginBottom = "15px"; } )
	
	$("#getuserinfo_btn").click(function (){
		console.log("Sacando info de usuario")
		$.post("api/getuserinfo.php", { usuario_id : 1 }, function(data) { $("#getuserinfo_txt")[0].value = data } )
	})
	
	$("#getresource_btn").click(function (){
		console.log("Sacando info de recurso")
		$.post("api/getresource.php", { recurso_id : 1 }, function(data) { $("#getresource_txt")[0].value = data } )
	})
	
	$("#getgroupdetails_btn").click(function (){
		console.log("Sacando info de grupo")
		$.post("api/getgroupdetails.php", { grupo_id : 1 }, function(data) { $("#getgroupdetails_txt")[0].value = data } )
	})
	
	$("#getgrouppost_btn").click(function (){
		console.log("Sacando post de grupo")
		$.post("api/getgrouppost.php", { publicacion_id : 1 }, function(data) { $("#getgrouppost_txt")[0].value = data } )
	})
	
	$("#getgroupposts_btn").click(function (){
		console.log("Sacando posts de grupo")
		$.post("api/getgroupposts.php", { grupo_id : 1 }, function(data) { $("#getgroupposts_txt")[0].value = data } )
	})
	
	$("#getusergroups_btn").click(function (){
		console.log("Sacando grupos de usuario")
		$.post("api/getusergroups.php", { usuario_id : 1 }, function(data) { $("#getusergroups_txt")[0].value = data } )
	})
	
	$("#getusergrouplist_btn").click(function (){
		console.log("Sacando lista grupos de usuario (con nombre e id)")
		$.post("api/getusergrouplist.php", { usuario_id : 1 }, function(data) { $("#getusergrouplist_txt")[0].value = data } )
	})
	
	$("#getmeloapuntos_btn").click(function (){
		console.log("Sacando me lo apuntos de usuario")
		$.post("api/getmeloapuntos.php", { usuario_id : 1 }, function(data) { $("#getmeloapuntos_txt")[0].value = data } )
	})
	
	$("#getsubjecteresources_btn").click(function (){
		console.log("Sacando recursos de asignatura")
		$.post("api/getsubjectresources.php", { asignatura_id : 1 }, function(data) { $("#getsubjecteresources_txt")[0].value = data } )
	})
	
	$("#getresourcecomments_btn").click(function (){
		console.log("Sacando comentarios de recursos")
		$.post("api/getresourcecomments.php", { recurso_id : 1 }, function(data) { $("#getresourcecomments_txt")[0].value = data } )
	})
	
	$("#getdegrees_btn").click(function (){
		console.log("Sacando titulaciones")
		$.post("api/getdegrees.php", function(data) { $("#getdegrees_txt")[0].value = data } )
	})
	
	$("#getsubjects_btn").click(function (){
		console.log("Sacando asignaturas de titulación")
		$.post("api/getsubjects.php", { titulacion_id : 1 }, function(data) { $("#getsubjects_txt")[0].value = data } )
	})
	
	// Inserciones
	
	$("#commentgroup_btn").click(function (){
		console.log("Insertando comentario")
		pub_id = $("#commentgroupid_txt")[0].value
		content = $("#commentgrouptxt_txt")[0].value
		usuario_id = $("#commentgroupuid_txt")[0].value
		$.post("api/commentgrouppost.php", { usuario_id : 1, publicacion_id : pub_id, contenido : content  }, function(data) { $("#commentgroup_area")[0].value = data } )
	})
	
	$("#groupsign_btn").click(function (){
		console.log("Apuntando usuario a grupo")
		group_id = $("#groupsigngid_txt")[0].value
		usuario_id = $("#groupsignuid_txt")[0].value
		$.post("api/groupsign.php", { usuario_id : 1, grupo_id : group_id  }, function(data) { $("#groupsign_area")[0].value = data } )
	})
	
}

$(document).ready(bind_events)

</script>
<title>Pruebas API</title>
</head>
<body>
<h2>Consulta</h2>
<input type="button" value="getuserinfo" id="getuserinfo_btn"/><br />
<textarea id="getuserinfo_txt" ></textarea><br />

<input type="button" value="getresource" id="getresource_btn"/><br />
<textarea id="getresource_txt" ></textarea><br />

<input type="button" value="getgroupdetails" id="getgroupdetails_btn"/><br />
<textarea id="getgroupdetails_txt" ></textarea><br />

<input type="button" value="getgrouppost" id="getgrouppost_btn"/><br />
<textarea id="getgrouppost_txt" ></textarea><br />

<input type="button" value="getgroupposts" id="getgroupposts_btn"/><br />
<textarea id="getgroupposts_txt" ></textarea><br />
	
<input type="button" value="getusergroups" id="getusergroups_btn"/><br />
<textarea id="getusergroups_txt" ></textarea><br />

<input type="button" value="getusergrouplist" id="getusergrouplist_btn"/><br />
<textarea id="getusergrouplist_txt" ></textarea><br />

<input type="button" value="getmeloapuntos" id="getmeloapuntos_btn"/><br />
<textarea id="getmeloapuntos_txt" ></textarea><br />

<input type="button" value="getsubjecteresources" id="getsubjecteresources_btn"/><br />
<textarea id="getsubjecteresources_txt" ></textarea><br />

<input type="button" value="getresourcecomments" id="getresourcecomments_btn"/><br />
<textarea id="getresourcecomments_txt" ></textarea><br />

<input type="button" value="getdegrees" id="getdegrees_btn"/><br />
<textarea id="getdegrees_txt" ></textarea><br />

<input type="button" value="getsubjects" id="getsubjects_btn"/><br />
<textarea id="getsubjects_txt" ></textarea><br />

<h2>Inserción</h2>
Publicacion ID => <input type="text" value="1" id="commentgroupid_txt"/><br />
Usuario => <input type="text" value="1" id="commentgroupuid_txt"/><br />
Comentario => <input type="text" value="Como mola mi gramola" id="commentgrouptxt_txt"/><br />
<input type="button" value="commentgroup" id="commentgroup_btn"/><br />
<textarea id="commentgroup_area" ></textarea><br />

Grupo ID => <input type="text" value="1" id="groupsigngid_txt"/><br />
Usuario => <input type="text" value="1" id="groupsignuid_txt"/><br />
<input type="button" value="groupsign" id="groupsign_btn"/><br />
<textarea id="groupsign_area" ></textarea><br />

</body>
</html>
