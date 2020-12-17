$(document).redy(function(){
    $("#btnEnviar").click(function(){
        $.ajax({
            data: $("#frmComment").serialize(),
            method: "POST",
            url: "addComments.php",
            success: function(resp){
                let r=parseInt(resp);
                if(r==1){
                    alert("El comentario se agrego exitosamente")
                }
                else{
                    alert(resp)
                }
            }
        });
    });
});