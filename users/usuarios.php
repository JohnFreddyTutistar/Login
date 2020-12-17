<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <script src="js/jquery-3.5.0.js" type="text/javascript"></script>
    <script src="js/usuarios.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css"> 
</head>
<body>
    <?php
        session_start();
        $userName=$_SESSION["user"];
        if ($userName){
                echo "<a href='configuracion.php' id='conf'>configuracion</a><br>";
                echo "<a href='../close.php'>cerrar sesion</a>";
                echo "<h1>Binvenido(a) ".$userName." </h1>";
        }
        else header("../Location:index.html");
    ?>
    <hr>
    <h1>Articulos</h1>
    <div id="main">
        <nav id="menu">
            <?php
                include "../conexion.php";
                if($con){
                    $sql="select id,title,date from articulo";
                    if($resultado=$connection->query($sql)){
                        while($row=$resultado->fetch_assoc()){
                            echo "<input type='button' value='".$row["title"]." / ".$row["date"]."' id='".$row["id"]."' class='btnArticulo'><br>";
                        }
                    }
                    $connection->close();
                }
                else echo "<p>Error de cominicacion</p>";
            ?>
        </nav>
        <section id="articulo"></section>
    </div>
</body>
</html>