function validarFormT(){
    var title = $('#title').val();
    var url = $('#url').val();
    var description = $('#description').val();

    if (url.trim() == '') {
        swal("Error!", "Por favor ingrese url!", "error");
        $('#url').focus();
        return false;
    }else{
        $.ajax({
            type:'POST',
            url:'Controller/crearProceso.php',
            data: $("#form_ajaxT").serialize(),
            success:function(data){ 

                $('#title').val('');
                $('#url').val('');
                $('#description').val('');

                $("#mensaje").html(data);
            }
        });

    }
    
};

