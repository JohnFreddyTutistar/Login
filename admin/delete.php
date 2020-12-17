<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>
</head>
<body>
    <h1>Eliminar usuario</h1>
    <?php
        $code=$_POST["id"];
        if(preg_match("/^I[0-9]{6,12}$/",$code)){
            include "../conexion.php";
            if($con){
                $sql="delete from usuarios where id='".$code."'";
                if($connection->query($sql)){
                    echo "<p>El usuario fue eliminado</p>";
                }else{
                    echo "<p>Error en la consulta</p>";
                }
                echo "<a href='eliminar.php'>volver</a>";
                $connection->close();
            }
        }

    ?>
</body>
</html>