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
	<div style="float:left; width:600px;margin-top:10px;border-bottom:1px solid #999; padding-bottom:10px;">
    	<div style=" float:left; margin-left:15px; width:200px;">
    		<img src="profilepic.php?uid=<?php echo $_GET['uid'];?>"/>
        </div>
    	<div style=" float:left; margin-left:15px; width:370px;">
        	<div style="float: left; width:100%; margin-bottom:15px;">
                <font id="nombreCompleto" style="font-size:24px;"></font><br />
                <font style=" font-size:18px;">Grupos a los que pertenece:</font>
        	</div>
        
            <!-- Se cargan los grupos a los que pertenece el usuario-->
			<?php include("user_groups.php");?>
			  
    	</div>    
      <?php 
      	include("user_files.php");
      ?>
    </div>
</div>
