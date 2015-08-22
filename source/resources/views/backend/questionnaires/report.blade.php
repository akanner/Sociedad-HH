@extends("backend.layout.main")
@section("title") Administraci&oacute;n :: Reporte cuestionario @parent @endsection

@section("content")

    <div class="row">
        <div class="header-and-paragraph">
            <h3>Reporte de cuestionario</h3>
        </div>

        <input type="hidden" id="report-info" value="{{ $questionnaireReport }}" />
        <div class="question-chart">
            <h5 class="title"></h5>
            <canvas class="chart" width="400" height="250"></canvas>
        </div>
    </div>

@endsection

@section("scripts")
    <script type="application/javascript" src="{{ elixir('js/reps.js')}}"></script>
@endsection
