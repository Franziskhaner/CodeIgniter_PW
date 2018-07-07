<!DOCTYPE html>
<html>
<head>
    <title>Información usuario</title>
</head>
<body>
    <div id='cuerpo'>
    	<table id='tabla1' cellspacing=10>
            <tr><td colspan=2><h2>Información usuario</h2></td></tr>
    		<tr><td>DNI: </td><td><?php echo $user['dni']; ?></td></tr>
    		<tr><td>Nombre: </td><td><?php echo $user['nombre']; ?></td></tr>
    		<tr><td>Apellidos: </td><td><?php echo $user['apellidos']; ?></td></tr>
    		<tr><td>Dirección: </td><td><?php echo $user['direccion']; ?></td></tr>
    		<tr><td>Teléfono: </td><td><?php echo $user['telefono']; ?></td></tr>
    		<tr><td>Nivel de acceso: </td><td><?php
        		if($user['nivel'] == 1){
        			echo "Administrador";
        		}else{
        			echo "Paciente";
        		}
        	?></td></tr>
    	</table>
    </div>
</body>
</html>