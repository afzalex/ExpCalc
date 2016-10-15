<!DOCTYPE html>
<html lang="en" x-ng-app="expcalc">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Expenses Calculator</title>
        <link rel="icon" type="image/png" href="favicon.png">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="bower_components/angular-chosen/chosen-spinner.css">
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
                <div class="panel panel-primary">
                    <div class="panel-heading form-inline">
                        <div class="form-group">
                            <label class="sr-only" for="month">Email address</label>
                            <input type="email" class="form-control" id="month" placeholder="Email">
                        </div>
                        <div>
                            {{ selectedmonth.dirname }}
                            <select class="form-control" x-ng-model="selectedmonth"
                                x-ng-options="vm.monfull[vm.monshrt.indexOf(month.dirname)] for month in vm.data.months track by month.dirname"></select>
                        </div>
<!--                        <div class="btn-group">
                            <button type="button" class="btn btn-danger">Action</button>
                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </div>-->

                    </div>
                </div>
                

                <pre> {{ vm.data | json }} </pre>
                <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p>
            </div>
        </div>
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="bower_components/angular/angular.min.js"></script>
        <script src="bower_components/chosen/chosen.jquery.js"></script>
        <script src="bower_components/angular-chosen/angular-chosen.js"></script>
        <script src="script.js" type="text/javascript"></script>
<!--        
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="bower_components/angular/angular.min.js"></script>
        <script src="bower_components/chosen/chosen.jquery.js"></script>
        <script src="bower_components/angular-chosen-localytics/dist/angular-chosen.min.js"></script>
        <script src="script.js" type="text/javascript"></script>-->
    </body>
</html>
