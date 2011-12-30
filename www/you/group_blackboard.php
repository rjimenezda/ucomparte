<script type="text/javascript">
function fillgroupposts(data) {
	if (data != null) {
		console.log(data);
		postwidget = '<div class="publication"><div style="float:left; margin-left:20px;"><a href="#"><img src="profilepic.php?uid=%USERID%" width="50px" height="50px" /></a></div><div class="details_publication"><div style="float:left; width:500px;"><a href="index.php?content=profile&uid=%USERID%"><font style="color:#900">%USERNAME%</font></a><font style="color:#999; margin-left:10px;">%DATE%</font></div><div style="float:left; width:500px; margin-top:5px;" id="contenido">%TITLE%</div><div style="float:left; width:500px; margin-top:5px;" id="contenido">%CONTENT%</div><div style="float:left; width:500px; margin-top:15px;"><div style="float:left; margin-left:8px;padding-top:1px;"><a href="#"><font style="color:#999; margin-left:10px;">Comentar</font></a></div></div></div></div>'
		$.each(data, function(i, post) {
			content = postwidget.replace(/%USERID%/g, post.usuario_id)
			content = content.replace("%TITLE%", post.titulo)
			content = content.replace("%CONTENT%", post.contenido)
			content = content.replace("%DATE%", post.fecha)
			content = content.replace("%USERNAME%", post.nombre)
			$("#publications").append(content)
			})
		}
}

$(function (){
	$.post("../api/getgroupposts.php", { grupo_id: <?php echo $_GET['gid']; ?> }, function(){}, "json" ).success(fillgroupposts);
})
</script>
<div class="content">
  	<div class="blackboard">
    	<div style=" float:left; margin-left:15px; width:585px;">
    		<font style="font-size:18px;">Publica en la pizarra de Primera Fila</font>
    	</div>
        <div class="search" style="margin-top:10px; width:585px">
            <form id="publicationForm" method="post" action="" target="_self">		
            	<input id="publication_title" class="masthead-search" autocomplete="off" type="text" maxlength="2048" label="Escribe un titular..." placeholder="Escribe un titular..." size="84" /><br /><br />
                <input id="publication_comment" class="masthead-search" autocomplete="off" type="text" maxlength="2048" label="Escribe un comentario..." placeholder="Escribe un comentario..." size="84" /><br /><br />
                
                <button class="button-primary" onclick="" type="submit" id="submit" dir="ltr" tabindex="2" role="button">Publicar</button>
            </form>            
         </div>
    </div>
    
    <!--Publicación-->
    <div id="publications">
	
	</div>   
    
    <!-- 
    <div class="publication">
    	
    	<div style="float:left; margin-left:20px;">
        	<a href="#"><img src="profilepic.php?uid=%USERID%" width="50px" height="50px" /></a>
        </div>
        
        <div class="details_publication">
        	<div style="float:left; width:500px;">
            	<a href="#"><font style="color:#900">Jose David Expósito Cañete</font></a>
                <font style="color:#999; margin-left:10px;">06/12/2011</font>
                <a href="#"><font style="color:#999; margin-left:10px;">2º I.Informática</font></a>
            </div>
            <div style="float:left; width:500px; margin-top:5px;">
            	<div style="float:left; width:30px;">
            	<a href="#"><img src="images/Jpeg-Images-Files.png" width="23px" height="23px" /></a>
                </div>
                <div style="float:left; width:460px;padding-top:1px;">
                	<a href="#"><img src="users_images/feliz-navidad.jpg" width="200px" height="150px" /></a>
                </div>
            </div>
            
            <div style="float:left; width:500px; margin-top:15px;">
            	<div style="float:left; ">
            	<a href="#" title="Me lo apunto"><img src="images/me_lo_apunto.png" width="44px" height="23px" /></a>
                </div>
                <div style="float:left; margin-left:8px;padding-top:1px;">
                	<a href="#"><font style="color:#999; margin-left:10px;">Comentar</font></a>
                </div>
            </div>
                   
        </div>      
    </div>    -->
   
    <!-- end .content --></div>