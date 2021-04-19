<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{

    public function accueil()
    {
        $produits = Produit::orderByDesc("id")->take(9)->get();
        return view("welcome",[
            "produits" => $produits,
        ]);
    }

    public function ajouterProduit()
    {
       $produit = Produit::create([
            "designation" => "Cahier",
            "description" => "Description de Cahier",
            "prix" => 500,
        ]);
        dd($produit);
    }

    public function updateProduit(Produit $produit)
    {
        dd($produit);
 
       dump($produit);
       $produit->designation ="chemise";
       $produit->description = "Chemise pour homme";
       $produit->prix =6000;
       $produit->save();
       dd($produit);
    }
    public function updateProduit2()
    {
       $result = Produit::where("id",2)->update([
           "designation" =>"Tricot",
           "description" =>"Description de Tricot",
           "prix" =>12000,
       ]);
       dd($result);
    }

    public function supprimerProduit()
    {
        $result = Produit::destroy(1);
        dd($result);
        # code...
    }

    public function createCategory()
    {
        // Categorie::create([
        //     "libelle" =>"Vetement"
        // ]);

        Produit::create([
            "categorie_id" =>2,
            "designation" => "Kokodonda",
            "description" => "Description de polo",
            "prix" => 5000,
        ]);


        dd(Produit::first());
        # code...
    }

    public function getProduit(Produit $produit)
    {
        $categorie = Categorie::findOrFail(2);
        dd($categorie,$categorie->produits);
        // dd($produit->categorie);
        
    }

    public function commande()
    {
        $user = User::create([
            "name" => "SANOU Dramane",
            "email" => "sabdramane11@yahoo.fr",
            "password" => Hash::make("sanou123")
        ]);

        $produit1 =  Produit::first();
        $produit2 = Produit::findOrFail(2);

        $user->produits()->attach($produit1);

        dd($user);
        # code...
    }

    public function getCommande()
    {
        // $user = User::create([
        //     "name" => "SANOU Dramane",
        //     "email" => "sabdramane11@yahoo.fr",
        //     "password" => Hash::make("sanou123")
        // ]);
        $user = User::first();
        $produit1 =  Produit::first();
        $produit2 = Produit::findOrFail(2);

        $user->produits()->attach($produit2);

        dd($user->produits);
        # code...
    }

    public function collection()
    {
        $collection1 = collect([
            collect([
                "title" => "Mon livre 1",
                "price" => 500,
                "description" => "La description de mon livre 1", 
            ])
            ,
            [
                "title" => "Mon livre 2",
                "price" => 1000,
                "description" => "La description de mon livre 2", 
            ],
            [
                "title" => "Mon livre 3",
                "price" => 1500,
                "description" => "La description de mon livre 3", 
            ]
            
        ]);
        $collection1->push([
            "title" => "Mon livre 4",
            "price" => 2000,
            "description" => "La description de mon livre 4", 
        ]);

        $nouvelleCollection = $collection1->filter(function($livre,$key){
            return $livre["price"] >= 1000;
        });
        dd($nouvelleCollection->count());
    }
}
