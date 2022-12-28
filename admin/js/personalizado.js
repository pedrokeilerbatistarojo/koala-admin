jQuery(document).ready(function($){

    $(document).on('click', '.btn_cancel', function(){
        // window.location.reload();
        location.reload();
    });


    //      borrar el campo dinamico generado en el modal de crear partes
    $(document).on('click', '.btn_dinamic_remove', function(){
        var button_id = $(this).attr('id');
        $("#row" +button_id+"").remove();
    });



    //      crear campos dinamicos para el modal de serigrafia
    var cant_campos = 1;
    $("#add_seri_dinamica").click(function () {
        cant_campos ++;
        if(cant_campos < 11){
            $("#serigrafias_campospersonalizados").append('<tr id="row'+cant_campos+'"><td><label for="serigrafia_dinamica" class="col-form-label" style="font-size: 14px; margin-top: 10px; margin-left: 10px">Serigrafia '+cant_campos+'</label></td><td><input type="text" name="serigrafia_dinamica[]" id="serigrafia_dinamica" class="form-control" style="width: 150px !important; margin-left: 10px !important; margin-top: 10px !important; margin-right: 10px !important;""></td><td><label for="serigrafia_dinamica_precio" class="col-form-label" style="font-size: 14px; margin-top: 10px">Precio</label></td><td><input type="number" name="serigrafia_dinamica_precio[]" id="serigrafia_dinamica_precio" class="form-control" style="width: 120px !important; margin-left: 10px !important; margin-right: 10px !important; margin-top: 10px !important;"></td><td><button name="remove_seri_dinamica" id="'+cant_campos+'" class="btn btn-danger btn_dinamic_remove_serigrafia" style="font-size: 14px; margin-top: 10px">X</button></td></tr>');
            return false;
        }
        return false;
    });


    //      borrar el campo dinamico generado en el modal de serigrafia
    $(document).on('click', '.btn_dinamic_remove_serigrafia', function(){
        var button_id = $(this).attr('id');
        $("#row" +button_id+"").remove();
    });



    //  ------  Seccion de envios   -------    //
    //      borrar envios via ajax
    $(document).on('click', '.btn_borrar_envio', function(){
        var envio_id = $(this).attr('id');
        var url = BorrarEnvioAjax.url;
        var confirmado = window.confirm('Está seguro que desea eliminar este Envío?');
        if(confirmado === true){
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    action: "eliminar_envio",
                    nonce_envio_borrar: BorrarEnvioAjax.seguridad_borrar,
                    id_envio: envio_id,
                },
                success:function () {
                    location.reload();
                }
            });
        }
    });


    //      Mostrar datos del envio a editar
    function MostrarDatosEnvio(envio_decode, select, cat_productos){
        jQuery(function () {
            let datos_del_envio = envio_decode;
            let id_envio = datos_del_envio['KoalaEnviosId'];
            let nombre_envio = datos_del_envio['KoalaEnviosNombre'];
            let dias_envio = datos_del_envio['KoalaEnviosDias'];
            let precio_envio = datos_del_envio['KoalaEnviosPrecio'];
            let descrip_envio = datos_del_envio['KoalaEnviosDescripcion'];
            let categorias_envio = datos_del_envio['KoalaEnviosCategorias'];
            let categorias_envio_decode = JSON.parse(categorias_envio);


            // console.log(select);

            const datos_importantes = {id_envio: id_envio, categorias: categorias_envio};
            const datos_importantes_a_string = JSON.stringify(datos_importantes);


            var base64 = btoa(datos_importantes_a_string);



            let body5 = document.getElementById('crearinputeditarenviocategoria');
            let html5 = ``;

            var url = EncontrarCatAsignadas.url;
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    action: "encontrar_cat_asignada",
                    nonce_encontrar_cat: EncontrarCatAsignadas.seguridad,
                    lis_cat_asignadas: categorias_envio_decode,
                },
                success:function (cat_list) {
                    let cat_list_decode = JSON.parse(cat_list);
                    // console.log(cat_list_decode);
                    for (let cat_nombre of cat_list_decode) {
                        html5 += `<tr><td><input type="checkbox" class="checkbox" name="descategorizar[]" value="${cat_nombre}"></td><td>${cat_nombre}</td></tr>`;
                    }
                    body5.innerHTML = html5;
                }
            });

            let body_datos = document.getElementById('datosimportantes');
            let html_datos = ``;
            html_datos += `<input type="text" id="datos_importantes" name="datos_importantes" value="${base64}" hidden>`;
            body_datos.innerHTML = html_datos;

            let body1 = document.getElementById('crearinputeditarenvionombre');
            let html1 = ``;
            html1 += `<input type="text" id="editarenvionombre" name="editarenvionombre" value="${nombre_envio}" style="width: 100%; margin-top: -5px;">`;
            body1.innerHTML = html1;

            let body2 = document.getElementById('crearinputeditarenviodias');
            let html2 = ``;
            html2 += `<input type="number" id="editarenviodias" name="editarenviodias" min="1" value="${dias_envio}" style="width: 100%; margin-top: -5px;">`;
            body2.innerHTML = html2;

            let body3 = document.getElementById('crearinputeditarenvioprecio');
            let html3 = ``;
            html3 += `<input type="number" id="editarenvioprecio" name="editarenvioprecio" min="0" step="0.01" value="${precio_envio}" style="width: 100%; margin-top: -5px;">`;
            body3.innerHTML = html3;

            let body4 = document.getElementById('crearinputeditarenviodescripcion');
            let html4 = ``;
            html4 += `<textarea id="editarenviodescripcion" name="editarenviodescripcion" style="width: 100%; height: 80px; margin-top: -5px;" >${descrip_envio}</textarea><br><br>`;
            body4.innerHTML = html4;

            let body6 = document.getElementById('event-dropdown_edit_envio');
            let html6 = ``;
            jQuery.each(select, (index, value) => {
                html6 +=`<option value="${value.id_cat}">${value.nomb_cat}</option>`;
            });
            body6.innerHTML = html6;

        });
    }


    //      editar envio via ajax
    $(document).on('click', '.btn_editar_envio', function(){
        var envio_id = $(this).attr('id');
        var url = EditarEnvioAjax.url;
        // console.log(url);
        $.ajax({
            type: "POST",
            url: url,
            data: {
                action: "editar_envio",
                nonce_envio_editar: EditarEnvioAjax.seguridad_editar,
                id_envio: envio_id,
            },
            success:function (datos_enviados) {
                let envio_decode = JSON.parse(datos_enviados);
                let envio = envio_decode.envio;
                let select_de_categ = envio_decode.categorias_select;
                let cat_productos = envio_decode.categorias_de_productos;

                MostrarDatosEnvio(envio, select_de_categ, cat_productos);
            }
        })
    });







    // --------   seccion de partes --------    //

    //      crear campos dinamicos en el modal de crear parte
    var i = 1;
    $("#add").click(function () {
        i++;
        if( i< 5){
            $("#campospersonalizados").append('<tr id="row'+i+'"><td><label for="partepersonalizado" class="col-form-label" style="font-size: 14px !important; margin-top: 10px">Parte '+i+'</label></td><td><input type="text" name="partepersonalizado[]" id="partepersonalizado" class="form-control" style="margin-left: 5px !important; margin-top: 10px"></td><td><button name="remove" id="'+i+'" class="btn btn-danger btn_dinamic_remove" style="margin-left: 10px !important; margin-top: 10px">X</button></td></tr>');
            return false;
        }

        return false;
    });

    //  eliminar parte
    $(document).on('click', '.btn_borrar_parte', function(){
        var parte_id = $(this).attr('id');
        var url = BorrarParteAjax.url;
        var confirmado = window.confirm('Si elimina esta Parte eliminará también las Serigrafías asociadas. ');
        if(confirmado === true){
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    action: "eliminar_parte",
                    nonce_parte_borrar: BorrarParteAjax.seguridad_parte,
                    id_parte: parte_id,
                },
                success:function () {
                    location.reload();
                }
            });
        }
    });


    //  editar partes
    $(document).on('click', '.btn_editar_parte', function(){
        var parte_id = $(this).attr('id');
        var url = EditarParteAjax.url;
        $.ajax({
            type: "POST",
            url: url,
            data: {
                action: "editar_parte",
                nonce_parte_editar: EditarParteAjax.seguridad_editar_parte,
                id_parte: parte_id,
            },
            success:function (datos_enviados) {
                let parte_decode = JSON.parse(datos_enviados);
                let parte = parte_decode.parte;
                let personalizado_padre = parte_decode.personalizado_padre;
                let imgs = parte_decode.imagenes;

                MostrarDatosParte(parte, personalizado_padre, imgs);
            }
        })
    });

    // Mostrar datos de partes a editar
    function MostrarDatosParte(parte_decode, personalizado_padre, imgs_galeria){

        let datos_partes = parte_decode;
        let id_parte = datos_partes['PersonalizadoParteId'];
        let parte_nombre = datos_partes['Parte'];
        let ruta_parte = datos_partes['ImgRutaParte'];
        let galeria = imgs_galeria.meta;


        let personalizado_padre_id = personalizado_padre['PersonalizadoId'];
        let personalizado_padre_nombre = personalizado_padre['PersonalizadoNombre'];

        const datos_importantes = {id_parte: id_parte};
        const datos_importantes_a_string = JSON.stringify(datos_importantes);


        var base64 = btoa(datos_importantes_a_string);

        let body_datos_imprtantes = document.getElementById('datos_importantes_parte');
        let html_datos_importantes_parte = ``;
        html_datos_importantes_parte += `<input type="text" id="datos_importantes_parte" name="datos_importantes_parte" value="${base64}" hidden>`;
        body_datos_imprtantes.innerHTML = html_datos_importantes_parte;

        let body_personalizado_padre = document.getElementById('personalizado_padre_parte');
        let html_personalizado_padre = ``;
        html_personalizado_padre += `<option value="${personalizado_padre_id}" >${personalizado_padre_nombre}</option>`;
        body_personalizado_padre.innerHTML = html_personalizado_padre;


        let body_parte = document.getElementById('parte_a_editar');
        let html_parte = ``;
        html_parte += `<input type="text" id="editarpartenombre" name="editarpartenombre" value="${parte_nombre}" style="width: 45%; font-size: 14px; margin-left: 145px !important;" >`;
        body_parte.innerHTML = html_parte;

        let body_parte_img = document.getElementById('parte_img');
        let html_parte_img = ``;
        jQuery.each(galeria, (index, value) => {
            html_parte_img +=`<div class="col-4" style="margin-top: 10px !important;"><input type="checkbox" class="checkbox" name="elegir_img" value="${value.url}"><img src="${value.url}" width="60" height="60" alt="${value.nombre}"></div>`;
        });
        body_parte_img.innerHTML = html_parte_img;
    }



    //  --------    termina la seccion de partes    ---------   //





    //  --------    seccion de personalizado    ----------  //

    //  eliminar personalizado
    $(document).on('click', '.btn_borrar_personalizado', function(){
        var personalizado_id = $(this).attr('id');
        var url = BorrarPersonalizadoAjax.url;
        var confirmado = window.confirm('Si elimina este Personalizado también eliminará todos los demas datos relacionados con este.');
        if(confirmado === true){
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    action: "eliminar_personalizado",
                    nonce_personalizado_borrar: BorrarPersonalizadoAjax.seguridad_personalizado,
                    id_personalizado: personalizado_id,
                },
                success:function () {
                    location.reload();
                }
            });
        }
    });


    //  editar personalizado
    $(document).on('click', '.btn_editar_personalizado', function(){
        var personalizado_id = $(this).attr('id');
        var url = EditarPersonalizadoAjax.url;
        $.ajax({
            type: "POST",
            url: url,
            data: {
                action: "editar_personalizado",
                nonce_personalizado_editar: EditarPersonalizadoAjax.seguridad_editar_personalizado,
                id_personalizado: personalizado_id,
            },
            success:function (datos_enviados) {
                let personalizado_decode = JSON.parse(datos_enviados);
                let personalizado = personalizado_decode.personalizado;
                let categorias_select = personalizado_decode.categorias_select;
                let categorias_de_productos = personalizado_decode.categorias_de_productos;

                MostrarDatosPersonalizado(personalizado, categorias_select, categorias_de_productos);
            }
        })
    });


    //      Mostrar datos de personalizado a editar
    function MostrarDatosPersonalizado(personalizado_decode, select, cat_productos){
        jQuery(function () {
            let datos_del_personalizado = personalizado_decode;
            let id_personalizado = datos_del_personalizado['PersonalizadoId'];
            let nombre_personalizado = datos_del_personalizado['PersonalizadoNombre'];
            let categorias_personalizado = datos_del_personalizado['PersonalizadoCategorias'];
            let categorias_personalizado_decode = JSON.parse(categorias_personalizado);


            // console.log(select);

            const datos_importantes = {id_personalizado: id_personalizado, categorias: categorias_personalizado};
            const datos_importantes_a_string = JSON.stringify(datos_importantes);


            var base64 = btoa(datos_importantes_a_string);



            let body5 = document.getElementById('quitar_categorias_editar_personalizado');
            let html5 = ``;

            var url = EncontrarCatPersonalizados.url;
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    action: "encontrar_cat_personalizado",
                    nonce_encontrar_cat_personalizado: EncontrarCatPersonalizados.seguridad,
                    lis_cat_asignadas_personalizado: categorias_personalizado_decode,
                },
                success:function (cat_list) {
                    let cat_list_decode = JSON.parse(cat_list);
                    // console.log(cat_list_decode);
                    for (let cat_nombre of cat_list_decode) {
                        html5 += `<tr><td><input type="checkbox" class="checkbox" name="descategorizar_personalizado[]" value="${cat_nombre}"></td><td>${cat_nombre}</td></tr>`;
                    }
                    body5.innerHTML = html5;
                }
            });

            let body_datos = document.getElementById('datos_importantes_personalizado');
            let html_datos = ``;
            html_datos += `<input type="text" id="datos_importantes_personalizado" name="datos_importantes_personalizado" value="${base64}" hidden>`;
            body_datos.innerHTML = html_datos;

            let body1 = document.getElementById('editarpersonalizadonombre');
            let html1 = ``;
            html1 += `<input type="text" id="personalizado_nombre" name="personalizado_nombre" value="${nombre_personalizado}" style="width: 80%; margin-left: 55px; font-size: 14px">`;
            body1.innerHTML = html1;


            let body6 = document.getElementById('event-dropdown_edit_personalizado');
            let html6 = ``;
            jQuery.each(select, (index, value) => {
                html6 +=`<option value="${value.id_cat}">${value.nomb_cat}</option>`;
            });
            body6.innerHTML = html6;

        });
    }





    //  ------  termina la seccion de personalizado ------- //



    //  -------     seccion de serigrafia   ---------   //

    //      borrar serigrafía
    $(document).on('click', '.btn_borrar_serigrafia', function(){
        var serigrafia_id = $(this).attr('id');
        var url = BorrarSerigrafiaAjax.url;
        var confirmado = window.confirm('Está seguro que desea eliminar esta Serigrafía?');
        if(confirmado === true){
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    action: "eliminar_serigrafia",
                    nonce_serigrafia_borrar: BorrarSerigrafiaAjax.seguridad_serigrafia,
                    id_serigrafia: serigrafia_id,
                },
                success:function () {
                    location.reload();
                }
            });
        }
    });

    //  editar serigrafia
    $(document).on('click', '.btn_editar_serigrafia', function(){
        var serigrafia_id = $(this).attr('id');
        var url = EditarSerigrafiaAjax.url;
        $.ajax({
            type: "POST",
            url: url,
            data: {
                action: "editar_serigrafia",
                nonce_serigrafia_editar: EditarSerigrafiaAjax.seguridad_editar_serigrafia,
                id_serigrafia: serigrafia_id,
            },
            success:function (datos_enviados) {
                let serigrafia_decode = JSON.parse(datos_enviados);
                let serigrafia = serigrafia_decode.serigrafia;
                let parte_padre = serigrafia_decode.parte_padre;
                let personalizado_padre = serigrafia_decode.personalizado_padre;

                MostrarDatosSerigrafia(serigrafia, parte_padre, personalizado_padre);
            }
        })
    });

         // Mostrar datos del envio a editar
    function MostrarDatosSerigrafia(serigrafia_decode, parte_padre, personalizado_padre){
        let datos_serigrafia = serigrafia_decode;
        let id_serigrafia = datos_serigrafia['PersonalizadoParteSerigrafiaId'];
        let serigrafia = datos_serigrafia['Serigrafia'];
        let precio_serigrafia = datos_serigrafia['PrecioSerigrafia'];
        let activa = datos_serigrafia['activo'];

        let parte_padre_id = parte_padre['PersonalizadoparteId'];
        let parte_padre_nombre = parte_padre['Parte'];

        let personalizado_padre_id = personalizado_padre['PersonalizadoId'];
        let personalizado_padre_nombre = personalizado_padre['PersonalizadoNombre'];

        const datos_importantes = {id_serigrafia: id_serigrafia};
        const datos_importantes_a_string = JSON.stringify(datos_importantes);


        var base64 = btoa(datos_importantes_a_string);

        let body_datos_imprtantes = document.getElementById('datos_importantes_serigrafia');
        let html_datos_importantes_serigrafia = ``;
        html_datos_importantes_serigrafia += `<input type="text" id="datos_importantes_serigrafia" name="datos_importantes_serigrafia" value="${base64}" hidden>`;
        body_datos_imprtantes.innerHTML = html_datos_importantes_serigrafia;

        let body_personalizado_padre = document.getElementById('personalizado_padre_serigrafia');
        let html_personalizado_padre = ``;
        html_personalizado_padre += `<option value="${personalizado_padre_id}" >${personalizado_padre_nombre}</option>`;
        body_personalizado_padre.innerHTML = html_personalizado_padre;

        let body_parte_padre = document.getElementById('parte_padre_serigrafia');
        let html_parte_padre = ``;
        html_parte_padre += `<option value="${parte_padre_id}">${parte_padre_nombre}</option>`;
        body_parte_padre.innerHTML = html_parte_padre;

        let body_serigrafia = document.getElementById('serigrafia_a_editar');
        let html_serigrafia = ``;
        html_serigrafia += `<input type="text" id="editarserigrafianombre" name="editarserigrafianombre" value="${serigrafia}" style="width: 100%; font-size: 14px; margin-left: 5px !important;" >`;
        body_serigrafia.innerHTML = html_serigrafia;

        let body_serigrafia_precio = document.getElementById('precio_a_editar');
        let html_serigrafia_precio = ``;
        html_serigrafia_precio += `<input type="number" id="editarserigrafiaprecio" name="editarserigrafiaprecio" min="0" step="0.01" value="${precio_serigrafia}" style="width: 100%; font-size: 14px; margin-left: -5px !important;">`;
        body_serigrafia_precio.innerHTML = html_serigrafia_precio;

        let body_serigrafia_activa = document.getElementById('activa_a_editar');
        let html_serigrafia_activa = ``;
        if( activa === 's'){
            html_serigrafia_activa += `<option value="${activa}" style="; margin-left: -5px !important;">Si</option>`;
            html_serigrafia_activa += `<option value="n" style="; margin-left: -5px !important;">No</option>`;

        }
        else {
            html_serigrafia_activa += `<option value="${activa}">No</option>`;
            html_serigrafia_activa += `<option value="s">Si</option>`;
        }

        body_serigrafia_activa.innerHTML = html_serigrafia_activa;
    }

    //  ------- termina la seccion de serigrafia    --------    //







});















//    AJAX METODO DAYNET        //

    function f(a) {
        jQuery(function () {

            let body = document.getElementById('select_partes');
            let html = ``;
            jQuery.each(a, (index, value) => {
                html += `
                            <option value="${value.PersonalizadoParteId}">${value.Parte}</option>
                    `;
            });
            body.innerHTML = html;
        });
    }

    function CapturarPersonalizado(e) {
        const datos = new FormData();
        datos.append('personalizado', personalizado.value);

        const xhr = new XMLHttpRequest();
        xhr.open('POST', BuscarPartesAjax.url, true);
        xhr.onload = function () {
            if (this.status === 200) {
                let a = JSON.parse(xhr.responseText);
                f(a);
            }
        };
        xhr.send(datos);

    }
