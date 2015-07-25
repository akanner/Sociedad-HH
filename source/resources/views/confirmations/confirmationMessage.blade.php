@extends('layout.main')
@section('title') Contacto :: @parent @endsection

@section('content')
    <div class="simple-confirmation-wrapper">
        <h1>{{ $message }}</h1>
        <a href="{{ $linkTo }}" class="btn btn-danger">{{ $linkLabel }}</a>
    </div>
@endsection
