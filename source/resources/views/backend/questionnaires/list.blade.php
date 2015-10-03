@extends("backend.layout.main")
@section("title") Administraci&oacute;n :: Listar Cuestionarios @parent @endsection

@section("content")
<div class="row">

    <div class="header-and-paragraph">
        <h3>Listado de cuestionarios</h3>
    </div>


    <div class="questionnaires-table">
        <table class="table-striped table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Activo Desde</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($questionnaires as $key => $questionnaire)
                <tr class="questionnaire-row" data-status='{{$questionnaire->isActive()}}'>
                    <td>{{$questionnaire->id}}</td>
                    <td><a href="/encuestas/{{$questionnaire->id}}">{{$questionnaire->title}}</a></td>
                    <td>{{$questionnaire->activeFrom}}</td>
                    <td>
                        <a class="btn btn-success btn-xs" data-id="{{$questionnaire->id}}" href="/adminhh/encuestas/reporte/{{$questionnaire->id}}">Reporte</a>
                        <button class="btn btn-primary invite-user btn-xs" data-url="/adminhh/encuestas/invitar/{{$questionnaire->id}}" type="button">Invitar</button>
                        <button data-url="/adminhh/encuestas/flagQuestionnaireAs" class="btn btn-danger btn-xs delete-questionnaire" type="button">Finalizar</button>
                        <button data-url="/adminhh/encuestas/flagQuestionnaireAs" class="btn btn-primary btn-xs activate-questionnaire" type="button" >Activar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection
@section("scripts")
    <script type="application/javascript" src="{{elixir('js/listActions.js')}}"></script>
    <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{csrf_token()}}"
        }
    });
    </script>
@endsection
