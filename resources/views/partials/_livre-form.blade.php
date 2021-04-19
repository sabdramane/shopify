@csrf
<div class="form-group">
    <label for="">Libellé</label>
    <input type="text" value="{{ old('libelle') ?? $livre->libelle }}"
      class="form-control" name="libelle" id="libelle" aria-describedby="helpId" placeholder="">
    @error('libelle')
      <small id="helpId" class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group">
    <label for="">Prix</label>
    <input type="number" value="{{ old('prix') ?? $livre->prix }}"
      class="form-control" name="prix" id="prix" aria-describedby="helpId" placeholder="">
      @error('prix')
      <small id="helpId" class="text-danger">{{ $message }}</small>
    @enderror
  </div>
 <div class="form-group">
   <label for="">Description</label>
   <textarea class="form-control" name="description" id="description" rows="3">{{ old('description') ?? $livre->description }}</textarea>
   @error('description')
      <small id="helpId" class="text-danger">{{ $message }}</small>
  @enderror
 </div>
 <div class="form-group">
   <label for="">Document</label>
   <input type="file" class="form-control-file" name="fichier" id="fichier" placeholder="" aria-describedby="fileHelpId">
   <small id="fileHelpId" class="form-text text-muted">Help text</small>
 </div>
 <button type="submit" class="btn btn-primary btn-block btn-lg">Valider</button>