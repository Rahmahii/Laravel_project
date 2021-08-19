<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;

class ClientController extends Controller
{
  public function index()
  { $client = auth()->user()->clients;
    return view('clients.index', ["clients" => $client]);
  }

  public function show(Client $client)
  {
    //
  }
  public function store(ClientRequest $request)
  {
    $request->validated();
    $client = new Client();
    $client->fname = $request->fname;
    $client->lname = $request->lname;
    $client->phone = $request->phone;
    $client->email = $request->email;
    $client->address = $request->address;
    $client->country_id = $request->country_id;
    $client->city_id = $request->city_id;
    $client->user_id = auth()->user()->id;
    $client->save();
    return redirect('/clients')->with('success', 'client added successfully!');
  }
  public function Getupdate($id)
  {
    $client = auth()->user()->clients()->find($id);
    return view('clients.edit', ["client" => $client]);
  }
  public function update(ClientRequest $request, $id)
  {
    $client = auth()->user()->clients()->find($id);
    $client->fname = $request->fname;
    $client->lname = $request->lname;
    $client->phone = $request->phone;
    $client->email = $request->email;
    $client->address = $request->address;
    $client->country_id = $request->country_id;
    $client->city_id = $request->city_id;
    $client->user_id = auth()->user()->id;
    $client->save();
    return redirect('/clients')->with('success','client updated successfully!');
  }

  public function destroy($id)
  {
    auth()->user()->Clients()->find($id)->delete();
    return redirect('/clients')->with('success', 'client deleted successfully!');
  }
}
