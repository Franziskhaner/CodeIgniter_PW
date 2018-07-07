<!DOCTYPE html>
<html>
<head>
    <title>Cambiar contraseña</title>
</head>
<body>
    <div id='cuerpo'>
        <form method='POST'>
            <table id='tabla1' cellspacing=10>
                <tr><td colspan=2><h2>Cambiar contraseña</h2></td></tr>
                <tr><td>Contraseña anterior: </td><td><input type='password' name='passanterior' required=""></td></tr>
                <tr><td>Nueva contraseña: </td><td><input type='password' name='pass1' id='pass1' required=""></td></tr>
                <tr><td>Repita la contraseña: </td><td><input type='password' name='pass2' id='pass2' required=""></td></tr>
                <tr><td colspan=2><input type='submit' name='contrasenasubmit' value='Cambiar' onclick='if(document.getElementById("pass1").value != document.getElementById("pass2").value) { alert("Las contraseñas no coinciden, reviselas"); return false;}else return true;'></td></tr>
            </table>
        </form>
    </div>
</body>
</html>