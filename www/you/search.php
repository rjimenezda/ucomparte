<script type="text/javascript">
$(function(){
	//Se hace la consulta para extraer el nombre completo
	$.post("../api/getuserinfo.php", { usuario_id : <?php echo $_SESSION['usuario_id']; ?> }, function(data) { $("#nombreCompleto").text( data.nombre + " " +  data.apellidos ); console.log(data)}, "json" )

	$.post("../api/getusergrouplist.php", { usuario_id : <?php echo $_SESSION['usuario_id']; ?> }, fillusergroups, "json" )

	function fillusergroups(data){
		$("#group_list_placeholder").empty();
		$.each(data, function(i, grupo){
			$("#group_list_placeholder").append("<img src='images/icon_group.png' width='20' height='20' style='float:left;' />").append($("<span style='color:#999;'>").text(grupo.nombre)).append("<br style='clear:both;' />");
		})
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
            	<font style="font-size:18px;">&nbsp;&nbsp;Resultados de la búsqueda: <? echo $_POST['searchBox']; ?></font>
            </div>
        </div>
        
        <div style="float:left; width:585px; margin-top:15px; margin-left:15px;">
            <div style="float:left; width: 30px; ">
            <a href="#"><img src="images/winrar.png" width="23px" height="23px" /></a>
            </div>
            <div style="float:left; width: 540px;padding-top:1px;">
                <a href="#"><font style="color:#999">Apuntes de Proyectos - Proyectos (Ing. Técnica Informática), Poyectos II (Ing. Informática) - 07/12/2011</font></a>
            </div>
        </div>
        <div style="float:left; width:585px; margin-top:15px; margin-left:15px;">
            <div style="float:left; width: 30px; ">
            <a href="#"><img src="images/pdf.png" width="23px" height="23px" /></a>
            </div>
           <div style="float:left; width: 540px;padding-top:1px;">
                <a href="#"><font style="color:#999">Práctica 2 de Bioinformática - Bioinformática (Ing. Informática)  - 02/12/2011</font></a>
            </div>
        </div>
        <div style="float:left; width:585px; margin-top:15px; margin-left:15px;">
            <div style="float:left; width: 30px; ">
            <a href="#"><img src="images/word.png" width="23px" height="23px" /></a>
            </div>
            <div style="float:left; width: 540px;padding-top:1px;">
                <a href="#"><font style="color:#999">Práctica de CORBA - SOD (Ing. Informática)  - 16/10/2011</font></a>
            </div>
        </div>
    </div>
</div>
