<h4>{{$questionInfo->description}}</h4>

@foreach($questionInfo->options as $idOption => $optionInfo)
    <p><span class="multiple-choice-option-description">{{$optionInfo->description}}:</span> {{$optionInfo->answersCount}} respuestas</p>
@endforeach
