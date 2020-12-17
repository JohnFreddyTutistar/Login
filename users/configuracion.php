<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuracion</title>
</head>
<body>
    <h1>Modificar informacion</h1>
    <form action="modificar_usuario.php" method="POST">
        <table>
            <?php
                include "../conexion.php";
                if($con){
                    $sql="select password,email from usuarios";
                    if($resultado=$connection->query($sql)){
                        while($row=$resultado->fetch_assoc()){
                            echo "<tr>";
                            echo "<td>input type='radio' name='contraseña' value'".$row["password"]."'</td>";
                            echo "</tr>";
                            //echo "<tr>";
                            //echo "<td><input type='radio' name='id' value='".$row["id"]."'></td>";
                            //echo "<td><p>".$row["id"]."</p></td>";
                            //echo "<td><p>".$row["user"]."</p></td>";
                            //echo "</tr>";
                        }
                    }
                    echo "<a href='usuarios.php'>volver</a>";
                    $connection->close();
                }
            ?>
        </table>
        <input type="submit" value="Modificar">
    </form>
</body>
</html>