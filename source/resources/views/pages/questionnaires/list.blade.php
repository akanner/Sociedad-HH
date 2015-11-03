@extends('layout.main')

@section('title') Encuestas :: @parent @endsection

@section('content')
<div>
    @forelse ($questionnaires as $questionnaire)
        <div class="page-intro-wrapper">
            <h4>{{ $questionnaire->getHeading() }}</h4>
            <h3>{{ $questionnaire->getTitle() }}</h3>
            <p>{!! $questionnaire->getDescription() !!}</p>
        </div>
        <a href="/encuestas/{{ $questionnaire->id }}" class="btn default-button">CONTESTAR</a>
    @empty
        <div class="page-intro-wrapper">
            <h3>Actualmente no hay encuestas disponibles</h3>
        </div>
    @endforelse

</div>
@endsection
