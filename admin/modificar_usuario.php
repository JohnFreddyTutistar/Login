<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
    <link rel="stylesheet" href="css2/style5.css" type="text/css">
</head>
<body>
    <h1>Actualizacion</h1>
    <form action="update.php" method="POST">
        <?php
        echo "<p><a href='modificar.php'>volver</a></p>";
            $id=$_POST["id"];
            if(preg_match("/^I[0-9]{6,12}$/",$id)){
                include "../conexion.php";
                if($con){
                    $sql="select * from usuarios where id='".$id."'";
                    if($resultado=$connection->query($sql)){
                        while($row=$resultado->fetch_assoc()){
                            echo "<table>";
                            echo "<tr><td>Id:</td>
                            <td><input type='text' name='txtOldId' id='txtOldId' value='".$row["id"]."' required hidden></td></tr>";
                            echo "<tr><td>Id:</td>
                            <td><input type='text' name='txtId' id='txtId' value='".$row["id"]."' placeholder='I######'></td></tr>";
                            echo "<tr><td>Usuario:</td>
                            <td><input type='text' name='txtName' id='txtName' value='".$row["user"]."' placeholder='nombre de usuario' required></td></tr>";
                            echo "<tr><td>Correo:</td>
                            <td><input type='text' name='txtEmail' id='txtEmail' value='".$row["email"]."' placeholder='email@example.com' required></td></tr>";
                            echo "<tr><td>Tipo: </td>
                            <td><input type='text' name='txtType' id='txtType' value='".$row["type"]."' placeholder='(a)admin / (u)usuario' required></td></tr>";
                            echo "<tr><td>Estado:</td>
                            <td><input type='text' name='txtState' id='txtState' value='".$row["state"]."' placeholder='(1)activo / (0)inactivo' required></td><tr>";
                            echo "</table>";
                        }
                    }
                }
            }
        ?>
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>