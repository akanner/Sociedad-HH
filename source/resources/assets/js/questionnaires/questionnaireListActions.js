$(function() {


    //TODO agregar una calse al tr y preguntar en un each si esta activo o no
    function deleteQuestionnaire(id,url)
    {
        return $.post( url, { 'questionnaireId': id, 'status': 0 } );
    }

    function activateQuestionnaire(id,url)
    {
        return $.post( url, { 'questionnaireId': id, 'status': 1 } );
    }

    function showButtonForActivation(htmlElement)
    {
        $(htmlElement).find(".activate-questionnaire").show();
        $(htmlElement).find(".delete-questionnaire").hide();
    }

    function showButtonForDeletion(htmlElement)
    {
        $(htmlElement).find(".activate-questionnaire").hide();
        $(htmlElement).find(".delete-questionnaire").show();
    }


    $(".delete-questionnaire").click(function()
    {
        var url = $(this).data("url");
        var questionnaireId = $(this).data("id");
        var myParent =$(this).parent();
        deleteQuestionnaire(questionnaireId,url).done(
            function(response)
            {
                showButtonForActivation(myParent);
            }
        );
    });

    $(".activate-questionnaire").click(function()
    {
        var url = $(this).data("url");
        var questionnaireId = $(this).data("id");
        var myParent =$(this).parent();
        activateQuestionnaire(questionnaireId,url).done(
            function(response)
            {
                console.log(myParent);
                showButtonForDeletion(myParent);
            }
        );
    });



});
