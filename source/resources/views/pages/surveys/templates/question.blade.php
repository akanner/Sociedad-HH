<h4>{{$questionNumber}}.{{$question->getDescription()}}</h4>
<p>
    @foreach ($question->getPictures() as $picture)
        <div class="question-img">
            <img src="{{asset($picture->getPath())}}" alt="" />
        </div>

    @endforeach
</p>
@include($question->getTemplateName(),['question'=>$question])
