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
        <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
        

        <script type="text/javascript" src="js/app.js"></script>
        
        <div ng-controller="ChartControllerLine" >
            <label>From:<input type='text' ng-model="dateFrom"/>
            </label>
            <label>To:<input type='text' ng-model="dateTo"/>
            </label>
            <button type="button" ng-click='changeRange()'>Change</button>
            
            <button type="button" ng-click='test()'>Test</button>
            <div class="series_chart" ng-bind-></div>
        </div>
        
        
        
        
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-google-chart/0.1.0-beta.2/ng-google-chart.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/appjq.js"></script>
        
        <div ng-controller="ChartAngController" id="series_ang" ng-app="google-chart-sample">
            <div google-chart chart="chartObject" style="height:600px; width:50%;"></div>
            <button type="button" ng-click='getData()'>ChangeData</button>
        </div>
    </body>
</html>

