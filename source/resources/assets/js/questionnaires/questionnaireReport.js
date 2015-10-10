/* jshint bitwise: false, camelcase: true, curly: true, eqeqeq: true, globals: false, freeze: true, immed: true, nocomma: true, newcap: true, noempty: true, nonbsp: true, nonew: true, quotmark: double, undef: true, unused: true, strict: true, latedef: true */

/* globals $, console, document, Chart */

$(function () {
    "use strict";

    // ----------- COLOR HELPER
    // Color Helper object that serves the next chart color and highlight values

    var colorHelper = {
        colorIndex : 0,
        colorObjects : [
            {color: "#F7464A", highlight: "#FF5A5E"},
            {color: "#46BFBD", highlight: "#5AD3D1"},
            {color: "#FDB45C", highlight: "#FFC870"},
            {color: "#5B90BF", highlight: "#78B0E2"},
            {color: "#a3be8c", highlight: "#B4D29B"},
            {color: "#b48ead", highlight: "#CCA2C4"},
        ],

        getNextColor : function() {
            var colorObject = this.colorObjects[this.colorIndex];
            this.colorIndex++;
            if(this.colorIndex === this.colorObjects.length - 1) {
                this.colorIndex = 0;
            }

            return colorObject;
        },

        getEmptyColor : function() {
            return { color : "#EEE", highlight: "#EEE" };
        }
    };

    // ----------- VIEW SETUP
    var questionChartElement = $(".question-chart"),
        reportInfo = JSON.parse($("#report-info").val().trim());

    console.log(":: reportInfo", reportInfo);

    // Removes the info input from the DOM
    $("#report-info").remove();

    $.each(reportInfo, function(index, currentQuestion) {
        var questionReportObject = { optionsData : [], description : currentQuestion.description },
            currentChartElement = questionChartElement,
            canvas = currentChartElement.find(".chart").get(0),
            ctx = canvas.getContext("2d");

        console.log(currentChartElement);
        $.each(currentQuestion.options, function(index, currentOption) {
            var optionReportObject = {},
                colorObject = {};

            optionReportObject.value = currentOption.answersCount;
            optionReportObject.label = currentOption.description;

            if(optionReportObject.value >= 0) {
                colorObject = colorHelper.getNextColor();
            }
            else {
                colorObject = colorHelper.getEmptyColor();
            }

            optionReportObject.color = colorObject.color;
            optionReportObject.highlight = colorObject.highlight;

            questionReportObject.optionsData.push(optionReportObject);
        });

        // Sets the question title
        currentChartElement.find(".title").html(questionReportObject.description);

        // Builds the chart for the current question
        var chart = new Chart(ctx).Doughnut(questionReportObject.optionsData, {
            animateRotate: false,
            tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %> respuestas",
            animation: false
        });

        // ----------- USER INTERACTION

        /* Legend hover highlight */
        // Tira algunas magias locas de Chart... no discuto los resultados
        // pero tampoco estoy muy seguro de todo lo que hace
        var legendHolder = document.createElement("div");
        var helpers = Chart.helpers;
        legendHolder.innerHTML = chart.generateLegend();
        // Include a html legend template after the module doughnut itself
        helpers.each(legendHolder.firstChild.childNodes, function (legendNode, index) {
            helpers.addEvent(legendNode, "mouseover", function () {
                var activeSegment = chart.segments[index];
                activeSegment.save();
                activeSegment.fillColor = activeSegment.highlightColor;
                chart.showTooltip([activeSegment]);
                activeSegment.restore();
            });
        });
        helpers.addEvent(legendHolder.firstChild, "mouseout", function () {
            chart.draw();
        });
        canvas.parentNode.appendChild(legendHolder.firstChild);

        return false;
    });
});
