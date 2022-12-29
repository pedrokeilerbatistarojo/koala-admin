jQuery(document).ready(function($){

    //  seccion asignar tallas

    //  boton confirmar tallas
    let confirmar_tallas = document.getElementById('confirmar-tallas');
    confirmar_tallas.addEventListener('click', function(evento){
        let seccion_asignar_tallas = document.getElementById('seccion_asignar_tallas');
        let seccion_subir_logo = document.getElementById('seccion_subir_logo');


        var valoresAceptados = /^[0-9]+$/;
        var bandera = false;

        let value_input_cuantos = document.getElementById('input_cantidad_seleccionada').getAttribute('value');

        let input_tallas = document.querySelectorAll("#input_talla");

        let suma_asignados = 0;
        for(i=0 ; i < input_tallas.length ; i++){
            let value_input_tallas = input_tallas[i].value;

            if(value_input_tallas.match(valoresAceptados)){
                suma_asignados += parseFloat(value_input_tallas);
                bandera = true;
            }
            else {
                window.alert('Debe entrar valores numericos en los campos de tallas.');
                bandera = false;
                return false
            }
        }
        if(bandera === true){
             if( parseFloat(suma_asignados) === parseFloat(value_input_cuantos) ){
                 $("#seccion_asignar_tallas").slideUp("slow");
                 $("#seccion_subir_logo").slideDown("slow");
                 $("#seccion_subir_logo").classList.toggle('active');
                // seccion_asignar_tallas.style.setProperty('display', 'none');
                // seccion_subir_logo.style.setProperty('display', 'block');
            }
             else if( parseFloat(suma_asignados) > parseFloat(value_input_cuantos) ){
                 var dif_mas = parseInt(suma_asignados ) - parseFloat(value_input_cuantos);
                 alert('Esta asignando ' + dif_mas + ' undades de más.');
             }
             else {
                 var dif = parseInt(value_input_cuantos) - parseFloat(suma_asignados);
                 alert('Le faltan por asignar ' +dif+ ' unidades.');
             }
        }
    });

    //  boton decir tallas mas tarde
    let tallas_mas_tarde = document.getElementById('decide-sizes-later');
    tallas_mas_tarde.addEventListener('click', function(evento){
        let seccion_asignar_tallas = document.getElementById('seccion_asignar_tallas');
        let seccion_subir_logo = document.getElementById('seccion_subir_logo');

        let input_tallas = document.querySelectorAll("#input_talla");

        for(i=0 ; i < input_tallas.length ; i++){
            input_tallas[i].value = 0;
        }

        $("#seccion_asignar_tallas").slideUp("slow");
        $("#seccion_subir_logo").slideDown("slow");
        $("#seccion_subir_logo").classList.toggle('active');

        // seccion_asignar_tallas.style.setProperty('display', 'none');
        // seccion_subir_logo.style.setProperty('display', 'block');
    });


    //seccion subir logos

    let confirmar_logos = document.getElementById('confirmar-logo');
    confirmar_logos.addEventListener('click', function(evento){
        var formData = new FormData();
        var files = $('#uploadImage1')[0].files[0];
        var files2 = $('#uploadImage2')[0].files[0];
        var files3 = $('#uploadImage3')[0].files[0];
        var files4 = $('#uploadImage4')[0].files[0];

        let id_prod = document.getElementById('id_producto').getAttribute('value');

        formData.append('id_prod',id_prod);
        formData.append('file1',files);
        formData.append('file2',files2);
        formData.append('file3',files3);
        formData.append('file4',files4);

        var url = SubirLogoAjax.url;
        console.log(url)
        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                var response_decode = JSON.parse(response);
                var subida_exitosa = true;
                if( response_decode.success !== false ){
                    if(response_decode.url_1 !== ''){
                        var src_1 = response_decode.url_1;
                        var input_img_ruta1 = document.getElementById('input_img_ruta1');
                        input_img_ruta1.setAttribute('value', src_1);
                    }
                    if(response_decode.url_2 !== ''){
                        var src_2 = response_decode.url_2;
                        var input_img_ruta2 = document.getElementById('input_img_ruta2');
                        input_img_ruta2.setAttribute('value', src_2);
                    }
                    if(response_decode.url_3 !== ''){
                        var src_3 = response_decode.url_3;
                        var input_img_ruta3 = document.getElementById('input_img_ruta3');
                        input_img_ruta3.setAttribute('value', src_3);
                    }
                    if(response_decode.url_4 !== ''){
                        var src_4 = response_decode.url_4;
                        var input_img_ruta4 = document.getElementById('input_img_ruta4');
                        input_img_ruta4.setAttribute('value', src_4);
                    }
                        alert('Se subieron las imágnes con éxito.');
                        $("#seccion_subir_logo").slideUp("slow");
                        $("#content_extras").slideDown("slow");
                        $("#content_extras").classList.toggle('active');
                }
                else {
                    alert('Algo salió mal con la carga del archivo.');
                }
            }
        })
    });

    let decir_logos_mas_tarde = document.getElementById('decide-colors-later');
    decir_logos_mas_tarde.addEventListener('click', function(evento){

        let seccion_subir_logo = document.getElementById('seccion_subir_logo');
        let seccion_extras = document.getElementById('content_extras');


        $("#seccion_subir_logo").slideUp("slow");
        $("#content_extras").slideDown("slow");
        $("#content_extras").classList.toggle('active');
        // seccion_subir_logo.style.setProperty('display', 'none');
        // seccion_extras.style.setProperty('display', 'block');


    });




    // seccion extras, sumar el importe del empaquetado al importe total
    $("#extra1").click(function () {
        var extra1 = $('#extra1').prop("checked");

        //  esto es para sumarle el cargo del embolsado
        let preciounitario_pre = document.getElementById('preciounitario_pre');
        let value_preciounitario_pre = document.getElementById('input_precio_producto_final').value;

        let input_preciounitario_pre = document.getElementById('input_precio_producto_final');

        let unidades_pre = document.getElementById('unidades_pre').innerText;

        let preciototalfinal_pre = document.getElementById('preciototalfinal_pre');
        let value_preciototalfinal_pre = document.getElementById('preciototalfinal_pre').innerHTML;

        var suma_cargo_embolsado = parseFloat(value_preciounitario_pre) + 0.20;

        var mult_cargo_x_unidades = 0.20 * parseFloat(unidades_pre);
        var suma_cargo_al_importe =  parseFloat(mult_cargo_x_unidades) + parseFloat(value_preciototalfinal_pre);

        var iva = (suma_cargo_al_importe * 21)/100;

        if(extra1 === true){
            preciounitario_pre.innerText = suma_cargo_embolsado;
            input_preciounitario_pre.setAttribute('value', suma_cargo_embolsado);

            preciototalfinal_pre.innerHTML = suma_cargo_al_importe;

            var iva_pre = $('#iva_pre');
            iva_pre.text(iva);
        }
        else{
            var resta_precio_final_precio_embolsado = parseFloat(value_preciototalfinal_pre) - parseFloat(mult_cargo_x_unidades);
            preciototalfinal_pre.innerHTML = resta_precio_final_precio_embolsado;

            let preciounitario_pre = document.getElementById('preciounitario_pre');
            let value_preciounitario_pre = preciounitario_pre.innerText;

            var resta_cargo_embolsado = parseFloat(value_preciounitario_pre) - 0.20;
            preciounitario_pre.innerText = resta_cargo_embolsado;

            var iva_resta = (resta_precio_final_precio_embolsado * 21)/100;
            var iva_pre = $('#iva_pre');
            iva_pre.text(iva_resta);
        }
    });




    //  mostrar los datos del select
    function MostrarImagenyColor(src, color){
        jQuery(function () {
            let p_color = document.getElementById('mostrar_color');
            let html_p_color = ``;
            html_p_color += `<div class="row">`
            html_p_color += `<div class="col-6 col-sm-5 col-md-4 col-lg-3 col-xl-3">`
            html_p_color += `<span class="d-flex">Elige cantidad para COLOR ${color}</span>`;
            html_p_color += `</div>`
            html_p_color += `<div class="col-6 col-md-5 col-lg-4 col-xl-3">`
            html_p_color += `<img id='imgColor' src="${src}" width='70' height='70' style="">`;
            html_p_color += `</div>`
            html_p_color += `</div>`
            p_color.innerHTML = html_p_color;

            let p_mostrar_img_reparto = document.getElementById('mostrar_img_reparto');
            let html_p_mostrar_img_reparto = ``;
            html_p_mostrar_img_reparto += `<img id='imgColor' src="${src}" width='70' height='70'>`;
            p_mostrar_img_reparto.innerHTML = html_p_mostrar_img_reparto;

        });
    }

    //  capturar el select del color y colocarle mediante js
    $( "select[name=attribute_pa_colores]" ).change(function () {
        var color = $(this).val();
        var color_es = $( "span[id=color_es]" );
        color_es.text(color);


        var id_prod = $( "input[name=product_id]" ).val();


        $.ajax({
            type: "POST",
            url: AjaxColoresSelect.url,
            data: {
                action: "capturar_color_seleccionado",
                nonce_ajax_colores_select: AjaxColoresSelect.seguridad_ajax_colores_select,
                id_producto: id_prod,
                color: color
            },
            success:function (datos_enviados) {
                let envio_decode = JSON.parse(datos_enviados);

                let src = envio_decode.url_imagen;
                let color = envio_decode.color_escogido;

                MostrarImagenyColor(src, color);
            }
        })

    });





});