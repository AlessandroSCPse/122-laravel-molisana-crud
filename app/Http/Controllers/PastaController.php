<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasta;
use Illuminate\Support\Facades\Validator;

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
        // $pastas = Pasta::withTrashed()->get();
        // $pastas = Pasta::onlyTrashed()->get();

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
        // $validated = $request->validate(
        //     [
        //         'title' => 'required|min:5|max:50',
        //         'image' => 'required|max:250',
        //         'type' => 'required|max:20',
        //         'cooking_time' => 'required|max:20',
        //         'weight' => 'required|max:20',
        //         'origin_country' => 'required|max:20',
        //         'description' => 'nullable|min:10|max:2000'
        //     ],
        //     [
        //         'title.required' => 'Il campo titolo è obbligatorio',
        //         'title.max' => 'Il campo titolo non può avere più di 50 caratteri',
        //         'title.min' => 'Il campo titolo deve avere almeno 5 caratteri',
        //         'image.required' => 'Il campo immagine è obbligatorio',
        //         'type.required' => 'Il campo tipo è obbligatorio'
        //     ]
        // );

        $formData = $request->all();
        $this->validation($formData);
        // dd($formData);
        
        // Creo nuova riga nel db
        $newPasta = new Pasta();
        // $newPasta->title = $formData['title'];
        // $newPasta->image = $formData['image'];
        // $newPasta->type = $formData['type'];
        // $newPasta->cooking_time = $formData['cooking_time'];
        // $newPasta->weight = $formData['weight'];
        // $newPasta->description = $formData['description'];
        $newPasta->fill($formData);
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
        $pasta = Pasta::findOrFail($id);
        
        $data = [
            'pasta' => $pasta
        ];

        return view('pastas.edit', $data);
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
        // $validated = $request->validate(
        //     [
        //         'title' => 'required|min:5|max:50',
        //         'image' => 'required|max:250',
        //         'type' => 'required|max:20',
        //         'cooking_time' => 'required|max:20',
        //         'weight' => 'required|max:20',
        //         'origin_country' => 'required|max:20',
        //         'description' => 'nullable|min:10|max:2000'
        //     ],
        //     [
        //         'title.required' => 'Il campo titolo è obbligatorio',
        //         'title.max' => 'Il campo titolo non può avere più di 50 caratteri',
        //         'title.min' => 'Il campo titolo deve avere almeno 5 caratteri',
        //         'image.required' => 'Il campo immagine è obbligatorio',
        //         'type.required' => 'Il campo tipo è obbligatorio'
        //     ]
        // );
        
        $formData = $request->all();
        $this->validation($formData);

        $pasta = Pasta::findOrFail($id);
        
        // $pasta->title = $formData['title'];
        // $pasta->type = $formData['type'];
        // $pasta->save();

        $pasta->update($formData);

        return redirect()->route('pastas.show', ['pasta' => $pasta->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pasta = Pasta::findOrFail($id);
        $pasta->delete();

        return redirect()->route('pastas.index');
    }

    private function validation($data) {
        $validator = Validator::make(
            $data,
            [
                'title' => 'required|min:5|max:50',
                'image' => 'required|max:250',
                'type' => 'required|max:20',
                'cooking_time' => 'required|max:20',
                'weight' => 'required|max:20',
                'origin_country' => 'required|max:20',
                'description' => 'nullable|min:10|max:2000'
            ],
            [
                'title.required' => 'Il campo titolo è obbligatorio',
                'title.max' => 'Il campo titolo non può avere più di 50 caratteri',
                'title.min' => 'Il campo titolo deve avere almeno 5 caratteri',
                'image.required' => 'Il campo immagine è obbligatorio',
                'type.required' => 'Il campo tipo è obbligatorio'
            ]
        )->validate();

        return $validator;
    }
}
