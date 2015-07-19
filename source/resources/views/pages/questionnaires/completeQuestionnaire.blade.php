@extends('layout.main')
@section('title') Completar Encuesta :: @parent @stop

@section('content')
  <h2>{{$questionnaire->getTitle()}}</h2>
  <form method="post">
    <div>
      @foreach ($questionnaire->getQuestions() as $question)
        <div class="questionnaire-question">
          @include('pages.questionnaires.templates.question',['question'=>$question,'questionNumber'=>1])
        </div>
      @endforeach
    </div>
    <button type="submit" class="btn btn-error">Enviar</button>
  </form>
@endsection
