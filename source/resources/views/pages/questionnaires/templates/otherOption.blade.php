@if($option->getIsOtherOption())
    {!! Form::text("question_" . $question->id . "_text") !!}
@endif
