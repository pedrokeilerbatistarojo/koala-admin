

        //      Validar cuando se crea una parte
    function validar_parte_nueva(){

        var partes_lista = document.getElementsByName('partepersonalizado[]');
        var padre_id = document.getElementById('personalizado_padre_de_parte').value;

        var cant_partes = partes_lista.length;

        for (let i = 0; i < partes_lista.length; i++){
            let parte = partes_lista[i].value;

            if(parte === ''){
                alert("Por favor revise que los campos esten llenos.");
                return false;
            }
        }


        var url = ValidarNuevaParteAjax.url;

        $.ajax({
            type: "POST",
            url: url,
            data: {
                action: "validar_nueva_parte",
                nonce_parte_nueva_validar: ValidarNuevaParteAjax.seguridad_validar_nueva_parte,
                id_personalizado: padre_id,
            },
            success:function (datos) {
                let datos_decode = JSON.parse(datos);
                let cant_a_crear = datos_decode.cant_a_crear;
                let success = datos_decode.success;

                if(success === false){
                    alert('Solo se pueden crear cuatro Partes de un solo personalizado.');
                    return false;
                }

                if(cant_partes > cant_a_crear){
                    alert('Solo se pueden crear cuatro Partes de un solo personalizado. Le faltaba '+cant_a_crear+' por crear.');
                    return false;
                }
            }
        });

    }

        //      validar cuando se crea una serigrafia
    function validar_serigrafia_nueva(){

        var serigrafias_nombre_lista = document.getElementsByName('serigrafia_dinamica[]');
        var serigrafias_precio_lista = document.getElementsByName('serigrafia_dinamica_precio[]');
        var parte_padre_id = document.getElementById('select_partes').value;

        var cant_serigrafias = serigrafias_nombre_lista.length;

        for (let i = 0; i < serigrafias_nombre_lista.length; i++){
            let serigrafia_nombre = serigrafias_nombre_lista[i].value;

            if(serigrafia_nombre === ''){
                alert("Por favor revise que los campos esten llenos.");
                return false;
            }
        }

        for (let i = 0; i < serigrafias_precio_lista.length; i++){
            let serigrafia_precio = serigrafias_precio_lista[i].value;

            if(serigrafia_precio === ''){
                alert("Por favor revise que los campos esten llenos.");
                return false;
            }
        }

        var url = ValidarNuevaSerigrafiaAjax.url;

        $.ajax({
            type: "POST",
            url: url,
            data: {
                action: "validar_nueva_serigrafia",
                nonce_serigrafia_nueva_validar: ValidarNuevaSerigrafiaAjax.seguridad_validar_nueva_serigrafia,
                id_parte: parte_padre_id,
            },
            success:function (datos_serigrafias) {
                let datos_serigrafias_decode = JSON.parse(datos_serigrafias);
                let cant_serigrafias_a_crear = datos_serigrafias_decode.cant_serig_a_crear;
                let success_serigrafia = datos_serigrafias_decode.success_serig;

                if(success_serigrafia === false){
                    alert('Solo se puede crear 10 Serigrafías pertenecientes a una sola Parte.');
                    return false;
                }

                if(cant_serigrafias > cant_serigrafias_a_crear){
                    alert('Solo se pueden crear 10 Serigrafías pertenecientes a una sola Parte. Le faltaba '+cant_serigrafias_a_crear+' por crear.');
                    return false;
                }
            }
        });
    }