<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar</title>
</head>
<body>
    <h1>Actualizar</h1>
    <?php
        $oldId=$_POST["txtOldId"];
        $id=$_POST["txtId"];
        $newuser=$_POST["txtName"];
        $email=$_POST["txtEmail"];
        $type=$_POST["txtType"];
        $state=$_POST["txtState"];

        $valOldId=false;
        $valId=false;
        $valUSer=false;
        $valEmail=false;
        $valtype=false;
        $valState=false;

        if(preg_match("/^I[0-9]{6,12}$/",$oldId)) $valOldId=true;
        if(preg_match("/^I[0-9]{6,12}$/",$id)) $valId=true;
        if(preg_match("/^[a-zA-Z\ñ\Ñ ]{3,20}$/",$newuser)) $valUSer=true;
        if(preg_match("/^[_a-z0-9-]+(.[_a-z0-9-]+)@[a-z0-9-]+(.[a-z0-9-]+)(.[a-z]{2,3})$/",$email)) $valEmail=true;
        if($type=='a' || $type=='u') $valtype=true; 
        if(preg_match("/^[0-1]{1}$/",$state)) $valState=true;

        if($valOldId && $valId && $valUSer && $valEmail && $valtype && $valState){
            include "../conexion.php";
            if($con){
                $sql="update usuarios set id='".$id."',user='".$newuser."',email='".$email."',type='".$type."',state='".$state."' where id='".$oldId."'";
                if($connection->query($sql)){
                    echo "<p>Datos actualizados correctamente</p>";
                }else{
                    echo "<p>Error en la consulta</p>";
                }
                echo "<a href='modificar.php'>volver</a>";
                $connection->close();
            }
            
        }
    ?>
</body>
</html>