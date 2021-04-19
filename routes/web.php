<?php

use App\Http\Controllers\LivreController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProduitController;
use App\Mail\ProduitAjoute;
use App\Notifications\ModificationProduit;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::middleware(["isAdmin"])->group(function () {
    Route::get('/', [MainController::class,"accueil"])->name("accueil");
    Route::resource("produits",ProduitController::class);
});

Route::get('list-produits',[ProduitController::class,"index"]);

Route::get('ajouter-produit',[MainController::class,"ajouterProduit"]);
Route::get('update-produit/{produit}', [MainController::class,"updateProduit"]);
Route::get('update-produit2', [MainController::class,"updateProduit2"]);

Route::get('suppression-produit', [MainController::class,"supprimerProduit"]);

Route::get('create-categorie',[MainController::class,"createCategory"]);

Route::get('get-produit/{produit}',[MainController::class,"getProduit"]);

Route::get('produit-commande-user', [MainController::class,"getCommande"]);

Route::get('test-collection', [MainController::class,"collection"]);

Route::get('test-mail', function () {
    return new ProduitAjoute;
});

Route::get('test-notification', function () {
    return new ModificationProduit;
});

Route::resource('livres', LivreController::class);

require __DIR__.'/auth.php';
