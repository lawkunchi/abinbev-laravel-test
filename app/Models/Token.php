<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Token extends Model
{
    use HasFactory;

    protected $fillable = [
            'user_id',
            'token',
      ];

 

    public static function createToken($userId) {
    	$gneratedUniqueToken = bin2hex(random_bytes(64));


	    	$token = new Token([
	            'user_id' => $userId,
	    		'token' => $gneratedUniqueToken,
	    	]);

    		$token->save();

    		return $token;

    }

    public static function getToken($token) {

		$token = DB::table('tokens')->where('token', $token)->get();

		if(isset($token[0])) {
                  return $token[0];
            }

        else {
              return null;
        }
	}


    public static function getTokenById($tokenId) {

        $token = DB::table('tokens')->where('id', $tokenId)->get();

        if(isset($token[0])) {
                  return $token[0];
            }

        else {
              return null;
        }
    }

	public static function deleteToken($tokenId) {

		self::where('id', $tokenId)->delete();
	}
}
