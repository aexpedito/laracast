<!DOCTYPE html>
<html ng-app="appline">
    <head>
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}"/>
        <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.css') }}"/>
        <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}"/>
    </head>
    <body>

        <script type="text/javascript" src="js/angular.min.js"></script>
        <script type="text/javascript" src="js/angular-route.min.js"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-google-chart/0.1.0-beta.2/ng-google-chart.js" type="text/javascript"></script>

        <script type="text/javascript" src="js/appline.js"></script>
        <div ng-controller="ChartLineController as chartLineCtrl"><!---->

            <div>
                <div class="series_line_chart"></div>
            </div>

            <div ng-controller="GetClientsController as ctrl">
                <form name='selectForm' novalidate>
                    <fieldset class="form-group"> <!--client_name-->
                        <select name='client' ng-model="clientSelected" ng-options='client.name for client in clients' ng-change="getPartners(clientSelected)" required>
                            <option value="">Select Client</option>
                        </select>
                    </fieldset>
                    <fieldset class="form-group"><!--partner-->
                        <select name='partner' ng-model="partnerSelected" ng-options="partner.partner_name for partner in partners" required>
                            <option value="">Select Partner</option>
                        </select>
                    </fieldset>
                    <fieldset class="form-group">
                        <input name='dateFrom' ng-model="dateFrom" type="text" class="form-control"/><!--dateFrom-->
                    </fieldset>
                    <fieldset class="form-group">
                        <input name='dateTo' ng-model="dateTo" type="text" class="form-control"/><!--dataTo-->
                    </fieldset>
                    <button type="button" ng-click='changeData(dateFrom,dateTo,clientSelected,partnerSelected)'>ChangeData</button>
                </form>
            </div>
        </div>
    </body>
</html>

