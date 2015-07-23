@extends('layout.main')
@section('title') Encuestas :: @parent @stop

@section('content')
  <div>
    @foreach ($questionnaires as $questionnaire)
      <h3><a href="/encuestas/{{$questionnaire->id}}">{{ $questionnaire->getTitle() }}</a></h3>
      <p>
        {{$questionnaire->getDescription()}}
      </p>
    @endforeach
  </div>
@endsection

@stop
