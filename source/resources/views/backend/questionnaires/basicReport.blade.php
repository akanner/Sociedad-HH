@extends("backend.layout.main")
@section("title") Administraci&oacute;n :: Reporte cuestionario @parent @endsection

@section("page-header")
    <div class="report-header">
        <h4>Reporte de cuestionario</h4>
        <h3>{{ $questionnaireReport['questionnaire_name'] }}</h3>
        <p>{{ $questionnaireReport['questionnaire_answersCount'] }} respuestas</p>
    </div>
@endsection

@section("content")

    <div class="report-wrapper">
        @foreach($questionnaireReport['questions'] as $idQuestion => $questionInfo)
            <div class="questionnaire-question">
                @include($questionInfo->reportTemplate,['questionInfo'=>$questionInfo])
            </div>
        @endforeach
    </div>

@endsection
