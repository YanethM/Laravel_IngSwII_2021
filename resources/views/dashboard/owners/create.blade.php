@extends('dashboard.master')
@section('content')
<form action="{{ route('owner.store') }}" method="post">
    @include('dashboard.owners._form')
</form>
@endsection
