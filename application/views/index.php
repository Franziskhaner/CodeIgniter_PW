<!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
	<link href="<?php echo base_url(); ?>css/cabecera.css" rel='stylesheet' type='text/css' />

<link href='<?php echo base_url(); ?>css/css.css' rel='stylesheet' type='text/css'>
</head>
<body>
	<div id="headeri">
		<ul class="nav">
			<li><a href="<?php echo base_url(); ?>">Inicio</a></li>
			<li><a href="">Citas</a>
				<ul>
					<li><a href="<?php echo base_url(); ?>citas/coger">Solicitar</a></li>
					<li><a href="<?php echo base_url(); ?>citas/mostrar">Consultar</a></li>
				</ul>
			</li>
			<li><a href="">Servicios</a>
				<ul>
					<li><a href="">Exóticos</a></li>
					<li><a href="">Domésticos</a></li>
				</ul>
			</li>
			<?php if(!empty($userId) AND !empty($userNivel)) { ?>
				<li><a href="">Mi cuenta</a>
					<ul>
						<li><a href="<?php echo base_url(); ?>users/informacion">Mis datos</a></li>
						<li><a href="<?php echo base_url(); ?>users/modificar">Modificar datos</a></li>
						<li><a href="<?php echo base_url(); ?>users/contrasena">Cambiar contraseña</a></li>
						<li><a href="<?php echo base_url(); ?>users/logout">Cerrar sesión</a></li>
					</ul>
				</li>
				<?php if($userNivel == 1) { ?>
					<li><a href="<?php echo base_url(); ?>historias/consultar">Historias</a></li>
					<li><a href="<?php echo base_url(); ?>contactos/mostrar">Mensajes</a></li>
				<?php }else { ?>
					<li><a href="">Mis mascotas</a>
						<ul>
							<li><a href="<?php echo base_url(); ?>mascotas/informacion">Ver mascotas</a></li>
							<li><a href="<?php echo base_url(); ?>mascotas/registro">Añadir mascota</a></li>
							<li><a href="<?php echo base_url(); ?>mascotas/modificar">Modificar datos</a></li>
							<li><a href="<?php echo base_url(); ?>mascotas/eliminar">Eliminar mascota</a></li>
						</ul>
					</li>
				<?php } ?>
			<?php }else { ?>
				<li><a href="<?php echo base_url(); ?>users/login">Login</a></li>
				<li><a href="<?php echo base_url(); ?>users/registro">Registro</a></li>
			<?php }	?>
			<li><a href="<?php echo base_url(); ?>contacto">Contacto</a></li>
		</ul>
	</div>
</body>
</html>