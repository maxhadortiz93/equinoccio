<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{

    protected $fillable = [
        'numero_unidad',
        'colaborador',
        'disponible',
        'act',
        'imagen_url'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}




