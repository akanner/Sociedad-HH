@extends("backend.layout.main")
@section("title") Administraci&oacute;n :: Reporte cuestionario @parent @endsection

@section("content")

    <div class="row">
        <div class="header-and-paragraph">
            <h3>Reporte de cuestionario</h3>
        </div>

        <input type="hidden" id="report-info" value="{{ $questionnaireReport }}" />
        <canvas id="myChart" width="400" height="400"></canvas>
    </div>

@endsection

@section("scripts")
    <script type="application/javascript" src="{{ elixir('js/questionnaires.js')}}"></script>
@endsection
