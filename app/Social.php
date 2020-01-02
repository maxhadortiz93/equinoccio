<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $fillable = [
        'url',
        'act',
        'facebook',
        'twitter',
        'instagram',
        'youtube',
        'pagina_web',
        'id_google',
        'id_token',
        'url_imagen',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}


