@foreach ($question->getOptions() as $option)
  <div class="multipleQuestionOption">
    {!! Form::checkbox("question_" . $question->id . "_option[]", $option->id, false) !!} {{$option->getDescription()}}
    @include("pages.questionnaires.templates.otherOption",["option" => $option,"question" => $question])
  </div>
@endforeach
