<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'placa','marca','modelo','anio_fabricacion','contact_id','imagen'
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}