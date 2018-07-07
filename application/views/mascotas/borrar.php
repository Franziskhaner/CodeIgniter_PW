<!DOCTYPE html>
<html>
<head>
	<title>Borrar mascota</title>
</head>
<body>
	<div id='cuerpo'>
		<form method='POST'>
			<table id='tabla1' cellspacing=10 style='min-width: 500px;
'>
				<tr><td colspan=3><h2>Borrar datos mascota</h2></td></tr>
				<tr><td width='40%'>Selecciona una mascota: </td><td><select name='mascota'>
				<?php foreach($mascotas as $key => $value) echo "<option value='".$value['id']."'> ".$value['nombre']."</option>"; ?>
			</select></td>
			<td><input type='submit' name='mascotasubmit' value='Borrar' onclick='return confirm("¿Esta seguro que desea eliminar la mascota del sistema?")'></td></tr>
		</form>
	</div>
</body>