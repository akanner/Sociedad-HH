@extends("backend.layout.main")
@section("title") Administraci&oacute;n :: Reporte cuestionario @parent @endsection

@section("page-header")
    Reporte de cuestionario
@endsection

@section("content")

    <h2>{{$questionnaireReport['questionnaire_name']}} - {{$questionnaireReport['questionnaire_answersCount']}} respuestas</h2>

    @foreach($questionnaireReport['questions'] as $idQuestion => $questionInfo)
        <div class="questionnaire-question">

            @include($questionInfo->reportTemplate,['questionInfo'=>$questionInfo])
        </div>
    @endforeach

@endsection
