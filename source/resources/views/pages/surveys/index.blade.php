@extends('layout.main')
@section('title') Encuestas :: @parent @stop

@section('content')
  <div>
    @foreach ($surveys as $survey)
      <h3><a href="/encuestas/{{$survey->id}}">{{ $survey->getTitle() }}</a></h3>
      <p>
        {{$survey->getSubstract()}}
      </p>
    @endforeach
  </div>
@endsection

@stop
