@extends("backend.layout.main")
@section("title") Administraci&oacute;n :: Reporte cuestionario @parent @endsection

@section("page-header")
    Reporte de cuestionario
@endsection

@section("content")

    <input type="hidden" id="report-info" value="{{ $questionnaireReport }}" />
    <div class="question-chart">
        <h5 class="title"></h5>
        <div class="chart-wrapper">
            <canvas class="chart" width="400" height="250"></canvas>
        </div>
    </div>

@endsection

@section("scripts")
    <script type="application/javascript" src="{{ elixir('js/reps.js')}}"></script>
@endsection
