<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css2/style7.css" type="text/css">
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
                            echo "<h1>Binvenido a Mundo Gaming</h1><hr>";
                            echo "<p>Aqui encontraras todo sobre los videojuegos, desde noticias 
                            actualizadas, hasta asesorias para todos aquellos que estan empezando en el
                            mundo de los videojuegos. </p>";
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
    <h1>Nuevo articulo</h1>
    <form action="addArticulo.php" method='POST' enctype="multipart/form-data">
        <table id="tabla">
            <tr>
                <td>Titulo: </td>
                <td><input type="text" name="txtTitle" id="txtTitle"></td>
            </tr>
            <tr>
                <td>Texto: </td>
                <td><textarea name="txtText" id="txtText" cols="100" rows="20"></textarea></td>
            </tr>
            <tr>
                <td>Imagen: </td>
                <td><input type="file" name="fileUpload" id="fileUpload" accept="image/png, .jpg, .jpeg"></td>
            </tr>
        </table>
        <input type="submit" value="Crear articulo">
    </form>
</body>
</html>