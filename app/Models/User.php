<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use DB;
use Hash;
use App\Events\UserRegisterEvent;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
      protected $fillable = [
            'name',
            'email',
            'password',
            'session'
      ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
      protected $hidden = [
            'password',
            'remember_token',
      ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
      protected $casts = [
            'email_verified_at' => 'datetime',
      ];


      protected $dispatchesEvents = [
        'created' => UserRegisterEvent::class,
      ];

      public function token()
    {
        return $this->hasOne(Token::class, 'user_id');
    }

      public static function userDetailsById($userId = null) {

            if(isset($userId) && !empty($userId)) {
                  $userDetails = DB::table('users')->where('id', $userId)->get();
            }

            if(isset($userDetails[0])) {
                  return $userDetails[0];
            }

            else {
                  return null;
            }

      }


      public static function updateUserById($userId = null, $saveArray = array()) {

            $user = User::userDetailsById($userId);

            if(isset($userId) && !empty($userId)) {

                  $user = self::where('id', $userId)->update(
                        [
                              'name' => $saveArray['name'],
                              'email' => $saveArray['email'],

                        ]);
            }

           return $user;
      }


      public static function getAllUsers($optionsArray = []) {

            $whereArray = [];
            $paginate = 10;
            if(isset($optionsArray['paginate'])) {
                  $paginate = $optionsArray['paginate'];
            }
            if (isset($optionsArray['whereArray'])) {
                  $whereArray = $optionsArray['whereArray'];
            }

            $users = self::where($whereArray)->paginate($paginate);

            return $users;
      }


      public static function updatePassword($userId, $password) {

            if(isset($userId)) {
                  $user = self::userDetailsById($userId);
            }

            else {
                  $user = \Auth::user();
            }

            $user = self::where('id', $user->id)->update([
                  
                  'password' => Hash::make($password),
            ]);
      }

      public static function deleteUser($userId) {
            self::where('id', $userId)->delete();
      }

}
