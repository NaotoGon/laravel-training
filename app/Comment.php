<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function pet(){
        return $this->belongsTo("App\Pet");
    }
}
