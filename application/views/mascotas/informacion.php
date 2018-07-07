<!DOCTYPE html>
<html>
<head>

<style >
#tabla1 {
    border-radius: 16px 16px 16px 16px;
    -moz-border-radius: 16px 16px 16px 16px;
    -webkit-border-radius: 16px 16px 16px 16px;
    border: 3px solid blue;
}
#imagen {
    background-repeat: no-repeat;
    background-position: left top;
    background-size: cover;
    height: 150px;
    width: 150px;
    padding: 10px;
    border-radius: 25px;
}
</style>
</head>
<body>
    <div id='cuerpo'>
        <h2>Información mascotas</h2>
        <div>
            <?php
                if(!empty($mascotas)) {
                    foreach($mascotas as $key => $value) {
                        echo "<table id='tabla1' cellspacing=6>";
                        echo "<tr><th style='text-align: left; font-size: 140%; text-align: center;' colspan=2>".$value['nombre']."</th></tr>";
                        echo "<tr><td><div id='imagen' style='background-image: url(".$value['imagen'].");'> </div></td></td><td style='vertical-align: top;'><table cellspacing=5>";
                        echo "<tr style='height: 10px;'></tr>";
                        echo "<tr><th style='text-align: left;'>Tipo: </th><td>".$value['tipo']."</td></tr>";
                        echo "<tr><th style='text-align: left;'>Raza: </th><td>".$value['raza']."</td></tr>";
                        echo "<tr><th style='text-align: left;'>F. Nacimiento: </td><td>".$value['fnacimiento']."</td></tr>";
                        echo "<tr><th style='text-align: left;'>Sexo: </th><td>".$value['sexo']."</td></tr>";
                        echo "</table></td></tr><table><br>";
                    }
                }else{
                    echo "No tenemos registrada ninguna mascota a su nombre. ";
                    echo "<a href=".base_url().'mascotas/registro'.">Añadir mascota</a>";
                }
            ?>
        </div>
    </div>
</body>
</html>