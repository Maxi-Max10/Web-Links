
function validarFormE(){
        $.ajax({
            type:'POST',
            url:'Controller/editarProceso.php',
            data: $("#form_ajaxE").serialize(),
            success:function(data){ 
                
                $('#e_urlE').html('');
                $("#mensajeED").html(data);
            }
        });

    
    
};