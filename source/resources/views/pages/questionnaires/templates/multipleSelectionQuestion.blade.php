<div class="multiple-selection-question-wrapper">
    <script>
        var a = JSON.parse('{!! $question->getPossibleAnswers() !!}');

        console.log(a);
    </script>
    {{ var_dump($question->getPossibleAnswers()) }}
    {{ var_dump($question->getDecodedPossibleAnswers()) }}
    <br>
    @foreach ($question->getSubquestions() as $subquestion)
        {{ $subquestion->getDescription() }}

        @foreach ($subquestion->getOptions() as $option)
            {{ $option->getDescription() }}
        @endforeach
    @endforeach
</div>
