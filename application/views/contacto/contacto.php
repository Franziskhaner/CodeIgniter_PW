<!DOCTYPE html>
<html>
<head>
<title>Contacta con nosotros</title>
</head>
<body>
<div>
	<?php if(!empty($validationError)) echo '<script>alert("Introduzca correo y mensaje.");</script>';?>
	<?php if(!empty($status)) {
		if($status) echo '<script>alert("Mensaje enviado correctamente, le responderemos lo mas pronto posible.");</script>'; else '<script>alert("Error enviar el mensaje, intentelo de nuevo.");</script>';
	}  ?>
	<center>
	<table>
		<tr><td>
		<table id='tabla1' cellspacing="10" width="100%">
			<tr><td colspan="2"> <h2> Información de contacto </h2></td></tr>
			<tr><th>Teléfono: </th><td>956 47 81 54</td></tr>
			<tr><th>Urgencias: </th><td>612 34 56 86</td></tr>
		</table>
		<table id='tabla1' cellspacing="10" width="100%">
			<form method="post" id='contactoform'>
				<tr><td colspan="2"> <h2>Contacta con nosotros</h2> </td></tr>
				<tr><th>Correo electrónico:</th>
				<td><input style='width: 100%;' type='email' name='email' required></td></tr>
				<tr><th>Mensaje: </th>
				<td>
				<textarea style='resize: none;' name="mensaje" rows="4" cols="68" required></textarea><br></td></tr>
				<tr><td colspan="2"><input style='width: 40%;' type='submit' name='contactosubmit' value=" Enviar mensaje "></td></tr>
			</form>
		</table>
		<table id='tabla1' cellspacing="10" width="100%">
			<tr><td><h2> Dónde estamos </h2></td></tr>
			<tr><td><iframe src = "https://www.google.com/maps/d/u/0/embed?mid=1MMX6Q9Mx8ukIE6Mf1Lc-euGKKYePnDTB" width="640" height="480"></iframe></td></tr>
		</table>
	</td></tr>
	</table>
</center>
</div>
</body>
</html>