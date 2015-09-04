@if($option->getIsOtherOption())
    {!! Form::text("question_" . $question->id . "[text]") !!}
@endif
