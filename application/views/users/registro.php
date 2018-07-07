<!DOCTYPE html>
<html>
<head>
	<title>Registro de usuario</title>
</head>
<body>
	<div id='cuerpo'>
		<form method='post'>
			<table id='tabla1' cellspacing=10>
				<tr><td colspan=2><h2>Registro de usuario</h2></td></tr>
				<tr><th>DNI: </th><td><input type='text' name='dni' required></td></tr>
				<tr><th>Nombre: </th><td><input type='text' name='nombre' required></td></tr>
				<tr><th>Apellidos: </th><td><input type='text' name='apellidos' required></td></tr>
				<tr><th>Dirección: </th><td><input type='text' name='direccion' required></td></tr>
				<tr><th>Telefono: </th><td><input type='text' name='telefono' required></td></tr>
				<tr><th>Contraseña: </th><td><input type='password' name='pass1' id='pass1' required></td></tr>
				<?php echo form_error('pass1','<span class="help-block">','</span>'); ?>
				<tr><th>Repita contraseña: </th><td><input type='password' name='pass2' id='pass2' required></td></tr>
				<tr><th colspan=2><?php if(!empty($error_msg)){
				echo '<p class="statusMsg">'.$error_msg.'</p>';
			} ?></th></tr>
				<tr><td colspan=2><input type='submit' name='registrosubmit' style='width: 40%;'onclick='if(document.getElementById("pass1").value != document.getElementById("pass2").value) { alert("Las contraseñas no coinciden, reviselas"); return false;}else return true;'></td></tr>
			</table>
		</form>
	</div>
</body>