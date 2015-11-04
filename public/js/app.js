(function () {

    google.load('visualization', '1', {packages: ['corechart']});
    google.setOnLoadCallback(function () {
        angular.bootstrap(document.body, ['app'])
    });


    var app = angular.module('app', []);

    app.controller('ChartController', ['$scope', function ($scope) {
            var data = google.visualization.arrayToDataTable([
                ['Year', 'Sales', 'Expenses'],
                ['2004', 1000, 400],
                ['2005', 1170, 460],
                ['2006', 660, 1120],
                ['2007', 1030, 540]
            ]);
            var options = {
                title: 'Company Performance'
            };

            var chart = new google.visualization.LineChart(document.getElementById('chart-ang'));

            chart.draw(data, options);
        }]);

    app.controller('ChartControllerBubble', ['$scope', '$http', function ($scope, $http) {

            $http.get('http://localhost/laracast/public/charts/getchart').success(function (dataJson) {
               
                var data = new google.visualization.DataTable(dataJson);                          
                
                var options = {
                    title: 'Company Email performance'
                };

                var chart = new google.visualization.LineChart(document.getElementById('series_chart_div'));
                chart.draw(data, options);

            });

        }]);
})();

