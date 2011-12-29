<script type="text/javascript">
$(function(){
	//Se hace la consulta para extraer el nombre completo
	$.post("../api/getuserinfo.php", { usuario_id : <?php echo $_SESSION['usuario_id']; ?> }, function(data) { $("#nombreCompleto").text( data.nombre + " " +  data.apellidos ); console.log(data)}, "json" )

	$.post("../api/searchgroups.php", { patron_busqueda : <?php echo '"'.$_POST['searchQuery'].'"'; ?> }, function(){}, "json" ).success(searchGroups);
	//Funcion para mostrar los enlaces a los grupos resultados de la busqueda
	function searchGroups(data){
	console.log(data)
		$("#group_result").empty();
		if(data != null) {
		$.each(data, function(i, grupo){
			$("#group_result").append("<img src='images/icon_group.png' width='20' height='20' style='float:left;' />").append($("<a style='color:#999;'>").attr("href", "index.php?content=group_blackboard&id="+grupo.grupo_id).text(grupo.nombre)).append("<br style='clear:both;' />");
		})
		} else {
		console.log("No results")
		}
	}
})
</script>

<div class="content">
    <div class="publication">
    
    	<!--Archivos publicados-->
    	<div style=" float:left; margin-left:15px; width:585px; margin-top:5px;">
        	<div style="float:left; margin-top:4px;">
        		<img src="images/tl5_bg-title-regular-pages.png" />
            </div>
            <div style="float:left">
            	<font style="font-size:18px;">&nbsp;&nbsp;Resultados de la búsqueda: <? echo $_POST['searchQuery']; ?></font>
            </div>
        </div>
        
        <div id="group_result" style="float:left; width:585px; margin-top:15px; margin-left:15px;">
        </div>
    </div>
</div>
