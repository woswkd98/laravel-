<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    use HasFactory;

    public function Sellers() {
        return $this->belongsToMany('App\Model\Seller');
    }


}
