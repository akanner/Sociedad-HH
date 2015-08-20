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
                    <th>Activa Desde</th>
                    <th>Finalizada el</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($questionnaires as $key => $questionnaire)
                    <tr>
                        <td>{{$questionnaire->id}}</td>
                        <td><a href="/encuestas/{{$questionnaire->id}}">{{$questionnaire->title}}</a></td>
                        <td>{{$questionnaire->activeFrom}}</td>
                        <td>{{$questionnaire->activeTo}}</td>
                        <td>
                            <a class="btn btn-success btn-xs" href="/adminhh/encuestas/reporte/{{$questionnaire->id}}">Reporte</a>
                            <button class="btn btn-danger btn-xs"type="button" name="delete-questionnaire">Finalizar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection
