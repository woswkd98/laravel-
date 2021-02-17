<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Services\UserService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models;
use Opis\Closure\SerializableClosure;


class SellerController extends Controller
{
    protected  $buyer;
    protected  $seller;
    public function __construct()
    {
        $this->buyer= new Models\Buyer();
        $this->seller = new Models\Seller();
    }

    public function order(Request $request) {

        $sellerId = $request->input('seller_id');
        $buyerId = $request->input('buyer_id');


        //$Buyer = $this->buyer->findBuyer(1);

        $newBidding = new Models\BuyerSeller();
        $newBidding->setAttribute('seller_id', $sellerId);
        $newBidding->setAttribute('buyer_id', $buyerId);
        $newBidding->setAttribute('price', 1255);
        $newBidding->save();

        return response(11,200);
    }

    public function getOrdersBySeller(Request $request) {

        $sellerId = $request->input('seller_id');
        $buyerId = $request->input('buyer_id');
        $seller = $this->seller->findSeller(1);
        //$seller->buyer()->first()->user->name 체이닝 예시


        return response( $seller->buyer()->first()->user->name, 200);
    }
}
