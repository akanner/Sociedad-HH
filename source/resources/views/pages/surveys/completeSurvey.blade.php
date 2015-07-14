@extends('layout.main')
@section('title') Completar Encuesta :: @parent @stop

@section('content')
  <div>
    @foreach ($survey->getQuestions() as $question)
      {{$question}}
    @endforeach
  </div>
@endsection
