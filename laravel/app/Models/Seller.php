<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    public function buyer() {
        return $this
            ->belongsToMany('App\Models\Buyer')
            ->using('App\Models\BuyerSeller')
            ->as('bidding') // 입찰이라고 한다
            ->withPivot([
                'created_at',
                'updated_at',
                'price'
            ]);
    }


    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function findSeller($id) : Seller {
        return Seller::find($id)->first();
    }

}
