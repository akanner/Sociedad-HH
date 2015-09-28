@extends('layout.main')
@section('title') Completar Cuestionario :: @parent @stop

@section('content')

    <div class="row">
        @include('errors.messageBagErrors')

        <div class="page-intro-wrapper">
            <h4>{{ $questionnaire->getHeading() }}</h4>
            <h3>{{ $questionnaire->getTitle() }}</h3>
            <p>{{ $questionnaire->getDescription() }}</p>
        </div>

        {!! Form::open(array('action' => 'QuestionnaireController@completeQuestionnaire', 'class' => 'stylish-form')) !!}
            {!! Form::hidden("questionnaireId",$questionnaire->id) !!}
            <div class="user-info">
                <p>Por favor déjenos sus datos para poder luego enviarle la clase virtual</p>
                <div class="form-group">
                    {!! Form::label('name', 'Nombre y apellido') !!}
                    {!! Form::text('userName', null, ["class" => "form-control"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email_address', null, ["class" => "form-control", "required"]) !!}
                </div>
            </div>
            @for ($i = 0; $i < $questionnaire->getQuestions()->count(); $i++)
            <div class="questionnaire-question">
                @include('pages.questionnaires.templates.question',['question'=>$questionnaire->getQuestions()->get($i),'questionNumber'=>$i+1])
            </div>
            @endfor
            <button id="sendQuestionnaireButton" type="submit" class="btn btn-error">Enviar</button>
        {!! Form::close() !!}
    </div>

@endsection
