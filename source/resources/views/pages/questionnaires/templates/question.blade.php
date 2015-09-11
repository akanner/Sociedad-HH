<p>{{$questionNumber}}. {{$question->getDescription()}}</p>
<div class="question-images-wrapper clearfix">
    @foreach ($question->getPictures() as $picture)
    <div class="question-img">
        <img src="{{asset($picture->getPath())}}" alt="" />
    </div>
    @endforeach
</div>
@include($question->getTemplateName(),['question'=>$question])
