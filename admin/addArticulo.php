<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Articulo</title>
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
                $title=$_POST["txtTitle"];
                $text=$_POST["txtText"];
                $valTitle=false;
                $valText=false;
                if(preg_match("/^[a-zA-Z0-9\ñ\Ñ\-\.\, ]{5,50}$/", $title)) $valTitle=true;
                if(preg_match("/^[a-zA-Z0-9\ñ\Ñ\-\.\, ]+$/", $text)) $valText=true;
                if($valText && $valTitle){
                    if($_FILES["fileUpload"]["size"]<5242880){
                        if($_FILES["fileUpload"]["type"]=="image/png" || $_FILES["fileUpload"]["type"]=="image/jpg" || $_FILES["fileUpload"]["type"]=="image/jpeg"){
                            if(move_uploaded_file($_FILES["fileUpload"]["tmp_name"],"../uploads/".basename($_FILES["fileUpload"]["name"]))){
                                $sql="insert into articulo(title,text,image,user,date) values ('".$title."','".$text."','".basename($_FILES["fileUpload"]["name"])."','".$userName."',CURDATE())";
                                if($connection->query($sql)){
                                    //echo "<p>El articulo se agrego de forma correcta <a href='nuevoArticulo.php'>volver</a></p>";
                                    header("Location: panel.php");
                                }
                                else echo "<p>Error de comunicaciones <a href='nuevoArticulo.php'>volver</a></p>";
                            }
                            else echo "<p>Error de carga <a href='nuevoArticulo.php'>volver</a></p>";
                        }
                        else echo "<p>Formato de archivo no permitido <a href='nuevoArticulo.php'>volver</a></p>";
                    }
                    else echo "<p>El archivo supera el limite del tamaño <a href='nuevoArticulo.php'>volver</a></p>";
                }
                else echo "<p>Daos enviado no validos <a href='nuevoArticulo.php'>volver</a></p>";
                $connection->close();
            }
            
        }
        else header("Location:../index.html");
    ?>
</body>
</html>