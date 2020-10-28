<?php
namespace App\Modelos;
defined("APPPATH") OR die("Access denied");
use \Core\Database;
use \App\entidades\Usuario;
use \App\interfaces\Crud;

class Usuarios implements Crud
{
    static function getAll()
    {
        $usuarios = array();
        try {
                $db= Database::instance();
                $sql = "SELECT * from usuarios";
                $query = $db->run($sql);
                //Bucle de obtencion de resultados
                while ( $reg = $query->fetch() ) {
                        //Creacion de objeto Usuario por cada registro y agregado a matriz resultados
                        array_push($usuarios, new Usuario($reg['nombre'],
                                                           $reg['apellido'],
                                                           $reg['email'],
                                                           $reg['dni'],
                                                           $reg['movil']));
                }
                return $usuarios;
        } catch(\PDOException $e) {
                PRINT "Error!: " . $e->getMessage();
        }
    }
    
    static function getById($id) {
        try {
                $db = Database::instance();
                $sql = "SELECT * from usuarios WHERE email LIKE :email";
                $query = $db->run($sql, [':email' => $id]);
                $reg = $query->fetch();
                return ( ($reg)?
                                //Retorno del objeto Usuario recuperado
                                new Usuario($reg['nombre'],
                                            $reg['apellido'],
                                            $reg['email'],
                                            $reg['dni'],
                                            $reg['movil'])
                                            //Retorno NULL si no se recupero ningun registro
                                            :NULL );
        } catch(\PDOException $e) {
                    print "Error!: " . $e->getMessage();
        }
    }
    //CREO UN GETBYClave PARA VERIFICAR QUE LA CLAVE COINCIDE
    static function getByClave($clave) {
        try {
                $db = Database::instance();
                $sql = "SELECT * from usuarios WHERE clave LIKE :clave";
                $query = $db->run($sql, [':clave' => $clave]);
                $reg = $query->fetch();
                return ( ($reg)?
                                //Retorno del objeto Usuario recuperado
                                new Usuario($reg['usuario'],
                                            $reg['clave'],
                                            $reg['administrador'],
                                            $reg['activo'])
                                            //Retorno NULL si no se recupero ningun registro
                                            :NULL );
        } catch(\PDOException $e) {
                    print "Error!: " . $e->getMessage();
        }
    }
    static function insert($user)
    {
        try {
                $db = Database::instance();
                $sql = "INSERT INTO usuarios( nombre, apellido, email, dni, movil ) 
                        VALUES ( :nombre,  :apellido, :email, :dni, :movil)";
                $query = $db->run($sql, [ ':nombre' => $user->nombre,
                                        ':apellido' =>$user->apellido,
                                        ':email' => $user->email, 
                                        ':dni' => $user->dni,
                                        ':movil' => $user->movil ]);                                    
        } catch(\PDOException $e) {
                print "Error!: " . $e->getMessage();
        }
    }

    static function update($user)
    { //TUVE QUE CAMBIAR TIPO DE DATO DE ADMINISTRADOR Y ACTIVO EN LA BASE DE DATOS DE BIT A VARCHAR
        try {
            $db = Database::instance();
            $sql = "UPDATE usuarios SET clave = :clave,
                                        administrador = :admin,
                                        activo = :activo
                                        WHERE usuario = :usuario";
            $query = $db->run($sql, [':usuario' => $user->nombre,
                                        ':clave' => $user->clave,
                                        ':admin' => $user->administrador,
                                        ':activo' => $user->activo]);
        } catch(\PDOException $e) {
                print "Error!: " . $e->getMessage();
        }
    }

    static function delete($id)
    {
            try {
                    $db = Database::instance();
                    $sql = "DELETE FROM usuarios WHERE email = :email";
                    $query = $db->run($sql, [':email' => $id]);
            }
            catch(\PDOException $e)
            {
                print "Error!: " . $e->getMessage();
            }
    }
}
?>