/*jshint bitwise: false, camelcase: true, curly: true, eqeqeq: true, globals: false, freeze: true, immed: true, nocomma: true, newcap: true, noempty: true, nonbsp: true, nonew: true, quotmark: double, undef: true, unused: true, strict: true, latedef: true*/

/* globals $, console, window, document, FormData */

$(function () {
    "use strict";

    // ----------- FORM PROCESSING

    /* Returns an array of valid question types asociated with it handler */
    function questionHandlerForType() {
        return {
            "MultipleChoiceQuestionSingleOption": getJsonForMultipleChoiceQuestionSingleOption
        };
    }

    /* Makes a JSON from a multiple choice question */
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
                isCorrect: selfOption.find("input[type='radio']").prop("checked"),
                isOtherOption: false
            };

            question.options.push(option);
        });

        return question;
    }

    /* Makes a JSON from a question */
    function getJsonForQuestion(questionElement) {
        var questionType = questionElement.find(".question-type-input").val(),
            jsonHandler = questionHandlerForType()[questionType];

        return jsonHandler(questionElement);
    }

    /* Parses the questionnaire form and returns it as JSON */
    function questionnaireFormToJSON() {
        var questionnaire = {
            heading: $("#heading-input").val(),
            title: $("#title-input").val(),
            description: $("#description-input").val(),
            questions: []
        };

        // Any number of questions
        $(".question").each(function () {
            questionnaire.questions.push(getJsonForQuestion($(this)));
        });

        console.log(":: QUESTIONNAIRE: ", questionnaire);
        return questionnaire;
    }

    // ----------- USER INTERACTION

    var modelQuestion = $(".question").clone(),
        questionNumber = 0;

    var modelOption = $(".question").find(".option-multiple-choice").first();

    /* Removes the border shadow from the focused question */
    $("body").click(function () {
        $(".question").removeClass("black-border-shadow");
    });

    /* Duplicates a model multiple choice question and attachs it to the end of the questionnaire */
    $("#add-question-button").click(function () {
        var newQuestion = modelQuestion.clone(true),
            mustChangeOption = newQuestion.find("[data-changeMyName]"),
            currentName = mustChangeOption.prop("name");

        // console.log("::: FIRST NAME ", currentName);
        mustChangeOption.prop("name", currentName + questionNumber.toString());
        // console.log("::: AFTER NAME ", mustChangeOption.prop("name"));
        questionNumber++;

        $(".question").last().after(newQuestion);
        window.scrollTo(0, document.body.scrollHeight);
    });

    /* Adds the border shadow to the focused question */
    $(".questionnaire-form").on("click", ".question", function (event) {
        event.stopPropagation();
        $(".question").removeClass("black-border-shadow");
        $(this).addClass("black-border-shadow");
    });

    /* Deletes a multiple choice question option, if there is at least 1 option */
    $(".questionnaire-form").on("click", ".delete-option-button", function () {
        var optionsCount = $(this).parents(".question-multiple-choice").find(".option-multiple-choice").size();

        // If there is more than 1 option
        if (optionsCount > 1) {
            $(this).parent(".option-multiple-choice").remove();
        }
    });

    /* Deletes a question, if there is at least 1 question */
    $(".questionnaire-form").on("click", ".delete-question", function () {
        var questionsCount = $(this).parents(".questionnaire-form").find(".question").size();

        // If there is more than 1 option
        if (questionsCount > 1) {
            $(this).parents(".question").remove();
        }
    });

    /* Adds an option to a multiple choice question */
    $(".questionnaire-form").on("click", ".add-option-button", function () {
        cloneMultipleChoiceOption(this);
    });

    $(".questionnaire-form").on("click", ".add-other-option-button", function () {
        console.log("other option");
        var newOption = cloneMultipleChoiceOption(this);
        newOption.find("input[type='radio']").after("<label>Otra:</label>");
        newOption.addClass("other-option-multiple-choice");
        newOption.find("input[type='text']").attr("readonly", true);


    });

    function cloneMultipleChoiceOption(pressedButton) {
        var lastOption = $(pressedButton).parents(".add-option-multiple-choice").siblings(".option-multiple-choice").last();
        var clonedOption = modelOption.clone(true);

        clonedOption.find("input[type='radio']").attr("checked", false);
        clonedOption.find("input[type='text']").val("");
        lastOption.after(clonedOption);
        return clonedOption;

    }

    $(".option-multiple-choice").on("click", "input[type='radio']", function () {
        // Uncheck every option from this question
        $(this).parents(".question-multiple-choice").find("input[type='radio']").prop("checked", false);
        // Check this one as correct
        $(this).prop("checked", true);
    });


    function getFormData() {
        // Get the selected files from the input.
        var fileObject = $("#file-tosend").get(0).files[0];
        var questionnaire = JSON.stringify(questionnaireFormToJSON());

        var formData = new FormData();


        console.log(":: fileS ", fileObject);

        formData.append('questionnaire', questionnaire);
        formData.append('attachedFile', fileObject);
        return formData;
    }

    /* Creates a JSON for submiting the form and posts it to the server */
    $("#add-questionnaire-form").submit(function (event) {
        event.preventDefault();
        var postUrl = $(this).attr("action"),
            fileFormData = getFormData(),
            sendButton = $("#send-new-questionnaire-button"),
            feedback = $(".submit-feedback");

        console.log(":: FORM DATA:: ", fileFormData);

        // Some UI feedback

        sendButton.prop("disabled", true);
        feedback.show();


        $.ajax({
            url: postUrl,
            data: fileFormData,
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            success: function (data) {
                //console.log("::: POST RESULT => ", result);
                var result = JSON.parse(data);
                if (result.statusOk) {
                    feedback.html("Listo! Cuestionario guardado");
                    window.setTimeout(function () {
                        window.location.replace("/adminhh/encuestas");
                    }, 3000);
                } else {
                    sendButton.prop("disabled", false);
                    feedback.html("Ocurrió un error, intentalo nuevamente");
                }
            }
        });
        return false;
    });

});
