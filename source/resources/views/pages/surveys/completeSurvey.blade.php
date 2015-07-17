@extends('layout.main')
@section('title') Completar Encuesta :: @parent @stop

@section('content')
  <h2>{{$survey->getTitle()}}</h2>
  <form method="post">
    <div>
      @foreach ($survey->getQuestions() as $question)
        <div class="survey-question">
          @include('pages.surveys.templates.question',['question'=>$question,'questionNumber'=>1])
        </div>
      @endforeach
    </div>
    <button type="submit" class="btn btn-error">Enviar</button>
  </form>
@endsection
