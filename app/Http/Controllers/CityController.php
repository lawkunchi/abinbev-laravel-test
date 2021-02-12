<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\City;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
             $cities = City::getAllCities();
        return view('city.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function create(Request $request){      

            $requestParams = $request->all();

            $city = "";

            if(isset($requestParams['cityId'])) {
                  $city = City::getCityById($requestParams['cityId']);
            }

            return view('city.add', compact('city'));
      }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
      public function store(Request $request){

            $validator = $request->validate([
                  'cod' => 'required',
                  'name' => 'required',
            ]);


            $requestParams = $request->all();


            $saveArray = [];

            $saveArray['cod'] = $requestParams['cod'];
            $saveArray['name'] = $requestParams['name'];

            $city = City::addCity( $saveArray);
            $message = "City added successfully";

            return redirect()->route('city.show', $city->id)->with('success', $message);
      }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function show($id) {

            $city = City::getCityById($id);

            return view('city.show', compact('city'));
      }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function edit($id) {

            $city = City::getCityById($id);


            if(isset($city->id)) {
                  return view('city.add', compact('city'));
            }

            else {
                  var_dump('nnothin heere');
            }

      }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'cod' => 'required|max:255',
            'name' => 'required',
      ]);

      $requestParams = $request->all();


      $saveArray = [];

      $saveArray['cod'] = $requestParams['cod'];
      $saveArray['name'] = $requestParams['name'];

      $client = City::updateCity($id, $saveArray);
      $message = "City updated successfully";

      return redirect()->back()->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function destroy($id) {

            City::deleteCity($id);

            return redirect()->route('city')->with('success', 'City removed successfully');
      }
}
