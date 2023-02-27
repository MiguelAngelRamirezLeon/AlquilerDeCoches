var comNombre = false;
var comApellidos = false;
var comDni = false;
var comClave = false;
var comClaveC = false;
var comTarjeta = false;

window.onload = inicio;

function inicio(params) {
    document.getElementById("nombre").value = '';
    document.getElementById("apellidos").value = '';
    document.getElementById("correo").value = '';
    document.getElementById("dni").value = '';
    document.getElementById("clave").value = '';
    document.getElementById("claveC").value = '';
    document.getElementById("boton").disabled = true;
}

function compruebaNombre() {
    var nombre = (document.getElementById("nombre").value).toLowerCase();
    if (nombre != '') {
        nombre = nombre.trim();
        var bien = true;
        for (let x = 0; x < nombre.length; x++) {
            if (nombre.charAt(x) == (nombre.charAt(x)).toUpperCase()) {
                bien = false;
            }
        }
        if (bien) {
            document.getElementById("nombre").value = nombre.charAt(0).toUpperCase() + nombre.slice(1);
            document.getElementById("errorNombre").innerHTML = "";
            if (comApellidos && comDni && comClave && comClaveC && comTarjeta) {
                document.getElementById("boton").disabled = false;
            } else {
                document.getElementById("boton").disabled = true;
            }
            comNombre = true;
        } else {
            document.getElementById("errorNombre").innerHTML = "Nombre no valido";
            comNombre = false;
            document.getElementById("boton").disabled = true;
        }
    } else {
        document.getElementById("errorNombre").innerHTML = "Nombre no valido";
        comNombre = false;
        document.getElementById("boton").disabled = true;
    }
}

function compruebaApellidos() {
    var apellidos = (document.getElementById("apellidos").value).toLowerCase();
    if (apellidos != '') {
        apellidos = apellidos.trim();
        var bien = false;
        var c = 0;
        for (let x = 0; x < apellidos.length; x++) {
            if (apellidos.charAt(x) == ' ') {
                bien = true;
                c++
            }
        }
        if (bien && c <= 1) {
            var apellido = apellidos.split(" ");
            for (let x = 0; x < apellido.length; x++) {
                for (let y = 0; y < apellido[x].length; y++) {
                    if (apellido[x].charAt(y) == (apellido[x].charAt(y)).toUpperCase()) {
                        bien = false;
                    }
                }
            }
            if (bien) {
                document.getElementById("apellidos").value = apellido[0].charAt(0).toUpperCase() + apellido[0].slice(1) + " " + apellido[1].charAt(0).toUpperCase() + apellido[1].slice(1);
                document.getElementById("errorApellidos").innerHTML = "";
                if (comNombre && comDni && comClave && comClaveC && comTarjeta) {
                    document.getElementById("boton").disabled = false;
                } else {
                    document.getElementById("boton").disabled = true;
                }
                comApellidos = true;
            } else {
                document.getElementById("errorApellidos").innerHTML = "Apellidos no validos";
                comApellidos = false;
                document.getElementById("boton").disabled = true;
            }
        } else {
            document.getElementById("errorApellidos").innerHTML = "Deben ser dos apellidos";
            document.getElementById("boton").disabled = true;
        }
    } else {
        document.getElementById("errorApellidos").innerHTML = "Apellidos no validos";
        document.getElementById("boton").disabled = true;
    }
}

function compruebaCorreo() {
    console.log("jijijija")
}

function compruebaDni() {
    var dni = (document.getElementById("dni").value).toUpperCase();
    var letras = "TRWAGMYFPDXBNJZSQVHLCKE";
    if (dni.length == 9) {
        var numeros = dni.substring(0, 8);
        var letra = dni.charAt(8);
        if (!isNaN(numeros)) {
            var num = parseInt(numeros);
            var resto = num % 23;
            if (letras.charAt(resto) == letra) {
                document.getElementById("dni").value = dni;
                document.getElementById("errorDni").innerHTML = "";
                if (comNombre && comApellidos && comClave && comClaveC && comTarjeta) {
                    document.getElementById("boton").disabled = false;
                } else {
                    document.getElementById("boton").disabled = true;
                }
                comDni = true;
            } else {
                document.getElementById("errorDni").innerHTML = "DNI no valido";
                document.getElementById("boton").disabled = true;
                comDni = false;
            }
        } else {
            document.getElementById("errorDni").innerHTML = "DNI no valido";
            document.getElementById("boton").disabled = true;
            comDni = false;
        }
    } else {
        document.getElementById("errorDni").innerHTML = "DNI no valido";
        document.getElementById("boton").disabled = true;
        comDni = false;
    }
}

function compruebaClave(params) {
    var clave = document.getElementById("clave").value
    var bien = false;
    for (let x = 0; x < clave.length; x++) {
        if (!isNaN(clave.charAt(x))) {
            bien = true;
        }
    }
    if (bien) {
        document.getElementById("errorClave").innerHTML = "";
        if (comNombre && comApellidos && comDni && comClaveC && comTarjeta) {
            document.getElementById("boton").disabled = false;
        } else {
            document.getElementById("boton").disabled = true;
        }
        comClave = true;
    } else {
        document.getElementById("errorClave").innerHTML = "La contraseña debe contener un digito";
        document.getElementById("boton").disabled = true;
        comClave = false;
    }
}

function compruebaClaveC(params) {
    if (document.getElementById("clave").value == document.getElementById("claveC").value) {
        document.getElementById("errorClaveC").innerHTML = "";
        if (comNombre && comApellidos && comDni && comClave && comTarjeta) {
            document.getElementById("boton").disabled = false;
        } else {
            document.getElementById("boton").disabled = true;
        }
        comClaveC = true;
    } else {
        document.getElementById("errorClaveC").innerHTML = "Contraseñas no coincidentes";
        document.getElementById("boton").disabled = true;
        comClaveC = false;
    }
}

function compruebaTarjeta() {
    var num = document.getElementById("tarjeta").value;
    const regex = /^[0-9]{16}$/g;
    if (num.match(regex)) {
        document.getElementById("errorTarjeta").innerHTML = "";
        if (comNombre && comApellidos && comDni && comClave && comClaveC) {
            document.getElementById("boton").disabled = false;
        } else {
            document.getElementById("boton").disabled = true;
        }
        comTarjeta = true;
    } else {
        document.getElementById("errorTarjeta").innerHTML = "Tarjeta no valida";
        document.getElementById("boton").disabled = true;
        comTarjeta = false;
    }
}