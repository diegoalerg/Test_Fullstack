<?php
define("DOMAIN", "/ejercicioscipsa/10MVC/TestFS/public");
define("JS_SCRIPTS", "/ejercicioscipsa/10MVC/TestFS/app/scripts");

//directorio del proyecto
define("PROJECTPATH", dirname(__DIR__));
//directorio app
define("APPPATH", PROJECTPATH . '/App');

//funcion de autocarga
function autoLoad_classes($class_name)
{
        $filename= PROJECTPATH . '/' . str_replace('\\', '/', $class_name) . '.php';
        if (is_file($filename)) {
            include_once $filename;
        }
}
spl_autoload_register('autoload_classes');
//creacion del objeto enrutador y ejecucion del controlador
$app = new \Core\App;
$app->render();
?>