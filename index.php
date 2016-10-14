<!DOCTYPE html>
<html lang="en" x-ng-app="expcalc">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Expenses Calculator</title>
        <link rel="icon" type="image/png" href="favicon.png">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="bower_components/angular/angular.min.js"></script>
        <script src="script.js" type="text/javascript"></script>
    </head>
    <body x-ng-controller="expcalcctrl as vm">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#"><i><img class="favicon" src="favicon.png"></i> Expenses Calculator</a>
                </div>
            </div>
        </nav>
        <div class="jumbotron">
            <div class="container">
                <h1>Hello, world!</h1>
                <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
                <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p>
                <pre>
                    {{ vm.data | json }}
                </pre>
            </div>
        </div>
    </body>
</html>
