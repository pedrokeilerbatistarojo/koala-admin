jQuery(document).ready(function($){

    $(document).ready(function(){
        $("#seccion_cuantos").on("click", function (){
            if ($("#content_cuantos").is(":hidden")) {
                $("#content_cuantos").slideDown("slow");
                $("#content_cuantos").classList.toggle('active');
            }else {
                $("#content_cuantos").slideUp("slow");
            }
        });
    });

    $(document).ready(function(){
        $("#seccion_personalizalo").on("click", function (){
            if ($("#content_personalizalo").is(":hidden")) {
                $("#content_personalizalo").slideDown("slow");
                $("#content_personalizalo").classList.toggle('active');
            }else {
                $("#content_personalizalo").slideUp("slow");
            }
        });
    });

    $(document).ready(function(){
        $("#button_seccion_cuando").on("click", function (){
            if ($("#seccion_cuando").is(":hidden")) {
                $("#seccion_cuando").slideDown("slow");
                $("#seccion_cuando").classList.toggle('active');
            }else {
                $("#seccion_cuando").slideUp("slow");
            }
        });
    });

    $(document).ready(function(){
        $("#seccion_repartir_unidades").on("click", function (){
            if ($("#seccion_asignar_tallas").is(":hidden")) {
                $("#seccion_asignar_tallas").slideDown("slow");
                $("#seccion_asignar_tallas").classList.toggle('active');
            }else {
                $("#seccion_asignar_tallas").slideUp("slow");
            }
        });
    });

    $(document).ready(function(){
        $("#seccion_logo").on("click", function (){
            if ($("#seccion_subir_logo").is(":hidden")) {
                $("#seccion_subir_logo").slideDown("slow");
                $("#seccion_subir_logo").classList.toggle('active');
            }else {
                $("#seccion_subir_logo").slideUp("slow");
            }
        });
    });

    $(document).ready(function(){
        $("#seccion_extras").on("click", function (){
            if ($("#content_extras").is(":hidden")) {
                $("#content_extras").slideDown("slow");
                $("#content_extras").classList.toggle('active');
            }else {
                $("#content_extras").slideUp("slow");
            }
        });
    });


});
