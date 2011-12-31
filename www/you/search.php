<script type="text/javascript">
$(function(){
	$.post("../api/searchgroups.php", { patron_busqueda : <?php echo '"'.$_POST['searchQuery'].'"'; ?> }, function(){}, "json" ).success(searchGroups);
	$.get("../api/searchsubjets.php", { patron_busqueda : <?php echo '"'.$_POST['searchQuery'].'"'; ?> }, function(){}, "json" ).success(searchSubjects);
	
	//Funcion para mostrar los enlaces a los grupos resultados de la busqueda
	function searchGroups(data){
		$("#group_result").empty();
		if(data != null) {
		$.each(data, function(i, grupo){
			$("#group_result")
			.append("<img src='images/icon_group.png' width='20' height='20' style='float:left;' />")
			.append($("<a style='color:#999;'>")
			.attr("href", "index.php?content=group_blackboard&gid="+grupo.grupo_id)
			.text(grupo.nombre))
			.append("<br style='clear:both;' />");
		})
		} else {
			$("#group_result").append("No hay resultados")
		}
	}

	function searchSubjects(data){
		$("#subjects_result").empty();
		if(data != null) {
		$.each(data, function(i, subject){
			$("#subjects_result")
			.append("<img src='images/icon_group.png' width='20' height='20' style='float:left;' />")
			.append($("<a style='color:#999;'>").attr("href", "index.php?content=subject&subid="+subject.asignatura_id)
			.text(subject.nombre + " (" + subject.titulacion + ")"))
			.append("<br style='clear:both;' />")
		})
		} else {
			$("#subjects_result").append("No hay resultados")
		}
	}

})
</script>

<div class="content">
    <div class="publication">
    
    	<!--grupos-->
    	<div style=" float:left; margin-left:15px; width:585px; margin-top:">
        	<div style="float:left; margin-top:4px;">
        		<img src="images/tl5_bg-title-regular-pages.png" />
            </div>
            <div style="float:left">
            	<font style="font-size:18px;">&nbsp;&nbsp;Resultados de grupos:</font>
            </div>
        </div>
        <div id="group_result" style="float:left; width:585px; margin-top:15px; margin-left:15px; border-bottom: 1px solid #999; padding-bottom: 10px;">
        </div>
           <!--recursos-->
    	<div style=" float:left; margin-left:15px; width:585px; margin-top:5px; padding-top: 5px;">
        	<div style="float:left; margin-top:4px;">
        		<img src="images/tl5_bg-title-regular-pages.png" />
            </div>
            <div style="float:left">
            	<font style="font-size:18px;">&nbsp;&nbsp;Resultados de asignaturas:</font>
            </div>
        </div>
        <div id="subjects_result" style="float:left; width:585px; margin-top:15px; margin-left:15px; border-bottom: 1px solid #999; padding-bottom: 10px;">
        </div>
    </div>
</div>
