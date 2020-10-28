<?php
//Inicializacion del estado de sesion
/*
if(!isset($_SESSION)){
    session_start();
}
//Existen datos del usuario en el estado de sesion?

if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
} else {
    echo 'volver a login';
    var_dump(DOMAIN);
    header("Location:".DOMAIN."/controlUsuarios/login");
}
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo DOMAIN."/contacto.css"?>">
    <title></title>
</head>
<body>
    <!--
    <h1>NUEVO USUARIOoo</h1>
    <h2 style='background-color: #ff0000'><?= $error['mensaje']?></h2>
    <form action="<?= DOMAIN?>/controlUsuarios/insertar/" method='post'>
        Usuario: <input type="text" name="usuario" value='<?= $error['nombre']?>' >
        Clave: <input type="text" name="clave" value='<?= $error['clave']?>'><br>
        Administrador: <input type="checkbox" name="administrador" 
                                <?=(($error['administrador']==1)?'checked':'')?>> <br>
        Activo: <input type="checkbox" name='activo'
                                <?=(($error['activo']==1)?'checked':'')?>> <br>
        <input type="submit" value="registrar">
    </form>
    <a href="<?= DOMAIN?>/controlUsuarios/listar"> Volver a lista usuarios</a>
-->

    <main>
       
                <div class="caja_blanca">

                    <input type="button" value="LOGO" class="logo">

                    <p class="info">Por favor, rellena los campos siguientes:</p><br>
                    <h2 style='background-color: #ff0000'><?= $error['mensaje']?></h2>
                    <form action="<?= DOMAIN?>/controlUsuarios/insertar/" method='post'>
                        <input type="text" name="nombre" placeholder="Nombre" class="barraformulario_left" id="name" value='<?= $error['nombre']?>'  required>
                    
                        <input type="text" name="apellido" placeholder="Apellido" class="barraformulario_right" id="apellido" value='<?= $error['apellido']?>' required >

                        <input type="email" name="email" placeholder="Email" class="barraformulario_left" id="email" value='<?= $error['email']?>' required>
                        <br>
                        
                        
                    
                        <input type="email" name="conf_email" placeholder="Repetir email" class="barraformulario_right" id="conf_email" value='<?= $error['conf_email']?>'  required>

                        <input type="text" name="dni" placeholder="DNI" class="barraformulario_left" id="dni" value='<?= $error['dni']?>' required>
                    
                        <input type="text" name="movil" placeholder="Móvil" class="barraformulario_right" id="movil" value='<?= $error['movil']?>' required>
                
                        
                        
                        
                     <input type="submit" value="Enviar" id="form_button" />
                            <br>
                            <br>
                            <output class="error" id="err_email"></output><br>
                            <output class="error" id="err_dni"></output><br>
                            <output class="error" id="err_movil"></output><br>


                        
                        
                    </form>
                    <a href="<?= DOMAIN?>/controlUsuarios/listar"> Volver a lista usuarios</a>
                </div>
       
    </main>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script>

    $().ready(function () {
        var email;
        var conf_email;
        var dni;
        

        function ValidarEmail() {
            var email = $("#email").val();
           // var conf_email = $("#conf_email").val();
            var regex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
                    
                    if (!regex.test(email)) {
                        $("#err_email").html("El email es inválido").show();
                    } else {
                        $("#err_email").html("");
                        return true
                    }
                    //Coincidencia con la confirmaciòn
                    if (email != conf_email) {
                        $("#err_email").html("El email y la confirmación no coinciden").show();
                        return false;
                    } else {
                        $("#err_email").html("");
                        //console.log("correcto email");
                        return true;
                    }


        }

        function ValidarDNI() {
            var dni = $("#dni").val();
            var numero
            var letr
            var letra
            var expresion_regular_dni
            
            expresion_regular_dni = /^\d{8}[a-zA-Z]$/;
            
            if(expresion_regular_dni.test (dni) == true){
                numero = dni.substr(0,dni.length-1);
                letr = dni.substr(dni.length-1,1);
                numero = numero % 23;
                letra='TRWAGMYFPDXBNJZSQVHLCKET';
                letra=letra.substring(numero,numero+1);
                if (letra!=letr.toUpperCase()) {
                $("#err_dni").html('Dni erroneo, la letra del NIF no se corresponde').show();
                }else{
                $("#err_dni").html("");
                return true;
                }
            }else{
                $("#err_dni").html('Dni erroneo, formato no válido').show();
            }
        }

        function ValidarMovil() {
            var movil = $("#movil").val();
            var regex_movil = /(6|7)[ -]*([0-9][ -]*){8}$/
            if (!regex_movil.test(movil)) {
                $("#err_movil").html("El movil es invalido").show();
            } else {
                $("#err_movil").html("");
                return true;
            }
            
        }

        $("#form_button").on("click", function (ev) {

            ValidarEmail();

            ValidarDNI();

            ValidarMovil(); 
               
               if (ValidarEmail() == true && ValidarDNI() == true && ValidarMovil() == true) {
                   var back = '1';
               } else {
                ev.preventDefault();
               }
               /*
                ev.preventDefault();

                ValidarEmail();

                ValidarDNI();

                ValidarMovil();
                */
                

    
        });
    });
        
       
       
    </script>

</body>
</html>