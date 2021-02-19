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

        Http::post('kauth.kakao.com/oauth/token', [
            'grant_type' =>$request->query('code'),
            'client'
        ]);


        return view('data', [
            'test' => $request->query('code')
        ]);
    }

}
