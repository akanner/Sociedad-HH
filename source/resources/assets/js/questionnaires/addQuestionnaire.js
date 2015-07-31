/* globals $, console */

$(function () {

    $("#add-choice-button").click(function (event) {
        var optionToClone = $(".question-multiple-choice").last(),
            clonedOption = optionToClone.clone();

        clonedOption.find("input[type='radio']").attr("checked", false);
        clonedOption.find("input[type='text']").val("");

        optionToClone.after(clonedOption);
    });

    $(".question").on("click", ".delete-choice-button", function (event) {
        var choicesCount = $(".question-multiple-choice").size();

        if (choicesCount > 1) {
            $(this).parent(".question-multiple-choice").remove();
        }
    });

    $(".questionnaire-form").on("click", ".question", function (event) {
        event.stopPropagation();
        $(".question").removeClass("black-border-shadow");
        $(this).addClass("black-border-shadow");
    });

    $("body").click(function (event) {
        $(".question").removeClass("black-border-shadow");
    });

});
