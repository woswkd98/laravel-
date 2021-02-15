<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable; // hashApiTokens가 토큰생성하겠다라는 키워드
    private $tableName = 'user';
    public function getAll() {

        return DB::table($this->tableName)->get();
    }

    public function store(array $userInfo) {

        return DB::table($this->tableName)->insert([
            'email' => $userInfo['email'],
            'pwd'   => $userInfo['password'], // 비밀번호 해싱
            'name'  => $userInfo['name'],
        ]);

        return $userInfo['password'];

    }


    public function show($id) {
        return DB::table($this->tableName)->where(
            'id', $id
        )->first();
    }

    public function profileImgs() {
        return $this->hasMany(ProfileImgs::class);
    }

    public function findForPassport($email) {
        return DB::table($this->tableName)->where(
            'email', $email
        )->first();
    }
    public function delete($id) {
        return DB::table($this->tableName)->delete('id', $id);
    }

}
