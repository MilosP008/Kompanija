<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RadnoMesto extends Model
{
    protected $table = 'radno_mesto';
    public $primaryKey = 'naziv';
    public $incrementing = false;
    public $timestamps = false;

    public function radnici() {
        return $this->hasMany('App\Radnik');
    }
}
