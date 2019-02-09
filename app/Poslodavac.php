<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poslodavac extends Model
{
    protected $table = 'poslodavac';
    public $primaryKey = 'JMBG';
    public $incrementing = false;
    public $timestamps = false;

    public function radnici() {
        return $this->hasMany('App\Radnik');
    }
}
