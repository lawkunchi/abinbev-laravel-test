<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class LoginController extends Controller
{
    public function __construct() {
		$this->middleware('guest', ['except' => 'logout']);
	}

	protected function authenticated()
	{
	    // Update last_session after logged-in
	    User::find(Auth::id())->update(['session'=>Session::getId()]);
	}


	public function getLogin() {
		return view('user.login');
	}


	public function postLogin(Request $request, User $user) {

		$this->validate($request, [
			'email' => 'required|email|exists:users',
			'password' => 'required|min:8'
		]);

		if (Auth::attempt ([ 'email' => $request->input('email'), 'password' => $request->input('password')]) ) {

			$request->session()->regenerate();

			return redirect()->intended('/');
		}

		else {
			auth()->logout();
					return back()->with('error', 'Sorry your login details could not be identified.');
		}

	}

	public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

    	$request->session()->regenerateToken();

        return redirect()->route('user.login');
    }

	

}
