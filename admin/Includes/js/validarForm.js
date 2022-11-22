function submitForm(){
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+.)+[A-Z]{2,4}$/i;
    var nombre = $('#nombre').val();
    var usuario = $('#usuario').val();
    var email = $('#email').val();
    var password_us = $('#password_us').val();
    
    if(usuario.trim() == '' ){
        swal("Error!", "Por favor ingrese usuario!", "error");
        $('#usuario').focus();
        return false;
    }else if(usuario.trim().length < 3 ){
        swal("Error!", "El usuario debe contener al menos 3 caracteres!", "error");
        $('#usuario').focus();
        return false;
    }else  if(nombre.trim() == '' ){
        swal("Error!", "Por favor ingrese nombre!", "error");
        $('#nombre').focus();
        return false;
    }else if(nombre.length < 3 ){
        swal("Error!", "El nombre debe contener al menos 3 caracteres!", "error");
        $('#nombre').focus();
        return false;
    }else if(email.trim() == '' ){
        swal ( "Error!" ,  "Ingrese email!" ,  "error" )
        $('#email').focus();
        return false;
    }else if(email.trim() != '' && !reg.test(email)){
        swal("Error!", "Email invalido!", "error");
        $('#email').focus();
        return false;
    }else if(password_us.trim() < 6 ){
        swal("Error!", "La contraseña debe contener por lo menos 6 caracteres!", "error");
        $('#password_us').focus();
        return false;
    }else{
        $.ajax({
            type:'POST',
            url:'Controller/crearUsuario.php',
            data: $("#form_ajax").serialize(),
            success:function(data){
                
                    $('#nombre').val('');
                    $('#email').val('');
                    $('#usuario').val('');
                    $('#password_us').val(''); 
                    $("#mensaje").html(data);
            }
        });
    }
};

