<?php


namespace App\Services;
use App\Models\User;

//https://laravel.kr/docs/5.6/eloquent 서
class UserService
{
    protected $user;



    public function __construct(User $user) {
        $this->user = $user;
    }

    public function index() {

        return $this->user->getAll();
    }

    public function store($email, $pwd, $name) : bool {
        return $this->user->store($email,$pwd,$name);
    }

    public function show($id) {
        return $this->show($id);
    }
}
?>
