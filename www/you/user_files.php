<script type="text/javascript">
function filluserresources(data) {
	$("#sharedResources").empty();

	if (data == null) {
		$("#sharedResources").append("No has publicado recursos");
	} else {
		
		$.each(data, function(i, recurso){
			$("#sharedResources").append("<img src='images/fileicons/"+fileicon(recurso.formato)+".png' width='20' height='20' style='float:left;' />").append($("<a style='color:#999; padding-left: 3px;'>").attr("href", "index.php?content=resource&resid="+recurso.recurso_id).text(recurso.nombre)).append("<br style='clear:both;' />");
		}) 
	}
}

function fillmeloapuntos(data) {
	// $("#meloapuntos").empty();

	if (data == null) {
		$("#meloapuntos").append("No has apuntado recursos");
	} else {
		
		$.each(data, function(i, recurso){
			$("#meloapuntos").append("<img src='images/fileicons/"+fileicon(recurso.formato)+".png' width='20' height='20' style='float:left;' />").append($("<a style='color:#999; padding-left: 3px;'>").attr("href", "index.php?content=resource&resid="+recurso.recurso_id).text(recurso.nombre)).append("<br style='clear:both;' />");
		}) 
	}
}


$(function() {
	
userid = <?php if( isset($_GET['uid'])) { echo $_GET['uid']; } else { echo $_SESSION['usuario_id']; } ?>;

$.post("../api/getuserresources.php", { usuario_id : userid }, function(){}, "json" ).success(filluserresources);
$.post("../api/getmeloapuntos.php", { usuario_id : userid }, function(){}, "json" ).success(fillmeloapuntos);

});
</script>
<div class="publication">
    
    	<!--Archivos publicados-->
    	<div style=" float:left; margin-left:15px; width:585px; margin-top:5px;">
        	<div style="float:left; margin-top:4px;">
        		<img src="images/tl5_bg-title-regular-pages.png" />
            </div>
            <div style="float:left">
            	<font style="font-size:18px;">&nbsp;&nbsp;Archivos publicados&nbsp;&nbsp;&nbsp;</font>
            </div>
            <div style="float:left">
            	<img src="images/mis_apuntes.png" width="23px" height="23px" />
            </div>
        </div>
        
        <div id="sharedResources" style="float:left; width:585px; margin-top:15px; margin-left:15px;">
           
        </div>
        
        <!--Archivos que se ha apuntado-->
		<div style=" float:left; margin-left:15px; width:585px; margin-top:25px;">
        	<div style="float:left; margin-top:4px;">
        		<img src="images/tl5_bg-title-regular-pages.png" />
            </div>
            <div style="float:left">
            	<font style="font-size:18px;">&nbsp;&nbsp;Archivos apuntados&nbsp;&nbsp;&nbsp;</font>
            </div>
            <div style="float:left">
            	<img src="images/me_lo_apunto.png" width="44px" height="23px" />
            </div>
        </div>
        
        <div id="meloapuntos" style="float:left; width:585px; margin-top:15px; margin-left:15px;">

        </div>                  
    </div>
