@extends('dashboard.master')
@section('content')
<form action="{{ route('pet.store') }}" method="post">
    @include('dashboard.pet._form')
</form>
@endsection
