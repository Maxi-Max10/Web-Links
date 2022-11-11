function errorUsuario() {
    var us = document.querySelector('#us').value;

    if (us.trim() === '') {
        Swal.fire({
            icon: 'error',
            title: 'error',
            text: 'FALTA LLENAR',
            footer: 'login'
        })
    }
}