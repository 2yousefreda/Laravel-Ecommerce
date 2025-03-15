<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;

use App\Models\Admin;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config ;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

use Laravel\Fortify\Fortify;

use Laravel\Fortify\Contracts\LogoutResponse;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Contracts\RegisterResponse;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $request=request();
        if  ($request->is('admin/*')) {
           
            Config::set('fortify.guard', 'admin');
            Config::set('fortify.passwords', 'admins');
            
            Config::set('fortify.prefix', 'admin');
            
            
            $this->app->instance(LoginResponse::class, new class implements LoginResponse {
                public function toResponse($request)
                {
                    return redirect('admin/dashboard');
                }
            });
            $this->app->instance(LogoutResponse::class, new class implements LogoutResponse {
                public function toResponse($request)
                {
                    return redirect('admin/login');
                }
            });
            $this->app->instance(RegisterResponse::class, new class implements RegisterResponse {
                public function toResponse($request)
                {
                    return redirect('admin/dashboard');
                }
            });
           
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        

        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

     
        Fortify::resetPasswordView(function (Request $request) {
            if(config('fortify.guard')== 'admin') {
                
                
                return view('auth.admin.reset-password', ['request' => $request]);
            }
            return view('auth.reset-password', ['request' => $request]);
        });

        if  (config::get('fortify.guard')=='admin') {
            Fortify::loginView('auth.admin.login');
            Fortify::requestPasswordResetLinkView('auth.admin.forgot-password');
            
        }else{
           
            Fortify::loginView('auth.login');
            Fortify::requestPasswordResetLinkView('auth.Forgot-Password');
        }




        Fortify::registerView(function(){
            return view('auth.register');
        });
        Fortify::verifyEmailView(function () {
            return view('auth.verify');
        });

        Gate::define('super_admin', function ($admin):bool {
            return (bool)$admin->super_admin;
        });
        Gate::define('user.show', function ($authedUser,$user):bool {
            
            
            return ((bool)$authedUser->super_admin||($authedUser->id===$user->id)&&Auth::guard('web')->user());
        });
        Gate::define('admin.show', function ($authedUser,$user):bool {
            return ((bool)$authedUser->super_admin||($authedUser->id===$user->id)&&Auth::guard('admin')->user());
        });
        Gate::define('user.Profile.edit', function ($authedUser,$user):bool {
        
            return ((bool)$authedUser->id==$user->id && Auth::guard('web')->user());
        });
      
    }
}
