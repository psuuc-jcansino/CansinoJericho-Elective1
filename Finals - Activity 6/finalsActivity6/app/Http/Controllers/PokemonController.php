<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PokemonController extends Controller
{
    public function getPokemon(Request $request)
    {
        $names = [
            $request->query('name1', 'pikachu'),
            $request->query('name2', 'charmander'),
            $request->query('name3', 'bulbasaur'),
        ];

        $results = [];

        foreach ($names as $name) {
            $response = Http::get("https://pokeapi.co/api/v2/pokemon/{$name}");

            if ($response->successful()) {
                $data = $response->json();
                $results[] = [
                    'name' => $data['name'],
                    'height' => $data['height'],
                    'weight' => $data['weight'],
                    'types' => array_map(fn($type) => $type['type']['name'], $data['types']),
                ];
            } else {
                $results[] = [
                    'name' => $name,
                    'error' => 'Not found'
                ];
            }
        }

        return response()->json($results);
    }
}
