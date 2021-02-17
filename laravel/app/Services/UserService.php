<?php

namespace App\Services;
use App\Models\User;
use App\Models\Biddings;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\HasApiTokens;

//https://laravel.kr/docs/5.6/eloquent

class UserService implements ServiceBase
{
    protected $user;

    public function __construct(User $user)
    {

        $this->user = $user;
    }

    public function create(array $datas) {
        return $this->user->store($datas);
    }

    public function update($id) {

    }

    public function delete($id) {
        return $this->user->delete(id);
    }

    public function findByKey($id){
        return $this->user->show($id);

    }
    public function findByEmail($email) {
        return $this->user->findForPassport($email);
    }
    public function createToken($id) {

        $this->user->setAttribute('id', $id);
        return $this->user->createToken('personal',[])->accessToken;

    }
    public function login($email,$password) {

        $userInfo = $this->findByEmail($email);
        $msg = null;
        if($userInfo === null) {
            return $msg = '이메일이 없습니다';
        }
        else {
        /*
         *     if(Hash::check($password, $userInfo->pwd , ['round' => 5])) {
                return $msg = '비밀번호가 틀립니다';
            }*/
        }


        // 새로운 클라이언트를 생성시킨다

        return $this->createToken($userInfo->id);
    }
    public function logout($id) {
        DB::table('user')->where('user_id', $id);
    }

}
?>
