<script type="text/javascript">

$(function(){
	//Se hace la consulta para extraer el nombre completo
	$.post("../api/getsubjectinfo.php", { asignatura_id : <?php echo $_GET['subid']; ?> }, function(){}, "json" ).
	success(function (data) {$("#nombreasignatura").text( data.nombre ); $("#nombretitulacion").text( data.titulacion ) } );
	
})
</script>

<div class="content">
	<div style="float:left; width:600px;margin-top:10px;border-bottom:1px solid #999; padding-bottom:10px;">
    	<div style=" float:left; margin-left:15px; width:370px;">
        	<div style="float: left; width:100%; margin-bottom:15px;">
                <font id="nombreasignatura" style="font-size:24px;"></font><br />
                <font id="nombretitulacion" style="font-size:12px;"></font><br />
        	</div>
    	</div>    
    </div>
    <?php 
      	include("subject_files.php");
      ?>
</div>
