
function mostrar() {
    let password = document.getElementById("password");
    let ver = document.getElementById('ver');
    let ocultar = document.getElementById('ocultar');

    if (password.type == 'password'){
        password.type = 'text';
        ver.style.display = 'none';
        ocultar.style.display = 'block';
    }else{
        password.type = 'password';
        ver.style.display = 'block';
        ocultar.style.display = 'none';
    }
}