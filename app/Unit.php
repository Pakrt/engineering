<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = ['kode', 'nama', 'spare'];

    public function sparepart()
    {
        return $this->hasMany('App/Sparepart');
    }
}
