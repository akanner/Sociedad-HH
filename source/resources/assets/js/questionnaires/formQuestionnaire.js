/*jshint bitwise: false, camelcase: true, curly: true, eqeqeq: true, globals: false, freeze: true, immed: true, nocomma: true, newcap: true, noempty: true, nonbsp: true, nonew: true, quotmark: double, undef: true, unused: true, strict: true, latedef: true*/

/* globals $, console, window, document, FormData */

$(function () {
    "use strict";

    // ----------- SHARED VARIABLES

    var questionTypesTemplates = {
        "MultipleChoiceQuestionSingleOption": $("#multipleChoiceQuestionSingleOptionTemplate").html(),
        "MultipleSelectionQuestion": $("#multipleSelectionQuestionTemplate").html()
    };

    // Bye bye templates
    $("#multipleChoiceQuestionSingleOptionTemplate").remove();
    $("#multipleChoiceQuestionSingleOptionTemplate").remove();

    var modelQuestion = $(".question").clone(),
        questionNumber = 0;

    // ----------- FORM PROCESSING

    /* Returns an array of valid question types asociated with it handler */
    function questionHandlerForType() {
        return {
            "MultipleChoiceQuestionSingleOption": getJsonForMultipleChoiceQuestionSingleOption,
            "MultipleSelectionQuestion": getJsonForMultipleSelectionQuestion
        };
    }

    /* Returns the acronym (first letters in uppercase) for an input string */
    function getAcronym(fullString) {
        var splitValue = fullString.split(" "),
            acronym = "";

        // Visits the array of splited values and assembles the acronym
        for (var i = 0; i < splitValue.length; i++) {
            acronym += splitValue[i].charAt(0).toUpperCase();
        }

        return acronym;
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
                isOtherOption: selfOption.data("is-other-option")
            };

            question.options.push(option);
        });

        return question;
    }

    /* Makes a JSON from a multiple selection question */
    function getJsonForMultipleSelectionQuestion(questionElement) {
        var question = {
            title: questionElement.find(".question-title-input").val(),
            type: questionElement.find(".question-type-input").val(),
            possibleAnswers: [],
            subquestions: []
        };

        // Makes the array of possible options for the columns
        questionElement.find(".question-possible-value").each(function () {
            var selfPossibleValue = $(this),
                inputValue = selfPossibleValue.find("input").val().trim(),
                possibleValueObject = {
                    "description": inputValue,
                    "acronym": getAcronym(inputValue)
                };

            question.possibleAnswers.push(possibleValueObject);
        });

        question.possibleAnswers = JSON.stringify(question.possibleAnswers);

        // Makes the array with the suquestions and their options
        questionElement.find(".subquestion").each(function () {
            var selfSubquestion = $(this),
                subquestion = {
                    title: selfSubquestion.find(".subquestion-title").val(),
                    options: []
                };

            selfSubquestion.find(".option-multiple-selection-content").each(function () {
                subquestion.options.push({
                    description: $(this).val()
                });
            });

            question.subquestions.push(subquestion);
        });

        return question;
    }

    /* Makes a JSON from a question */
    function getJsonForQuestion(questionElement, formData) {
        var questionType = questionElement.find(".question-type-input").val(),
            jsonHandler = questionHandlerForType()[questionType],
            question = jsonHandler(questionElement);

        //files processing
        question.images = [];
        var images = questionElement.find("input[type='file']");
        //attaches all questionnaire's images
        images.each(function (index, element) {
            //gets the name of the input
            var name = element.name;
            //attaches every image per question
            for (var i = 0; i < element.files.length; i++) {

                // get item
                var image = element.files.item(i);
                var newName = name + "#" + i;
                formData.append(newName, image);
                question.images.push(newName);
            }

        });

        return question;
    }

    /* Parses the questionnaire form and returns it as JSON */
    function questionnaireFormToJSON(formData) {
        var questionnaire = {
            heading: $("#heading-input").val(),
            title: $("#title-input").val(),
            description: $("#description-input").val(),
            questions: []
        };

        // Any number of questions
        $(".question").each(function () {
            questionnaire.questions.push(getJsonForQuestion($(this), formData));
        });

        console.log(":: QUESTIONNAIRE: ", questionnaire);

        return questionnaire;
    }

    /* Changes the name from a multiple choice question option */
    function changeMultipleChoiceQuestionOptionName(question) {
        var mustChangeOption = question.find("[data-changeMyName]");

        mustChangeOption.each(function (index, element) {
            var currentName = $(element).prop("name");
            $(element).prop("name", currentName + questionNumber.toString());
        });

        questionNumber++;
    }

    function cloneMultipleChoiceOption(pressedButton) {
        var firstOption = $(pressedButton).parents(".question-multiple-choice").find(".normal-option").first(),
            clonedOption = firstOption.clone(true);

        clonedOption.find("input[type='radio']").attr("checked", false);
        clonedOption.find("input[type='text']").val("");

        var lastOption = $(pressedButton).parents(".question-multiple-choice").find(".normal-option").last();
        lastOption.after(clonedOption);

        return clonedOption;
    }

    function cloneMultipleSelectionOption(pressedButton) {
        var firstOption = $(pressedButton).parents(".subquestion").find(".option-multiple-selection-subquestion").first(),
            clonedOption = firstOption.clone(true);

        clonedOption.find("input[type='text']").val("");

        var lastOption = $(pressedButton).parents(".subquestion").find(".option-multiple-selection-subquestion").last();
        lastOption.after(clonedOption);

        return clonedOption;
    }

    function cloneMultipleSelectionSubquestion(pressedButton) {
        var firstSubquestion = $(pressedButton).parents(".question-multiple-selection").find(".subquestion").first(),
            clonedSubquestion = firstSubquestion.clone(true),
            options = clonedSubquestion.find(".option-multiple-selection-subquestion"),
            optionsSize = options.size();

        $.each(options, function () {
            var currentOption = $(this);
            // If there's more than 1, clear them
            if (optionsSize > 1) {
                currentOption.remove();
                optionsSize -= 1;
                // If it's the last one, clear the input
            } else {
                currentOption.find("input[type='text']").val("");
            }
        });

        clonedSubquestion.find(".subquestion-title").val("");

        var lastOption = $(pressedButton).parents(".question-multiple-selection").find(".subquestion").last();
        lastOption.after(clonedSubquestion);

        return clonedSubquestion;
    }

    function getFormData() {
        // Get the selected files from the input.
        var fileObject = $("#file-tosend").get(0).files[0];
        var formData = new FormData();
        var questionnaire = JSON.stringify(questionnaireFormToJSON(formData));

        formData.append('questionnaire', questionnaire);
        formData.append('attachedFile', fileObject);

        return formData;
    }

    function validateAcronymsRepeated() {
        var repeatedFound = false;

        $(".question").each(function () {
            var questionElement = $(this),
                repeatedAcronyms = [];

            questionElement.find(".question-possible-value").each(function () {
                var selfPossibleValue = $(this),
                    inputValue = selfPossibleValue.find("input").val().trim(),
                    acronym = getAcronym(inputValue);

                if (repeatedAcronyms.indexOf(acronym) !== -1) {
                    repeatedFound = true;
                } else {
                    repeatedAcronyms.push(acronym);
                }
            });
        });

        return !repeatedFound;
    }

    // ----------- USER INTERACTION

    /**
     * =============================================================
     * ====================== MULTIPLE CHOICE ======================
     * =============================================================
     */

    /* Deletes a multiple choice question option, if there is at least 1 option */
    $(".questionnaire-form").on("click", ".delete-option-button", function () {
        var optionsCount = $(this).parents(".question-multiple-choice").find(".normal-option").size();

        // If there is more than 1 option
        if (optionsCount > 1) {
            $(this).parent(".option-multiple-choice").remove();
        }
    });

    /* Deletes the "other" option of a multiple choice question */
    $(".questionnaire-form").on("click", ".delete-option-button", function () {
        var optionsCount = $(this).parents(".question-multiple-choice").find(".other-option-multiple-choice").size();

        // If there is more than 1 option
        if (optionsCount = 1) {
            $(this).parent(".other-option-multiple-choice").remove();
        }
    });

    /* Adds an option to a multiple choice question */
    $(".questionnaire-form").on("click", ".add-option-button", function () {
        var clonedOption = cloneMultipleChoiceOption(this);
        clonedOption.addClass("normal-option");
    });

    /* Adds the "other" option to a multiple choice question */
    $(".questionnaire-form").on("click", ".add-other-option-button", function () {
        var otherOptionIsActivated = $(this).parents(".question-multiple-choice").find(".other-option-multiple-choice").size();
        if (!otherOptionIsActivated) {
            var newOption = cloneMultipleChoiceOption(this);
            newOption.find("input[type='radio']");
            newOption.addClass("other-option-multiple-choice");
            newOption.removeClass("normal-option");
            newOption.find("input[type='text']").attr("readonly", true);
            newOption.find("input[type='text']").val("Otra");
            newOption.data("is-other-option", "true");
        }
    });

    /* Checks as true the selected option */
    $(".option-multiple-choice").on("click", "input[type='radio']", function () {
        // Uncheck every option from this question
        $(this).parents(".question-multiple-choice").find("input[type='radio']").prop("checked", false);
        // Check this one as correct
        $(this).prop("checked", true);
    });

    /**
     * =============================================================
     * ==================== MULTIPLE SELECTION =====================
     * =============================================================
     */

    /* Deletes a multiple selection subquestion option, if there is at least 1 option */
    $(".questionnaire-form").on("click", ".delete-option-multiple-selection-button", function () {
        var optionsCount = $(this).parents(".subquestion").find(".option-multiple-selection-subquestion").size();

        // If there is more than 1 option
        if (optionsCount > 1) {
            $(this).parent(".option-multiple-selection-subquestion").remove();
        }
    });

    /* Adds an option to a multiple selection subquestion */
    $(".questionnaire-form").on("click", ".add-option-multiple-selection-button", function () {
        cloneMultipleSelectionOption(this);
    });

    /* Deletes a multiple selection subquestion, if there is at least 1 subquestion */
    $(".questionnaire-form").on("click", ".delete-subquestion-button", function () {
        var subquestionsCount = $(this).parents(".question-multiple-selection").find(".subquestion").size();

        // If there is more than 1 option
        if (subquestionsCount > 1) {
            $(this).parents(".subquestion").remove();
        }
    });

    /* Adds a subquestion to a multiple selection question */
    $(".questionnaire-form").on("click", ".add-subquestion-multiple-selection-button", function () {
        var clonedSubquestion = cloneMultipleSelectionSubquestion(this);
    });

    /**
     * =============================================================
     * ======================= BODY AND FORM =======================
     * =============================================================
     */

    /* Removes the border shadow from the focused question */
    $("body").click(function () {
        $(".question").removeClass("black-border-shadow");
    });

    /* Duplicates a model multiple choice question and attachs it to the end of the questionnaire */
    $("#add-question-button").click(function () {
        var newQuestion = modelQuestion.clone(true);
        changeMultipleChoiceQuestionOptionName(newQuestion);

        $(".question").last().after(newQuestion);
        window.scrollTo(0, document.body.scrollHeight);
    });

    /* Adds the border shadow to the focused question */
    $(".questionnaire-form").on("click", ".question", function (event) {
        event.stopPropagation();
        $(".question").removeClass("black-border-shadow");
        $(this).addClass("black-border-shadow");
    });

    /* Deletes a question, if there is at least 1 question */
    $(".questionnaire-form").on("click", ".delete-question", function () {
        var questionsCount = $(this).parents(".questionnaire-form").find(".question").size();

        // If there is more than 1 question
        if (questionsCount > 1) {
            $(this).parents(".question").remove();
        }
    });

    /* Changes the new question type template */
    $(".questionnaire-form").on("change", ".question-type-input", function () {
        var questionTemplate = $(questionTypesTemplates[$(this).val()]);

        changeMultipleChoiceQuestionOptionName(questionTemplate);
        $(this).parents(".form-group").siblings(".question-loader").html(questionTemplate);
    });

    /* Creates a JSON for submiting the form and posts it to the server */
    $("#add-questionnaire-form").submit(function (event) {
        event.preventDefault();

        if (validateAcronymsRepeated()) {
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
                },
                error: function (data) {
                    sendButton.prop("disabled", false);
                    feedback.html("Ocurrió un error, intentalo nuevamente");
                    console.log("Error al enviar el formulario", data);
                }
            });
        } else {
            sweetAlert("Error en los valores de la pregunta", "Cada valor debe tener una letra inicial distinta.\n Por ejemplo, Muy relevante, Relevante, Poco relevante", "error");
        }

        return false;
    });

});
