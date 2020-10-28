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
    <link rel="stylesheet" type="text/css" href="<?php echo DOMAIN."/contacto.css"?>">
    <title></title>
   
        <script>
                $().ready(function() {
                        $('form').submit(function(e) {
                            var user = $(this).find('input:hidden').val();
                            var response = confirm("Desea eliminar usuario: " + user);
                            if ( !response) e.preventDefault(); 
                        });
                });
                
        </script>
</head>
<body>
<div class="caja_blanca">
        <h1>LISTADO DE USUARIOS</h1>
        <h2 style='background-color: #9FF781'><?= $error['mensaje']?></h2>
      
        <a href="<?=DOMAIN?>/controlUsuarios/nuevo">Insertar nuevo usuario</a> <br>
        <table border='1' class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>DNI</th>
                        <th>Movil</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($error['users'] as $user) {?>
                    <tr>
                        <td><a href="<?= DOMAIN?>/controlUsuarios/ver/<?=$user->nombre?>"><?=$user->nombre ?>
                        </a></td>
                        <td><?= $user->apellido ?> </td>
                        <td><?= $user->email ?> </td>
                        <td><?= $user->dni ?> </td>
                        <td><?= $user->movil ?> </td>
                        
                        <td>
                                <form action="<?=DOMAIN?>/ControlUsuarios/eliminar" method='post'>
                                        <input type="hidden" name='email' value='<?=$user->email?>'>
                                        <input type="submit" value='Eliminar'>
                                </form>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
        </table>
                    </div> 
</body>
</html>