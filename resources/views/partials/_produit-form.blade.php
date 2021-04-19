@csrf
<div class="form-group">
    <label for="">Désignation</label>
    <input type="text" value="{{ old('designation') ?? $produit->designation }}"
      class="form-control" name="designation" id="designation" aria-describedby="helpId" placeholder="">
    @error('designation')
      <small id="helpId" class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group">
    <label for="">Prix</label>
    <input type="number" value="{{ old('prix') ?? $produit->prix }}"
      class="form-control" name="prix" id="prix" aria-describedby="helpId" placeholder="">
      @error('prix')
      <small id="helpId" class="text-danger">{{ $message }}</small>
    @enderror
  </div>
 <div class="form-group">
   <label for="">Catégorie</label>
   <select class="form-control" name="categorie_id" id="categorie_id">
     @foreach ($categories as $categorie)
           <option {{  ($produit->categorie_id == $categorie->id OR old('categorie_id') == $categorie->id ) ? "selected" : "" }} value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
     @endforeach
   </select>
 </div>

 <div class="form-group">
   <label for="">Description</label>
   <textarea class="form-control" name="description" id="description" rows="3">{{ old('description') ?? $produit->description }}</textarea>
   @error('description')
      <small id="helpId" class="text-danger">{{ $message }}</small>
  @enderror
 </div>
 <div class="form-group">
   <label for="">Image</label>
   <input type="file" class="form-control-file" name="image" id="image" placeholder="" aria-describedby="fileHelpId">
   <small id="fileHelpId" class="form-text text-muted">Help text</small>
 </div>
 <button type="submit" class="btn btn-primary btn-block btn-lg">Valider</button>