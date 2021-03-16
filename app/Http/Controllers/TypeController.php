<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
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
        return view('pages.type.welcomeType', compact('pokemon', 'type'));
    }

    public function index2()
    {
        $pokemon = Pokemon::all();
        $type = Type::all();
        return view('pages.type.listType', compact('pokemon', 'type'));
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
        return view('pages.pokemon.createType', compact('pokemon', 'type'));
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
            "type" => "string|required",
        ]);
    
        $type=new Type;
    
        $type->type=$request->type;
        
        return redirect()->back();
   }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pokemon = Pokemon::find($id);
        $type = Type::all();

        return view('pages.type.show.showType', compact('pokemon', 'type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pokemon = Pokemon::all();
        $equipes = Type::find($id);

        return view('pages.type.editType', compact('pokemon', 'type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateForm = $request->validate([
            "type" => "required",
        ]);
    
        $type=Type::find($id);
    
        $type->type=$request->type;
        
        return redirect()->back();
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Type::find($id);
        $type->delete();

        return redirect()->back();
    }
}
