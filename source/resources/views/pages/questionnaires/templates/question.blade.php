<p>{{$questionNumber}}. {{$question->getDescription()}}</p>
<div class="question-images-wrapper clearfix">
    @foreach ($question->getPictures() as $picture)
    <div class="question-img">
        <a class="fancybox" rel="gallery{{$questionNumber}}" href="{{asset($picture->getPath())}}">
            <img src="{{asset($picture->getPath())}}" alt="" />
        </a>
    </div>
    @endforeach
</div>
@include($question->getTemplateName(),['question'=>$question])
