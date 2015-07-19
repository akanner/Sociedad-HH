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

  <div>
    @foreach ($respondents as $respondent)
      <h3><a href="#">{{ $respondent }}</a></h3>
      <p>
        {{$respondent->email}}
      </p>
    @endforeach
  </div>
@endsection

@stop
