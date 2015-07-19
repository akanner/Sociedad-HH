@extends('layout.main')
@section('title') Encuestas :: @parent @stop

@section('content')
  <div>
    @foreach ($surveys as $survey)
      <h3><a href="/encuestas/{{$survey->id}}">{{ $survey->getTitle() }}</a></h3>
      <p>
        {{$survey->getDescription()}}
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
