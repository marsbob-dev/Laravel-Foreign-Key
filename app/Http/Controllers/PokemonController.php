<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pokemon = Pokemon::all();
        $type = Type::all();
        return view('pages.pokemon.welcomePokemon', compact('pokemon', 'type'));
    }

    public function index2()
    {
        $pokemon = Pokemon::all();
        $type = Type::all();
        return view('pages.pokemon.listPokemon', compact('pokemon', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pokemon = Pokemon::all();
        $type = Type::all();
        return view('pages.pokemon.createPokemon', compact('pokemon', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateForm = $request->validate([
            "nom" => "string|required",
            "image" => "string|required",
            "niveau" => "integer|required",
            "pokemon_id" => 'required'
        ]);

        $pokemon=new Pokemon;

        $pokemon->nom=$request->nom;
        $pokemon->image=$request->file('photo')->hashName();
        $pokemon->niveau=$request->niveau;
        $pokemon->pokemon_id=$request->pokemon_id;

        $request->file('photo')->storePublicly('images','public');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pokemon = Pokemon::find($id);
        $type = Type::all();

        return view('pages.pokemon.show.showPokemon', compact('pokemon', 'type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pokemon = Pokemon::find($id);
        $equipes = Type::all();

        return view('pages.pokemon.editPokemon', compact('pokemon', 'type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateForm = $request->validate([
            "nom" => "required",
            "image" => "required",
            "niveau" => "required",
            "pokemon_id" => 'required'
        ]);

        $pokemon= Pokemon::find($id);

        $pokemon->nom=$request->nom;
        $pokemon->image=$request->file('photo')->hashName();
        $pokemon->niveau=$request->niveau;
        $pokemon->pokemon_id=$request->pokemon_id;

        $request->file('photo')->storePublicly('images','public');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pokemon = Pokemon::find($id);
        $pokemon->delete();

        Storage::disk('public')->delete('images/' . $pokemon->photo);

        return redirect()->back();
    }
}
