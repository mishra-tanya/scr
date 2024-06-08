<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        table tr th{
  background:#337ab7;
  color:white;
  text-align:left;
  vertical-align:center;
}
    </style>
</head>
<body>
    <div class=" mt-4">
        <h2 class="text-center mb-4" style="background-color:rgb(235, 235, 235);padding:12px;">SCR Question Bank </h2>
    </div>

    <div class="container" ng-app="formvalid">
        <div class="panel" data-ng-controller="validationCtrl">
        <div class="panel-heading border">    
          <h2>SCR Question Bank
          </h2>
        </div>
        <div class="panel-body">
            <table class="table table-bordered bordered table-striped table-condensed datatable" ui-jq="dataTable" ui-options="dataTableOpt">
            <thead>
              <tr>
                <th>S.No.</th>
                <th>Chapter</th>
                <th>Test</th>
                <th>Status</th>
                <th>Results</th>
                <th>Start Date</th>
              </tr>
            </thead>
              <tbody>
                <tr ng-repeat="n in data">
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                </tr>
              </tbody>
          </table>
        </div>
      </div>
      </div>
      <script>
        //Angularjs and jquery.datatable with ui.bootstrap and ui.utils

var app=angular.module('formvalid', ['ui.bootstrap','ui.utils']);
app.controller('validationCtrl',function($scope){
  $scope.data=[
        [
            "Tiger Nixon",
            "System Architect",
            "Edinburgh",
            "5421",
            "2011\/04\/25",
            "$320,800"
        ],
        [
            "Garrett Winters",
            "Accountant",
            "Tokyo",
            "8422",
            "2011\/07\/25",
            "$170,750"
        ],
    ]


$scope.dataTableOpt = {
   //custosm datatable options 
  // or load data through ajax call also
  "aLengthMenu": [[10, 50, 100,-1], [10, 50, 100,'All']],
  };
});

      </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>