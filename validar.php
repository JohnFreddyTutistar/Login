    <?php
        session_start();
        include "conexion.php";
        if($con){
           $userName=$_POST["txtUser"];
           $Pass=$_POST["txtPassword"];

           $valName=false;
           $valPass=false;

           if(preg_match("/^[a-zA-Z\ñ\Ñ0-9 ]{3,30}$/",$userName)) $valName=true;
           if(preg_match("/^[a-zA-Z\ñ\Ñ0-9\-\_\*\+\!\&]{8,15}$/",$Pass)) $valPass=true;
           if($valName && $valPass){
                $sql="select * from usuarios where user='".$userName."' and password=sha2('".$Pass."',256)"; 
                if($resultado=$connection->query($sql)){
                    if($row=$resultado->fetch_assoc()){
                        if($row["state"]==1){
                            
                            if($row["type"]=='a'){
                                $_SESSION["user"]=$userName;
                                echo "1";
                            }  
                            else{
                                if($row["type"]=='u'){
                                   $_SESSION["user"]=$userName;
                                   echo "2";
                                }   
                            }
                        }
                        else echo "3";    
                    }
                    else echo "4";
                }
                else echo "5";
            }
            else echo "6";
            $connection->close();
        }
        else echo "5";
    ?>