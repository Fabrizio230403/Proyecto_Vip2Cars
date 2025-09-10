<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'nombre', 'apellidos', 'nro_documento', 'correo', 'telefono'
    ];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}