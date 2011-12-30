<script type="text/javascript">
function get_comments(publicacion_id) {
	$("#comments_" + publicacion_id).empty()
	$.post("../api/getgrouppost.php", { publicacion_id: publicacion_id }, function(){}, "json" ).success(fillcomments);	
}

function comentar(pubid, content) {
	offset = window.pageYOffset
	$.post("../api/commentgrouppost.php", { publicacion_id: pubid, contenido : content }, function(){}, "json" );
	$("#comentar_input_"+pubid).val("")
	window.scrollTo(0, offset);
}

function fillgroupposts(data) {
	if (data != null) {
		postwidget = '<div class="publication"><div style="float:left; margin-left:20px;"><a href="#"><img src="profilepic.php?uid=%USERID%" width="50px" height="50px" /></a></div><div class="details_publication"><div style="float:left; width:500px;"><a href="index.php?content=profile&uid=%USERID%"><font style="color:#900">%USERNAME%</font></a><font style="color:#999; margin-left:10px;">%DATE%</font></div><div style="float:left; width:500px; margin-top:5px;" id="contenido">%TITLE%</div><div style="float:left; width:500px; margin-top:5px;" id="contenido">%CONTENT%</div><div style="float:left; width:500px; margin-top:15px;"><div id="comments_%PUBID%"></div><div style="float:left; margin-left:8px;padding-top:1px;"><input type="text" id="comentar_input_%PUBID%" /><a id="comentar_%PUBID%" href="#"><font style="color:#999; margin-left:10px;">Comentar</font></a></div></div></div></div>'
		$.each(data, function(i, post) {
			content = postwidget.replace(/%USERID%/g, post.usuario_id)
			content = content.replace(/%PUBID%/g, post.publicacion_id)
			content = content.replace("%TITLE%", post.titulo)
			content = content.replace("%CONTENT%", post.contenido)
			content = content.replace("%DATE%", post.fecha)
			content = content.replace("%USERNAME%", post.nombre)
			$("#publications").append(content)
			$("#comentar_"+post.publicacion_id).click(function (){ comentar(post.publicacion_id, $("#comentar_input_"+post.publicacion_id).val()); get_comments(post.publicacion_id); })
			get_comments(post.publicacion_id)			
			})
		}
}

function fillcomments(data) {
	if (data != null) {
		postwidget = '<div style="float:left; width:500px; margin-top:15px;border-top:1px solid #999; padding-top: 10px;"><div style="float:left; width:23px; "><a href="#"><img src="profilepic.php?uid=%USERID%" width="23px" height="23px" /></a></div><div style="float:left; margin-left:8px;padding-top:1px; width:469px;"><div style="float: left; width:469px"><a href="index.php?content=profile&uid=%USERID%"><font style="color:#900; margin-left:10px;">%USERNAME%</font></a><font style="color:#999; margin-left:10px;">%DATE%</font></div><div style="float:left; width:469px"><font style="color:#999; margin-left:10px;">%CONTENT%</font></div></div></div>'
		$.each(data, function(i, comment) {
			content = postwidget.replace(/%USERID%/g, comment.usuario_id)
			content = content.replace("%CONTENT%", comment.contenido)
			content = content.replace("%DATE%", comment.fecha)
			content = content.replace("%USERNAME%", comment.nombre)
			$("#comments_" + comment.publicacion_id).append(content)
			})
		}
}

$(function (){
	$.post("../api/getgroupposts.php", { grupo_id: <?php echo $_GET['gid']; ?> }, function(){}, "json" ).success(fillgroupposts);

	$( "#comments" ).accordion({
		collapsible: true,
		active: false,
		animated: false
	});
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
     
    <!-- <div class="publication">
    	
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
            <div id="comments" style="float:left; width:500px; margin-top:15px;">
            	<h3><a href="#">Comentarios</a></h3>
                <div id="commentsPlace">
                	<div>QUE DISE LOCO</div>
                	<div>QUE DISE PREMOH</div>
                </div>
            </div>
            <div style="float:left; width:500px; margin-top:15px;">
                <div style="float:left; margin-left:8px;padding-top:1px;">
                	<a href="#"><font style="color:#999; margin-left:10px;">Comentar</font></a>
                </div>
            </div>
                   
        </div>
        

<div style="float:left; width:500px; margin-top:15px;border-top:1px solid #999; padding-top: 10px;">
<div style="float:left; width:23px; ">
<a href="#"><img src="images/photo.jpg" width="23px" height="23px" /></a>
</div>
<div style="float:left; margin-left:8px;padding-top:1px; width:469px;">
	<div style="float: left; width:469px">
		<a href="#"><font style="color:#900; margin-left:10px;">Miguel Ángel Cid</font></a>
    	<font style="color:#999; margin-left:10px;">08/12/2011</font>
    </div>
    <div style="float:left; width:469px">
    	<a href="#"><font style="color:#999; margin-left:10px;">Esta práctica esta fatal. No os la bajeis, mirad la mia. Vaya Carlos, que sube cosas malas, puffff.</font></a>
  	</div>
</div>
</div>
              
    </div> -->
   
    <!-- end .content --></div>