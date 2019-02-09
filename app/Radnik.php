<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Radnik extends Model
{
    protected $table = 'radnik';
    public $primaryKey = 'JMBG';
    public $incrementing = false;
    public $timestamps = false;

    public function poslodavac() {
        return $this->belongsTo('App\Poslodavac');
    }

    public function radnoMesto() {
        return $this->belongsTo('App\RadnoMesto');
    }
}
