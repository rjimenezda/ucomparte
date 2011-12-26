<script type="text/javascript">
$(function(){
	//Se hace la consulta para extraer el nombre completo
<<<<<<< HEAD
	$.post("../api/getuserinfo.php", { usuario_id : <?php echo $_SESSION['usuario_id']; ?> }, function(data) { $("#nombreCompleto").text( data.Nombre + " " +  data.Apellidos );}, "json" );

	//Se hace la consulta para extraer los grupos a los que pertenece el usuario
	$.post("../api/getusergrouplist.php", { usuario_id : <?php echo $_SESSION['usuario_id']; ?> }, fillUserGroupList, "json" )
=======
	$.post("../api/getuserinfo.php", { usuario_id : <?php echo $_SESSION['usuario_id']; ?> }, function(data) { $("#nombreCompleto").text( data.Nombre + " " +  data.Apellidos ); console.log(data)}, "json" )

>>>>>>> bc1cb3a49782515960a741ef7d30c31c9c793b1d
})

function fillUserGroupList(data){
	console.log(data);
}


</script>

<div class="content">
	<div style="float:left; width:600px;margin-top:10px;border-bottom:1px solid #999; padding-bottom:10px;">
    	<div style=" float:left; margin-left:15px; width:200px;">
        	<img src="users_images/josedavid01.jpg" />
        </div>
    	<div style=" float:left; margin-left:15px; width:370px;">
        	<div style="float: left; width:100%; margin-bottom:15px;">
                <font id="nombreCompleto" style="font-size:24px;"></font><br />
                <font style=" font-size:18px;">Grupos a los que pertenece:</font>
        	</div>
        
            <!-- Se cargan los grupos a los que pertenece el usuario-->
            <div style="float: left; width:100%">
                <div style="float:left;">
                    <a href="#"><img src="images/icon_group.png" width="20" height="20" /></a>
                </div>
                <div style="float:left; margin-left:3px; padding-top:2px;">
                    <a href="#"><font style="color:#999; margin-top:2px">Primera Fila</font><br /></a>
                </div>
            </div>
            <div style="float: left; width:100%">
                <div style="float:left">
                    <a href="#"><img src="images/icon_group.png" width="20" height="20" /></a>
                </div>
                <div style="float:left; margin-left:3px; padding-top:2px;">
                    <a href="#"><font style="color:#999; margin-top:2px">2º I.Informática</font><br /></a>
                </div> 
            </div>        
    	</div>    
      
    </div>
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
        
        <!--Archivos que se ha apuntado-->
		<div style=" float:left; margin-left:15px; width:585px; margin-top:25px;">
        	<div style="float:left; margin-top:4px;">
        		<img src="images/tl5_bg-title-regular-pages.png" />
            </div>
            <div style="float:left">
            	<font style="font-size:18px;">&nbsp;&nbsp;Archivos que te has apuntado&nbsp;&nbsp;&nbsp;</font>
            </div>
            <div style="float:left">
            	<img src="images/me_lo_apunto.png" width="44px" height="23px" />
            </div>
        </div>
        
        <div style="float:left; width:585px; margin-top:15px; margin-left:15px;">
            <div style="float:left; width: 30px; ">
            <a href="#"><img src="images/winrar.png" width="23px" height="23px" /></a>
            </div>
            <div style="float:left; width: 540px;padding-top:1px;">
                <a href="#"><font style="color:#999">Apuntes de Proyectos - Proyectos (Ing. Informática) - 07/12/2011</font><br /></a>
                <a href="#"><font style="color:#900">Carlos Gargía García</font></a>
            </div>
        </div>
        <div style="float:left; width:585px; margin-top:15px; margin-left:15px;">
            <div style="float:left; width: 30px; ">
            <a href="#"><img src="images/pdf.png" width="23px" height="23px" /></a>
            </div>
            <div style="float:left; width: 540px;padding-top:1px;">
                <a href="#"><font style="color:#999">Práctica 2 de Bioinformática - Bioinformática (Ing. Informática)  - 02/12/2011</font><br /></a>
                <a href="#"><font style="color:#900">Miguel Ángel Cid</font></a>
            </div>
        </div>
        <div style="float:left; width:585px; margin-top:15px; margin-left:15px;">
            <div style="float:left; width: 30px; ">
            <a href="#"><img src="images/word.png" width="23px" height="23px" /></a>
            </div>
            <div style="float:left; width: 540px;padding-top:1px;">
                <a href="#"><font style="color:#999">Práctica de CORBA - SOD (Ing. Informática)  - 16/10/2011</font><br /></a>
                <a href="#"><font style="color:#900">Rafael Bernal</font></a>
            </div>
        </div>                       
        
    
    
    </div>
</div>
