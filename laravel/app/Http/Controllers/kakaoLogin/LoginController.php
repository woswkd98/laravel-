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
    public function getAccessToken(Request $request) {

        $res = Http::get('https://kauth.kakao.com/oauth/token', [
            'grant_type' => 'authorization_code',
            'client_id' => env('KAKAO_CLIENT_ID'),
            'client_secret' => env('KAKAO_CLIENT_SECRET'),
            'redirect_uri' => env('KAKAO_REDIRECT_URI'),
            'code' => $request->query('code'),
        ]);
        //요청 Authorization헤더에 Bearer 토큰을 빠르게 추가 하려면 다음 withToken메소드를 사용할 수 있습니다 .

        // 정보 뽑아오는 방식
        return $res = Http::withToken($res['access_token'])
            ->get('https://kapi.kakao.com/v2/user/me');
    }

}
