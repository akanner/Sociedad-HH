@extends("backend.layout.main")
@section("title") Administraci&oacute;n :: @parent @endsection

@section("content")

<div class="row">
    {!! Form::open(array("action" => "EmailController@sendEmail", "class" => "questionnaire-form")) !!}

        <div class="form-group">
            {!! Form::label("title-input", "T&iacute;tulo", ["class" => "sr-only"]) !!}
            {!! Form::text("title", null,["id" => "title-input", "class" => "form-control title", "placeholder" => "T&iacute;tulo", "required"]) !!}
        </div>
        <div class="form-group">
            {!! Form::label("description-input", "Descripci&oacute;n", ["class" => "sr-only"]) !!}
            {!! Form::text("description", null,["id" => "description-input", "class" => "form-control description", "placeholder" => "Descripci&oacute;n", "required"]) !!}
        </div>

        <hr>

        <div class="form-group inline-content">
            {!! Form::label("question-title-input", "T&iacute;tulo de la pregunta") !!}
            {!! Form::text("questionTitle", null,["id" => "question-title-input", "class" => "form-control"]) !!}
        </div>
        <div class="form-group inline-content">
            {!! Form::label("question-type-input", "Tipo de pregunta") !!}
            {!! Form::select("questionType", ["1" => "Multiple choice"], null,["id" => "question-type-input", "class" => "form-control", "required"]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('penyakit-0', "Opcion 1") !!}
            {!! Form::radio("questionValue", "1") !!}
            {!! Form::radio("questionValue", "2") !!}
            {!! Form::radio("questionValue", "3") !!}
        </div>
        <button type="submit" class="btn btn-error">Enviar</button>

    {!! Form::close() !!}
</div>


@endsection
