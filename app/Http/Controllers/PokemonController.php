<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Pokemon;
use GuzzleHttp\Client;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function import()
     {
         for ($i = 1; $i <= 151; $i++) {
             $response = Http::get("https://pokeapi.co/api/v2/pokemon/$i");
             $pokemon = $response->json();
             
             Pokemon::updateOrCreate(
                 ['id' => $pokemon['id']],
                 [
                    'name' => $pokemon['name'],
                    'pokedex_number' => $pokemon['id'],
                    'sprite' => $pokemon['sprites']['front_default'],
                 ]
             );
         }

            return Pokemon::all();
     }

    public function index()
    {
        return view('pokemon');
    }

}
