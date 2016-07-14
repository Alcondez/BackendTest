<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nombre', 'tipo','user_id', 'direccion','fecha','estado','pais','postal'
    ];

    protected $dates = ['deleted_at'];

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
