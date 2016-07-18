function soloNumeros(e){
    var keynum = window.event ? window.event.keyCode : e.which;
    if ((keynum == 8) || (keynum == 46))
    return true;
         
    return /\d/.test(String.fromCharCode(keynum));
}

function soloLetras(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";
    tecla_especial = false
    for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }
        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }

function validar_email_ingreso(){
  var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;

    // Se utiliza la funcion test() nativa de JavaScript
    if (regex.test($('#email_ingreso').val().trim())) {
        $("#icono_email_ing").remove();
        $("#email_ingreso").parent().attr("class","form-group has-success has-feedback");
        $("#email_ingreso").parent().append("<span id='icono_email_ing' class='glyphicon glyphicon-ok form-control-feedback'></span>");
        $('#enviar_registro').attr('disabled', false);
        return true;
    } else {
        $("#icono_email_ing").remove();
        $("#email_ingreso").parent().attr("class","form-group has-error has-feedback");
        $("#email_ingreso").parent().append("<span id='icono_email_ing' class='glyphicon glyphicon-remove form-control-feedback'></span>");
        $('#enviar_registro').attr('disabled', true);
        return false;
    }
}


/*

                else{
                    var url = "registrarusuario.php"; // El script a dónde se realizará la petición.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#registrarUsuarios").serialize(), // Adjuntar los campos del formulario enviado.
                    success: function(data)
                    {
                        $("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                        $('.MostrarRegistro').hide();
                    }
                    });
                }
                return false;  
*/


