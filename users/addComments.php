    <?php
        session_start();
        $userName=$_SESSION["user"];
        if (!$userName)  header("../Location:index.html");
        $id=$_POST["txtId"];
        $comment=$_POST["txtComment"];
        if(intval($id)>0){
            if(preg_match("/^[a-zA-Z0-9\ñ\Ñ\-\.\, ]+$/",$comment)){
                include "../conexion.php";
                $sql="insert into comentarios (articulo,comment,user,date) values (".$id.",'".$comment."','".$userName."',CURDATE())";
                if($connection->query($sql)){
                    echo "1";
                }
                else echo "<p>Error de conexion</p>";
            }
            else "<p>Datos eviados no validos /p>";
        }
    ?>
