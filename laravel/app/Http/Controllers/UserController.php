<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Services\UserService;

use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    //https://laravel.com/docs/8.x/controllers 표 참고
    //https://sjwiq200.tistory.com/55 passport
    //https://laravel.kr/docs/8.x/passport
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    protected  $userService;


    public function __construct(UserService $userService)
    {
        $this->userService = $userService;

    }


    public function index()
    {

        return '1';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /*
    $table->bigIncrements('id'); // mysql의 자동증가
                $table->string('email')->nullable(false);
                $table->string('pwd')->nullable(false);
                $table->string('name')->nullable(false);
                $table->string('auth')->nullable(false);
                $table->timestamps();
    */

    /**
     * Store a newly created resource in storage.
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([ // 유효성 검사
            'email' => 'required |email|string|unique',
            'password'   => 'required | string',
            'name'  => 'required | string',
        ]);

        $array =  array(
            'email'  => $request->input('email'),
            'password'    =>
                Hash::make($request->input('password'), [
                    'round' => $this->PWD_HASH_ROUND
                ]),
            'name'   => $request->input('name'),
        );
        $isSuccess = $this->userService->create($array);
        /*
        if($isSuccess === 1) {
            $isSuccess = '성공';
        } else {
            $isSuccess = '실패';
        }*/


        return response($isSuccess,200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return '1';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 'edit';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        return 'update';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return 'destroy';
    }


    public function login(Request $request) {

        $request->validate([
            'user_id' => 'required|email|string',
            'password' => 'required|string'
        ]);
        $email = $request->input('user_id');
        $password = $request->input('password');

        $accessToken = $this->userService->login($email,$password);

        //이렇게 넣어주는게 정식이지만 데이터를 주고 리엑트에서 받을때 그냥 body로 준다
        /*return response('11',200)->withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$accessToken,
        ]);*/

        return response('Bearer '.$accessToken, 200);


    }
    public function logout(Request $request, $id) {
        $this->userService->logout($id);


        return response($request->bearerToken(), 200);

    }


}
