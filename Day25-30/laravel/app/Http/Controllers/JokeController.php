<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class JokeController extends Controller
{
    public function getRandomJoke()
    {
        $response = Http::get('https://official-joke-api.appspot.com/random_joke');

        if ($response->successful()) {
            $joke = $response->json();
            return view('randomJoke', ['joke' => $joke]);
        }

        return response()->json(['error' => 'Unable to fetch joke'], 500);
    }
}
