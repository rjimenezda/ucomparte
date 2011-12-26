<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="es-ES">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="shortcut icon" href="you/images/favicon.ico" />
<title>UCOmparte</title>
<link rel="stylesheet" id="login-css" href="login.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script language="javascript" type="text/javascript">
function show_registration(){
// 	document.getElementById('register').style.visibility="visible";
	$("#register").fadeIn("slow");
}

function cancel_registration(){
// 	document.getElementById('register').style.visibility="hidden";
	$("#register").fadeOut("slow");
}

function validate (event) {
	if ($('.validate')[0].value == $('.validate')[1].value) {
		console.log($('.validate')[0].value)
		$('.validate').each(function() {
			this.style.background = "#FBFBFB";
		})
		$('#submit_reg').fadeIn();
	} else {
		console.log($('.validate')[0].value)
		$('.validate').each(function() {
			this.style.background = "#900";
		})
		$('#submit_reg').fadeOut();
	}
}

$(document).ready(function() {
	$('#submit_reg').hide();
	
	$('.validate').each(function() {
		$(this).keyup(validate)
		return true	
	})
	
})

</script>
</head>

<body class="login">
<img src="you/images/background_ucomparte.png" id="background_ucomparte" />
<div id="register">
    <form name="registerform" class="registerform" id="registerform" action="register.php" method="post">
    	<div style="float:left; width:100%;">
        <p>
            <label>Nombre<br>
            <input type="text" name="name" id="user_name" class="input" value="" size="20" tabindex="10">
            </label>
        </p>    
        <p>
            <label>Apellidos<br>
            <input type="text" name="surname" id="user_surname" class="input" value="" size="20" tabindex="10"></label>
        </p>
        <p>
            <label>País<br>
            <input type="text" name="degree" id="user_degree" class="input" value="" size="20" tabindex="10"></label>
        </p>   
        </div>
        <div style="float:left; width:200px;">
        <p>
            <label>Localidad<br>
            <input type="text" name="town" id="user_town" class="input" value="" size="20" tabindex="10" style="width:200px;"></label>
        </p>
        </div>
        <div style="float:left; width:200px; margin-left:15px;">
        <p>
            <label>Provincia<br>        
        	<input type="text" name="province" id="user_province" class="input" value="" size="20" tabindex="10" style="width:200px;"></label>
        </p>
        </div>
        <div style="float:left; width:160px; margin-left:15px;">
        <p>
            <label>Fecha de nacimiento<br>        
        	<input type="text" name="birthdate" id="user_birthdate" class="input" value="" size="20" tabindex="10" style="width:160px;"></label>
        </p>
                <div style="float:left; width:100%;">
        </div>
        <p>
            <label>Sexo<br>        
        	<select name="sex" id="sex" class="input" tabindex="10" style="width:160px;">
        		 <option value="H">H</option>
        		 <option value="M">M</option>
        		 <option value="?">?</option>
        	</select>
        	</label>
        </p>
        <div style="float:left; width:100%;">
        </div>
        <p>
            <label>Dirección de correo<br>
            <input type="text" name="log" id="user_login" class="input" value="" size="15" tabindex="10"></label>
        </p>
        <p>
            <label>Contraseña<br>
            <input type="password" name="pwd" id="user_pass" class="input validate" value="" size="20" tabindex="20"></label>
        </p>
        <p>
            <label>Vuelve a escribir tu contraseña<br>
            <input type="password" name="pwdbis" id="user_pass_bis" class="input validate" value="" size="20" tabindex="20"></label>
        </p>
        <p class="forgetmenot"><a href="JavaScript:cancel_registration();"><input type="button" name="cancel" id="cancel" class="button-primary" value="Cancelar" tabindex="100"></a></p>
        <p class="submit">
            <input type="submit" name="submit" id="submit_reg" class="button-primary" value="Acceder" tabindex="100">
        </p>
        </div>
    </form>
</div>
<div id="login">

    
    		<!--<img src="images/login-header.png" />-->
			<form name="loginform" id="loginform" class="loginform" action="login.php" method="post">
			
			<p>
				<label>Dirección de correo<br>
				<input type="text" name="log" id="user_login" class="input" value="" size="20" tabindex="10"></label>
			</p>
			
			<p>
				<label>Contraseña<br>
				<input type="password" name="pwd" id="user_pass" class="input" value="" size="20" tabindex="20"></label>
			</p>
			
			<? if(isset($_GET['err']) && $_GET['err']=='1'){ ?>
			<p style="color:red;">Usuario o contraseña no v&aacute;lidos</p><br />			
			<? } ?>
			
			<p class="forgetmenot"><label><input name="rememberme" type="checkbox" id="rememberme" value="forever" tabindex="90"> Recuérdame</label></p>
			<p class="submit">
				<input type="submit" name="submit" id="submit" class="button-primary" value="Acceder" tabindex="100">
				
				<input type="hidden" name="testcookie" value="1">
			</p>
		</form>

</div>

<div id="footer">
	<center><font style="color:#999;">©2011 UCOmparte - <a href="JavaScript:show_registration();">Registrate</a></font></center>
</div>


</body></html>
