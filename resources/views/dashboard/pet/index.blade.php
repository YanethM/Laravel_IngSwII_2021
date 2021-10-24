@extends('dashboard.master')
@section('content')
    <a href="{{ route('pet.create') }}" class="btn btn-info btn-sm mb-3">Añadir mascota</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Mascota</th>
                <th scope="col">Tipo mascota</th>
                <th scope="col">Historia clinica</th>
                <th scope="col">Pedigree</th>
                <th scope="col">Dueño</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pets as $pet)
                <tr>
                    <th scope="row">{{ $pet->id }}</th>
                    <td>{{ $pet->pet_name }}</td>
                    <td>{{ $pet->pet_type }}</td>
                    <td>{{ $pet->clinical_history }}</td>
                    <td>{{ $pet->pedigree }}</td>
                    <td>{{ $pet->owner_id }}</td>
                    <td>
                        <a href="{{ route('pet.show', $pet->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('pet.edit', $pet->id) }}" class="btn btn-info btn-sm">Editar</a>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal"
                            data-id="{{ $pet->id }}">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
{{ $pets->links() }}
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label class="text-muted">¿Seguro que deseas eliminar la mascota seleccionada?</label>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <form id="eliminarMascota" action="{{ route('pet.destroy', 0) }}"
                    data-action="{{ route('pet.destroy', 0) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    window.onload = function() {
            $('#exampleModal').on('show.bs.modal', function(event) {
                        var button = $(event.relatedTarget) // Button that triggered the modal
                        var id = button.data('id') // Extract info from data-* attributes
                        action =$('#eliminarMascota').attr('data-action').slice(0, -1)
                        action += id
                        $('#eliminarMascota').attr('action', action)
                        var modal = $(this)
                        modal.find('.modal-title').text('Vas a eliminar la mascota '+id)
                    });
    };
</script>
