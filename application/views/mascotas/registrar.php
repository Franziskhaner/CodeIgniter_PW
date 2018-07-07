<!DOCTYPE html>
<html>
<head>
	<title>Registrar mascota</title>
</head>
<body>
	<div id='cuerpo'>
		<form method='post' enctype="multipart/form-data">
			<table id='tabla1' CELLSPACING=10>
				<tr><td colspan=3><h2>Añadir mascota<h2></td></tr>
				<tr><td>Nombre: </td><td colspan=2><input type='text' name='nombre' required></td></tr>
				<tr><td>Imagen: </td><td colspan=2><input type='file' name='imagen' accept='image/*'></td></tr>
				<tr><td>Tipo: </td><td colspan=2><select name='tipo' required>
					<option value='Perro'>Perro</option>
					<option value='Gato'>Gato</option>
					<option value='Roedor'>Roedor</option>
					<option value='Ave'>Ave</option>
					<option value='Reptil'>Reptil</option>
					<option value='Pez'>Pez</option>
					<option value='Otros'>Otros</option>
				</select></td></tr>
				<tr><td>Raza: </td><td colspan=2><input type='text' name='raza' required></td></tr>
				<tr><td>Fecha de Nacimiento: </td><td colspan=2><input type='text' name='fnacimiento' required></td></tr>
				<tr><td>Sexo: </td><td>Hembra <input type='radio' name='sexo' value='Hembra' required></td><td>Macho <input type='radio' name='sexo' value='Macho'></td></tr>
				<tr><td></td><td><input type='submit' name='registrosubmit' value=' Registrar '></td><td></td></tr>
			</table>
		</form>
	</div>
</body>