@extends('dashboard.master')
@section('content')
<form action="{{ route('owner.update', $owner->id) }}" method="post">
    @method('PUT')
    @include('dashboard.owners._form')
</form>
@endsection
