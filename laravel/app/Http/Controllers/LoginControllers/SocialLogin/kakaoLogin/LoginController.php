<?php

namespace App\Http\Controllers\LoginControllers\SocialLogin\KakaoLogin;


use Illuminate\Http\Request;

use App\Services\UserService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models;
use Illuminate\Support\Facades\Http;
use Laravel\Socialite\Facades\Socialite;

use App\Http\Controllers\Controller;
class LoginController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    protected  $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function redirect() {
        return Socialite::driver('kakao')->redirect();
    }

    public function loginView() {
        return view('login');
    }

    public function Register(Request $request) {
        $email = $request->input('email');
        $pwd = $request->input('pwd');
    }

    public function callBack() {
        return view('data');
    }
    public function getAccessToken(Request $request) {
        if(Cookie::get('kakaoAccessToken') !== null) {
            return view('getUser',['res' => 'success']);
        }

        $getAccessToken = Http::get('https://kauth.kakao.com/oauth/token', [
            'grant_type' => 'authorization_code',
            'client_id' => env('KAKAO_CLIENT_ID'),
            'client_secret' => env('KAKAO_CLIENT_SECRET'),
            'redirect_uri' => env('KAKAO_REDIRECT_URI'),
            'code' => $request->query('code'),
        ]);

        $this->userService->setRefreshToken($getAccessToken['refresh_toeken']);

        // 쿠키 방법
        Cookie::queue(
            'kakaoAccessToken',
            $getAccessToken['access_token'],
            $getAccessToken['expires_in'] // 만료시간 만큼
        );

        return  view('getUser',['res' => '11']);

    }

    public function getUser(Request $request) {
        $res = Http::withToken(Cookie::get('kakaoAccessToken'))
           ->get('https://kapi.kakao.com/v2/user/me');
        return view('getUser',['res' => $res]);
    }

    public function logout(Request $request) {
        return response(['logout' => 'success'])->withCookie(
            \cookie('kakaoAccessToken', null , 0)
        );
    }



}
