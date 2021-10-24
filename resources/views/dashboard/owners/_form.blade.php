@csrf
@include('dashboard.partials.validation-error')
<div class="form-group">
    <div class="row center">
        {{-- Nombre del dueño --}}
        <div class="col  mb-3">
            <input class="form-control" type="text" name="name" id="name" 
            placeholder="Nombre dueño" value="{{ old('name',$owner->name) }}">
        </div>
    </div>
    {{-- Tipo de documento --}}
    <div class="form-group">
        <div class="row">
            <div class="col mb-3">
                <select class="form-control" name="document_type" id="document_type">
                    @include('dashboard/partials/options_document',['val' => $owner->document_type])
                </select>
            </div>
            {{-- Nùmero de document --}}
            <div class="col mb-3">
                <input class="form-control" type="text" name="document" id="document" 
                placeholder="Número de documento" value="{{ old('document',$owner->document) }}">
            </div>
        </div>
        
    </div>
</div>
<div class="mb-3">
    <div class="form-group">
        <a href="{{ URL::previous() }}" class="btn btn-outline-danger btn-sm" >Cancelar</a>
        <button type="submit" class="btn btn-outline-success btn-sm">Registrar</button>
    </div>
</div>
