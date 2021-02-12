<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Token;

class PasswordController extends Controller
{
    
    public function getPassword($token) {

    	$passwordToken  = Token::getToken($token);

    	if(isset($passwordToken) && !empty($passwordToken)) {
    		return view('user.password', compact('passwordToken'));
    	}

    	else {
    		var_dump('something happend');
    	}
    }

    public function postPassword(Request $request) {

    	$this->validate($request, [
    		'password' => 'required|min:8|confirmed',

		]);

    	$password  = $request->input('password');
    	$token = $request->input('password_token');

    	$passwordToken  = Token::getTokenById($token);

    	User::updatePassword($passwordToken->user_id, $password);

    	Token::deleteToken($passwordToken->id);

        return redirect('account/login')->with('success', 'now you can login');
    }

}
