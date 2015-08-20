$(function() {
    var reportInfo = $('#report-info').val().trim();
    console.log(reportInfo);
    // Get context with jQuery - using jQuery's .get() method.
    var canvas = $("#myChart").get(0);
    var ctx = canvas.getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var myNewChart = new Chart(ctx);
    var data = [
        {
            value: 300,
            color:"#F7464A",
            highlight: "#FF5A5E",
            label: "Red"
        },
        {
            value: 50,
            color: "#46BFBD",
            highlight: "#5AD3D1",
            label: "Green"
        },
        {
            value: 100,
            color: "#FDB45C",
            highlight: "#FFC870",
            label: "Yellow"
        }
    ];

    var options = {
        //Boolean - Whether we animate the rotation of the Doughnut
        animateRotate : false,

        //String - A legend template
        //legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
    };

    var data = [
        {
            value: 300,
            color:"#F7464A",
            highlight: "#FF5A5E",
            label: "Red"
        },
        {
            value: 50,
            color: "#46BFBD",
            highlight: "#5AD3D1",
            label: "Green"
        },
        {
            value: 100,
            color: "#FDB45C",
            highlight: "#FFC870",
            label: "Yellow"
        }
    ];
    var moduleDoughnut = new Chart(ctx).Doughnut(data, options);

    var legendHolder = document.createElement('div');
    var helpers = Chart.helpers;
    legendHolder.innerHTML = moduleDoughnut.generateLegend();
    // Include a html legend template after the module doughnut itself
    helpers.each(legendHolder.firstChild.childNodes, function(legendNode, index){
        helpers.addEvent(legendNode, 'mouseover', function(){
            var activeSegment = moduleDoughnut.segments[index];
            activeSegment.save();
            activeSegment.fillColor = activeSegment.highlightColor;
            moduleDoughnut.showTooltip([activeSegment]);
            activeSegment.restore();
        });
    });
    helpers.addEvent(legendHolder.firstChild, 'mouseout', function(){
        moduleDoughnut.draw();
    });
    canvas.parentNode.parentNode.appendChild(legendHolder.firstChild);
});

/*
// Modular doughnut
	(function(){

		var canvas = $id('modular-doughnut'),
			colours = {
				"Core": blue,
				"Line": orange,
				"Bar": teal,
				"Polar Area": purple,
				"Radar": brown,
				"Doughnut": green
			};

		var moduleData = [

			{
				value: 7.57,
				color: colours["Core"],
				highlight: Colour(colours["Core"], 10),
				label: "Core"
			},

			{
				value: 1.63,
				color: colours["Bar"],
				highlight: Colour(colours["Bar"], 10),
				label: "Bar"
			},

			{
				value: 1.09,
				color: colours["Doughnut"],
				highlight: Colour(colours["Doughnut"], 10),
				label: "Doughnut"
			},

			{
				value: 1.71,
				color: colours["Radar"],
				highlight: Colour(colours["Radar"], 10),
				label: "Radar"
			},

			{
				value: 1.64,
				color: colours["Line"],
				highlight: Colour(colours["Line"], 10),
				label: "Line"
			},

			{
				value: 1.37,
				color: colours["Polar Area"],
				highlight: Colour(colours["Polar Area"], 10),
				label: "Polar Area"
			}

		];
		//
		var moduleDoughnut = new Chart(canvas.getContext('2d')).Doughnut(moduleData, { tooltipTemplate : "<%if (label){%><%=label%>: <%}%><%= value %>kb", animation: false });
		//
		var legendHolder = document.createElement('div');
		legendHolder.innerHTML = moduleDoughnut.generateLegend();
		// Include a html legend template after the module doughnut itself
		helpers.each(legendHolder.firstChild.childNodes, function(legendNode, index){
			helpers.addEvent(legendNode, 'mouseover', function(){
				var activeSegment = moduleDoughnut.segments[index];
				activeSegment.save();
				activeSegment.fillColor = activeSegment.highlightColor;
				moduleDoughnut.showTooltip([activeSegment]);
				activeSegment.restore();
			});
		});
		helpers.addEvent(legendHolder.firstChild, 'mouseout', function(){
			moduleDoughnut.draw();
		});
		canvas.parentNode.parentNode.appendChild(legendHolder.firstChild);

	})();
*/
