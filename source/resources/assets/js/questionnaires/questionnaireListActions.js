/* jshint bitwise: false, camelcase: true, curly: true, eqeqeq: true, globals: false, freeze: true, immed: true, nocomma: true, newcap: true, noempty: true, nonbsp: true, nonew: true, quotmark: double, undef: true, unused: true, strict: true, latedef: true */

/* globals $, console */

$(function() {
    "use strict";

    // Show the finish or activate button for each questionnaire
    $.each($("tr.questionnaire-row"), function() {
        var isActive = $(this).data("status"),
            elementToShow = isActive ? $(this).find(".delete-questionnaire") : $(this).find(".activate-questionnaire");

        elementToShow.show();
    });

    function flagQuestionnaireAs(domElement, status) {
        var url = domElement.data("url"),
            id = domElement.siblings("a").data("id");

        return $.post( url, { "questionnaireId": id, "status": status } );
    }

    $(".delete-questionnaire").click(function()
    {
        var myParent = $(this).parent();
        flagQuestionnaireAs($(this), 0).done(
            function() {
                myParent.find(".activate-questionnaire").show();
                myParent.find(".delete-questionnaire").hide();
            }
        );
    });

    $(".activate-questionnaire").click(function()
    {
        var myParent = $(this).parent();
        flagQuestionnaireAs($(this), 1).done(
            function() {
                myParent.find(".activate-questionnaire").hide();
                myParent.find(".delete-questionnaire").show();
            }
        );
    });

    $(".invite-user").click(function()
    {
        inviteUser($(this));

    });

    function inviteUser(domElement)
    {
        var url =domElement.data("url");
        console.log(url);
        return $.get(url);
    }

});
