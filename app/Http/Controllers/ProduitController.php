<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProduitRequest;
use App\Mail\ProduitAjoute;
use App\Models\Categorie;
use App\Models\Produit;
use App\Models\User;
use App\Notifications\ModificationProduit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits = Produit::paginate(10);
        // $produits500 = Produit::where("prix",500)->get();
        // dd($produits500->all());

        // $produit = new Produit();
        // $produit->designation = "Livre";
        // $produit->description = "exemple de produit";
        // $produit->prix = 1000;
        // $produit->save();
        // dd($produit);

        return view("front-office.produits.index",
                [
                    "produits" => $produits
                ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produit = new Produit;

        $categories = Categorie::all();
        return view("front-office.produits.create",[
            "categories" => $categories,
            "produit" => $produit,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProduitRequest $request)
    {
       // dd($request->file("image"));
        // $request->validate([
        //     "designation" => "required|min:3|max:50|unique:produits",
        //     "prix" => "required|numeric|between:500,1000000",
        //     "description" => "required|min:8|max:200",
        //     "categorie_id" => "required|numeric",
        // ]);
        $imageName = "produit.png";
        if ($request->file("image")) {
            $imageName = time().$request->file("image")->getClientOriginalName();
            $request->file("image")->storeAs("uploads/produits",$imageName);
        }

        $request->session()->put("imageName",$imageName);
        
        $produit = Produit::create([
            "designation" => $request->designation,
            "categorie_id" => $request->categorie_id,
            "description" => $request->description,
            "prix" => $request->prix,
            "image" => $imageName,
        ]);

        $user = User::first();
        Mail::to($user)->send(new ProduitAjoute);
  
        return redirect()->route('produits.index')->with("statut","Le produit a été bien ajouté");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
        $categories = Categorie::all();
        return view("front-office.produits.edit",[
            "categories" => $categories,
            "produit" => $produit,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProduitRequest $request, $id)
    {
        Produit::where('id',$id)->update([
            "designation" => $request->designation,
            "categorie_id" => $request->categorie_id,
            "description" => $request->description,
            "prix" => $request->prix,
        ]);
        $user = User::first();
        $user->notify(new ModificationProduit);

        return redirect()->route('produits.index')->with("statut","Le produit a été bien modifiée");
        
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
