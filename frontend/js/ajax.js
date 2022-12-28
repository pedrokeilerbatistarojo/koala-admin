jQuery(document).ready(function($){



//    Cantidad 5
    $(document).on('click', '.cant_a_escoger_5', function(){
        let btn_5 = document.getElementById('cant_a_escoger_5');

        var product_id = $(this).attr('data-prod-id');
        // var url = AjaxBtn_5.url;

        let seccion_cuantos = document.getElementById('content_cuantos');
        let seccion_cuantos_elementStyle = window.getComputedStyle(seccion_cuantos);
        let seccion_cuantos_elementDisplay = seccion_cuantos_elementStyle.getPropertyValue('display');

        let seccion_personalizalo = document.getElementById('content_personalizalo');
        let seccion_personalizalo_elementStyle = window.getComputedStyle(seccion_personalizalo);
        let seccion_personalizalo_elementDisplay = seccion_personalizalo_elementStyle.getPropertyValue('display');

        let cuantos_label = document.getElementById('label_cuantos');
        let cuantos_label_elementStyle = window.getComputedStyle(cuantos_label);
        let cuantos_label_elementDisplay = cuantos_label_elementStyle.getPropertyValue('display');

        let input_cantidad_seleccionada = document.getElementById('input_cantidad_seleccionada');
        let label_cantidad_seleccionada = document.getElementById('cant_escog');


        if(cuantos_label_elementDisplay === 'none'){
            cuantos_label_elementDisplay.style.setProperty('display', 'block');
        }

        let cant_boton = btn_5.getAttribute('value');
        input_cantidad_seleccionada.setAttribute('value', cant_boton);
        label_cantidad_seleccionada.innerHTML = cant_boton;

        //  mostrar la cantidad de productos a asignarles tallas
        let cant_a_asignar = document.getElementById('cant_a_asignar');
        cant_a_asignar.innerHTML = cant_boton;

        //  calcular y mostrar importe de embolsado
        let precio_embolsado = document.getElementById('precio_embolsado').innerHTML;
        let calcular_imp = precio_embolsado * cant_boton;

        let importe_embolsado = document.getElementById('importe_embolsado');
        importe_embolsado.innerHTML = calcular_imp;



        // deseleccionar el checkbox de embolsado
        $('#extra1').prop("checked", false);


        //seccion calculadora   //
        let unidades_pre = document.getElementById('unidades_pre');
        unidades_pre.innerHTML = cant_boton;

        let precio_base = document.getElementById('precio_base').innerText;
        // let importe = precio_base * cant_boton;

        if(seccion_cuantos_elementDisplay === 'block'){
            $("#content_cuantos").slideUp("slow");
            // seccion_cuantos.style.setProperty('display', 'none');
        }
        if(seccion_personalizalo_elementDisplay === 'none'){
            $("#content_personalizalo").slideDown("slow");
            $("#content_personalizalo").classList.toggle('active');
            // seccion_personalizalo.style.setProperty('display', 'block');
        }


    });

    //    Cantidad 10
    $(document).on('click', '.cant_a_escoger_10', function(){
        let btn_10 = document.getElementById('cant_a_escoger_10');

        var product_id = $(this).attr('data-prod-id');


        let seccion_cuantos = document.getElementById('content_cuantos');
        let seccion_cuantos_elementStyle = window.getComputedStyle(seccion_cuantos);
        let seccion_cuantos_elementDisplay = seccion_cuantos_elementStyle.getPropertyValue('display');

        let seccion_personalizalo = document.getElementById('content_personalizalo');
        let seccion_personalizalo_elementStyle = window.getComputedStyle(seccion_personalizalo);
        let seccion_personalizalo_elementDisplay = seccion_personalizalo_elementStyle.getPropertyValue('display');

        let cuantos_label = document.getElementById('label_cuantos');
        let cuantos_label_elementStyle = window.getComputedStyle(cuantos_label);
        let cuantos_label_elementDisplay = cuantos_label_elementStyle.getPropertyValue('display');

        let input_cantidad_seleccionada = document.getElementById('input_cantidad_seleccionada');
        let label_cantidad_seleccionada = document.getElementById('cant_escog');


        if(cuantos_label_elementDisplay === 'none'){
            cuantos_label_elementDisplay.style.setProperty('display', 'block');
        }

        let cant_boton = btn_10.getAttribute('value');
        label_cantidad_seleccionada.innerHTML = cant_boton;
        input_cantidad_seleccionada.setAttribute('value', cant_boton);

        let cant_a_asignar = document.getElementById('cant_a_asignar');
        cant_a_asignar.innerHTML = cant_boton;

        //  calcular y mostrar importe de embolsado
        let precio_embolsado = document.getElementById('precio_embolsado').innerHTML;
        let calcular_imp = precio_embolsado * cant_boton;

        let importe_embolsado = document.getElementById('importe_embolsado');
        importe_embolsado.innerHTML = calcular_imp;

        // deseleccionar el checkbox de embolsado
        $('#extra1').prop("checked", false);

        //seccion calculadora   //

        let unidades_pre = document.getElementById('unidades_pre');
        unidades_pre.innerHTML = cant_boton;

        //  mostrar y ocultar seccion
        if(seccion_cuantos_elementDisplay === 'block'){
            $("#content_cuantos").slideUp("slow");
            // seccion_cuantos.style.setProperty('display', 'none');
        }
        if(seccion_personalizalo_elementDisplay === 'none'){
            $("#content_personalizalo").slideDown("slow");
            $("#content_personalizalo").classList.toggle('active');
            // seccion_personalizalo.style.setProperty('display', 'block');
        }

    });

    //    cantidad 25
    let btn_25 = document.getElementById('cant_a_escoger_25');
    btn_25.addEventListener('click', function(evento){

        let seccion_cuantos = document.getElementById('content_cuantos');
        let seccion_cuantos_elementStyle = window.getComputedStyle(seccion_cuantos);
        let seccion_cuantos_elementDisplay = seccion_cuantos_elementStyle.getPropertyValue('display');

        let seccion_personalizalo = document.getElementById('content_personalizalo');
        let seccion_personalizalo_elementStyle = window.getComputedStyle(seccion_personalizalo);
        let seccion_personalizalo_elementDisplay = seccion_personalizalo_elementStyle.getPropertyValue('display');

        let cuantos_label = document.getElementById('label_cuantos');
        let cuantos_label_elementStyle = window.getComputedStyle(cuantos_label);
        let cuantos_label_elementDisplay = cuantos_label_elementStyle.getPropertyValue('display');

        let input_cantidad_seleccionada = document.getElementById('input_cantidad_seleccionada');
        let label_cantidad_seleccionada = document.getElementById('cant_escog');


        if(cuantos_label_elementDisplay === 'none'){
            cuantos_label_elementDisplay.style.setProperty('display', 'block');
        }
        let cant_boton = btn_25.getAttribute('value');
        input_cantidad_seleccionada.setAttribute('value', cant_boton);
        label_cantidad_seleccionada.innerHTML = cant_boton;

        let cant_a_asignar = document.getElementById('cant_a_asignar');
        cant_a_asignar.innerHTML = cant_boton;

        //  calcular y mostrar importe de embolsado
        let precio_embolsado = document.getElementById('precio_embolsado').innerHTML;
        let calcular_imp = precio_embolsado * cant_boton;

        let importe_embolsado = document.getElementById('importe_embolsado');
        importe_embolsado.innerHTML = calcular_imp;

        // deseleccionar el checkbox de embolsado
        $('#extra1').prop("checked", false);

        //seccion calculadora   //
        let unidades_pre = document.getElementById('unidades_pre');
        unidades_pre.innerHTML = cant_boton;

        //  mostrar y ocultar
        if(seccion_cuantos_elementDisplay === 'block'){
            $("#content_cuantos").slideUp("slow");
            // seccion_cuantos.style.setProperty('display', 'none');
        }
        if(seccion_personalizalo_elementDisplay === 'none'){
            $("#content_personalizalo").slideDown("slow");
            $("#content_personalizalo").classList.toggle('active');
            // seccion_personalizalo.style.setProperty('display', 'block');
        }

    });


    //    cantidad 50
    let btn_50 = document.getElementById('cant_a_escoger_50');
    btn_50.addEventListener('click', function(evento){

        let seccion_cuantos = document.getElementById('content_cuantos');
        let seccion_cuantos_elementStyle = window.getComputedStyle(seccion_cuantos);
        let seccion_cuantos_elementDisplay = seccion_cuantos_elementStyle.getPropertyValue('display');

        let seccion_personalizalo = document.getElementById('content_personalizalo');
        let seccion_personalizalo_elementStyle = window.getComputedStyle(seccion_personalizalo);
        let seccion_personalizalo_elementDisplay = seccion_personalizalo_elementStyle.getPropertyValue('display');

        let cuantos_label = document.getElementById('label_cuantos');
        let cuantos_label_elementStyle = window.getComputedStyle(cuantos_label);
        let cuantos_label_elementDisplay = cuantos_label_elementStyle.getPropertyValue('display');

        let input_cantidad_seleccionada = document.getElementById('input_cantidad_seleccionada');
        let label_cantidad_seleccionada = document.getElementById('cant_escog');


        if(cuantos_label_elementDisplay === 'none'){
            cuantos_label_elementDisplay.style.setProperty('display', 'block');
        }
        let cant_boton = btn_50.getAttribute('value');
        input_cantidad_seleccionada.setAttribute('value', cant_boton);
        label_cantidad_seleccionada.innerHTML = cant_boton;

        let cant_a_asignar = document.getElementById('cant_a_asignar');
        cant_a_asignar.innerHTML = cant_boton;

        //  calcular y mostrar importe de embolsado
        let precio_embolsado = document.getElementById('precio_embolsado').innerHTML;
        let calcular_imp = precio_embolsado * cant_boton;

        let importe_embolsado = document.getElementById('importe_embolsado');
        importe_embolsado.innerHTML = calcular_imp;

        // deseleccionar el checkbox de embolsado
        $('#extra1').prop("checked", false);

        //seccion calculadora   //
        let unidades_pre = document.getElementById('unidades_pre');
        unidades_pre.innerHTML = cant_boton;


        //  mostrar y ocultar
        if(seccion_cuantos_elementDisplay === 'block'){
            $("#content_cuantos").slideUp("slow");
            // seccion_cuantos.style.setProperty('display', 'none');
        }
        if(seccion_personalizalo_elementDisplay === 'none'){
            $("#content_personalizalo").slideDown("slow");
            $("#content_personalizalo").classList.toggle('active');
            // seccion_personalizalo.style.setProperty('display', 'block');
        }
    });

    //    cantidad 100
    let btn_100 = document.getElementById('cant_a_escoger_100');
    btn_100.addEventListener('click', function(evento){

        let seccion_cuantos = document.getElementById('content_cuantos');
        let seccion_cuantos_elementStyle = window.getComputedStyle(seccion_cuantos);
        let seccion_cuantos_elementDisplay = seccion_cuantos_elementStyle.getPropertyValue('display');

        let seccion_personalizalo = document.getElementById('content_personalizalo');
        let seccion_personalizalo_elementStyle = window.getComputedStyle(seccion_personalizalo);
        let seccion_personalizalo_elementDisplay = seccion_personalizalo_elementStyle.getPropertyValue('display');

        let cuantos_label = document.getElementById('label_cuantos');
        let cuantos_label_elementStyle = window.getComputedStyle(cuantos_label);
        let cuantos_label_elementDisplay = cuantos_label_elementStyle.getPropertyValue('display');

        let input_cantidad_seleccionada = document.getElementById('input_cantidad_seleccionada');
        let label_cantidad_seleccionada = document.getElementById('cant_escog');


        if(cuantos_label_elementDisplay === 'none'){
            cuantos_label_elementDisplay.style.setProperty('display', 'block');
        }
        let cant_boton = btn_100.getAttribute('value');
        input_cantidad_seleccionada.setAttribute('value', cant_boton);
        label_cantidad_seleccionada.innerHTML = cant_boton;

        let cant_a_asignar = document.getElementById('cant_a_asignar');
        cant_a_asignar.innerHTML = cant_boton;

        // deseleccionar el checkbox de embolsado
        $('#extra1').prop("checked", false);

        //  calcular y mostrar importe de embolsado
        let precio_embolsado = document.getElementById('precio_embolsado').innerHTML;
        let calcular_imp = precio_embolsado * cant_boton;

        let importe_embolsado = document.getElementById('importe_embolsado');
        importe_embolsado.innerHTML = calcular_imp;

        //seccion calculadora   //
        let unidades_pre = document.getElementById('unidades_pre');
        unidades_pre.innerHTML = cant_boton;


        //  mostrar y ocultar
        if(seccion_cuantos_elementDisplay === 'block'){
            $("#content_cuantos").slideUp("slow");
            // seccion_cuantos.style.setProperty('display', 'none');
        }
        if(seccion_personalizalo_elementDisplay === 'none'){
            $("#content_personalizalo").slideDown("slow");
            $("#content_personalizalo").classList.toggle('active');
            // seccion_personalizalo.style.setProperty('display', 'block');
        }

    });

    //    cantidad 250
    let btn_250 = document.getElementById('cant_a_escoger_250');
    btn_250.addEventListener('click', function(evento){

        let seccion_cuantos = document.getElementById('content_cuantos');
        let seccion_cuantos_elementStyle = window.getComputedStyle(seccion_cuantos);
        let seccion_cuantos_elementDisplay = seccion_cuantos_elementStyle.getPropertyValue('display');

        let seccion_personalizalo = document.getElementById('content_personalizalo');
        let seccion_personalizalo_elementStyle = window.getComputedStyle(seccion_personalizalo);
        let seccion_personalizalo_elementDisplay = seccion_personalizalo_elementStyle.getPropertyValue('display');

        let cuantos_label = document.getElementById('label_cuantos');
        let cuantos_label_elementStyle = window.getComputedStyle(cuantos_label);
        let cuantos_label_elementDisplay = cuantos_label_elementStyle.getPropertyValue('display');

        let input_cantidad_seleccionada = document.getElementById('input_cantidad_seleccionada');
        let label_cantidad_seleccionada = document.getElementById('cant_escog');


        if(cuantos_label_elementDisplay === 'none'){
            cuantos_label_elementDisplay.style.setProperty('display', 'block');
        }
        let cant_boton = btn_250.getAttribute('value');
        input_cantidad_seleccionada.setAttribute('value', cant_boton);
        label_cantidad_seleccionada.innerHTML = cant_boton;

        let cant_a_asignar = document.getElementById('cant_a_asignar');
        cant_a_asignar.innerHTML = cant_boton;

        // deseleccionar el checkbox de embolsado
        $('#extra1').prop("checked", false);

        //  calcular y mostrar importe de embolsado
        let precio_embolsado = document.getElementById('precio_embolsado').innerHTML;
        let calcular_imp = precio_embolsado * cant_boton;

        let importe_embolsado = document.getElementById('importe_embolsado');
        importe_embolsado.innerHTML = calcular_imp;

        //seccion calculadora   //
        let unidades_pre = document.getElementById('unidades_pre');
        unidades_pre.innerHTML = cant_boton;


        //  mostrar y ocultar
        if(seccion_cuantos_elementDisplay === 'block'){
            $("#content_cuantos").slideUp("slow");
            // seccion_cuantos.style.setProperty('display', 'none');
        }
        if(seccion_personalizalo_elementDisplay === 'none'){
            $("#content_personalizalo").slideDown("slow");
            $("#content_personalizalo").classList.toggle('active');
            // seccion_personalizalo.style.setProperty('display', 'block');
        }
   });

    //    cantidad 500
    let btn_500 = document.getElementById('cant_a_escoger_500');
    btn_500.addEventListener('click', function(evento){

        let seccion_cuantos = document.getElementById('content_cuantos');
        let seccion_cuantos_elementStyle = window.getComputedStyle(seccion_cuantos);
        let seccion_cuantos_elementDisplay = seccion_cuantos_elementStyle.getPropertyValue('display');

        let seccion_personalizalo = document.getElementById('content_personalizalo');
        let seccion_personalizalo_elementStyle = window.getComputedStyle(seccion_personalizalo);
        let seccion_personalizalo_elementDisplay = seccion_personalizalo_elementStyle.getPropertyValue('display');

        let cuantos_label = document.getElementById('label_cuantos');
        let cuantos_label_elementStyle = window.getComputedStyle(cuantos_label);
        let cuantos_label_elementDisplay = cuantos_label_elementStyle.getPropertyValue('display');

        let input_cantidad_seleccionada = document.getElementById('input_cantidad_seleccionada');
        let label_cantidad_seleccionada = document.getElementById('cant_escog');


        if(cuantos_label_elementDisplay === 'none'){
            cuantos_label_elementDisplay.style.setProperty('display', 'block');
        }
        let cant_boton = btn_500.getAttribute('value');
        input_cantidad_seleccionada.setAttribute('value', cant_boton);
        label_cantidad_seleccionada.innerHTML = cant_boton;

        let cant_a_asignar = document.getElementById('cant_a_asignar');
        cant_a_asignar.innerHTML = cant_boton;

        //  calcular y mostrar importe de embolsado
        let precio_embolsado = document.getElementById('precio_embolsado').innerHTML;
        let calcular_imp = precio_embolsado * cant_boton;

        let importe_embolsado = document.getElementById('importe_embolsado');
        importe_embolsado.innerHTML = calcular_imp;

        // deseleccionar el checkbox de embolsado
        $('#extra1').prop("checked", false);

        //seccion calculadora   //
        let unidades_pre = document.getElementById('unidades_pre');
        unidades_pre.innerHTML = cant_boton;


        //  mostrar y ocultar
        if(seccion_cuantos_elementDisplay === 'block'){
            $("#content_cuantos").slideUp("slow");
            // seccion_cuantos.style.setProperty('display', 'none');
        }
        if(seccion_personalizalo_elementDisplay === 'none'){
            $("#content_personalizalo").slideDown("slow");
            $("#content_personalizalo").classList.toggle('active');
            // seccion_personalizalo.style.setProperty('display', 'block');
        }
    });


    // mostrar el boton confirmar cantidad cuando se de click en el input de otra cantidad
    const boton = document.querySelector('#otra_cantidad');
    let boton_confirmar_cantidad = document.getElementById('confirmar_cantidad');

    boton.addEventListener('click', function(evento){
        let elementStyle = window.getComputedStyle(boton_confirmar_cantidad);
        let elementDisplay = elementStyle.getPropertyValue('display');
        if(elementDisplay === 'none'){
            boton_confirmar_cantidad.style.setProperty('display', 'block');
        }
    });


    boton_confirmar_cantidad.addEventListener('click', function(evento){
        let value_otra_cantidad = document.getElementById('otra_cantidad').value;
        let input_cantidad_seleccionada = document.getElementById('input_cantidad_seleccionada');
        let label_cantidad_seleccionada = document.getElementById('cant_escog');

        let seccion_cuantos = document.getElementById('content_cuantos');
        let seccion_cuantos_elementStyle = window.getComputedStyle(seccion_cuantos);
        let seccion_cuantos_elementDisplay = seccion_cuantos_elementStyle.getPropertyValue('display');

        let seccion_personalizalo = document.getElementById('content_personalizalo');
        let seccion_personalizalo_elementStyle = window.getComputedStyle(seccion_personalizalo);
        let seccion_personalizalo_elementDisplay = seccion_personalizalo_elementStyle.getPropertyValue('display');

        if(seccion_cuantos_elementDisplay === 'block'){
            // seccion_cuantos.style.setProperty('display', 'none');
            $("#content_cuantos").slideUp("slow");
        }
        if(seccion_personalizalo_elementDisplay === 'none'){
            $("#content_personalizalo").slideDown("slow");
            $("#content_personalizalo").classList.toggle('active');
            // seccion_personalizalo.style.setProperty('display', 'block');
        }

        input_cantidad_seleccionada.setAttribute('value', value_otra_cantidad);
        label_cantidad_seleccionada.innerHTML = value_otra_cantidad;

        let cant_a_asignar = document.getElementById('cant_a_asignar');
        cant_a_asignar.innerHTML = value_otra_cantidad;

        //  calcular y mostrar importe de embolsado
        let precio_embolsado = document.getElementById('precio_embolsado').innerHTML;
        let calcular_imp = precio_embolsado * cant_boton;

        let importe_embolsado = document.getElementById('importe_embolsado');
        importe_embolsado.innerHTML = calcular_imp;

        // deseleccionar el checkbox de embolsado
        $('#extra1').prop("checked", false);
    });

});