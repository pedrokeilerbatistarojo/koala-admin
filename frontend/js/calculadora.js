jQuery(document).ready(function($){

    // seccion cuantos
    //btn 5
    $(document).on('click', '.cant_a_escoger_5', function(){
        $('.check > i').removeClass('selected');

        let button_confirmar_pedido_koala = document.getElementById('confirmar_pedido_koala');
        button_confirmar_pedido_koala.style.setProperty('display', 'none');

        let button_preconfirmar = document.getElementById('preconfirmar');
        button_preconfirmar.style.setProperty('display', 'inline');
    });
    //btn 10
    $(document).on('click', '.cant_a_escoger_10', function(){
        $('.check > i').removeClass('selected');

        let button_confirmar_pedido_koala = document.getElementById('confirmar_pedido_koala');
        button_confirmar_pedido_koala.style.setProperty('display', 'none');

        let button_preconfirmar = document.getElementById('preconfirmar');
        button_preconfirmar.style.setProperty('display', 'inline');
    });
    //btn 25
    $(document).on('click', '.cant_a_escoger_25', function(){
        $('.check > i').removeClass('selected');

        let button_confirmar_pedido_koala = document.getElementById('confirmar_pedido_koala');
        button_confirmar_pedido_koala.style.setProperty('display', 'none');

        let button_preconfirmar = document.getElementById('preconfirmar');
        button_preconfirmar.style.setProperty('display', 'inline');
    });
    //btn 50
    $(document).on('click', '.cant_a_escoger_50', function(){
        $('.check > i').removeClass('selected');

        let button_confirmar_pedido_koala = document.getElementById('confirmar_pedido_koala');
        button_confirmar_pedido_koala.style.setProperty('display', 'none');

        let button_preconfirmar = document.getElementById('preconfirmar');
        button_preconfirmar.style.setProperty('display', 'inline');
    });
    //btn 100
    $(document).on('click', '.cant_a_escoger_100', function(){
        $('.check > i').removeClass('selected');

        let button_confirmar_pedido_koala = document.getElementById('confirmar_pedido_koala');
        button_confirmar_pedido_koala.style.setProperty('display', 'none');

        let button_preconfirmar = document.getElementById('preconfirmar');
        button_preconfirmar.style.setProperty('display', 'inline');
    });
    //btn 250
    $(document).on('click', '.cant_a_escoger_250', function(){
        $('.check > i').removeClass('selected');

        let button_confirmar_pedido_koala = document.getElementById('confirmar_pedido_koala');
        button_confirmar_pedido_koala.style.setProperty('display', 'none');

        let button_preconfirmar = document.getElementById('preconfirmar');
        button_preconfirmar.style.setProperty('display', 'inline');
    });
    //btn 500
    $(document).on('click', '.cant_a_escoger_500', function(){
        $('.check > i').removeClass('selected');

        let button_confirmar_pedido_koala = document.getElementById('confirmar_pedido_koala');
        button_confirmar_pedido_koala.style.setProperty('display', 'none');

        let button_preconfirmar = document.getElementById('preconfirmar');
        button_preconfirmar.style.setProperty('display', 'inline');
    });


    // seccion personalizado
    let boton_conf_estampado = document.getElementById('confirmar_estampado');
    boton_conf_estampado.addEventListener('click', function(evento){
        $('.check > i').removeClass('selected');

        let button_confirmar_pedido_koala = document.getElementById('confirmar_pedido_koala');
        button_confirmar_pedido_koala.style.setProperty('display', 'none');

        let button_preconfirmar = document.getElementById('preconfirmar');
        button_preconfirmar.style.setProperty('display', 'inline');
    });


    //  seccion cuando
    let li = $('li.shipping-select');

    li.click(function(){
        //  calcular el importe total
        var precio_envio = $(this).find('.contenttop > input').val();
        var precio_base = $('#precio_base').text();
        var precios_serigrafias = $('#precios_serigrafias').val();

        var preciounitario_pre = $('#preciounitario_pre');
        var arreglo_precio_serig = precios_serigrafias.split(',');

        var precio_serig_1 = arreglo_precio_serig[0];
        var precio_serig_2 = arreglo_precio_serig[1];
        var precio_serig_3 = arreglo_precio_serig[2];
        var precio_serig_4 = arreglo_precio_serig[3];

        if(!precio_serig_1){
            precio_serig_1 = 0;
        }
        if(!precio_serig_2){
            precio_serig_2 = 0;
        }
        if(!precio_serig_3){
            precio_serig_3 = 0;
        }
        if(!precio_serig_4){
            precio_serig_4 = 0;
        }

        var suma_precio_serig = parseFloat(precio_serig_1) + parseFloat(precio_serig_2) + parseFloat(precio_serig_3) + parseFloat(precio_serig_4);

        var suma_precio_base_serigra = parseFloat(suma_precio_serig) + parseFloat(precio_base);

        var suma_precio_envio_prod =  parseFloat(suma_precio_base_serigra) + parseFloat(precio_envio);

        preciounitario_pre.text(suma_precio_envio_prod);

        var unidades_pre = $('#unidades_pre').text();


        var unid_x_precio = unidades_pre * suma_precio_envio_prod;
		
		var iva = (unid_x_precio * 21)/100;

        var preciototalfinal_pre = $('#preciototalfinal_pre');
        preciototalfinal_pre.text(unid_x_precio);
		
		var iva_pre = $('#iva_pre');
        iva_pre.text(iva);

        var input_precio_producto_final = $('#input_precio_producto_final');
        input_precio_producto_final.val(suma_precio_envio_prod);
    });



    //  para asignarle el valor de la variacion al input del formulario
    let input_variation_id = document.getElementById('variation_id');

    $( 'input.variation_id' ).change( function(){

        if( '' != $(this).val() ) {
            var var_id = $(this).val();
            input_variation_id.setAttribute('value', var_id);
        }
        else {
            input_variation_id.setAttribute('value', '');
        }
    });



});