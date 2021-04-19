<x-master-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <h1 class="text-center">Ajouter un nouveau livre</h1>
                <hr/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6  offset-md-3">
                <form method="post" action="{{ route('livres.store')}}" enctype="multipart/form-data">
                    @method('post')
                    @include('partials._livre-form')
                </form>
            </div>
        </div>
    </div>
   
</x-master-layout>