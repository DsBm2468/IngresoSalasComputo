<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;//libreria composer (en Simbolo de sistema se instala una sola vez con la línea: composer install)

class Ingreso extends Model{
    protected $table = 'ingresos';
    protected $timestamp = true;
    //timestamps es para que no tenga que tener los campos created_as y update-as obligatoriamente
    //en el caso de ingresos, como si requiere de estos 2 campos, entonces no se pone esta linea
}