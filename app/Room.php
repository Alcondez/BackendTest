<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];
   
    protected $fillable = [
        'nombre','hotel_id', 'tarifa', 'max_personas'
    ];

    /**
     * Obtiene el Hotel al que pertenece la Habitacion.
     */
    public function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }
}
