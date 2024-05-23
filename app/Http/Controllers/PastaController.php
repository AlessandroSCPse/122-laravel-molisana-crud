<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasta;

class PastaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pastas = Pasta::all();

        $data = [
            'pastas' => $pastas
        ];
        
        return view('pastas.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pastas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formData = $request->all();
        
        // Creo nuova riga nel db
        $newPasta = new Pasta();
        $newPasta->title = $formData['title'];
        $newPasta->image = $formData['image'];
        $newPasta->type = $formData['type'];
        $newPasta->cooking_time = $formData['cooking_time'];
        $newPasta->weight = $formData['weight'];
        $newPasta->description = $formData['description'];
        $newPasta->save();

        return redirect()->route('pastas.show', ['pasta' => $newPasta->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pasta = Pasta::find($id);

        $data = [
            'pasta' => $pasta
        ];
        
        return view('pastas.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
