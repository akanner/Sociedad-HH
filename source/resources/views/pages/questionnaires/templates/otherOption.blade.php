@if($option->getIsOtherOption())
    {!! Form::text("question_" . $question->id . "[text]", null, ["class" => "form-control", "required"]) !!}
@endif
