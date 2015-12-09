@extends("backend.layout.main")
@section("title") Administraci&oacute;n :: @parent @endsection

@section("page-header")
    Nuevo cuestionario
@endsection

@section("content")

    <!-- Recuperamos los templates de cada tipo de pregunta para guardarlo en el javascript
    y despues poder clonar las preguntas desde un "modelo" -->

    <div id="multipleChoiceQuestionSingleOptionTemplate" class="hidden">
        @include("backend.questionnaires.templates.multipleChoiceQuestionSingleOption")
    </div>
    <div id="multipleSelectionQuestionTemplate" class="hidden">
        @include("backend.questionnaires.templates.multipleSelectionQuestion")
    </div>

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
                    {!! Form::select("questionType", [
                        "MultipleChoiceQuestionSingleOption" => "Multiple choice",
                        "MultipleSelectionQuestion" => "Tipo tabla"
                    ], null, ["class" => "form-control question-type-input", "required"]) !!}
                </div>

                <div class="question-loader">
                    @include("backend.questionnaires.templates.multipleChoiceQuestionSingleOption")
                </div>

            </div>

            <div class="col-sm-1 question-actions">
                <button title="Borrar pregunta" type="button" class="btn delete-question">
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

        <button id="send-new-questionnaire-button" type="submit" class="btn btn-success">Publicar</button>
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
