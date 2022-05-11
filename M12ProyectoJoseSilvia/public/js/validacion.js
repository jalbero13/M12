let valCorreo = /^\w\@$/;


function validarTelefono(e){
    let valTelefono = /^\[6-8-9]{1}d{8}$/;
    var campo = $('#telefonoAlumno') ;
    if(campo.value.match(valTelefono)){
        campo.setAttribute('class', 'correcto');
    }else{
        campo.setAttribute('class', 'erroneo');
        e.preventDefault();
    }
}


function validarDni(e){
    var valDni = /^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]$/;
    var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];
    var campo = $('#dniAlumne');
    
    var numeros =  campo.substring(0,campo.length());
    var posicion = numeros%23;
    var letra = campo.substring(campo.length()-1,campo.length());

    if(campo.match(valDni)){
        if(letras[posicion].match(letra)){
            campo.setAttribute('class', 'correcto');
        }else{
            campo.setAttribute('class', 'erroneo');
            e.preventDefault();
        }
    }else{
        campo.setAttribute('class', 'erroneo')
        e.preventDefault();
    }
}
