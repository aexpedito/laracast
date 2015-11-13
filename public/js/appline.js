(function () {

    google.load('visualization', '1', {packages: ['corechart', 'bar']});
    google.setOnLoadCallback(function () {

    });

    var app = angular.module('appline', [], function ($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });

    app.controller('ChartLineController', ['$scope', '$http', function ($scope, $http) {

            $scope.baseurl = 'http://localhost/laracast/public/charts/getchart';
            $scope.chartClassName = 'series_line_chart';
            $scope.chartOptions = {
                title: 'Company Email Sent/day'
            };

            $http.get($scope.baseurl).success(function (dataJson) {
                var data = new google.visualization.DataTable(dataJson);
                var i;
                var items = document.getElementsByClassName($scope.chartClassName);
                for (i = 0; i < items.length; i++) {
                    var chart = new google.visualization.LineChart(items[i]);
                    chart.draw(data, $scope.chartOptions);
                }
            });

            $scope.changeData = function (dateFrom, dateTo, clientSelected, partnerSelected) {
                var params;
                if (angular.isUndefined(dateFrom) || angular.isUndefined(dateTo)) {
                    params = '?client=' + clientSelected.name + '&partner=' + partnerSelected.partner_name;
                } else {
                    params = '?from=' + dateFrom + '&to=' + dateTo + '&client=' + clientSelected.name + '&partner=' + partnerSelected.partner_name;
                }

                console.log(params);
                $http.get($scope.baseurl + params).success(function (dataJson) {
                    var data = new google.visualization.DataTable(dataJson);
                    var items = document.getElementsByClassName($scope.chartClassName);
                    for (i = 0; i < items.length; i++) {
                        var chart = new google.visualization.LineChart(items[i]);
                        chart.draw(data, $scope.chartOptions);
                    }
                });
            };

        }]);

    app.controller('GetClientsController', ['$http', '$scope', function ($http, $scope) {
            this.baseUrlClients = 'http://localhost/laracast/public/chartsang/getClients';
            $http.get(this.baseUrlClients).success(function (dataJson) {
                $scope.clients = dataJson;
            });

            $scope.getPartners = function (clientSelected) {
                console.log('client Selected:' + clientSelected.name);
                this.baseUrlPartners = 'http://localhost/laracast/public/chartsang/getPartners?client=' + clientSelected.name;
                $http.get(this.baseUrlPartners).success(function (dataJson) {
                    $scope.partners = dataJson;
                });
            };
        }]);

})();

