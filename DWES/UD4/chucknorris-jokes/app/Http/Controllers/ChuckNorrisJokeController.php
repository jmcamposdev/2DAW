<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ChuckNorrisJokeController extends Controller
{
    /**
     * Show the application dashboard.
     */
    public function index()
    {
        return view('chucknorris');
    }

    /**
     * Fetch a joke from the Chuck Norris API.
     */
    public function fetchJoke()
    {
        // Create a client with a base URI
        $client = new Client();
        // Send a request to https://api.chucknorris.io/jokes/random
        $response = $client->request('GET', 'https://api.chucknorris.io/jokes/random');
        // Get the response and extract the joke
        $joke = json_decode($response->getBody()->getContents())->value;
        // Return the joke in JSON format  tienda, alsa con alquiler y reserva, galería y mongo db, 
        return response()->json(['joke' => $joke]);
    }
}
