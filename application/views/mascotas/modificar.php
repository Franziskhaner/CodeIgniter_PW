<!DOCTYPE html>
<html>
<head>
	<title>Modificar datos mascota</title>
</head>
<body>
	<div id='cuerpo'>
		<table id='tabla1' border=0 cellspacing=10 style='min-width: 600px;
'>
		<h2>Modificar datos mascota</h2>
		<form method='POST'>
			<tr><td colspan=3><center><table id='sombra' border=0 style='width: 75%;'><tr><td width='45%'><b>Selecciona una mascota: </b></td><td><select name='mascota'>
				<?php foreach($mascotas as $key => $value) echo "<option value='".$value['id']."'> ".$value['nombre']."</option>"; ?>
			</select></td><td>
			<input type='submit' name='mascotasubmit' value=' Cargar '></td></tr></table></center></td></tr>
		</form>
		<?php if(!empty($mascota)) { ?>
			<form method='POST' enctype="multipart/form-data">
				<?php echo "<input type='hidden' name='id' value='".$mascota['id']."'>"; ?>
				
					<?php
						echo "<tr><td>Nombre: </td><td colspan=2><input type='text' name='nombre' value='".$mascota['nombre']."' required></td></tr>";
						echo "<tr><td>Imagen: </td><td colspan=2><input type='file' name='imagen' accept='image/*'></td></tr>";
						echo "<tr><td>Tipo: </td><td colspan=2><select name='tipo' required>";
						echo "<option value='perro'";
						if($mascota['tipo']=='perro') echo " selected ";
						echo ">Perro</option>";
						echo "<option value='gato'";
						if($mascota['tipo']=='gato') echo " selected ";
						echo ">Gato</option>";
						echo "<option value='roedor'";
						if($mascota['tipo']=='roedor') echo " selected ";
						echo ">Roedor</option>";
						echo "<option value='ave'";
						if($mascota['tipo']=='ave') echo " selected ";
						echo ">Ave</option>";
						echo "<option value='reptil'";
						if($mascota['tipo']=='reptil') echo " selected ";
						echo ">Reptil</option>";
						echo "<option value='pez'";
						if($mascota['tipo']=='pez') echo " selected ";
						echo ">Pez</option>";
						echo "<option value='otros'";
						if($mascota['tipo']=='otros') echo " selected ";
						echo ">Otros</option>";
						echo "</select></td></tr>";
						echo "<tr><td>Raza: </td><td colspan=2><input type='text' name='raza' value='".$mascota['raza']."' required></td></tr>";
						echo "<tr><td>Fecha Nacimiento: </td><td colspan=2><input type='text' name='fnacimiento' value='".$mascota['fnacimiento']."' required></td></tr>";
						if($mascota['sexo'] == 'Macho') {
							echo "<tr><td>Sexo: </td><td>Macho <input type='radio' name='sexo' value='Macho' required checked></td><td>Hembra <input type='radio' name='sexo' value='Hembra' required></tr>";
						}else{
							echo "<tr><td>Sexo: </td><td>Macho <input type='radio' name='sexo' value='Macho' required></td><td>Hembra <input type='radio' name='sexo' value='Hembra' required checked></tr>";
						}
					?>
					<tr><td></td><td><input type='submit' name='actualizarsubmit' value=' Actualizar '></td><td></td></tr>
				</table>
			</form>
		<?php } ?>
	</div>
</body>