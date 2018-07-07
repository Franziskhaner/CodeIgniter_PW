<!DOCTYPE html>
<html>
<head>
	<title>Mostrar cita</title>
</head>
<body>
<div id='cuerpo'>
	<?php
		echo "<table id='tabla1'>";
		echo "<tr><td><table id='tabla1' cellspacing=10 width='100%'>";
		echo "<tr><td colspan=2><h2>Datos personales</h2></td></tr>";
		echo "<tr><th style='width: 110px; text-align: left;'>DNI: </th><td>".$paciente['dni']."</td></tr>";
		echo "<tr><th style='width: 110px; text-align: left;'>Nombre: </th><td>".$paciente['nombre']."</td></tr>";
		echo "<tr><th style='width: 110px; text-align: left;'>Apellidos: </th><td>".$paciente['apellidos']."</td></tr>";
		echo "<tr><th style='width: 110px; text-align: left;'>Dirección: </th><td>".$paciente['direccion']."</td></tr>";
		echo "<tr><th style='width: 110px; text-align: left;'>Teléfono: </th><td>".$paciente['telefono']."</td></tr>";
		echo "</table></td></tr>";
		echo "<tr><td><table id='tabla1' cellspacing=10 width='100%'>";
		echo "<tr><td colspan=2><h2>Datos mascota</h2></td></tr>";
		echo "<tr><th style='width: 110px; text-align: left;'>Nombre: </th><td>".$mascota['nombre']."</td></tr>";
		echo "<tr><th style='width: 110px; text-align: left;'>Tipo: </th><td>".$mascota['tipo']."</td></tr>";
		echo "<tr><th style='width: 110px; text-align: left;'>Raza: </th><td>".$mascota['raza']."</td></tr>";
		echo "<tr><th style='width: 110px; text-align: left;'>F. Nacimiento: </td><td>".$mascota['fnacimiento']."</td></tr>";
		echo "<tr><th style='width: 110px; text-align: left;'>Sexo: </th><td>".$mascota['sexo']."</td></tr>";
		echo "</table></td></tr>";
		echo "<tr><td><table id='tabla1' cellspacing=10 width='100%'>";
		echo "<tr><td colspan=2><h2>Datos cita</h2></td></tr>";
		echo "<tr><th style='width: 110px; text-align: left;'>Fecha: </th><td>".str_pad($cita['dia'],2,"0", STR_PAD_LEFT)."/".str_pad($cita['mes'],2,"0", STR_PAD_LEFT)."/".$cita['anno']."</td></tr>";
		echo "<tr><th style='width: 110px; text-align: left;'>Hora: </th><td>".str_pad($cita['hora'],2,"0", STR_PAD_LEFT).":".str_pad($cita['minuto'],2,"0", STR_PAD_LEFT)."</td></tr>";
		echo "<tr><th style='width: 110px; text-align: left;'>Especialidad: </th><td>".$especialidad['especialidad']."</td></tr>";
		echo "</table></td></tr>";
		echo "<tr><td><input style='width: 40%;' type='button' value=' Imprimir ' onClick='window.print()'></td></tr>";
		echo "</table>";
	?>
</div>
</body>
</html>