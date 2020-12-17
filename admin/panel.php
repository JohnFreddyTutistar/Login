<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel</title>
    <link rel="stylesheet" href="css2/style2.css" type=text/css>
</head>
<body>
    <?php
        session_start();
        $userName=$_SESSION["user"];
        if ($userName){
            include "../conexion.php";
            if($con){
                $sql="select * from usuarios where user='".$userName."'";
                if($resultado=$connection->query($sql)){
                    if($row=$resultado->fetch_assoc()){
                        if($row["type"]=='a'){
                            echo "<a href='../close.php' id='cls'>Cerrar sesion</a><br>";
                            echo "<h1>Binvenido(a) admin ".$userName." </h1><hr>";
                        } 
                        else{
                            echo "<p>No tiene autorizacion para ingresar <a href='../users/usuarios.php'>volver</a></p>";
                            $connection->close();
                            die();
                        } 
                    }
                }
                $connection->close();
            }
            
        }
        else header("Location:../index.html");
    ?>
    <table id="tabla">  
            <td><a href="registro.html">Registrar</a></td>
            <td><a href="modificar.php">Modificar</a></td>
            <td><a href="eliminar.php">Eliminar</a></td>
    </table>
    <h1>Panel</h1>
    <?php
        
    ?>
    <input type="button" value="Nuevo articulo" id="btnNew" onclick="window.location.href='nuevoArticulo.php'">
</body>
</html>