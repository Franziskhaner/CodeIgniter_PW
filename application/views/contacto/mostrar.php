<!DOCTYPE html>
<html>
<head>

</head>
<body>
	<div>
		<h2>Mensajes recibidos</h2>
			<table>
				<tr><th>Remitente</th><th>Mensaje</th><th>Leído</th><th>Respondido</th><th>Respuesta</th></tr>
				<?php if(!empty($noleidos)) {
					foreach($noleidos as $key => $value) {
						echo "<form method='post'>";
						echo "<input type='hidden' name='respuesta' id='respuesta-".$value['id']."'>";
						echo "<tr style='background-color: grey;'><td style='text-align: right;'>".$value['correo']."</td><td style='text-align: right;'>".$value['mensaje']."</td><td style='text-align: right;'><input type='checkbox' name='l-".$value['id']."' value='".$value['id']."' disabled></td><td style='text-align: right;'><input type='checkbox' name='r-".$value['id']."' value='".$value['id']."' disabled></td><td style='text-align: right;'>".$value['respuesta']."</td><td><input type='submit' name='".$value['id']."' value='Responder' "; ?>
						onclick='document.getElementById("respuesta-<?php echo $value['id']; ?>").value = prompt("Mensaje:\n <?php echo $value['mensaje']; ?>\nRespuesta:");'></td></tr>
						<?php
						echo "</form>";
					}
				}
				if(!empty($leidos)) {
					foreach($leidos as $key => $value) {
						echo "<form method='post'>";
						echo "<input type='hidden' name='respuesta' id='respuesta-".$value['id']."'>";
						echo "<tr><td style='text-align: right;'>".$value['correo']."</td><td style='text-align: right;'>".$value['mensaje']."</td><td style='text-align: right;'><input type='checkbox' name='l-".$value['id']."' value='".$value['id']."' checked disabled></td><td style='text-align: right;'><input type='checkbox' name='r-".$value['id']."' value='".$value['id']."' disabled></td><td style='text-align: right;'>".$value['respuesta']."</td><td><input type='submit' name='".$value['id']."' value='Responder' "; ?>
						onclick='document.getElementById("respuesta-<?php echo $value['id']; ?>").value = prompt("Mensaje:\n <?php echo $value['mensaje']; ?>\nRespuesta:");'></td></tr>
						<?php
						echo "</form>";
					}
				}
				if(!empty($respondido)) {
					foreach($respondido as $key => $value) {
						echo "<form method='post'>";
						echo "<tr><td style='text-align: right;'>".$value['correo']."</td><td style='text-align: right;'>".$value['mensaje']."</td><td style='text-align: right;'><input type='checkbox' name='l-".$value['id']."' value='".$value['id']."' checked disabled></td><td style='text-align: right;'><input type='checkbox' name='r-".$value['id']."' value='".$value['id']."' checked disabled></td><td style='text-align: right;'>".$value['respuesta']."</td><td><input type='submit' name='".$value['id']."' value='Responder' disabled></td></tr>";
						echo "</form>";
					}
				}
				?>
			</table>
		</form>
	</div>
</body>
</html>