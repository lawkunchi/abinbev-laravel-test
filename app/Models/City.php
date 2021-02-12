<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Client;
use DB;

class City extends Model
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
    	];

	public function client() 
	{
		return $this->hasMany(Client::class); 
	}

	public static function addCity($saveArray = []) {
			
	    	$city = new City([
	            'cod' => $saveArray['cod'],
	    		'name' => $saveArray['name'],
	    	]);

    		$city->save();

    		return $city;

	}

	public static function getAllCities($optionsArray = []) {

  		$whereArray = [];
  		$paginate = 10;
  		if(isset($optionsArray['paginate'])) {
  			$paginate = $optionsArray['paginate'];
  		}
        	if (isset($optionsArray['whereArray'])) {
            	$whereArray = $optionsArray['whereArray'];
        	}

        	$cities = self::where($whereArray)->paginate($paginate);

        	return $cities;
    	}


    	public static function getCityById($id, $optionsArray = []) {

			$city = DB::table('cities')->where('id', $id)->get();
			if(isset($city[0])) {

	        	return $city[0];
			}

			else {
				return null;
			}
	}

	
	public static function updateCity($cityId, $saveArray = []) {

	    	if(isset($cityId) && !empty($cityId)) {
			self::where('id', $cityId)->update([
				'cod' => $saveArray['cod'],
	                	'name' => $saveArray['name'],
			]);
	   	}

	    	return self::getCityById($cityId);
	}

	public static function deleteCity($cityId) {
		self::where('id', $cityId)->delete();
    	}
}
