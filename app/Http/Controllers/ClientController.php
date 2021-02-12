<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index(Request $request)
    {       

        $optionsArray = [];

        $requestParams = $request->all();


        if(isset($requestParams['city'])) {
            $optionsArray['whereArray'][] = ['city', '=', $requestParams['city']];
        }


        if(isset($requestParams['pagination'])) {
            $optionsArray['pagination'] = $requestParams['pagination'];
        }


        $clients = Client::getAllClients($optionsArray);


        return view('client.index', compact('clients', 'requestParams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function create(Request $request){      

            $requestParams = $request->all();

            $client = "";

            if(isset($requestParams['clientId'])) {
                  $client = Client::getCityById($requestParams['clientId']);
            }

            return view('client.add', compact('client'));
      }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
      public function store(Request $request){

            $validator = $request->validate([
                  'cod' => 'required|max:255',
                  'name' => 'required',
                  'city' => 'required',
            ]);

            $requestParams = $request->all();


            $saveArray = [];

            $saveArray['cod'] = $requestParams['cod'];
            $saveArray['name'] = $requestParams['name'];
            $saveArray['city'] = $requestParams['city'];

            $client = Client::addClient( $saveArray);
            $message = "Client added successfully";

            return redirect()->route('client.show', $client->id)->with('success', $message);
      }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function show($id) {

            $client = Client::getClientById($id);

            return view('client.show', compact('client'));
      }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function edit($id) {

            $client = Client::getClientById($id);


            if(isset($client->id)) {
                  return view('client.add', compact('client'));
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
                  'city' => 'required',
            ]);

            $requestParams = $request->all();


            $saveArray = [];

            $saveArray['cod'] = $requestParams['cod'];
            $saveArray['name'] = $requestParams['name'];
            $saveArray['city'] = $requestParams['city'];

            $client = Client::updateClient($id, $saveArray);
            $message = "Client updated successfully";

            return redirect()->back()->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function destroy($id) {

            Client::deleteClient($id);

            return redirect()->route('clients')->with('success', 'Client removed successfully');
      }
}
