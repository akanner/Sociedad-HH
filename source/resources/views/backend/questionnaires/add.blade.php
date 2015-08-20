@extends("backend.layout.main")
@section("title") Administraci&oacute;n :: @parent @endsection

@section("content")

<div class="row">
    <div class="header-and-paragraph">
        <h3>Nuevo cuestionario</h3>
    </div>

    {!! Form::open(["action" => "Backend\QuestionnaireBackendController@save", "id" => "add-questionnaire-form" ,"class" => "questionnaire-form","enctype" =>"multipart/form-data"]) !!}

        <div class="form-group">
            {!! Form::label("title-input", "T&iacute;tulo", ["class" => "sr-only"]) !!}
            {!! Form::text("title", null, ["id" => "title-input", "class" => "form-control title", "placeholder" => "T&iacute;tulo del cuestionario", "required"]) !!}
        </div>
        <div class="form-group">
            {!! Form::label("description-input", "Descripci&oacute;n", ["class" => "sr-only"]) !!}
            {!! Form::text("description", null, ["id" => "description-input", "class" => "form-control description", "placeholder" => "Descripci&oacute;n del cuestionario", "required"]) !!}
        </div>
        <div class="add-file-container form-group">
            <!--<label for="file-tosend">Material devuelto</label>
            <input type="file" id="file-tosend" name="fileReturned">-->
            {!! Form::label("file-tosend", "Material devuelto") !!}
            {!! Form::file("attachedFile", ["id" => "file-tosend","multiple"]) !!}
            <p class="help-block">El archivo que se enviar&aacute; por mail luego de llenar el cuestionario</p>
        </div>

        <hr>

        <button title="Agregar pregunta" id="add-question-button" type="button" class="btn btn-sm add-question">
            <img src="{{asset('img/questionnaire/plus.png')}}" alt="Agregar pregunta" class="img-rounded">
        </button>
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
                    {!! Form::radio("questionValue", "1", false, ["required", "data-changeMyName" => true]) !!}
                    {!! Form::text("questionValueText", null, ["class" => "form-control", "placeholder" => "Opci&oacute;n", "required"]) !!}
                    <button title="Borrar respuesta" type="button" class="delete-option-button btn btn-xs btn-danger">Eliminar</button>
                </div>
                <div class="add-option-multiple-choice">
                    <button type="button" class="add-option-button btn btn-xs btn-primary">Agregar opci&oacute;n</button> o
                    <button type="button" class="add-other-option-button">Agregar "Otra"</button>
                </div>
            </div>
        </div>

        <hr>

        <button id="send-new-questionnaire-button" type="submit" class="btn btn-success">Enviar</button>
        <span class="submit-feedback">Guardando cuestionario...</span>

    {!! Form::close() !!}
</div>

@endsection

@section("scripts")
    <script type="application/javascript" src="{{ elixir('js/questionnaires.js')}}"></script>
@endsection
