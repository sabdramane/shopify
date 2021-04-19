<x-master-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <h2 class="text-center">Livres</h2>
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
        </div>
        <div class="col-md-12 mb-4">
                <a href="{{ route('livres.create') }}" class="btn btn-success">Ajouter un livre</a>
            </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Libellé</th>
                            <th>Description</th>
                            <th>Prix</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($livres as $livre)
                        <tr>
                            <td scope="row">{{ $livre->libelle}}</td>
                            <td>{{ $livre->description}}</td>
                            <td>{{ $livre->prix}}</td>
                            <td>
                                <a href="{{ route('produits.edit',$livre->id)}}" class="btn btn-primary btn-sm mr-2">
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
                    {{ $livres->links()}}
                </div>
            </div>
        </div>
    </div>
</x-master-layout>