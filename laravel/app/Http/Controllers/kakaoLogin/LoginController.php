<?php

namespace App\Http\Controllers\kakaoLogin;


use Illuminate\Http\Request;

use App\Services\UserService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models;
use Illuminate\Support\Facades\Http;
use Laravel\Socialite\Facades\Socialite;
use Opis\Closure\SerializableClosure;
use App\Http\Controllers\Controller;
class LoginController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirect() {
        return Socialite::driver('kakao')->redirect();
    }

    public function getAcessToken() {
        return;
    }

    public function loginView() {
        return view('login');
    }

    public function callBack() {
        return view('data');
    }
    public function getCode(Request $request) {



        $res = Http::withHeaders([
            'Content-type'=>'application/x-www-form-urlencoded;charset=utf-8'
        ])->post('https://kauth.kakao.com/oauth/token', [
            'grant_type' => 'authorization_code',
            'client_id' => env('KAKAO_CLIENT_ID'),
            'client_secret' => env('KAKAO_CLIENT_SECRET'),
            'redirect_uri' => env('KAKAO_REDIRECT_URI'),
            'code' => $request->query('code'),
        ]);

        return  array(
            'res'=>json_decode($res->body()),
            'code'=>$request->query('code'),
            'client_id' => env('KAKAO_CLIENT_ID'),
            'grant_type' => 'authorization_code',
            'redirect_uri' => env('KAKAO_REDIRECT_URI'));






    }

}
