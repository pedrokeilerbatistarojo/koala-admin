jQuery(document).ready(function($){


    $.ajax({
        type: "POST",
        url: LlenarTarjeta.url,
        data: {
            action: "llenar_tarjeta",
            nonce_ajax_llenar_tarjeta: LlenarTarjeta.seguridad_ajax_llenar_tarjeta,
        },
        success:function (datos_enviados) {
            let envio_decode = JSON.parse(datos_enviados);

            let nombres = envio_decode.array_nombre;
            let colores = envio_decode.array_color;
            let sku = envio_decode.array_sku;

            let cantidades = envio_decode.array_cantidad;
            let precios = envio_decode.array_precio;
            let subtotales = envio_decode.array_subtotal;
            let subtotal_antes_impuestos = envio_decode.subtotal_antes_impuestos;

            let total_iva = envio_decode.total_iva;


            let total = envio_decode.total;

            MostrarDatos(nombres, colores,  sku, cantidades, precios, subtotales, subtotal_antes_impuestos, total_iva, total);
        }
    });


    //  mostrar los datos del select
    function MostrarDatos(nombres, colores, sku, cantidades, precios, subtotales, subtotal_antes_impuestos, total_iva, total){
        jQuery(function () {
            let total_pedido_sin_impuestos = document.getElementById('total_pedido_sin_impuestos');
            let html_total_pedido_sin_impuestos = ``;
            html_total_pedido_sin_impuestos += `${subtotal_antes_impuestos}€`;
            total_pedido_sin_impuestos.innerHTML = html_total_pedido_sin_impuestos;

            let total_iva_span = document.getElementById('total_iva');
            let html_total_iva = ``;

            html_total_iva += `${total_iva}€`;
            total_iva_span.innerHTML = html_total_iva;

            let total_pedido = document.getElementById('total_pedido');
            let html_total_pedido = ``;
            html_total_pedido += `${total}`;
            total_pedido.innerHTML = html_total_pedido;



            let tabla_mostrar_orden = document.getElementById('crear_tarjeta_tabla');
            let html_tabla_mostrar_orden = ``;

            for (var i=0; i < sku.length; i++) {
                html_tabla_mostrar_orden += `<tabla id="tabla_mostrar_orden"><span class="span_tabla_presup"><strong>${nombres[i]}</strong></span><br><span class="span_tabla_presup">${colores[i]}</span><br><br><span class="span_tabla_presup">${sku[i]}</span><br><tr><td><span class="span_tabla_presup">${precios[i]}€ x ${cantidades[i]}</span> <span id="subtotal_span">${subtotales[i]}€</span></td><br><br><hr></tr></tabla>`;

            }
            tabla_mostrar_orden.innerHTML = html_tabla_mostrar_orden;
        });
    }


});