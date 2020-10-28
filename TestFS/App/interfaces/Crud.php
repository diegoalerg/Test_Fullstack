<?php
namespace App\Interfaces;
defined("APPPATH") OR die("Access denied");
interface Crud
{
    static function getAll();
    static function getById($id);
    static function insert($data);
    static function update($data);
    static function delete($id);
}
?>