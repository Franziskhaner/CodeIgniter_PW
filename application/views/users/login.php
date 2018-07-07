<!DOCTYPE html>
<html>  
<head>
    <title>Login</title>
</head>
<body>
<div id='cuerpo'>
    <form action="" method="post">
        <table id='tabla1' cellspacing=10>
            <tr><td><h2>Login</h2></td></tr>
            <tr><td><input type="text" style='width: 100%;' name="dni" placeholder="DNI" required value=""></td></tr>
            <tr><td><input type="password" style='width: 100%;' name="password" placeholder="Contraseña" required></td></tr>
            <tr><td><input type="submit" name="loginSubmit" value="Entrar"></td></tr>
            <tr><td><?php
            if(!empty($success_msg)){
                echo '<p class="statusMsg">'.$success_msg.'</p>';
            }elseif(!empty($error_msg)){
                echo '<p class="statusMsg">'.$error_msg.'</p>';
            }
            ?></td></tr>
            <tr><td>¿No estas registrado? <a href="<?php echo base_url(); ?>users/registro">Registrate aqui</a></td></tr>
        </table>
    </form>
</div>
</body>
</html>