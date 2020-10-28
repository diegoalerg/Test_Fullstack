<?php
namespace App\Entidades;
defined("APPPATH") OR die("Accesss denied");

class Usuario { //Permite instanciar objetos que llevan los datos de cada usuario de la capa modelo
                //a la capa vista y viceversa a traves de la capa controlador;
   public $nombre;
   public $apellido;
   public $email;
   public $dni;
   public $movil;
  

    function __construct($_nombre, $_apellido, $_email, $_dni, $_movil) {
        $this->nombre= $_nombre;
        $this->apellido= $_apellido;
        $this->email= $_email;
        $this->dni= $_dni;
        $this->movil= $_movil;

        
    }
}
?>