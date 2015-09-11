<div class="multiple-selection-question-wrapper">
    @foreach ($question->getSubquestions() as $subquestion)
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>{{ $subquestion->getDescription() }}</th>
                    @foreach ($question->getDecodedPossibleAnswers() as $possibleAnswer)
                    <th title="{{ $possibleAnswer->description }}">
                        {{ $possibleAnswer->acronym }}
                    </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($subquestion->getOptions() as $option)
                    <tr>
                        <td class="with-left-padding">{{ $option->getDescription() }}</td>
                        @foreach ($question->getDecodedPossibleAnswers() as $possibleAnswer)
                        <td>
                            {!! Form::radio("question_" . $question->id . "[$option->id][option]", $possibleAnswer->acronym, FALSE, ["required"]); !!}
                        </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
</div>
