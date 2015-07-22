@if($option->getIsOtherOption())
    {!! Form::text("question_" . $question->id . "_otherOption") !!}
@endif
