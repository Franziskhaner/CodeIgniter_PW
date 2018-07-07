<!DOCTYPE html>
<html>
<head>
	<title>Modificar informacíon de usuario</title>
</head>
<body>
	<div id='cuerpo'>
		<form method='post'>
			<table id='tabla1' cellspacing=10>
				<tr><td colspan=3><h2>Modificar información de usuario</h2></td></tr>
				<tr><td>DNI: </td><td colspan=2><input type='text' name='dni' required value='<?php echo $user["dni"]; ?>' readonly></td></tr>
				<tr><td>Nombre: </td><td colspan=2><input type='text' name='nombre' required value='<?php echo $user["nombre"]; ?>'></td></tr>
				<tr><td>Apellidos: </td><td colspan=2><input type='text' name='apellidos' required value='<?php echo $user["apellidos"]; ?>'></td></tr>
				<tr><td>Dirección: </td><td colspan=2><input type='text' name='direccion' required value='<?php echo $user["direccion"]; ?>'></td></tr>
				<tr><td>Telefono: </td><td colspan=2><input type='text' name='telefono' required value='<?php echo $user["telefono"]; ?>'></td></tr>
				<tr><td colspan=3><?php if(!empty($error_msg)){
				echo '<p class="statusMsg">'.$error_msg.'</p>';
			} ?></td></tr>
			<tr><td colspan=3><input type='submit' name='modificarsubmit' value='Modificar' style='width: 40%;'></td></tr>
			</table>
		</form>
	</div>
</body>