@foreach ($question->getOptions() as $option)
  <div class="multipleQuestionOption">
    <input type="radio" name="question_{{$question->id}}" value="{{$option->id}}"> {{$option->getDescription()}}
    @include("pages.surveys.templates.otherOption",["option" => $option,"question" => $question])
  </div>
@endforeach
