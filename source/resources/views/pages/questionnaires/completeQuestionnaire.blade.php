@extends('layout.main')
@section('title') Completar Encuesta :: @parent @stop

@section('content')
  <h2>{{$questionnaire->getTitle()}}</h2>
  <form method="post">
      <input type="hidden" value="{{$questionnaire->id}}"/>
    <div>
        @for ($i = 0; $i < $questionnaire->getQuestions()->count(); $i++)
            <div class="questionnaire-question">
                @include('pages.questionnaires.templates.question',['question'=>$questionnaire->getQuestions()->get($i),'questionNumber'=>$i+1])
            </div>
        @endfor
    </div>
    <button type="submit" class="btn btn-error">Enviar</button>
  </form>
@endsection
