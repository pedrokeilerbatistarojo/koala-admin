jQuery(document).ready(function($){


    $("#obtener_presupuesto").click(function () {

        var input_email = $("input[name=email]").val();
        var firstname = $("input[name=firstname]").val();
        var lastname = $("input[name=lastname]").val();
        var company = $("input[name=company]").val();
        var street = $("input[name=street]").val();
        var city = $("input[name=city]").val();
        var postcode = $("input[name=postcode]").val();

        var region_id = $("select[name=region_id]").val();
        var country_id = $("select[name=country_id]").val();

        var telephone = $("input[name=telephone]").val();
        var vat_id = $("input[name=vat_id]").val();

        if( input_email === "" || firstname === "" || lastname === "" || street === "" || city === "" || postcode === "" || region_id === "" ){
            window.alert("Debe rellenar todos los campos.");
        }
        else{
            $.ajax({
                type: "POST",
                url: AjaxPedirPresupuesto.url,
                data: {
                    action: "capturar_datos_presupuesto",
                    nonce_ajax_pedir_presupuesto: AjaxPedirPresupuesto.seguridad_ajax_pedir_presupuesto,
                    input_email: input_email,
                    firstname: firstname,
                    lastname: lastname,
                    company: company,
                    street: street,
                    city: city,
                    postcode: postcode,
                    region_id: region_id,
                    country_id: country_id,
                    telephone: telephone,
                    vat_id: vat_id

                },
                success:function () {
                    alert('Solicitud entregada');
                 
                }
            })
        }
    });





















});