@extends("backend.layout.main")
@section("title") Administraci&oacute;n :: @parent @endsection

@section("content")

<div class="row">
    {!! Form::open(["action" => "Backend\QuestionnaireBackendController@save", "id" => "add-questionnaire-form" ,"class" => "questionnaire-form"]) !!}

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
                {!! Form::text("questionTitle", null, ["class" => "form-control question-title-input", "placeholder" => "T&iacute;tulo de ejemplo", "required"]) !!}
            </div>
            <div class="form-group inline-content">
                {!! Form::label("question-type-input", "Tipo de pregunta") !!}
                {!! Form::select("questionType", ["MultipleChoiceQuestionSingleOption" => "Multiple choice"], null, ["class" => "form-control question-type-input", "required"]) !!}
            </div>
            <div class="question-multiple-choice">
                <div class="form-group option-multiple-choice">
                    {!! Form::radio("questionValue", "1", ["required"]) !!}
                    {!! Form::text("questionValueText", null, ["class" => "form-control", "placeholder" => "Opci&oacute;n", "required"]) !!}
                    <button title="Borrar respuesta" type="button" class="delete-option-button btn btn-xs btn-danger">X</button>
                </div>
                <div class="add-option-multiple-choice">
                    <button type="button" class="add-option-button btn btn-xs btn-primary">+ Agregar opci&oacute;n</button> o
                    <button type="button" class="add-other-option-button">Agregar "Otra"</button>
                </div>
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
