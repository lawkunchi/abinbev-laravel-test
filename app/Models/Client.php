<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\City;
use DB;

class Client extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    	protected $fillable = [
		'cod',
        	'name',
        	'city',
    	];

    	
	public function city() 
	{
		return $this->hasOne(City::class); 
	}

	public static function addClient($saveArray = []) {

	    	$client = new Client([
	            'cod' => $saveArray['cod'],
	    		'name' => $saveArray['name'],
	            'city' => $saveArray['city'],
	    	]);

    		$client->save();

    		return $client;

	}

	public static function getAllClients($optionsArray = []) {

  		$whereArray = [];
  		$pagination = 10;
  		if(isset($optionsArray['pagination'])) {
  			$pagination  = $optionsArray['pagination'];
  		}
        	if (isset($optionsArray['whereArray'])) {
            	$whereArray = $optionsArray['whereArray'];
        	}

        	$clients = self::where($whereArray)->paginate($pagination);

        	return $clients;
    	}


	public static function getClientById($id, $optionsArray = []) {

		$client = DB::table('clients')->where('id', $id)->get();
		if(isset($client[0])) {

        	return $client[0];
		}

		else {
			return null;
		}
	}

	
	public static function updateClient($clientId, $saveArray = []) {

	    	if(isset($clientId) && !empty($clientId)) {
			self::where('id', $clientId)->update([
				'cod' => $saveArray['cod'],
	                	'name' => $saveArray['name'],
		        	'city' => $saveArray['city'],
			]);
	   	}

	    	return self::getClientById($clientId);
	}

	public static function deleteClient($clientId) {
		self::where('id', $clientId)->delete();
	}
}
