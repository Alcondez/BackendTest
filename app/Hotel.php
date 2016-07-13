<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'nombre', 'tipo', 'direccion','fecha','estado','pais','postal'
    ];

    public function rooms()
    {
        return $this->hasMany('App\Room');
    }

    /**
     * Obtiene el usuario al que pertenece el Hotel.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
