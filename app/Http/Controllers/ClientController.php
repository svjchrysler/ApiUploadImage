<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$clients = Client::orderBy('id', 'desc')->paginate(10);

		return view('clients.index', compact('clients'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('clients.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{

		header("Access-Control-Allow-Origin: *");
	 	$headers = [
            'Access-Control-Allow-Methods'=> 'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Headers'=> 'Content-Type, X-Auth-Token, Origin'
        ];
        
		$client = new Client();

		$client->nombre = $request->nombre;
        $client->edad = $request->edad;

        $imageName = time().'.'.$request->photo->getClientOriginalExtension();
        $request->photo->move(public_path('photos'), $imageName);

        $client->photo = $imageName;

		$client->save();

		return $client;
		//return redirect()->route('clients.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$client = Client::findOrFail($id);

		return view('clients.show', compact('client'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$client = Client::findOrFail($id);

		return view('clients.edit', compact('client'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$client = Client::findOrFail($id);

		$client->nombre = $request->input("nombre");
        $client->edad = $request->input("edad");
        $client->photo = $request->input("photo");

		$client->save();

		return redirect()->route('clients.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$client = Client::findOrFail($id);
		$client->delete();

		return redirect()->route('clients.index')->with('message', 'Item deleted successfully.');
	}

}
