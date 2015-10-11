@extends('layout.main')

@section('title') Encuestas :: @parent @endsection

@section('content')
<div>
    @foreach ($questionnaires as $questionnaire)
        <div class="page-intro-wrapper">
            <h4>{{ $questionnaire->getHeading() }}</h4>
            <h3>{{ $questionnaire->getTitle() }}</h3>
            <p>{!! $questionnaire->getDescription() !!}</p>
        </div>
        <a href="/encuestas/{{$questionnaire->id}}" class="btn default-button">CONTESTAR</a>
    @endforeach
</div>
@endsection
