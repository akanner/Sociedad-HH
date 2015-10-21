<h4>{{$questionInfo->description}}</h4>

@foreach($questionInfo->subquestions  as $key => $subquestionInfo)
    <h5>{{$subquestionInfo->description}}</h5>

    <table class="table">
        <thead>
            <tr>
                <th>{{$questionInfo->description}}</th>
                @foreach ($questionInfo->possibleAnswers as $possibleAnswer)
                <th title="{{ $possibleAnswer->description }}">
                    {{ $possibleAnswer->acronym }}
                </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($subquestionInfo->options as $option)
                <tr>
                    <td class="with-left-padding">{{ $option->description }}</td>
                    @foreach ($questionInfo->possibleAnswers as $possibleAnswer)
                    <td>
                        {{$option->answersCount[$possibleAnswer->acronym]}}
                    </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
@endforeach
