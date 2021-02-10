<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Passport::routes(); // 자동으로 라우트에 등록하지 않아도 라우트 잡아줌
        Passport::tokensExpireIn(now()->addDays(15));// 토큰 등록일부터 15일
        Passport::refreshTokensExpireIn(now()->addDays(30));//재발급 토큰 등록일부터 15일
        Passport::personalAccessTokensExpireIn(now()->addMonth(6)); //

        // 커스텀 세팅
        //Passport::useTokenModel(Token::class);
        //Passport::useClientModel(Client::class);
        //Passport::useAuthCodeModel(AuthCode::class);
        //Passport::usePersonalAccessClientModel(PersonalAccessClient::class);
    }
}
