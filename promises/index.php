<html ng-app="AngularPromises">
    <head>
        <meta charset="UTF-8">
        <title>Angular Promises</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" type="text/css">
    </head>
    <body ng-controller="GlobalController">
        <button ng-click="getCollection()" class="pull-left">Mostrar</button>
        <div class="container" ng-if="collection.usuarios.length > 0">
            <hr class="row">
            <div class="row" ng-include="'paginator.html'"></div>
            <hr>
            <div class="row col col-md-6" >
                <table class="table table-responsive table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="user in collection.usuarios">
                            <td>{{user.id}}</td>
                            <td>{{user.nome}}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="row" ng-include="'paginator.html'"></div>
            </div>

        </div>
        <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script src="js/Services.js"></script>
        <script src="js/GlobalController.js"></script>
    </body>
</html>
