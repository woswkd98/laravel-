<?php

namespace App\Models;

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

    public function store($email, $pwd, $name) : bool {
        return DB::table($this->tableName)->insert([
            'email' =>$email,
            'pwd' => $pwd,
            'name' => $name,
        ]);
    }



    public function show($id) {
        return json_encode(DB::table('user')->where(
            'id', $id
        )->first());
    }





}
