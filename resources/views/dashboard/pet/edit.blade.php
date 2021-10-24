@extends('dashboard.master')
@section('content')
<form action="{{ route('pet.update', $pet->id) }}" method="post">
    @method('PUT')
    @include('dashboard.pet._form')
</form>
{{-- Crear formulario que permita cargar foto evidencia de la consulta --}}
<form action="{{ route('pet.image', $pet) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col">
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class="col">
            <input type="submit" class="btn btn-info" value="Subir foto">
        </div>
    </div>
</form>

@endsection
