var comMarca = false;
var comModelo = false;
var comMatricula = false;
var comBastidor = false;
var comFoto = false;
window.onload = incio;

function incio() {
    document.getElementById("marca").value = "";
    document.getElementById("modelo").value = "";
    document.getElementById("matricula").value = "";
    document.getElementById("bastidor").value = "";
    document.getElementById("foto").addEventListener("change", compruebaFoto, false);
}

function compruebaMarca() {
    var marca = document.getElementById("marca").value;
    const rex = /^[A-Za-z]+$/g;
    if (marca.match(rex)) {
        document.getElementById("marca").value = marca.charAt(0).toUpperCase() + marca.slice(1).toLowerCase();
        document.getElementById("errorMarca").innerHTML = "";
        comMarca = true;
        if (comMarca && comModelo && comMatricula && comBastidor && comFoto) {
            document.getElementById("boton").disabled = false;
        }
    } else {
        document.getElementById("errorMarca").innerHTML = "Marca no valida";
        document.getElementById("boton").disabled = true;
        comMarca = false;
    }
}

function compruebaModelo() {
    var modelo = document.getElementById("modelo").value;
    const rex = /^[A-Za-z0-9]+$/g;
    if (modelo.match(rex)) {
        document.getElementById("modelo").value = modelo.charAt(0).toUpperCase() + modelo.slice(1).toLowerCase();
        document.getElementById("errorModelo").innerHTML = "";
        comModelo = true;
        if (comMarca && comModelo && comMatricula && comBastidor && comFoto) {
            document.getElementById("boton").disabled = false;
        }
    } else {
        document.getElementById("errorModelo").innerHTML = "Modelo no valida";
        document.getElementById("boton").disabled = true;
        comModelo = false;
    }
}

function compruebaMatricula() {
    var matricula = document.getElementById("matricula").value;
    const rex = /^[0-9]{4}[A-Za-z]{3}$/g;
    if (matricula.match(rex)) {
        document.getElementById("matricula").value = matricula.toUpperCase();
        document.getElementById("errorMatricula").innerHTML = "";
        comMatricula = true;
        if (comMarca && comModelo && comMatricula && comBastidor && comFoto) {
            document.getElementById("boton").disabled = false;
        }
    } else {
        document.getElementById("errorMatricula").innerHTML = "Matricula no valida";
        document.getElementById("boton").disabled = true;
        comMatricula = false;
    }
}

function compruebaBastidor() {
    var bastidor = document.getElementById("bastidor").value;
    const rex = /^[A-Za-z0-9]{17}$/g;
    if (bastidor.match(rex)) {
        document.getElementById("bastidor").value = bastidor.toUpperCase();
        document.getElementById("errorBastidor").innerHTML = "";
        comBastidor = true;
        if (comMarca && comModelo && comMatricula && comBastidor && comFoto) {
            document.getElementById("boton").disabled = false;
        }
    } else {
        document.getElementById("errorBastidor").innerHTML = "Bastidor no valida";
        document.getElementById("boton").disabled = true;
        comBastidor = false;
    }
}

function compruebaFoto(params) {
    const foto = document.getElementById("foto").files[0];
    var extension = foto.name.split(".");
    if (extension[1] == "jpg") {
        comFoto = true;
        document.getElementById("errorFoto").innerHTML = "";
        if (comMarca && comModelo && comMatricula && comBastidor && comFoto) {
            document.getElementById("boton").disabled = false;
        }
    } else {
        document.getElementById("errorFoto").innerHTML = "solo se permiten archivos jpg";
        document.getElementById("boton").disabled = true;
        comFoto = false;
    }
}