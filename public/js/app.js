(function () {

    google.load('visualization', '1', {packages: ['corechart', 'bar']});
    google.setOnLoadCallback(function () {
        angular.bootstrap(document.body, ['app']);
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

    app.controller('ChartControllerLine', ['$scope', '$http', function ($scope, $http) {

            $scope.url = 'http://localhost/laracast/public/charts/getchart';


            $http.get($scope.url).success(function (dataJson) {
                var data = new google.visualization.DataTable(dataJson);
                var options = {
                    title: 'Company Email Sent/day'
                };
                var i;
                var items = document.getElementsByClassName('series_chart');
                for(i=0;i<items.length;i++){
                    var chart = new google.visualization.LineChart(items[i]);
                    chart.draw(data, options);
                }
            });

            $scope.changeRange = function () {
                var parameters = '?from=' + $scope.dateFrom + '&to=' + $scope.dateTo;

                $http.get($scope.url + parameters).success(function (dataJson) {
                    var data = new google.visualization.DataTable(dataJson);
                    var options = {
                        title: 'Company Email Sent/day'
                    };
                    var chart = new google.visualization.LineChart(document.getElementById('series_chart_div'));
                    chart.draw(data, options);
                });
            };

            $scope.test = function ($scope) {
                console.log($scope.divid);
            };

        }]);

    app.controller('ChartControllerColumn', ['$scope', '$http', function ($scope, $http) {

            $http.get('http://localhost/laracast/public/charts/getchartColumn').success(function (dataJson) {

                var data = new google.visualization.DataTable(dataJson);

                var options = {
                    chart: {
                        title: 'Total email Open/Day',
                        subtitle: 'Total email Open',
                    }
                };

                var chart = new google.charts.Bar(document.getElementById('series_chart_column'));
                chart.draw(data, options);

            });

        }]);
})();

