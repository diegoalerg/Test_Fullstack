<?php
/*
session_destroy();
session_start();
var_dump($_SESSION);
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
        <h1>AUTENTIFICACION</h1>
        <h2 style= 'background-color: #ff0000'><?= $error['mensaje'] ?></h2>
        <form action="<?= DOMAIN?>/controlUsuarios/autentificar" method='post'>
            Usuario: <input type="text" name='nombre' value='<?= $error['nombre'] ?>'>
            Clave: <input type="text" name="clave" value='<?= $error['clave'] ?>'><br>
            <input type="submit" value='registrar'>
        </form>
</body>
</html>