<div class="multiple-choice-question-wrapper">
    @foreach ($question->getOptions() as $option)
    <div class="multiple-question-option-wrapper">
        <div class="radio">
            <label>
                {!! Form::radio("question_" . $question->id . "_option", $option->id, FALSE, ["required"]); !!} {{$option->getDescription()}}
                @include("pages.questionnaires.templates.otherOption",["option" => $option,"question" => $question])
            </label>
        </div>
    </div>
    @endforeach
</div>
