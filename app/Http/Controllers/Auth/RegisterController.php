<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Token;
use App\Mail\Welcome;
use App\Jobs\SendEmail;

class RegisterController extends Controller
{
		public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
    
    public function getRegister() {
    	return view('user.register');
    }

    protected function postRegister(Request $request) {


    	$this->validate($request, [
			'name' => 'required',
			'email' => 'required|email|max:255|unique:users',
		]);


      $requestParams = $request->all();

    	$user = new User([
            'name' => $request->input('name'),
    		'email' => $request->input('email'),
    	]);

      $user->save();

      Token::createToken($user->id);
      // dispatch(new SendEmail($user));

      return redirect('account/login')->with('success', 'Thank you for signing up!  Please check your email, to continue registration.');

    }

}
