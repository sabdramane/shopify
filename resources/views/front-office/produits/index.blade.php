<x-master-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <h1 class="text-center">Tous nos produits</h1>
                <hr/>
            </div>
        </div>
        <div class="row">
            @if ( session('statut'))
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>{{ session('statut') }}</strong> 
                </div>
            </div>
            @endif
            <div class="col-md-12">
                <a href="{{ route('produits.create') }}" class="btn btn-success">Ajouter un produit</a>
                Le nom de l'image selectionné est : {{ session('imageName') }}
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Désignation</th>
                            <th>Catégorie</th>
                            <th>Prix</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
    
                        @foreach ($produits as $produit)
                            <tr>
                                <td scope="row"> {{ $produit->designation }}</td>
                                <td>
                                    {{ $produit->categorie ? $produit->categorie->libelle : "Non catégorisé" }}
                                </td>
                                <td>{{ formatPrixBf($produit->prix)  }}</td>
                                <td>{{ $produit->description }}</td>
                                <td>
                                    <a href="{{ route('produits.edit',$produit->id)}}" class="btn btn-primary btn-sm mr-2">
                                       <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    
                                </td>
                            </tr>
                        @endforeach
                          
                        
                    </tbody>
                </table>
                <div class="mt-5 text-center d-flex justify-content-center">
                    {{ $produits->links()}}
                </div>
            </div>        
        </div>
    </div>
   
</x-master-layout>