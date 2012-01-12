<script type="text/javascript">
function filluserresources(data) {
	$("#sharedResources").empty();

	if (data == null) {
		$("#sharedResources").append("No hay recursos etiquetados");
	} else {
		$.each(data, function(i, recurso){
			$("#sharedResources").append("<img src='images/fileicons/"+fileicon(recurso.formato)+".png' width='20' height='20' style='float:left;' />").append($("<a style='color:#999; padding-left: 3px;'>").attr("href", "index.php?content=resource&resid="+recurso.recurso_id).text(recurso.nombre)).append("<br style='clear:both;' />");
		}) 
	}
}


$(function() {
	
subid = <?php echo $_GET['subid'] ?>;
$.post("../api/getsubjectresources.php", { asignatura_id : subid }, function(){}, "json" ).success(filluserresources);

});
</script>
<div class="publication">
    
    	<!--Archivos publicados-->
    	<div style=" float:left; margin-left:15px; width:585px; margin-top:5px;">
        	<div style="float:left; margin-top:4px;">
        		<img src="images/tl5_bg-title-regular-pages.png" />
            </div>
            <div style="float:left">
            	<font style="font-size:18px;">&nbsp;&nbsp;Archivos etiquetados&nbsp;&nbsp;&nbsp;</font>
            </div>
        </div>
        
        <div id="sharedResources" style="float:left; width:585px; margin-top:15px; margin-left:15px;">
           
        </div>
    </div>