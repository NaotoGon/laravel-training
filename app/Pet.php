<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $guarded = ['pet_id'];

    public function comments(){
        return $this->hasMany("App\Comment");
    }
}
