@foreach ($question->getOptions() as $option)
    <div class="multipleQuestionOption">
        {!! Form::radio("question_" . $question->id . "[option]", $option->id,FALSE,["required"]); !!} {{$option->getDescription()}}
        @include("pages.questionnaires.templates.otherOption",["option" => $option,"question" => $question])
    </div>
@endforeach
