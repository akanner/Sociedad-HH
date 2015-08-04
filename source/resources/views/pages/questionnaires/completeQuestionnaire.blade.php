@extends('layout.main')
@section('title') Completar Encuesta :: @parent @stop

@section('content')
    <h2>{{$questionnaire->getTitle()}}</h2>
    {!! Form::open(array('action' => 'QuestionnaireController@completeQuestionnaire')) !!}
        {!! Form::hidden("questionnaireId",$questionnaire->id) !!}
        <div class="user-email">
            {!! Form::label('email', 'Dirección de Email') !!}
            {!! Form::email('email_address',null,["required"]) !!}
        </div>
        <div class="user-name">
            {!! Form::label('name', 'Nombre y apellido') !!}
            {!! Form::text('userName') !!}
        </div>
        <div>
            @for ($i = 0; $i < $questionnaire->getQuestions()->count(); $i++)
                <div class="questionnaire-question">
                    @include('pages.questionnaires.templates.question',['question'=>$questionnaire->getQuestions()->get($i),'questionNumber'=>$i+1])
                </div>
            @endfor
        </div>
        <button type="submit" class="btn btn-error">Enviar</button>
    {!! Form::close() !!}

@endsection
