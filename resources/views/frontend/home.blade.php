@include('layouts.front_header')
<div class="bodySec">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="homeTxt">
                        <h2>Deep Index
                        <span><?php echo number_format($deepIndex); ?> </span></h2>
                        <h6>Predicted close value of Dow Jones Industrial Average for <?php
                        $d = strtotime($deepIndexDate);
                        echo date('F jS, Y',$d);
                        ?> </h6>
                        <div class="homeGraph">
							<div id="container"></div>
                        </div>
                        <div class="nextPredictions">
                            <h6>Enter a stock to view next day price predictions</h6>
                            <div class="field">
                                <input type="text" name="" placeholder="Stock Symbol">
                                <input type="submit" value="View" name="">
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    @include('layouts.front_footer')

<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
<script src="https://code.highcharts.com/stock/modules/export-data.js"></script>
<script src="https://code.highcharts.com/stock/modules/data.js"></script>
<script  src="deeptrading_frontend/script.js"></script>

<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
<script>
window.onload = function () {

var options = {
	animationEnabled: true,
	backgroundColor: "#282d3a",
	theme: "light2",
	title:{
		// text: "Actual vs Projected Sales"
	},
	axisX:{
		valueFormatString: "MMM DD"
	},
	axisY: {
		//title: "Number of Sales",
		//suffix: "K",
		minimum: 30,
		gridColor: "#62666f"
	},
	toolTip:{
		shared: true
	},  
	legend:{
		cursor:"pointer",
		verticalAlign: "bottom",
		horizontalAlign: "left",
		dockInsidePlotArea: true,
		itemclick: toogleDataSeries
	},

	data: [{
		type: "line",
		showInLegend: false,
		name: "Projected Sales",
		markerType: "circle",
		xValueFormatString: "DD MMM, YYYY",
		color: "#f53137",
		yValueFormatString: "#,##0K",
		dataPoints: [
			'<?php echo implode( ', ', $myArray ); ?>'
		]
	},
	{
		type: "line",
		showInLegend: false,
		name: "Actual Sales",
		markerType: "circle",
		color: "#0cc445",
		//lineDashType: "dash",
		yValueFormatString: "#,##0K",
		dataPoints: [
			'<?php echo implode( ', ', $pmyArray ); ?>'
		]
	}]
};
$("#chartContainer").CanvasJSChart(options);

function toogleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	} else{
		e.dataSeries.visible = true;
	}
	e.chart.render();
}

}
</script>

</body>
</html>