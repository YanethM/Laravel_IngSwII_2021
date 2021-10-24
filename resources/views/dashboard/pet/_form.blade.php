@csrf
@include('dashboard.partials.validation-error')
<div class="form-group">
    <div class="row center">
        <div class="col">
            <label for="pet_name" class="form-label">Mascota</label>
            <input class="form-control" type="text" name="pet_name" id="pet_name" value="{{ old('pet_name', $pet->pet_name) }}">
        </div>
    </div>
</div>

<div class="mb-3">
    <select class="custom-select" aria-label="Default select example">
        <option selected>Selecciona una opción</option>
        <option value="1">Perro</option>
        <option value="2">Gato</option>
        <option value="3">Three</option>
    </select>
</div>

{{-- Lista desplegable nombres de los dueños --}}
<div class="mb-3">
    <label for="owner_id">Dueños</label>
    <select class="custom-select" name="owner_id" id ="owner_id" aria-label="Default select example">
        <option selected disabled>Selecciona una opción</option>
        @foreach ($owners as $name =>$id)
            <option {{ $pet->owner_id == $id ? 'selected="selected"':'' }}value="{{ $id }}">{{ $name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <div class="row center">
        <div class="col">
            <label for="clinical_history" class="form-label">Historia Clinica</label>
            <textarea class="form-control" placeholder="Antecentes de la mascota" name="clinical_history"
                id="clinical_history" cols="30" rows="10">
               {{ old('clinical_history', $pet->clinical_history) }}
            </textarea>
        </div>
    </div>
</div>

<div class="mb-3">
    <div class="input-group-prepend">
        <div class="input-group-text">
            <input type="checkbox" aria-label="Checkbox for following text input">
            Pedigree
        </div>
    </div>
</div>

<div class="mb-3">
    <div class="form-group">
        <button type="submit" class="btn btn-success btn-sm">Registrar</button>
        <a class="btn btn-info btn-sm" href="{{ URL::previous() }}">Regresar</a>

    </div>
</div>
