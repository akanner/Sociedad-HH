@extends("backend.layout.main")
@section("title") Administraci&oacute;n :: @parent @endsection

@section("content")

<div class="row">
    {!! Form::open(array("action" => "Backend\QuestionnaireBackendController@save", "class" => "questionnaire-form")) !!}

        <div class="form-group">
            {!! Form::label("title-input", "T&iacute;tulo", ["class" => "sr-only"]) !!}
            {!! Form::text("title", null, ["id" => "title-input", "class" => "form-control title", "placeholder" => "T&iacute;tulo del cuestionario", "required"]) !!}
        </div>
        <div class="form-group">
            {!! Form::label("description-input", "Descripci&oacute;n", ["class" => "sr-only"]) !!}
            {!! Form::text("description", null, ["id" => "description-input", "class" => "form-control description", "placeholder" => "Descripci&oacute;n del cuestionario", "required"]) !!}
        </div>

        <hr>

        <div class="question">
            <div class="form-group inline-content">
                {!! Form::label("question-title-input", "T&iacute;tulo de la pregunta") !!}
                {!! Form::text("questionTitle", null, ["id" => "question-title-input", "class" => "form-control", "placeholder" => "T&iacute;tulo de ejemplo", "required"]) !!}
            </div>
            <div class="form-group inline-content">
                {!! Form::label("question-type-input", "Tipo de pregunta") !!}
                {!! Form::select("questionType", ["1" => "Multiple choice"], null, ["id" => "question-type-input", "class" => "form-control", "required"]) !!}
            </div>
            <div class="form-group question-multiple-choice">
                {!! Form::radio("questionValue", "1", ["required"]) !!}
                {!! Form::text("questionValueText", null, ["class" => "form-control", "placeholder" => "Opci&oacute;n", "required"]) !!}
                <button title="Borrar respuesta" type="button" class="delete-choice-button btn btn-xs btn-danger">X</button>
            </div>
            <div class="add-question-multiple-choice">
                <button type="button" id="add-choice-button" class="btn btn-xs btn-primary">+ Agregar opci&oacute;n</button> o
                <button type="button" id="add-other-choice-button">Agregar "Otra"</button>
            </div>
        </div>

        <hr>

        <button type="submit" class="btn btn-error">Enviar</button>

    {!! Form::close() !!}
</div>

@endsection

@section("scripts")
    <script type="application/javascript" src="{{ elixir('js/questionnaires.js')}}"></script>
@endsection
