<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articulo</title>
    <script src="js/articulo.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/articulo.css" type="text/css">
</head>
<body>
    <?php
        session_start();
        $userName=$_SESSION["user"];
        if (!$userName)  header("../Location:index.html");
        include "../conexion.php";
        $id=$_GET["id"];
        if(intval($id)>0){
            if($con){
                $sql="select  * from articulo where id=".$id." Limit 1";
                if($resultado=$connection->query($sql)){
                    while($row=$resultado->fetch_assoc()){
                        echo "<h1>".$row["title"]."</h1>";
                        echo "<p>".$row["text"]."</p>";
                        echo "<img src='../uploads/".$row["image"]."' width='300px'>";
                        echo "<p>".$row["user"]." / ".$row["date"]."</p>";
                    }
                }
                else echo "<p>Error de conexion</p>";
                $sql="select * from  comentarios where articulo=".$id;
                if($resultado=$connection->query($sql)){
                    while($row=$resultado->fetch_assoc()){
                        $s="";
                        $s=$s."<div class='comments'>";
                        $s=$s."<p>".$row["comment"]."</p>";
                        $s=$s."<p>".$row["user"]." / ".$row["date"]."</p>";
                        $s=$s."</div>";
                        echo $s; 
                    }
                }
                $connection->close();
            }
            else echo "<p>Error de conexion</p>";
        }
        else{
            echo "<p>El articulo no fue encontrado</p>";
            die();
        }
    ?>
    <form id="frmComment">
        <input type="text" name="txtId" id="txtId" value="<?php if(intval($id)>0) echo $id?>" hidden>
        <textarea name="txtComment" id="txtComment" cols="100" rows="5"></textarea>
        <input type="button" value="Enviar" id="btnEnviar">
    </form>
</body>
</html>