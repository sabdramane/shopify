<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLivreRequest;
use App\Models\Livre;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livres = Livre::paginate(10);
        return view("front-office.livres.index",[
            "livres" => $livres
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $livre = new Livre();
       return view("front-office.livres.create",[
        "livre" => $livre
    ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLivreRequest $request)
    {
        $livre = Livre::create([
            "libelle" => $request->libelle,
            "description" => $request->description,
            "prix" => $request->prix,
        ]);

        return redirect()-> route("livres.index")->with("statut","Le livre a été bien enregistré");;
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Livre  $livre
     * @return \Illuminate\Http\Response
     */
    public function show(Livre $livre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Livre  $livre
     * @return \Illuminate\Http\Response
     */
    public function edit(Livre $livre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Livre  $livre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Livre $livre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Livre  $livre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Livre $livre)
    {
        //
    }
}
