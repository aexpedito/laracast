(function () {

    var app = angular.module('google-chart-sample', ['googlechart']);

    app.controller('ChartAngController', function ($scope) {
            $scope.chartObject = {};
            $scope.chartObject.type = "BarChart";
            $scope.onions = [
                {v: "Onions"},
                {v: 3},
            ];

            $scope.chartObject.data = {"cols": [
                    {id: "t", label: "Topping", type: "string"},
                    {id: "s", label: "Slices", type: "number"}
                ], "rows": [
                    {c: [
                            {v: "Mushrooms"},
                            {v: 3},
                        ]},
                    {c: $scope.onions},
                    {c: [
                            {v: "Olives"},
                            {v: 31}
                        ]},
                    {c: [
                            {v: "Zucchini"},
                            {v: 1},
                        ]},
                    {c: [
                            {v: "Pepperoni"},
                            {v: 2},
                        ]}
                ]};

            $scope.chartObject.options = {
                'title': 'How Much Pizza I Ate Last Night'
            };
            
            $scope.getData = function(){
                console.log("ddf");
            };
        });

})();

