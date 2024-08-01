<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Route;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Passport::routes();
        // Register Passport routes
        // Route::group([
        //     'prefix' => 'oauth',
        //     'namespace' => '\Laravel\Passport\Http\Controllers',
        //     'middleware' => 'api',
        // ], function () {
        //     Route::post('token', 'AccessTokenController@issueToken')->name('passport.token');
        //     Route::get('tokens', 'AuthorizedAccessTokenController@forUser')->middleware('auth')->name('passport.tokens.index');
        //     Route::delete('tokens/{token_id}', 'AuthorizedAccessTokenController@destroy')->middleware('auth')->name('passport.tokens.destroy');
        //     Route::post('token/refresh', 'TransientTokenController@refresh')->name('passport.token.refresh');
        //     Route::post('clients', 'ClientController@store')->middleware('auth')->name('passport.clients.store');
        //     Route::get('clients', 'ClientController@forUser')->middleware('auth')->name('passport.clients.index');
        //     Route::put('clients/{client_id}', 'ClientController@update')->middleware('auth')->name('passport.clients.update');
        //     Route::delete('clients/{client_id}', 'ClientController@destroy')->middleware('auth')->name('passport.clients.destroy');
        //     Route::get('scopes', 'ScopeController@all')->middleware('auth')->name('passport.scopes.index');
        //     Route::get('personal-access-tokens', 'PersonalAccessTokenController@forUser')->middleware('auth')->name('passport.personal.tokens.index');
        //     Route::post('personal-access-tokens', 'PersonalAccessTokenController@store')->middleware('auth')->name('passport.personal.tokens.store');
        //     Route::delete('personal-access-tokens/{token_id}', 'PersonalAccessTokenController@destroy')->middleware('auth')->name('passport.personal.tokens.destroy');
        // });

        // // Register Passport commands
        // Passport::loadKeysFrom(__DIR__.'/../secrets/oauth');

        //
    }
}
