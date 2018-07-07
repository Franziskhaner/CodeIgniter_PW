<!DOCTYPE html>
<html>
<head>

</head>
<body>
	<div id='cuerpo'>
		<table id='tabla1' border=0 cellspacing="10" style='min-width: 600px;'>
		<h2>Consultar Historia</h2>
		<form method='POST'>
			<tr><td><center><table id='sombra' boder=0 style='width:75%;'> <tr><td width='15%'><b>DNI:</b></td><td> <input type='text' name='dni' id='dni'> </td>
			<td><input type='submit' name='dnisubmit' value='Buscar'></td></tr>
		</form>
		<?php if(!empty($mascotas)) { ?>
		<script> document.getElementById("dni").value = "<?php echo $mascotas[0]['idPaciente']; ?>";</script>
		<table>
			<tr><td><b>Nombre</b></td><td><b>Tipo</b></td><td><b>Raza</b></td><td><b>Fecha Nacimiento</b></td><td><b>Sexo</b></td></tr>
			<?php
				foreach ($mascotas as $key => $value) {
					echo "<tr><td>".$value['nombre']."</td><td>".$value['tipo']."</td><td>".$value['raza']."</td><td>".$value['fnacimiento']."</td><td>".$value['sexo']."</td>";
					echo "<td><form method='POST'><input type='hidden' name='mascotaId' value='".$value['id']."'><input type='submit' name='mascotasubmit' value='ver'></form>";
					echo "</tr>";
				}
			?>
		</table>
	</table>
		<?php } ?>
	</div>
</body>