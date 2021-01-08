<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\SocialIdentity;
use App\UserModel\User;
use Exception;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/user/dashboard';
    // protected $redirectTo;
    // public function redirectTo()
    // {
    //     switch(Auth::user()->role){
    //         case 2:
    //         $this->redirectTo = '/home';
    //         return $this->redirectTo;
    //             break;
    //         case 1:
    //                 $this->redirectTo = '/admin';
    //             return $this->redirectTo;
    //             break;
            
    //         default:
    //             $this->redirectTo = '/login';
    //             return $this->redirectTo;
    //     }
         
    //     // return $next($request);
    // } 

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:user')->except('logout');
    }

    protected $providers = [
        'facebook','google'
    ];
    public function redirectToProvider($driver)
    {
        if( ! $this->isProviderAllowed($driver) ) {
            return $this->sendFailedResponse("{$driver} is not currently supported");
        }

        try {
            return Socialite::driver($driver)->redirect();
        } catch (Exception $e) {
            // You should show something simple fail message
            return $this->sendFailedResponse($e->getMessage());
        }
    }

  
    public function handleProviderCallback( $driver )
    {
        try {
            $user = Socialite::driver($driver)->user();
        } catch (Exception $e) {
            return $this->sendFailedResponse($e->getMessage());
        }

        // check for email in returned user
        return empty( $user->email )
            ? $this->sendFailedResponse("No email id returned from {$driver} provider.")
            : $this->loginOrCreateAccount($user, $driver);
    }

    protected function sendSuccessResponse()
    {
        return redirect()->intended('user/dashboard');
    }

    protected function sendFailedResponse($msg = null)
    {
        return redirect()->route('login')
            ->withErrors(['msg' => $msg ?: 'Unable to login, try with another provider to login.']);
    }

    protected function loginOrCreateAccount($providerUser, $driver) {

        // check for already has account
        $user = User::where('email', $providerUser->getEmail())->first();
    
    // if user already found
            if( $user ) {
                // update the avatar and provider that might have changed
                $user->update([
                    'avatar' => $providerUser->avatar,
                    'provider' => $driver,
                    'provider_id' => $providerUser->id,
                    'access_token' => $providerUser->token
                ]);
            } else {
                  if($providerUser->getEmail()){ //Check email exists or not. If exists create a new user
                   $user = User::create([
                      'name' => $providerUser->getName(),
                      'email' => $providerUser->getEmail(),
                      'avatar' => $providerUser->getAvatar(),
                      'provider' => $driver,
                      'provider_id' => $providerUser->getId(),
                      'access_token' => $providerUser->token,
                      'password' => '' // user can use reset password to create a password
                ]);
    
                 }else{
                
                //Show message here what you want to show
                
               }
          }
    
          // login the user
            Auth::login($user, true);
            return $this->sendSuccessResponse();
      }
    private function isProviderAllowed($driver)
    {
        return in_array($driver, $this->providers) && config()->has("services.{$driver}");
    }


 
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    // public function redirectToProvider($provider)
    // {
    //     return Socialite::driver($provider)->redirect();
    // }
 
    // public function handleProviderCallback($provider)
    // {
    //     try {
    //         $user = Socialite::driver($provider)->user();
    //     } catch (Exception $e) {
    //         return redirect('/login');
    //     }
 
    //     $authUser = $this->findOrCreateUser($user, $provider);
    //     Auth::login($authUser, true);
    //     return redirect($this->redirectTo);
    // }
 
 
    // public function findOrCreateUser($providerUser, $provider)
    // {
    //     $account = SocialIdentity::whereProviderName($provider)
    //                ->whereProviderId($providerUser->getId())
    //                ->first();
 
    //     if ($account) {
    //         return $account->user;
    //     } else {
    //         $user = User::whereEmail($providerUser->getEmail())->first();
 
    //         if (! $user) {
    //             $user = User::create([
    //                 'email' => $providerUser->getEmail(),
    //                 'name'  => $providerUser->getName(),
    //                 'password' => '123',
    //             ]);
    //         }
 
    //         $user->identities()->create([
    //             'provider_id'   => $providerUser->getId(),
    //             'provider_name' => $provider,
    //         ]);
 
    //         return $user;
    //     }
    // }
}
