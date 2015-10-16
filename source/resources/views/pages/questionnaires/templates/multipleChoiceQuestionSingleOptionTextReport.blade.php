<h4>{{$questionInfo->description}}</h4>

@foreach($questionInfo->options as $idOption => $optionInfo)
    <p>{{$optionInfo->description}} - {{$optionInfo->answersCount}}</p>
@endforeach
