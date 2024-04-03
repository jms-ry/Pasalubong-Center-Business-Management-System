<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
  protected $redirectTo = '/dashboard';

  /**
    * Create a new controller instance.
    *
    * @return void
  */
  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }
  protected function authenticated($request, $user)

  {
    // Insert a record into the dtr table
    DB::table('dtrs')->insert([
      'user_id' => $user->id,
      'logged_date' => now()->toDateString(),
      'signed_in_time' => now()->toTimeString(),
      'signed_out_time' => null,
    ]);

    // Insert a record in the logs table
    DB::table('logs')->insert([
      'user_id' => $user->id,
      'action' => 'Signed in',
      'logged_date' => now()->toDateString(),
      'logged_time' => now()->toDateTimeString(),
    ]);
    Session::flash('success', 'Welcome to Pasalubong Center and Business Management System, ' . $user->name . '.');
    return redirect()->intended($this->redirectTo);
  }
    
  public function logout(Request $request)
  {
    //Update the signed out time in the dtr table
    DB::table('dtrs')
      ->where('user_id', Auth::id())
      ->where('signed_out_time', null)
      ->update(['signed_out_time' => now()->toDateTimeString()
    ]);

    // Insert a record into the logs table before logging out
    DB::table('logs')->insert([
      'user_id' => Auth::id(),
      'action' => 'Signed out',
      'logged_date' => now()->toDateString(),
      'logged_time' => now()->toTimeString(),
    ]);

    $this->guard()->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    Session::flash('success', 'You have successfully logged out.');

    return $this->loggedOut($request) ?: redirect('/');
        
  }
}
