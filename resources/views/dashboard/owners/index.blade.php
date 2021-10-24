@extends('dashboard.master')
@section('content')
    <h6>Listar dueños mascotas</h6>
    <a href="{{ route('owner.create') }}" class="btn btn-info btn-sm mb-3">Añadir dueño</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Tipo documento</th>
                <th scope="col">Documento</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($owners as $owner)
                <tr>
                    <td>{{ $owner->name }}</td>
                    <td>{{ $owner->document_type }}</td>
                    <td>{{ $owner->document }}</td>

                    <td>
                        <a href="{{ route('owner.show', $owner->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('owner.edit', $owner->id) }}" class="btn btn-info btn-sm">Editar</a>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal"
                            data-id="{{ $owner->id }}">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $owners->links() }}
@endsection
