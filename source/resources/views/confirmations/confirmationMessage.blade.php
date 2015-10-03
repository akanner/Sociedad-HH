@extends('layout.main')
@section('title') Confirmaci&oacute;n :: @parent @endsection

@section('content')
    <div class="page-intro-wrapper">
        <h4>{{ $header }}</h4>
        <h3>{{ $title }}</h3>
        <p>{{ $message }}</p>
    </div>
    <a href="{{ $linkTo }}" class="btn default-button">{{ $linkLabel }}</a>
@endsection
