<script type="text/javascript">
function fillmygroups(data){
		$("#my_group_list_placeholder").empty();
		if (data == null) {
			}
		else {
		$.each(data, function(i, grupo){
			$("#my_group_list_placeholder").append("<img src='images/icon_group.png' width='20' height='20' style='float:left;' />").append($("<a style='color:#999; padding-left:3px;'>").attr("href", "index.php?content=group_blackboard&gid="+grupo.grupo_id).text(grupo.nombre)).append("<br style='clear:both;' />");
		})
		}
	}

$(function(){
	//Se hace la consulta para extraer el nombre completo
	$.post("../api/getusergrouplist.php", { usuario_id : <?php echo $_SESSION['usuario_id']; ?> }, function(){}, "json" ).success(fillmygroups);
})
</script>
<div id="my_group_list_placeholder">
	<font style="color:#999; margin-top:2px">Cargando...</font><br />
</div>
