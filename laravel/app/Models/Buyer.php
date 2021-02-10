<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    use HasFactory;


    public function sellers() {
        return $this->belongsToMany('App\Models\Seller');
    }


}
