<script type="text/javascript">
function fillusergroups(data){
		$("#group_list_placeholder").empty();
		if (data == null) {
			$("#group_list_placeholder").append("Este usuario no pertenece a ningún grupo");
			}
		else {
		$.each(data, function(i, grupo){
			$("#group_list_placeholder").append("<img src='images/icon_group.png' width='20' height='20' style='float:left;' />").append($("<a style='color:#999;'>").attr("href", "index.php?content=group_blackboard&id="+grupo.grupo_id).text(grupo.nombre)).append("<br style='clear:both;' />");
		})
		}
	}

$(function(){
	//Se hace la consulta para extraer el nombre completo
	$.post("../api/getusergrouplist.php", { usuario_id : <?php echo $_GET['uid']; ?> }, function(){}, "json" ).success(fillusergroups);
})
</script>
<div id="group_list_placeholder">
	<font style="color:#999; margin-top:2px">Cargando...</font><br />
</div>