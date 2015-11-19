@extends("backend.layout.main")
@section("title") Administraci&oacute;n :: @parent @endsection

@section("page-header")
    Nuevo cuestionario
@endsection

@section("content")

    {!! Form::open(["action" => "Backend\QuestionnaireBackendController@save", "id" => "add-questionnaire-form" ,"class" => "questionnaire-form","enctype" =>"multipart/form-data"]) !!}
        <div class="questionnaire-general-info">
            <div class="form-group">
                {!! Form::label("heading-input", "Encabezado", ["class" => "sr-only"]) !!}
                {!! Form::text("heading", null, ["id" => "heading-input", "class" => "form-control heading", "placeholder" => "Encabezado", "required"]) !!}
            </div>
            <div class="form-group">
                {!! Form::label("title-input", "T&iacute;tulo", ["class" => "sr-only"]) !!}
                {!! Form::text("title", null, ["id" => "title-input", "class" => "form-control title", "placeholder" => "T&iacute;tulo", "required"]) !!}
            </div>
            <div class="form-group">
                {!! Form::label("description-input", "Descripci&oacute;n", ["class" => "sr-only"]) !!}
                {!! Form::text("description", null, ["id" => "description-input", "class" => "form-control description", "placeholder" => "Descripci&oacute;n", "required"]) !!}
            </div>
        </div>

        <div class="row question">
            <div class="col-sm-11 question-data-wrapper">
                <div class="form-group inline-content">
                    {!! Form::label("question-title-input", "T&iacute;tulo de la pregunta") !!}
                    {!! Form::text("questionTitle", null, ["class" => "form-control question-title-input", "placeholder" => "T&iacute;tulo de ejemplo", "required"]) !!}
                </div>
                <div class="form-group inline-content">
                    {!! Form::label("question-type-input", "Tipo de pregunta") !!}
                    {!! Form::select("questionType", ["MultipleChoiceQuestionSingleOption" => "Multiple choice"], null, ["class" => "form-control question-type-input", "required"]) !!}
                </div>
                <div class="question-multiple-choice">
                    <div class="form-group option-multiple-choice normal-option">
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

            <div class="col-sm-1 question-actions">
                <button title="Borrar pregunta" type="button" class="btn delete-question" style="font-size: 25px;
    color: #585858;
    padding: 0px;
    background-color: transparent;">
                    <i class="fa fa-trash-o"></i>
                </button>
            </div>
        </div>

        <div class="under-question-container">
            <button id="add-question-button" type="button" class="btn btn-sm">Agregar pregunta</button>
        </div>

        <div class="add-file-container form-group">
            {!! Form::label("file-tosend", "Material devuelto") !!}
            {!! Form::file("attachedFile", ["id" => "file-tosend","multiple"]) !!}
            <p class="help-block">El archivo que se enviar&aacute; por mail luego de llenar el cuestionario</p>
        </div>

        <button id="send-new-questionnaire-button" type="submit" class="btn btn-success">Guardar</button>
        <span class="submit-feedback">Guardando cuestionario...</span>

    {!! Form::close() !!}

@endsection

@section("scripts")
    <script type="application/javascript" src="{{elixir('js/questionnaires.js')}}"></script>
    <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $("input[name='_token']").val()
        }
    });
    </script>
@endsection
