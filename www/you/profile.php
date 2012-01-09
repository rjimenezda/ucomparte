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
	$.post("../api/getuserinfo.php", { usuario_id : <?php echo $_GET['uid']; ?> }, function(){}, "json" ).success(function(data) { $("#nombreCompleto").text( data.nombre + " " +  data.apellidos );})
	$.post("../api/getusergrouplist.php", { usuario_id : <?php echo $_GET['uid']; ?> }, function(){}, "json" ).success(fillusergroups);
	
})
</script>

<div class="content">
	<div id="error" style="display: <?php if(isset($_GET['error'])) { echo "block"; } else { echo "none";} ?>; background-color: red; color: white;">
	<?php 
		if($_GET['error'] == 1) {
			echo "ERROR al subir el archivo";
		} else if($_GET['error'] == 2) {
			echo "ERROR al subir el archivo: formato inválido";
		} else if($_GET['error'] == 3) {
			echo "200 Kb máximo";
		} else {
			echo "";
		}
	?>
	</div> 
	<div style="float:left; width:600px;margin-top:10px;border-bottom:1px solid #999; padding-bottom:10px;">
    	<div style=" float:left; margin-left:15px; width:200px;">
            <div style="float:left;width:100%;">
    		    <img src="profilepic.php?uid=<?php echo $_GET['uid'];?>" width="200px" />
            </div>   		
            <div style="float:left;width:100%;margin-top:10px;">
    		<?php if($_GET['uid'] == $_SESSION['usuario_id']) echo '<form enctype="multipart/form-data" method="post" action="../api/addprofilepic.php">Cambia tu foto<br/> <input class="masthead-search" type="file" name="userfile" style="float:left;"/><br/><br/><input class="button-primary" type="submit" value="Enviar"/><input type="hidden" name="MAX_FILE_SIZE" value="2000000"><input name="Enviado" type="hidden" id="Enviado" value="1"></form>'; ?>
            </div>
    	</div>
    	<div style=" float:left; margin-left:15px; width:370px;">
        	<div style="float: left; width:100%; margin-bottom:15px;">
                <font id="nombreCompleto" style="font-size:24px;"></font><br />
                <font style=" font-size:18px;">Grupos a los que pertenece:</font>
        	</div>
        
            <!-- Se cargan los grupos a los que pertenece el usuario-->
			<?php include("user_groups.php");?>
			  
    	</div>    
    </div>
    <?php 
      	include("user_files.php");
      ?>
</div>
