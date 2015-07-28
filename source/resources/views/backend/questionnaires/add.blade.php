@extends("backend.layout.main")
@section("title") Administraci&oacute;n :: @parent @endsection

@section("content")

<div class="row">
    {!! Form::open(array("action" => "EmailController@sendEmail")) !!}
        <div class="form-group">
            {!! Form::text("title", null,["id" => "title-input", "class" => "form-control", "placeholder" => "T&iacute;tulo", "required", "style" => "font-size:24px;"]) !!}
        </div>
        <div class="form-group">
            {!! Form::text("description", null,["id" => "description-input", "class" => "form-control", "placeholder" => "Descripci&oacute;n", "required", "style" => "font-size:18px;"]) !!}
        </div>

        <hr>

        <div class="form-group">
            {!! Form::label("question-title-input", "T&iacute;tulo de la pregunta") !!}
            {!! Form::text("questionTitle", null,["id" => "question-title-input", "class" => "form-control"]) !!}
        </div>
        <div class="form-group">
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
