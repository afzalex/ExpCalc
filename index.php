<!DOCTYPE html>
<html lang="en" x-ng-app="expcalc">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Expenses Calculator</title>
        <link rel="icon" type="image/png" href="favicon.png">
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="bower_components/angular/angular.min.js"></script>
        <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="bower_components/angular-chosen/chosen-spinner.css">
        <link rel="stylesheet" type="text/css" href="bower_components/components-font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body x-ng-controller="expcalcctrl as vm">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        <i><img class="exp-favicon" src="favicon.png"></i> Expenses Calculator
                    </a>
                </div>
            </div>
        </nav>
        
        <div class="jumbotron exp-body">
            <div class="container">
                <div class="panel panel-primary exp-container">
                    <div class="panel-heading form-inline">
                        <div class="form-group">
                            <select class="form-control" x-ng-model="vm.selectedmonth"
                                x-ng-options="vm.monfull[vm.monshrt.indexOf(month.dirname)] for month in vm.data.months track by month.dirname"></select>
                        </div>
                        <div class="col-lg-6 col-md-8 text-right pull-right exp-monthly-stat-head visible-lg visible-md">
                            <h3 class="col-md-6">Total : {{vm.selectedmonth.total | number:2}} <i class="fa fa-inr" aria-hidden="true"></i></h3>
                            <h3 class="col-md-6">Average : {{vm.selectedmonth.average | number:2}} <i class="fa fa-inr" aria-hidden="true"></i></h3>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="exp-monthly-stat visible-sm visible-xs">
                            <h3 class="col-md-6 col-lg-4">Total : {{vm.selectedmonth.total | number:2}} <i class="fa fa-inr" aria-hidden="true"></i></h3>
                            <h3 class="col-md-6 col-lg-8">Average : {{vm.selectedmonth.average | number:2}} <i class="fa fa-inr" aria-hidden="true"></i></h3>
                            <hr>
                        </div>
                        <div class="col-sm-6 col-lg-4" x-ng-repeat="candidate in vm.selectedmonth.candidates">
                            <div class="panel panel-success">
                                <div class="panel-heading"> 
                                    <b> {{ candidate.name }} </b> 
                                </div>
                                <div class="panel-body">
                                    <ul class="list-group exp-candidate-stat">
                                        <li class="list-group-item list-group-item-info">
                                            Total money spend <span class="badge">{{candidate.cost | number:2}} <i class="fa fa-inr" aria-hidden="true"></i></span>
                                        </li>
                                        <li class="list-group-item list-group-item-info">
                                            Balance 
                                            <span class="badge" x-ng-class="{'badge-success':candidate.balance>=0,'badge-danger':candidate.balance<0}">
                                                <span x-ng-show="candidate.balance>=0">+</span>{{candidate.balance | number:2}} <i class="fa fa-inr" aria-hidden="true"></i></span>
                                        </li>
                                    </ul>
                                    <table class="table table-bordered table-condensed text-info" x-ng-if="candidate.entries.length>0">
                                        <tr class="text-center bg-info">
                                            <th>Cost in Rupees</th>
                                            <th>{{vm.monfull[vm.monshrt.indexOf(vm.selectedmonth.dirname)]}}</th>
                                            <th>Description</th>
                                        </tr>
                                        <tr x-ng-repeat="entry in candidate.entries">
                                            <td>{{ entry.cost | number:2}} <i class="fa fa-inr" aria-hidden="true"></i></td>
                                            <td>{{entry.date}} </td>
                                            <td>{{entry.description}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        Created by Afzal
                    </div>
                </div>
                
                <div x-ng-if="vm.expDebug">
                    <pre> {{ vm.data | json }} </pre>
                </div>
            </div>
        </div>
        <script src="bower_components/chosen/chosen.jquery.js"></script>
        <script src="bower_components/angular-chosen/angular-chosen.js"></script>
        <script src="script.js" type="text/javascript"></script>
    </body>
</html>
