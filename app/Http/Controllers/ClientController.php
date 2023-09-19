<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    // Get a list of all clients
    public function index()
    {
        $clients = Client::paginate();
        return response()->json(['data' => $clients]);
    }

    // Create a new client
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'token' => 'required|string',
            'liveness_range' => 'required|numeric',
            'liveness_threshold' => 'required|numeric',
            'fr_range' => 'required|numeric',
            'fr_threshold' => 'required|numeric',
            'is_active' => 'required|boolean',
        ]);

        $client = Client::create($validatedData);

        return response()->json(['data' => $client, 'message' => 'Get Client Successfully'], 201);
    }

    // Get details of a specific client
    public function show($client)
    {
        $data = Client::find($client);
        return response()->json(['data' => $data]);
    }

    // Update a specific client
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'token' => 'required|string',
            'liveness_range' => 'required|numeric',
            'liveness_threshold' => 'required|numeric',
            'fr_range' => 'required|numeric',
            'fr_threshold' => 'required|numeric',
            'is_active' => 'required|boolean',
        ]);

        $client = Client::find($id)->update($validatedData);

        return response()->json(['data' => $client], 200);
    }

    // Delete a specific client
    public function destroy($id)
    {
        $client = Client::find($id);

        if (!$client) {
            return response()->json(['message' => 'Client deleted failed'], 400);
        }
        $client->delete();
        return response()->json(['data' => $client, 'message' => 'Client deleted successfully'], 200);
    }
}
