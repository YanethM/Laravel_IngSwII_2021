@extends('dashboard.master')
@section('content')
    <div class="form-group">
        <div class="row center">
            <div class="col">
                <label for="pet_name" class="form-label">Mascota</label>
                <input readonly class="form-control" type="text" name="pet_name" id="pet_name"
                    value="{{ $pet->pet_name }}">
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
    <div class="form-group">
        <div class="row center">
            <div class="col">
                <label for="clinical_history" class="form-label">Historia Clinica</label>
                <textarea readonly class="form-control" placeholder="Antecentes de la mascota" name="clinical_history"
                    id="clinical_history" cols="30" rows="10">
                        {{ $pet->clinical_history }}
                    </textarea>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <input readonly type="checkbox" aria-label="Checkbox for following text input">
                Pedigree
            </div>
        </div>
    </div>

    <div class="mb-3">
        <a class="btn btn-info" href="{{ URL::previous() }}">Regresar</a>
    </div>
@endsection
