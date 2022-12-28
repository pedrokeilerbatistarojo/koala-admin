jQuery(document).ready(function($){

    let boton_conf_estampado = document.getElementById('confirmar_estampado');

    //  variables globales para los precios
    let precio_parte_1 = 0;
    let precio_parte_2 = 0;
    let precio_parte_3 = 0;
    let precio_parte_4 = 0;

    //  variables globales para el nombre de las partes
    let nombre_parte_1 = '';
    let nombre_parte_2 = '';
    let nombre_parte_3 = '';
    let nombre_parte_4 = '';

    //  variables globales para el id de la serigrafia
    let id_serigrafia_parte_1 = 0;
    let id_serigrafia_parte_2 = 0;
    let id_serigrafia_parte_3 = 0;
    let id_serigrafia_parte_4 = 0;


    // boton confirmar estampado
    boton_conf_estampado.addEventListener('click', function(evento){

        let seccion_personalizalo = document.getElementById('content_personalizalo');
        let seccion_personalizalo_elementStyle = window.getComputedStyle(seccion_personalizalo);
        let seccion_personalizalo_elementDisplay = seccion_personalizalo_elementStyle.getPropertyValue('display');


        let seccion_cuando = document.getElementById('seccion_cuando');
        let seccion_cuando_elementStyle = window.getComputedStyle(seccion_cuando);
        let seccion_cuando_elementDisplay = seccion_cuando_elementStyle.getPropertyValue('display');


        //  Capturar el boton donde se pondra lo seleccionado   //
        let input_posiciones_seleccionadas = document.getElementById('input_posiciones_seleccionadas');
        let label_partes_escog = document.getElementById('partes_escog');
        let input_serigrafias = document.getElementById('input_serigrafias');
        let input_serigrafia_guardar_precios = document.getElementById('precios_serigrafias');


        //  seccion calculadora
        // capturo el precio del producto
        let precio_base = document.getElementById('precio_base');
        let value_precio_base = precio_base.textContent;

        //  capturar donde se coloca el valor sumado
        let preciounitario_pre = document.getElementById('preciounitario_pre');

            //serigrafias de parte 1
            // 1
        let serigrafia1_parte_1 = document.getElementById('parte1_serigrafia_radio1');
        if(serigrafia1_parte_1 !== null){
            let id_serigrafia1 = serigrafia1_parte_1.getAttribute('value');
            let nombre_serigrafia_padre = serigrafia1_parte_1.getAttribute('name');
            let precio_value_serigrafia1_parte1 = serigrafia1_parte_1.getAttribute('data-precio');


            if(serigrafia1_parte_1.checked){

                nombre_parte_1 = nombre_serigrafia_padre;
                precio_parte_1 = precio_value_serigrafia1_parte1;
                id_serigrafia_parte_1 = id_serigrafia1;


                // input_serigrafias.setAttribute('value', id_serigrafia1);
                input_serigrafia_guardar_precios.setAttribute('value', precio_value_serigrafia1_parte1);



                let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_value_serigrafia1_parte1);
                preciounitario_pre.textContent = suma_precios;

            }
        }
            //  2
        let serigrafia2_parte_1 = document.getElementById('parte1_serigrafia_radio2');
        if(serigrafia2_parte_1 !== null){
            let id_serigrafia2 = serigrafia2_parte_1.getAttribute('value');
            let nombre_serigrafia_padre = serigrafia1_parte_1.getAttribute('name');
            let precio_value_serigrafia2_parte1 = serigrafia2_parte_1.getAttribute('data-precio');


            if(serigrafia2_parte_1.checked){

                nombre_parte_1 = nombre_serigrafia_padre;
                id_serigrafia_parte_1 = id_serigrafia2;



                // input_serigrafias.setAttribute('value', id_serigrafia2);
                input_serigrafia_guardar_precios.setAttribute('value', precio_value_serigrafia2_parte1);

                precio_parte_1 = precio_value_serigrafia2_parte1;

                // let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_value_serigrafia2_parte1);
                let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_parte_1) + parseFloat(precio_parte_2) + parseFloat(precio_parte_3) + parseFloat(precio_parte_4);
                preciounitario_pre.textContent = suma_precios;
            }
        }

            //  3
        let serigrafia3_parte_1 = document.getElementById('parte1_serigrafia_radio3');
        if(serigrafia3_parte_1 !== null){
            let id_serigrafia3 = serigrafia3_parte_1.getAttribute('value');
            let nombre_serigrafia_padre = serigrafia3_parte_1.getAttribute('name');
            let precio_value_serigrafia3_parte1 = serigrafia3_parte_1.getAttribute('data-precio');

            if(serigrafia3_parte_1.checked){

                nombre_parte_1 = nombre_serigrafia_padre;
                id_serigrafia_parte_1 = id_serigrafia3;

                // input_serigrafias.setAttribute('value', id_serigrafia3);
                input_serigrafia_guardar_precios.setAttribute('value', precio_value_serigrafia3_parte1);

                precio_parte_1 = precio_value_serigrafia3_parte1;

                let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_parte_1) + parseFloat(precio_parte_2) + parseFloat(precio_parte_3) + parseFloat(precio_parte_4);
                preciounitario_pre.textContent = suma_precios;
            }
        }

        //  4
        let serigrafia4_parte_1 = document.getElementById('parte1_serigrafia_radio4');
        if(serigrafia4_parte_1 !== null){
            let id_serigrafia4 = serigrafia4_parte_1.getAttribute('value');
            let nombre_serigrafia_padre = serigrafia4_parte_1.getAttribute('name');
            let precio_value_serigrafia4_parte1 = serigrafia4_parte_1.getAttribute('data-precio');

            if(serigrafia4_parte_1.checked){

                nombre_parte_1 = nombre_serigrafia_padre;
                id_serigrafia_parte_1 = id_serigrafia4;


                input_serigrafia_guardar_precios.setAttribute('value', precio_value_serigrafia4_parte1);

                precio_parte_1 = precio_value_serigrafia4_parte1;
                let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_parte_1) + parseFloat(precio_parte_2) + parseFloat(precio_parte_3) + parseFloat(precio_parte_4);
                preciounitario_pre.textContent = suma_precios;
            }
        }

        //  5
        let serigrafia5_parte_1 = document.getElementById('parte1_serigrafia_radio5');
        if(serigrafia5_parte_1 !== null){
            let id_serigrafia5 = serigrafia5_parte_1.getAttribute('value');
            let nombre_serigrafia_padre = serigrafia5_parte_1.getAttribute('name');
            let precio_value_serigrafia5_parte1 = serigrafia5_parte_1.getAttribute('data-precio');

            if(serigrafia5_parte_1.checked){

                nombre_parte_1 = nombre_serigrafia_padre;
                id_serigrafia_parte_1 = id_serigrafia5;


                input_serigrafia_guardar_precios.setAttribute('value', precio_value_serigrafia5_parte1);

                precio_parte_1 = precio_value_serigrafia5_parte1;
                let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_parte_1) + parseFloat(precio_parte_2) + parseFloat(precio_parte_3) + parseFloat(precio_parte_4);
                preciounitario_pre.textContent = suma_precios;
            }
        }

        //  6
        let serigrafia6_parte_1 = document.getElementById('parte1_serigrafia_radio6');
        if(serigrafia6_parte_1 !== null){
            let id_serigrafia6 = serigrafia6_parte_1.getAttribute('value');
            let nombre_serigrafia_padre = serigrafia6_parte_1.getAttribute('name');
            let precio_value_serigrafia6_parte1 = serigrafia6_parte_1.getAttribute('data-precio');

            if(serigrafia6_parte_1.checked){

                nombre_parte_1 = nombre_serigrafia_padre;
                id_serigrafia_parte_1 = id_serigrafia6;


                input_serigrafia_guardar_precios.setAttribute('value', precio_value_serigrafia6_parte1);

                precio_parte_1 = precio_value_serigrafia6_parte1;
                let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_parte_1) + parseFloat(precio_parte_2) + parseFloat(precio_parte_3) + parseFloat(precio_parte_4);
                preciounitario_pre.textContent = suma_precios;
            }
        }

        //  7
        let serigrafia7_parte_1 = document.getElementById('parte1_serigrafia_radio7');
        if(serigrafia7_parte_1 !== null){
            let id_serigrafia7 = serigrafia7_parte_1.getAttribute('value');
            let nombre_serigrafia_padre = serigrafia7_parte_1.getAttribute('name');
            let precio_value_serigrafia7_parte1 = serigrafia7_parte_1.getAttribute('data-precio');

            if(serigrafia7_parte_1.checked){

                nombre_parte_1 = nombre_serigrafia_padre;
                id_serigrafia_parte_1 = id_serigrafia7;


                input_serigrafia_guardar_precios.setAttribute('value', precio_value_serigrafia7_parte1);

                precio_parte_1 = precio_value_serigrafia7_parte1;
                let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_parte_1) + parseFloat(precio_parte_2) + parseFloat(precio_parte_3) + parseFloat(precio_parte_4);
                preciounitario_pre.textContent = suma_precios;
            }
        }

        //  8
        let serigrafia8_parte_1 = document.getElementById('parte1_serigrafia_radio8');
        if(serigrafia8_parte_1 !== null){
            let id_serigrafia8 = serigrafia8_parte_1.getAttribute('value');
            let nombre_serigrafia_padre = serigrafia8_parte_1.getAttribute('name');
            let precio_value_serigrafia8_parte1 = serigrafia8_parte_1.getAttribute('data-precio');

            if(serigrafia8_parte_1.checked){

                nombre_parte_1 = nombre_serigrafia_padre;
                id_serigrafia_parte_1 = id_serigrafia8;

                input_serigrafia_guardar_precios.setAttribute('value', precio_value_serigrafia8_parte1);

                precio_parte_1 = precio_value_serigrafia8_parte1;

                let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_parte_1) + parseFloat(precio_parte_2) + parseFloat(precio_parte_3) + parseFloat(precio_parte_4);
                preciounitario_pre.textContent = suma_precios;
            }
        }

        //  9
        let serigrafia9_parte_1 = document.getElementById('parte1_serigrafia_radio9');
        if(serigrafia9_parte_1 !== null){
            let id_serigrafia9 = serigrafia9_parte_1.getAttribute('value');
            let nombre_serigrafia_padre = serigrafia9_parte_1.getAttribute('name');
            let precio_value_serigrafia9_parte1 = serigrafia9_parte_1.getAttribute('data-precio');

            if(serigrafia9_parte_1.checked){

                nombre_parte_1 = nombre_serigrafia_padre;
                id_serigrafia_parte_1 = id_serigrafia9;


                input_serigrafia_guardar_precios.setAttribute('precio_value_serigrafia9_parte1', precio_value_serigrafia1_parte1);

                precio_parte_1 = precio_value_serigrafia9_parte1;
                let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_parte_1) + parseFloat(precio_parte_2) + parseFloat(precio_parte_3) + parseFloat(precio_parte_4);
                preciounitario_pre.textContent = suma_precios;
            }
        }

        //  10
        let serigrafia10_parte_1 = document.getElementById('parte1_serigrafia_radio10');
        if(serigrafia10_parte_1 !== null){
            let id_serigrafia10 = serigrafia10_parte_1.getAttribute('value');
            let nombre_serigrafia_padre = serigrafia10_parte_1.getAttribute('name');
            let precio_value_serigrafia10_parte1 = serigrafia10_parte_1.getAttribute('data-precio');

            if(serigrafia10_parte_1.checked){

                nombre_parte_1 = nombre_serigrafia_padre;
                id_serigrafia_parte_1 = id_serigrafia10;

                input_serigrafia_guardar_precios.setAttribute('value', precio_value_serigrafia10_parte1);

                precio_parte_1 = precio_value_serigrafia10_parte1;

                let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_parte_1) + parseFloat(precio_parte_2) + parseFloat(precio_parte_3) + parseFloat(precio_parte_4);
                preciounitario_pre.textContent = suma_precios;
            }
        }
        //  asignar la parte
        if( nombre_parte_1 !== ''){
            label_partes_escog.innerHTML = nombre_parte_1;
            input_posiciones_seleccionadas.setAttribute('value', nombre_parte_1);

        }

        //  asignar el id de la serigrafia
        if(id_serigrafia_parte_1 !== ''){
            input_serigrafias.setAttribute('value', id_serigrafia_parte_1);



        }



        //  serigrafias de parte 2
            // 11
        let serigrafia1_parte_2 = document.getElementById('parte2_serigrafia_radio1');
        if(serigrafia1_parte_2 !== null){
            let input_serigrafias = document.getElementById('input_serigrafias');

            let id_serigrafia11 = serigrafia1_parte_2.getAttribute('value');
            let nombre_serigrafia_padre = serigrafia1_parte_2.getAttribute('name');
            let precio_value_serigrafia1_parte2 = serigrafia1_parte_2.getAttribute('data-precio');


            if(serigrafia1_parte_2.checked){

                nombre_parte_2 = nombre_serigrafia_padre;
                id_serigrafia_parte_2 = id_serigrafia11;
                precio_parte_2 = precio_value_serigrafia1_parte2;


                //  pasarle los precios de las serigrafias al input
                if(precio_parte_1){
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_1+','+precio_parte_2);
                }
                else {
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_2);
                }


                let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_parte_1) + parseFloat(precio_parte_2) + parseFloat(precio_parte_3) + parseFloat(precio_parte_4);
                preciounitario_pre.textContent = suma_precios;

            }
        }
        // 12
        let serigrafia2_parte_2 = document.getElementById('parte2_serigrafia_radio2');
        if(serigrafia2_parte_2 !== null){
            let input_serigrafias = document.getElementById('input_serigrafias');

            let id_serigrafia12 = serigrafia2_parte_2.getAttribute('value');
            let nombre_serigrafia_padre = serigrafia2_parte_2.getAttribute('name');
            let precio_value_serigrafia2_parte2 = serigrafia2_parte_2.getAttribute('data-precio');

            if(serigrafia2_parte_2.checked){

                nombre_parte_2 = nombre_serigrafia_padre;
                id_serigrafia_parte_2 = id_serigrafia12;
                precio_parte_2 = precio_value_serigrafia2_parte2;

                //  pasarle los precios de las serigrafias al input
                if(precio_parte_1){
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_1+','+precio_parte_2);
                }
                else {
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_2);
                }



                let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_parte_1) + parseFloat(precio_parte_2) + parseFloat(precio_parte_3) + parseFloat(precio_parte_4);
                preciounitario_pre.textContent = suma_precios;

            }
        }
        // 13
        let serigrafia3_parte_2 = document.getElementById('parte2_serigrafia_radio3');
        if(serigrafia3_parte_2 !== null){

            let id_serigrafia13 = serigrafia3_parte_2.getAttribute('value');
            let nombre_serigrafia_padre = serigrafia3_parte_2.getAttribute('name');
            let precio_value_serigrafia3_parte2 = serigrafia3_parte_2.getAttribute('data-precio');

            if(serigrafia3_parte_2.checked){

                nombre_parte_2 = nombre_serigrafia_padre;
                id_serigrafia_parte_2 = id_serigrafia13;
                precio_parte_2 = precio_value_serigrafia3_parte2;


                //  pasarle los precios de las serigrafias al input
                if(precio_parte_1){
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_1+','+precio_parte_2);
                }
                else {
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_2);
                }


                let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_parte_1) + parseFloat(precio_parte_2) + parseFloat(precio_parte_3) + parseFloat(precio_parte_4);
                preciounitario_pre.textContent = suma_precios;

            }
        }
        // 14
        let serigrafia4_parte_2 = document.getElementById('parte2_serigrafia_radio4');
        if(serigrafia4_parte_2 !== null){

            let id_serigrafia14 = serigrafia4_parte_2.getAttribute('value');
            let nombre_serigrafia_padre = serigrafia4_parte_2.getAttribute('name');
            let precio_value_serigrafia4_parte2 = serigrafia4_parte_2.getAttribute('data-precio');

            if(serigrafia4_parte_2.checked){

                nombre_parte_2 = nombre_serigrafia_padre;
                id_serigrafia_parte_2 = id_serigrafia14;
                precio_parte_2 = precio_value_serigrafia4_parte2;


                //  pasarle los precios de las serigrafias al input
                if(precio_parte_1){
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_1+','+precio_parte_2);
                }
                else {
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_2);
                }


                let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_parte_1) + parseFloat(precio_parte_2) + parseFloat(precio_parte_3) + parseFloat(precio_parte_4);
                preciounitario_pre.textContent = suma_precios;

            }
        }
        // 15
        let serigrafia5_parte_2 = document.getElementById('parte2_serigrafia_radio5');
        if(serigrafia5_parte_2 !== null){

            let id_serigrafia15 = serigrafia5_parte_2.getAttribute('value');
            let nombre_serigrafia_padre = serigrafia5_parte_2.getAttribute('name');
            let precio_value_serigrafia5_parte2 = serigrafia5_parte_2.getAttribute('data-precio');

            if(serigrafia5_parte_2.checked){

                nombre_parte_2 = nombre_serigrafia_padre;
                id_serigrafia_parte_2 = id_serigrafia15;
                precio_parte_2 = precio_value_serigrafia5_parte2;

                //  pasarle los precios de las serigrafias al input
                if(precio_parte_1){
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_1+','+precio_parte_2);
                }
                else {
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_2);
                }


                let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_parte_1) + parseFloat(precio_parte_2) + parseFloat(precio_parte_3) + parseFloat(precio_parte_4);
                preciounitario_pre.textContent = suma_precios;

            }
        }
        // 16
        let serigrafia6_parte_2 = document.getElementById('parte2_serigrafia_radio6');
        if(serigrafia6_parte_2 !== null){

            let id_serigrafia16 = serigrafia6_parte_2.getAttribute('value');
            let nombre_serigrafia_padre = serigrafia6_parte_2.getAttribute('name');
            let precio_value_serigrafia6_parte2 = serigrafia6_parte_2.getAttribute('data-precio');

            if(serigrafia6_parte_2.checked){

                nombre_parte_2 = nombre_serigrafia_padre;
                id_serigrafia_parte_2 = id_serigrafia16;
                precio_parte_2 = precio_value_serigrafia6_parte2;

                //  pasarle los precios de las serigrafias al input
                if(precio_parte_1){
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_1+','+precio_parte_2);
                }
                else {
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_2);
                }


                let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_parte_1) + parseFloat(precio_parte_2) + parseFloat(precio_parte_3) + parseFloat(precio_parte_4);
                preciounitario_pre.textContent = suma_precios;

            }
        }
        // 17
        let serigrafia7_parte_2 = document.getElementById('parte2_serigrafia_radio7');
        if(serigrafia7_parte_2 !== null){

            let id_serigrafia17 = serigrafia7_parte_2.getAttribute('value');
            let nombre_serigrafia_padre = serigrafia7_parte_2.getAttribute('name');
            let precio_value_serigrafia7_parte2 = serigrafia7_parte_2.getAttribute('data-precio');

            if(serigrafia7_parte_2.checked){

                nombre_parte_2 = nombre_serigrafia_padre;
                id_serigrafia_parte_2 = id_serigrafia17;
                precio_parte_2 = precio_value_serigrafia7_parte2;

                //  pasarle los precios de las serigrafias al input
                if(precio_parte_1){
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_1+','+precio_parte_2);
                }
                else {
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_2);
                }



                let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_parte_1) + parseFloat(precio_parte_2) + parseFloat(precio_parte_3) + parseFloat(precio_parte_4);
                preciounitario_pre.textContent = suma_precios;

            }
        }

        // 18
        let serigrafia8_parte_2 = document.getElementById('parte2_serigrafia_radio8');
        if(serigrafia8_parte_2 !== null){

            let id_serigrafia18 = serigrafia8_parte_2.getAttribute('value');
            let nombre_serigrafia_padre = serigrafia8_parte_2.getAttribute('name');
            let precio_value_serigrafia8_parte2 = serigrafia8_parte_2.getAttribute('data-precio');

            if(serigrafia8_parte_2.checked){

                nombre_parte_2 = nombre_serigrafia_padre;
                id_serigrafia_parte_2 = id_serigrafia18;
                precio_parte_2 = precio_value_serigrafia8_parte2;

                //  pasarle los precios de las serigrafias al input
                if(precio_parte_1){
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_1+','+precio_parte_2);
                }
                else {
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_2);
                }



                let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_parte_1) + parseFloat(precio_parte_2) + parseFloat(precio_parte_3) + parseFloat(precio_parte_4);
                preciounitario_pre.textContent = suma_precios;

            }
        }

        // 19
        let serigrafia9_parte_2 = document.getElementById('parte2_serigrafia_radio9');
        if(serigrafia9_parte_2 !== null){

            let id_serigrafia19 = serigrafia9_parte_2.getAttribute('value');
            let nombre_serigrafia_padre = serigrafia9_parte_2.getAttribute('name');
            let precio_value_serigrafia9_parte2 = serigrafia9_parte_2.getAttribute('data-precio');

            if(serigrafia9_parte_2.checked){

                nombre_parte_2 = nombre_serigrafia_padre;
                id_serigrafia_parte_2 = id_serigrafia19;
                precio_parte_2 = precio_value_serigrafia9_parte2;

                //  pasarle los precios de las serigrafias al input
                if(precio_parte_1){
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_1+','+precio_parte_2);
                }
                else {
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_2);
                }



                let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_parte_1) + parseFloat(precio_parte_2) + parseFloat(precio_parte_3) + parseFloat(precio_parte_4);
                preciounitario_pre.textContent = suma_precios;

            }
        }

        // 20
        let serigrafia10_parte_2 = document.getElementById('parte2_serigrafia_radio10');
        if(serigrafia10_parte_2 !== null){

            let id_serigrafia20 = serigrafia10_parte_2.getAttribute('value');
            let nombre_serigrafia_padre = serigrafia10_parte_2.getAttribute('name');
            let precio_value_serigrafia10_parte2 = serigrafia10_parte_2.getAttribute('data-precio');

            if(serigrafia10_parte_2.checked){

                nombre_parte_2 = nombre_serigrafia_padre;
                id_serigrafia_parte_2 = id_serigrafia20;
                precio_parte_2 = precio_value_serigrafia10_parte2;

                //  pasarle los precios de las serigrafias al input
                if(precio_parte_1){
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_1+','+precio_parte_2);
                }
                else {
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_2);
                }


                let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_parte_1) + parseFloat(precio_parte_2) + parseFloat(precio_parte_3) + parseFloat(precio_parte_4);
                preciounitario_pre.textContent = suma_precios;


            }
        }

        //  asignar la parte
        if(nombre_parte_2 !== ''){
            if(nombre_parte_1 !== ''){
                label_partes_escog.innerHTML = nombre_parte_1 + '  ' + nombre_parte_2;

                let concat_posiciones_seleccionadas = nombre_parte_1 + ',' + nombre_parte_2;
                input_posiciones_seleccionadas.setAttribute('value', concat_posiciones_seleccionadas);

            }
            else {
                label_partes_escog.innerHTML = nombre_parte_2;

                input_posiciones_seleccionadas.setAttribute('value', nombre_parte_2);


            }
        }

        //asignar el id de la serigrafia
        if(id_serigrafia_parte_2 !== ''){
            if(id_serigrafia_parte_1 !== ''){
                let concat_values = id_serigrafia_parte_1 + ',' + id_serigrafia_parte_2;
                input_serigrafias.setAttribute('value', concat_values);
            }
            else{
                input_serigrafias.setAttribute('value', id_serigrafia_parte_2);

            }
        }



        //  parte 3
        // 21
        let serigrafia1_parte_3 = document.getElementById('parte3_serigrafia_radio1');
        if(serigrafia1_parte_3 !== null){

            let id_serigrafia21 = serigrafia1_parte_3.getAttribute('value');
            let nombre_serigrafia_padre = serigrafia1_parte_3.getAttribute('name');
            let precio_value_serigrafia1_parte3 = serigrafia1_parte_3.getAttribute('data-precio');

            if(serigrafia1_parte_3.checked){

                nombre_parte_3 = nombre_serigrafia_padre;
                id_serigrafia_parte_3 = id_serigrafia21;
                precio_parte_3 = precio_value_serigrafia1_parte3;

                //  pasarle los precios de las serigrafias al input
                if(precio_parte_1 || precio_parte_2){
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_1+','+precio_parte_2+','+precio_parte_3);
                }
                else {
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_3);
                }



                let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_parte_1) + parseFloat(precio_parte_2) + parseFloat(precio_parte_3) + parseFloat(precio_parte_4);
                preciounitario_pre.textContent = suma_precios;


            }
        }

        // 22
        let serigrafia2_parte_3 = document.getElementById('parte3_serigrafia_radio2');
        if(serigrafia2_parte_3 !== null){

            let id_serigrafia22 = serigrafia2_parte_3.getAttribute('value');
            let nombre_serigrafia_padre = serigrafia2_parte_3.getAttribute('name');
            let precio_value_serigrafia2_parte3 = serigrafia2_parte_3.getAttribute('data-precio');

            if(serigrafia2_parte_3.checked){
                nombre_parte_3 = nombre_serigrafia_padre;
                id_serigrafia_parte_3 = id_serigrafia22;
                precio_parte_3 = precio_value_serigrafia2_parte3;

                //  pasarle los precios de las serigrafias al input
                if(precio_parte_1 || precio_parte_2){
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_1+','+precio_parte_2+','+precio_parte_3);
                }
                else {
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_3);
                }


                let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_parte_1) + parseFloat(precio_parte_2) + parseFloat(precio_parte_3) + parseFloat(precio_parte_4);
                preciounitario_pre.textContent = suma_precios;


            }
        }

        // 23
        let serigrafia3_parte_3 = document.getElementById('parte3_serigrafia_radio3');
        if(serigrafia3_parte_3 !== null){

            let id_serigrafia23 = serigrafia3_parte_3.getAttribute('value');
            let nombre_serigrafia_padre = serigrafia3_parte_3.getAttribute('name');
            let precio_value_serigrafia3_parte3 = serigrafia3_parte_3.getAttribute('data-precio');

            if(serigrafia3_parte_3.checked){
                nombre_parte_3 = nombre_serigrafia_padre;
                id_serigrafia_parte_3 = id_serigrafia23;
                precio_parte_3 = precio_value_serigrafia3_parte3;

                //  pasarle los precios de las serigrafias al input
                if(precio_parte_1 || precio_parte_2){
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_1+','+precio_parte_2+','+precio_parte_3);
                }
                else {
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_3);
                }


                let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_parte_1) + parseFloat(precio_parte_2) + parseFloat(precio_parte_3) + parseFloat(precio_parte_4);
                preciounitario_pre.textContent = suma_precios;


            }
        }

        // 24
        let serigrafia4_parte_3 = document.getElementById('parte3_serigrafia_radio4');
        if(serigrafia4_parte_3 !== null){

            let id_serigrafia24 = serigrafia4_parte_3.getAttribute('value');
            let nombre_serigrafia_padre = serigrafia4_parte_3.getAttribute('name');
            let precio_value_serigrafia4_parte3 = serigrafia4_parte_3.getAttribute('data-precio');

            if(serigrafia4_parte_3.checked){
                nombre_parte_3 = nombre_serigrafia_padre;
                id_serigrafia_parte_3 = id_serigrafia24;
                precio_parte_3 = precio_value_serigrafia4_parte3;

                //  pasarle los precios de las serigrafias al input
                if(precio_parte_1 || precio_parte_2){
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_1+','+precio_parte_2+','+precio_parte_3);
                }
                else {
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_3);
                }


                let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_parte_1) + parseFloat(precio_parte_2) + parseFloat(precio_parte_3) + parseFloat(precio_parte_4);
                preciounitario_pre.textContent = suma_precios;


            }
        }

        // 25
        let serigrafia5_parte_3 = document.getElementById('parte3_serigrafia_radio5');
        if(serigrafia5_parte_3 !== null){

            let id_serigrafia25 = serigrafia5_parte_3.getAttribute('value');
            let nombre_serigrafia_padre = serigrafia5_parte_3.getAttribute('name');
            let precio_value_serigrafia5_parte3 = serigrafia5_parte_3.getAttribute('data-precio');

            if(serigrafia5_parte_3.checked){
                nombre_parte_3 = nombre_serigrafia_padre;
                id_serigrafia_parte_3 = id_serigrafia25;
                precio_parte_3 = precio_value_serigrafia5_parte3;

                //  pasarle los precios de las serigrafias al input
                if(precio_parte_1 || precio_parte_2){
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_1+','+precio_parte_2+','+precio_parte_3);
                }
                else {
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_3);
                }


                let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_parte_1) + parseFloat(precio_parte_2) + parseFloat(precio_parte_3) + parseFloat(precio_parte_4);
                preciounitario_pre.textContent = suma_precios;


            }
        }

        // 26
        let serigrafia6_parte_3 = document.getElementById('parte3_serigrafia_radio6');
        if(serigrafia6_parte_3 !== null){

            let id_serigrafia26 = serigrafia6_parte_3.getAttribute('value');
            let nombre_serigrafia_padre = serigrafia6_parte_3.getAttribute('name');
            let precio_value_serigrafia6_parte3 = serigrafia6_parte_3.getAttribute('data-precio');

            if(serigrafia6_parte_3.checked){
                nombre_parte_3 = nombre_serigrafia_padre;
                id_serigrafia_parte_3 = id_serigrafia26;
                precio_parte_3 = precio_value_serigrafia6_parte3;

                //  pasarle los precios de las serigrafias al input
                if(precio_parte_1 || precio_parte_2){
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_1+','+precio_parte_2+','+precio_parte_3);
                }
                else {
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_3);
                }


                let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_parte_1) + parseFloat(precio_parte_2) + parseFloat(precio_parte_3) + parseFloat(precio_parte_4);
                preciounitario_pre.textContent = suma_precios;


            }
        }

        // 27
        let serigrafia7_parte_3 = document.getElementById('parte3_serigrafia_radio7');
        if(serigrafia7_parte_3 !== null){

            let id_serigrafia27 = serigrafia7_parte_3.getAttribute('value');
            let nombre_serigrafia_padre = serigrafia7_parte_3.getAttribute('name');
            let precio_value_serigrafia7_parte3 = serigrafia7_parte_3.getAttribute('data-precio');

            if(serigrafia7_parte_3.checked){
                nombre_parte_3 = nombre_serigrafia_padre;
                id_serigrafia_parte_3 = id_serigrafia27;
                precio_parte_3 = precio_value_serigrafia7_parte3;

                //  pasarle los precios de las serigrafias al input
                if(precio_parte_1 || precio_parte_2){
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_1+','+precio_parte_2+','+precio_parte_3);
                }
                else {
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_3);
                }


                let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_parte_1) + parseFloat(precio_parte_2) + parseFloat(precio_parte_3) + parseFloat(precio_parte_4);
                preciounitario_pre.textContent = suma_precios;


            }
        }

        // 28
        let serigrafia8_parte_3 = document.getElementById('parte3_serigrafia_radio8');
        if(serigrafia8_parte_3 !== null){

            let id_serigrafia28 = serigrafia8_parte_3.getAttribute('value');
            let nombre_serigrafia_padre = serigrafia8_parte_3.getAttribute('name');
            let precio_value_serigrafia8_parte3 = serigrafia8_parte_3.getAttribute('data-precio');

            if(serigrafia8_parte_3.checked){
                nombre_parte_3 = nombre_serigrafia_padre;
                id_serigrafia_parte_3 = id_serigrafia28;
                precio_parte_3 = precio_value_serigrafia8_parte3;

                //  pasarle los precios de las serigrafias al input
                if(precio_parte_1 || precio_parte_2){
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_1+','+precio_parte_2+','+precio_parte_3);
                }
                else {
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_3);
                }


                let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_parte_1) + parseFloat(precio_parte_2) + parseFloat(precio_parte_3) + parseFloat(precio_parte_4);
                preciounitario_pre.textContent = suma_precios;


            }
        }

        // 29
        let serigrafia9_parte_3 = document.getElementById('parte3_serigrafia_radio9');
        if(serigrafia9_parte_3 !== null){

            let id_serigrafia29 = serigrafia9_parte_3.getAttribute('value');
            let nombre_serigrafia_padre = serigrafia9_parte_3.getAttribute('name');
            let precio_value_serigrafia9_parte3 = serigrafia9_parte_3.getAttribute('data-precio');

            if(serigrafia9_parte_3.checked){
                nombre_parte_3 = nombre_serigrafia_padre;
                id_serigrafia_parte_3 = id_serigrafia29;
                precio_parte_3 = precio_value_serigrafia9_parte3;

                //  pasarle los precios de las serigrafias al input
                if(precio_parte_1 || precio_parte_2){
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_1+','+precio_parte_2+','+precio_parte_3);
                }
                else {
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_3);
                }


                let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_parte_1) + parseFloat(precio_parte_2) + parseFloat(precio_parte_3) + parseFloat(precio_parte_4);
                preciounitario_pre.textContent = suma_precios;


            }
        }

        // 30
        let serigrafia10_parte_3 = document.getElementById('parte3_serigrafia_radio10');
        if(serigrafia10_parte_3 !== null){

            let id_serigrafia30 = serigrafia10_parte_3.getAttribute('value');
            let nombre_serigrafia_padre = serigrafia10_parte_3.getAttribute('name');
            let precio_value_serigrafia10_parte3 = serigrafia10_parte_3.getAttribute('data-precio');

            if(serigrafia10_parte_3.checked){
                nombre_parte_3 = nombre_serigrafia_padre;
                id_serigrafia_parte_3 = id_serigrafia30;
                precio_parte_3 = precio_value_serigrafia10_parte3;

                //  pasarle los precios de las serigrafias al input
                if(precio_parte_1 || precio_parte_2){
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_1+','+precio_parte_2+','+precio_parte_3);
                }
                else {
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_3);
                }


                let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_parte_1) + parseFloat(precio_parte_2) + parseFloat(precio_parte_3) + parseFloat(precio_parte_4);
                preciounitario_pre.textContent = suma_precios;


            }
        }

        //  asignar la parte
        if(nombre_parte_3 !== ''){
            if(nombre_parte_1 !== ''){
                label_partes_escog.innerHTML = nombre_parte_1 + '  ' + nombre_parte_2 + '  ' + nombre_parte_3;

                let concat_posiciones_seleccionadas = nombre_parte_1 + ',' + nombre_parte_2 + ',' + nombre_parte_3;
                input_posiciones_seleccionadas.setAttribute('value', concat_posiciones_seleccionadas);
            }
            else if(nombre_parte_2 !== ''){
                label_partes_escog.innerHTML = nombre_parte_2 + '  ' + nombre_parte_3;

                let concat_posiciones_seleccionadas = nombre_parte_2 + ',' + nombre_parte_3;
                input_posiciones_seleccionadas.setAttribute('value', concat_posiciones_seleccionadas);
            }
            else {
                label_partes_escog.innerHTML = nombre_parte_3;
                input_posiciones_seleccionadas.setAttribute('value', nombre_parte_3);
            }
        }

        //asignar el id de la serigrafia
        if(id_serigrafia_parte_3 !== ''){
            if(id_serigrafia_parte_1 !== ''){
                let concat_values = id_serigrafia_parte_1 + ',' + id_serigrafia_parte_2 + ',' + id_serigrafia_parte_3;
                input_serigrafias.setAttribute('value', concat_values);
            }
            else if(id_serigrafia_parte_2 !== ''){
                let concat_values = id_serigrafia_parte_2 + ',' + id_serigrafia_parte_3;
                input_serigrafias.setAttribute('value', concat_values);
            }
            else{
                input_serigrafias.setAttribute('value', id_serigrafia_parte_3);

            }
        }

        //  parte 4
        // 31
        let serigrafia1_parte_4 = document.getElementById('parte4_serigrafia_radio1');
        if(serigrafia1_parte_4 !== null){

            let id_serigrafia31 = serigrafia1_parte_4.getAttribute('value');
            let nombre_serigrafia_padre = serigrafia1_parte_4.getAttribute('name');
            let precio_value_serigrafia1_parte4 = serigrafia1_parte_4.getAttribute('data-precio');

            if(serigrafia1_parte_4.checked){
                nombre_parte_4 = nombre_serigrafia_padre;
                id_serigrafia_parte_4 = id_serigrafia31;
                precio_parte_4 = precio_value_serigrafia1_parte4;

                //  pasarle los precios de las serigrafias al input
                if(precio_parte_1 || precio_parte_2 || precio_parte_3){
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_1+','+precio_parte_2+','+precio_parte_3+','+precio_parte_4);
                }
                else {
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_4);
                }


                let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_parte_1) + parseFloat(precio_parte_2) + parseFloat(precio_parte_3) + parseFloat(precio_parte_4);
                preciounitario_pre.textContent = suma_precios;


            }
        }

        // 32
        let serigrafia2_parte_4 = document.getElementById('parte4_serigrafia_radio2');
        if(serigrafia2_parte_4 !== null){

            let id_serigrafia32 = serigrafia2_parte_4.getAttribute('value');
            let nombre_serigrafia_padre = serigrafia2_parte_4.getAttribute('name');
            let precio_value_serigrafia2_parte4 = serigrafia2_parte_4.getAttribute('data-precio');

            if(serigrafia2_parte_4.checked){
                nombre_parte_4 = nombre_serigrafia_padre;
                id_serigrafia_parte_4 = id_serigrafia32;
                precio_parte_4 = precio_value_serigrafia2_parte4;

                //  pasarle los precios de las serigrafias al input
                if(precio_parte_1 || precio_parte_2 || precio_parte_3){
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_1+','+precio_parte_2+','+precio_parte_3+','+precio_parte_4);
                }
                else {
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_4);
                }


                let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_parte_1) + parseFloat(precio_parte_2) + parseFloat(precio_parte_3) + parseFloat(precio_parte_4);
                preciounitario_pre.textContent = suma_precios;


            }
        }

        // 33
        let serigrafia3_parte_4 = document.getElementById('parte4_serigrafia_radio3');
        if(serigrafia3_parte_4 !== null){

            let id_serigrafia33 = serigrafia3_parte_4.getAttribute('value');
            let nombre_serigrafia_padre = serigrafia3_parte_4.getAttribute('name');
            let precio_value_serigrafia3_parte4 = serigrafia3_parte_4.getAttribute('data-precio');

            if(serigrafia3_parte_4.checked){
                nombre_parte_4 = nombre_serigrafia_padre;
                id_serigrafia_parte_4 = id_serigrafia33;
                precio_parte_4 = precio_value_serigrafia3_parte4;

                //  pasarle los precios de las serigrafias al input
                if(precio_parte_1 || precio_parte_2 || precio_parte_3){
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_1+','+precio_parte_2+','+precio_parte_3+','+precio_parte_4);
                }
                else {
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_4);
                }


                let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_parte_1) + parseFloat(precio_parte_2) + parseFloat(precio_parte_3) + parseFloat(precio_parte_4);
                preciounitario_pre.textContent = suma_precios;


            }
        }

        // 34
        let serigrafia4_parte_4 = document.getElementById('parte4_serigrafia_radio4');
        if(serigrafia4_parte_4 !== null){

            let id_serigrafia34 = serigrafia4_parte_4.getAttribute('value');
            let nombre_serigrafia_padre = serigrafia4_parte_4.getAttribute('name');
            let precio_value_serigrafia4_parte4 = serigrafia4_parte_4.getAttribute('data-precio');

            if(serigrafia4_parte_4.checked){
                nombre_parte_4 = nombre_serigrafia_padre;
                id_serigrafia_parte_4 = id_serigrafia34;
                precio_parte_4 = precio_value_serigrafia4_parte4;

                //  pasarle los precios de las serigrafias al input
                if(precio_parte_1 || precio_parte_2 || precio_parte_3){
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_1+','+precio_parte_2+','+precio_parte_3+','+precio_parte_4);
                }
                else {
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_4);
                }


                let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_parte_1) + parseFloat(precio_parte_2) + parseFloat(precio_parte_3) + parseFloat(precio_parte_4);
                preciounitario_pre.textContent = suma_precios;


            }
        }

        // 35
        let serigrafia5_parte_4 = document.getElementById('parte4_serigrafia_radio5');
        if(serigrafia5_parte_4 !== null){

            let id_serigrafia35 = serigrafia5_parte_4.getAttribute('value');
            let nombre_serigrafia_padre = serigrafia5_parte_4.getAttribute('name');
            let precio_value_serigrafia5_parte4 = serigrafia5_parte_4.getAttribute('data-precio');

            if(serigrafia5_parte_4.checked){
                nombre_parte_4 = nombre_serigrafia_padre;
                id_serigrafia_parte_4 = id_serigrafia35;
                precio_parte_4 = precio_value_serigrafia5_parte4;

                //  pasarle los precios de las serigrafias al input
                if(precio_parte_1 || precio_parte_2 || precio_parte_3){
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_1+','+precio_parte_2+','+precio_parte_3+','+precio_parte_4);
                }
                else {
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_4);
                }


                let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_parte_1) + parseFloat(precio_parte_2) + parseFloat(precio_parte_3) + parseFloat(precio_parte_4);
                preciounitario_pre.textContent = suma_precios;


            }
        }

        // 36
        let serigrafia6_parte_4 = document.getElementById('parte4_serigrafia_radio6');
        if(serigrafia6_parte_4 !== null){

            let id_serigrafia36 = serigrafia6_parte_4.getAttribute('value');
            let nombre_serigrafia_padre = serigrafia6_parte_4.getAttribute('name');
            let precio_value_serigrafia6_parte4 = serigrafia6_parte_4.getAttribute('data-precio');

            if(serigrafia6_parte_4.checked){
                nombre_parte_4 = nombre_serigrafia_padre;
                id_serigrafia_parte_4 = id_serigrafia36;
                precio_parte_4 = precio_value_serigrafia6_parte4;

                //  pasarle los precios de las serigrafias al input
                if(precio_parte_1 || precio_parte_2 || precio_parte_3){
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_1+','+precio_parte_2+','+precio_parte_3+','+precio_parte_4);
                }
                else {
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_4);
                }


                let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_parte_1) + parseFloat(precio_parte_2) + parseFloat(precio_parte_3) + parseFloat(precio_parte_4);
                preciounitario_pre.textContent = suma_precios;


            }
        }

        // 37
        let serigrafia7_parte_4 = document.getElementById('parte4_serigrafia_radio7');
        if(serigrafia7_parte_4 !== null){

            let id_serigrafia37 = serigrafia7_parte_4.getAttribute('value');
            let nombre_serigrafia_padre = serigrafia7_parte_4.getAttribute('name');
            let precio_value_serigrafia7_parte4 = serigrafia7_parte_4.getAttribute('data-precio');

            if(serigrafia7_parte_4.checked){
                nombre_parte_4 = nombre_serigrafia_padre;
                id_serigrafia_parte_4 = id_serigrafia37;
                precio_parte_4 = precio_value_serigrafia7_parte4;

                //  pasarle los precios de las serigrafias al input
                if(precio_parte_1 || precio_parte_2 || precio_parte_3){
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_1+','+precio_parte_2+','+precio_parte_3+','+precio_parte_4);
                }
                else {
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_4);
                }


                let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_parte_1) + parseFloat(precio_parte_2) + parseFloat(precio_parte_3) + parseFloat(precio_parte_4);
                preciounitario_pre.textContent = suma_precios;


            }
        }

        // 38
        let serigrafia8_parte_4 = document.getElementById('parte4_serigrafia_radio8');
        if(serigrafia8_parte_4 !== null){

            let id_serigrafia38 = serigrafia8_parte_4.getAttribute('value');
            let nombre_serigrafia_padre = serigrafia8_parte_4.getAttribute('name');
            let precio_value_serigrafia8_parte4 = serigrafia8_parte_4.getAttribute('data-precio');

            if(serigrafia8_parte_4.checked){
                nombre_parte_4 = nombre_serigrafia_padre;
                id_serigrafia_parte_4 = id_serigrafia38;
                precio_parte_4 = precio_value_serigrafia8_parte4;

                //  pasarle los precios de las serigrafias al input
                if(precio_parte_1 || precio_parte_2 || precio_parte_3){
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_1+','+precio_parte_2+','+precio_parte_3+','+precio_parte_4);
                }
                else {
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_4);
                }


                let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_parte_1) + parseFloat(precio_parte_2) + parseFloat(precio_parte_3) + parseFloat(precio_parte_4);
                preciounitario_pre.textContent = suma_precios;


            }
        }

        // 39
        let serigrafia9_parte_4 = document.getElementById('parte4_serigrafia_radio9');
        if(serigrafia9_parte_4 !== null){

            let id_serigrafia39 = serigrafia9_parte_4.getAttribute('value');
            let nombre_serigrafia_padre = serigrafia9_parte_4.getAttribute('name');
            let precio_value_serigrafia9_parte4 = serigrafia9_parte_4.getAttribute('data-precio');

            if(serigrafia9_parte_4.checked){
                nombre_parte_4 = nombre_serigrafia_padre;
                id_serigrafia_parte_4 = id_serigrafia39;
                precio_parte_4 = precio_value_serigrafia9_parte4;

                //  pasarle los precios de las serigrafias al input
                if(precio_parte_1 || precio_parte_2 || precio_parte_3){
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_1+','+precio_parte_2+','+precio_parte_3+','+precio_parte_4);
                }
                else {
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_4);
                }


                let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_parte_1) + parseFloat(precio_parte_2) + parseFloat(precio_parte_3) + parseFloat(precio_parte_4);
                preciounitario_pre.textContent = suma_precios;


            }
        }

        // 40
        let serigrafia10_parte_4 = document.getElementById('parte4_serigrafia_radio10');
        if(serigrafia10_parte_4 !== null){

            let id_serigrafia40 = serigrafia10_parte_4.getAttribute('value');
            let nombre_serigrafia_padre = serigrafia10_parte_4.getAttribute('name');
            let precio_value_serigrafia10_parte4 = serigrafia10_parte_4.getAttribute('data-precio');

            if(serigrafia10_parte_4.checked){
                nombre_parte_4 = nombre_serigrafia_padre;
                id_serigrafia_parte_4 = id_serigrafia40;
                precio_parte_4 = precio_value_serigrafia10_parte4;

                //  pasarle los precios de las serigrafias al input
                if(precio_parte_1 || precio_parte_2 || precio_parte_3){
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_1+','+precio_parte_2+','+precio_parte_3+','+precio_parte_4);
                }
                else {
                    input_serigrafia_guardar_precios.setAttribute('value', precio_parte_4);
                }


                let suma_precios = parseFloat(value_precio_base) + parseFloat(precio_parte_1) + parseFloat(precio_parte_2) + parseFloat(precio_parte_3) + parseFloat(precio_parte_4);
                preciounitario_pre.textContent = suma_precios;


            }
        }

        //  asignar la parte
        if(nombre_parte_4 !== '') {
            if (nombre_parte_1 !== '') {
                label_partes_escog.innerHTML = nombre_parte_1 + '  ' + nombre_parte_2 + '  ' + nombre_parte_3 + '  ' + nombre_parte_4;

                let concat_posiciones_seleccionadas = nombre_parte_1 + ',' + nombre_parte_2 + ',' + nombre_parte_3 + ',' + nombre_parte_4;
                input_posiciones_seleccionadas.setAttribute('value', concat_posiciones_seleccionadas);
            } else if (nombre_parte_2 !== '') {
                label_partes_escog.innerHTML = nombre_parte_2 + '  ' + nombre_parte_3 + '  ' + nombre_parte_4;

                let concat_posiciones_seleccionadas = nombre_parte_2 + ',' + nombre_parte_3 + ',' + nombre_parte_4;
                input_posiciones_seleccionadas.setAttribute('value', concat_posiciones_seleccionadas);
            }
            else if(nombre_parte_3 !== ''){
                label_partes_escog.innerHTML = nombre_parte_3 + '  ' + nombre_parte_4;

                let concat_posiciones_seleccionadas = nombre_parte_3 + ',' + nombre_parte_4;
                input_posiciones_seleccionadas.setAttribute('value', concat_posiciones_seleccionadas);
            }
            else {
                label_partes_escog.innerHTML = nombre_parte_4;

                input_posiciones_seleccionadas.setAttribute('value', nombre_parte_4);


            }
        }

        //asignar el id de la serigrafia
        if(id_serigrafia_parte_4 !== ''){
            if(id_serigrafia_parte_1 !== ''){
                let concat_values = id_serigrafia_parte_1 + ',' + id_serigrafia_parte_2 + ',' + id_serigrafia_parte_3 + ',' + id_serigrafia_parte_4;
                input_serigrafias.setAttribute('value', concat_values);



            }
            else if(id_serigrafia_parte_2 !== ''){
                let concat_values = id_serigrafia_parte_2 + ',' + id_serigrafia_parte_3 + ',' + id_serigrafia_parte_4;
                input_serigrafias.setAttribute('value', concat_values);

            }
            else if(id_serigrafia_parte_3 !== ''){
                let concat_values = id_serigrafia_parte_3 + ',' + id_serigrafia_parte_4;

            }
            else{
                input_serigrafias.setAttribute('value', id_serigrafia_parte_4);

            }
        }

		if(seccion_personalizalo_elementDisplay === 'block'){

            let serigrafias_parte_1 = document.querySelector('input[data-id-padre="btn_parte1"]:checked');
            let serigrafias_parte_2 = document.querySelector('input[data-id-padre="btn_parte2"]:checked');
            let serigrafias_parte_3 = document.querySelector('input[data-id-padre="btn_parte3"]:checked');
            let serigrafias_parte_4 = document.querySelector('input[data-id-padre="btn_parte4"]:checked');

			if( serigrafias_parte_1 !== null || serigrafias_parte_2 !== null || serigrafias_parte_3 !== null || serigrafias_parte_4 !== null)             {

                $("#content_personalizalo").slideUp("slow");
                // seccion_personalizalo.style.setProperty('display', 'none');

                if(seccion_cuando_elementDisplay === 'none'){
                    $("#seccion_cuando").slideDown("slow");
                    $("#seccion_cuando").classList.toggle('active');
                    // seccion_cuando.style.setProperty('display', 'block');
                }
            }
            else {
                window.alert('Debe seleccionar al menos un estampado.');
            }
        }

    });



    // boton sin estampado
    let boton_sin_estampado = document.getElementById('sin_estampado');
    boton_sin_estampado.addEventListener('click', function(evento){
        let seccion_personalizalo = document.getElementById('content_personalizalo');
        let seccion_personalizalo_elementStyle = window.getComputedStyle(seccion_personalizalo);
        let seccion_personalizalo_elementDisplay = seccion_personalizalo_elementStyle.getPropertyValue('display');

        let seccion_cuando = document.getElementById('seccion_cuando');
        let seccion_cuando_elementStyle = window.getComputedStyle(seccion_cuando);
        let seccion_cuando_elementDisplay = seccion_cuando_elementStyle.getPropertyValue('display');

        let input_posiciones_seleccionadas = document.getElementById('input_posiciones_seleccionadas');
        let label_partes_escog = document.getElementById('partes_escog');

        let input_serigrafias = document.getElementById('input_serigrafias');
        let input_serigrafia_guardar_precios = document.getElementById('precios_serigrafias');

        document.querySelectorAll('[class=radio_input]').forEach((x) => x.checked = false);

        label_partes_escog.innerHTML = 'Ninguna';
		input_posiciones_seleccionadas.setAttribute('value', 'Ninguna');
       // input_posiciones_seleccionadas.value = 'Ninguna';

        input_serigrafias.setAttribute('value', '0,0,0,0');
        input_serigrafia_guardar_precios.setAttribute('value', 0);

         //  desabilitar la seccion actual y habilitar la siguiente
        if(seccion_personalizalo_elementDisplay === 'block'){
            $("#content_personalizalo").slideUp("slow");
            // seccion_personalizalo.style.setProperty('display', 'none');
        }
        if(seccion_cuando_elementDisplay === 'none'){
            $("#seccion_cuando").slideDown("slow");
            $("#seccion_cuando").classList.toggle('active');
            // seccion_cuando.style.setProperty('display', 'block');
        }
    });



    //  mostrar u ocultar los botones de subir logos segun las partes
    $('#confirmar_estampado').click(function() {
        let seccion_logo_1 = document.getElementById('seccion_logo_1');
        let seccion_logo_2 = document.getElementById('seccion_logo_2');
        let seccion_logo_3 = document.getElementById('seccion_logo_3');
        let seccion_logo_4 = document.getElementById('seccion_logo_4');

        let seccion_logo = document.getElementById('seccion_logo');

        let serigrafias_parte_1 = document.querySelector('input[data-id-padre="btn_parte1"]:checked');
        let serigrafias_parte_2 = document.querySelector('input[data-id-padre="btn_parte2"]:checked');
        let serigrafias_parte_3 = document.querySelector('input[data-id-padre="btn_parte3"]:checked');
        let serigrafias_parte_4 = document.querySelector('input[data-id-padre="btn_parte4"]:checked');

        if(serigrafias_parte_1 !== null){
            seccion_logo_1.style.setProperty('display', '');
        }
        if(serigrafias_parte_2 !== null){
            seccion_logo_2.style.setProperty('display', '');
        }
        if(serigrafias_parte_3 !== null){
            seccion_logo_3.style.setProperty('display', '');
        }
        if(serigrafias_parte_4 !== null){
            seccion_logo_4.style.setProperty('display', '');
        }

    });

});