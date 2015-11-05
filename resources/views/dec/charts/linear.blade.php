<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}"/>
        <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.css') }}"/>
        <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}"/>
        <style>.container {
                width: 600px;
                height: 300px;
            }</style>
    </head>
    <body>


        <script type="text/javascript" src="js/angular.min.js"></script>
        <script type="text/javascript" src="js/angular-route.min.js"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>

        <script type="text/javascript" src="js/app.js"></script>

        <script type="text/javascript">
        google.load('visualization', '1', {packages: ['corechart']});
        google.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Year', 'Sales', 'Expenses'],
                ['2004', 1000, 400],
                ['2005', 1170, 460],
                ['2006', 660, 1120],
                ['2007', 1030, 540],
                ['2008', 1030, 540],
                ['2009', 1030, 540],
            ]);
            var options = {
                title: 'Company Performance'
            };

            var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
        </script>
        <div id="chart_div"></div>

        <div ng-controller="ChartControllerLine" id="series_chart_div"></div>
        <div ng-controller="ChartControllerColumn" id="series_chart_column"></div>
    </body>
</html>

