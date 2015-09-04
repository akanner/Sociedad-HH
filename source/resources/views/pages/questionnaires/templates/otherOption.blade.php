@if($option->getIsOtherOption())
    {!! Form::text("question_" . $question->id . "_text", null, ["class" => "form-control", "required"]) !!}
@endif
