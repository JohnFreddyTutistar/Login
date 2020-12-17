$(document).ready(function(){
    $('body').on('click', '.btnArticulo', function(){
        $.ajax({
            url: "articulo.php?id="+($(this).attr('id')),
            success: function(resp){
                $("#articulo").html(resp);
            }
        });
    });
});