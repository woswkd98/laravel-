<?php
namespace App\Http\Controllers\SocialLogin\SocialLoginBase;
use App\Services\UserService;
abstract class SocialLoginBase
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    abstract public function redirect();

    abstract public function Login(Request $request); //getAccessToken and response Cookie

    abstract public function Register(Request $request);

    abstract public function getAccessToken(Request $request);

    public function getUserInfo() {
        $res = Http::withToken(Cookie::get('kakaoAccessToken'))
            ->get('https://kapi.kakao.com/v2/user/me');
        return res;
    }

    public function logout(Request $request) {
        return response(['logout' => 'success'])->withCookie(
            \cookie('kakaoAccessToken', null , 0)
        );
    }

}
