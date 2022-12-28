jQuery(document).ready(function($){

    $("#calcula_tu_precio").click(function () {
        var select_color = $("select[name=attribute_pa_color]").val();
        var select_tallas = $("select[name=attribute_pa_talla]").val();

        if(select_color === "" || select_tallas === ""){
            window.alert("Debe seleccionar todas las opciones variables para continuar.");
        }
        else{
            let contenedor_general = document.getElementById('contenedor_general');
            let contenedor_general_elementStyle = window.getComputedStyle(contenedor_general);
            let contenedor_general_elementDisplay = contenedor_general_elementStyle.getPropertyValue('display');

            let content_cuantos = document.getElementById('content_cuantos');
            let content_cuantos_elementStyle = window.getComputedStyle(content_cuantos);
            let content_cuantos_elementDisplay = content_cuantos_elementStyle.getPropertyValue('display');

            if(contenedor_general_elementDisplay === 'none'){
                contenedor_general.style.setProperty('display', 'block');

                let id_salto = contenedor_general.id;

			
				
                if(content_cuantos_elementDisplay === 'none'){
                    content_cuantos.style.setProperty('display', 'block');

                   // $("html, body").animate({ scrollTop: $('#'+id_salto).offset().top }, 2000);
					$("html, body").animate({ scrollTop: $('#tab-description').offset().top }, 1800);
             
                }
            }
        }
    });

});