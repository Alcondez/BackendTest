<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'nombre', 'tarifa', 'max_personas'
    ];

    /**
     * Obtiene el Hotel al que pertenece la Habitacion.
     */
    public function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }
}
