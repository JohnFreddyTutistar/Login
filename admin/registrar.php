<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Registrar</h1>
    <?php
        $id=$_POST["txtId"];
        $newuser=$_POST["txtName"];
        $newpassword=$_POST["txtPassword"];
        $email=$_POST["txtEmail"];
        $type=$_POST["txtType"];
        $state=$_POST["txtState"];

        $valId=false;
        $valUSer=false;
        $valPass=false;
        $valEmail=false;
        $valtype=false;
        $valState=false;

        if(preg_match("/^I[0-9]{6,12}$/",$id)) $valId=true;
        if(preg_match("/^[a-zA-Z\ñ\Ñ ]{3,20}$/",$newuser)) $valUSer=true;
        if(preg_match("/^[a-zA-Z\ñ\Ñ0-9\-\_\*\+\!\&]{8,15}$/",$newpassword)) $valPass=true;
        if(preg_match("/^[_a-z0-9-]+(.[_a-z0-9-]+)@[a-z0-9-]+(.[a-z0-9-]+)(.[a-z]{2,3})$/",$email)) $valEmail=true;
        if($type=='a' || $type=='u') $valtype=true;
        if(preg_match("/^[0-1]{1}$/",$state)) $valState=true;

        if($valId && $valUSer && $valPass && $valEmail && $valtype && $valState){
            include "../conexion.php";
            if($con){
                $sql="insert into usuarios values ('".$id."','".$newuser."',sha2('".$newpassword."',256),'".$email."','".$type."','".$state."')";
                if($connection->query($sql)){
                    echo "<p>Registro exitoso <a href='panel.php'>volver</a></p>";
                }else{
                    echo "<p>Error en la consulta <a href='registro.html'>volver</a></p>";
                }
                $connection->close();
            }else{
                echo "<p>Error de conexion <a href='registro.html'>volver</a></p>";
            }
        }else{
            echo "<p>Error: los datos ingresados incumplen las condiciones <a href='registro.html'>volver</a></p>";
        }

    ?>
</body>
</html>