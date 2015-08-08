/*jshint bitwise: false, camelcase: true, curly: true, eqeqeq: true, globals: false, freeze: true, immed: true, nocomma: true, newcap: true, noempty: true, nonbsp: true, nonew: true, quotmark: double, undef: true, unused: true, strict: true, latedef: true*/

/* globals $, console */

$(function () {
    "use strict";

    // ----------- USER INTERACTION

    $(".add-option-button").click(function () {
        var optionToClone = $(this).parents(".add-option-multiple-choice").siblings(".option-multiple-choice").last(),
            clonedOption = optionToClone.clone(true);

        clonedOption.find("input[type='radio']").attr("checked", false);
        clonedOption.find("input[type='text']").val("");

        optionToClone.after(clonedOption);
    });

    $(".question").on("click", ".delete-option-button", function () {
        var optionsCount = $(".option-multiple-choice").size();

        if (optionsCount > 1) {
            $(this).parent(".option-multiple-choice").remove();
        }
    });

    $(".questionnaire-form").on("click", ".question", function (event) {
        event.stopPropagation();
        $(".question").removeClass("black-border-shadow");
        $(this).addClass("black-border-shadow");
    });

    $("body").click(function () {
        $(".question").removeClass("black-border-shadow");
    });

    $(".option-multiple-choice").on("click", "input[type='radio']", function () {
        $(this).parents(".question-multiple-choice").find("input[type='radio']").prop("checked", false);
        $(this).prop("checked", true);
    });

    // ----------- FORM PROCESSING

    function questionHandlerForType() {
        return {
            "MultipleChoiceQuestionSingleOption" : getJsonForMultipleChoiceQuestionSingleOption
        };
    }

    function getJsonForMultipleChoiceQuestionSingleOption(questionElement) {
        var question = {
            title: questionElement.find(".question-title-input").val(),
            type: questionElement.find(".question-type-input").val(),
            options: []
        };

        questionElement.find(".option-multiple-choice").each(function () {
            var selfOption = $(this);
            var option = {
                description: selfOption.find("input[type='text']").val(),
                isCorrect: selfOption.find("input[type='radio']").prop("checked")
            };

            question.options.push(option);
        });

        return question;
    }

    function getJsonForQuestion(questionElement) {
        var questionType = questionElement.find(".question-type-input").val(),
            jsonHandler = questionHandlerForType()[questionType];

        return jsonHandler(questionElement);
    }

    function questionnaireFormToJSON() {
        var questionnaire = {
            title: $("#title-input").val(),
            description: $("#description-input").val(),
            questions: []
        };

        // Any number of questions
        $(".question").each(function () {
            questionnaire.questions.push(getJsonForQuestion($(this)));
        });

        //adds csrf token to the request
        return {'questionnaire': questionnaire,'_token': $("input[name='_token']").val()};
    }

    $("#add-questionnaire-form").submit(function (event) {
        event.preventDefault();
        var postUrl = $(this).attr("action");

        console.log("::: JSON => ", questionnaireFormToJSON());
        $.post(postUrl, questionnaireFormToJSON(), function (result) {
            console.log("::: POST RESULT => ", result);
        });
        return false;
    });

});
