app.controller('GlobalController', ['$scope', 'Promises',
    function ($scope, Promises) {
        $scope.collection = [];
        $scope.limit = 10;
        $scope.currentPage = 0;
        $scope.offset = 0;
        $scope.total = 0;

        $scope.getCollection = function () {

            var promise = Promises.getDate('/conexao.php', {limit: $scope.limit, currentPage: $scope.currentPage, offset: $scope.offset});

            promise.success(function (response) {
                $scope.total = response.total;
                $scope.collection = response;
            });

            promise.error(function () {

            });

            //promise.success($scope.populateTable(promiseResponse, promiseStatus));
            //promise.error($scope.throwException(promiseResponse, promiseStatus));
        };

        $scope.setNewLimit = function (newLimit) {
            $scope.limit = parseInt(newLimit);
        };

        $scope.first = function () {
            if ($scope.currentPage != 0) {
                $scope.currentPage = 0;
                $scope.offset = 0;
                ;
                $scope.getCollection();
            }
        };

        $scope.next = function () {
            if ($scope.currentPage < parseInt($scope.total / $scope.limit)) {
                $scope.currentPage++;
                $scope.offset = $scope.currentPage * $scope.limit;
                $scope.getCollection();
            }
        };

        $scope.prev = function () {
            if ($scope.currentPage > 0) {
                $scope.currentPage--;
                $scope.offset = $scope.currentPage * $scope.limit;
                $scope.getCollection();
            }

        };

        $scope.last = function () {
            if ($scope.currentPage >= 0) {
                var lastPage = parseInt($scope.total / $scope.limit);
                $scope.currentPage = lastPage;
                $scope.offset = $scope.currentPage * $scope.limit;
                
                $scope.getCollection();
            }

        };

        $scope.formatInt = function (value) {
            return new Intl.NumberFormat('pt-BR').format(parseInt(value));
        };


    }
]);