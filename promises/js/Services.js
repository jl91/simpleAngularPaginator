var app = angular.module('AngularPromises', []);
app.factory('Promises', function ($http, $q) {

    function Promises() {
        var self = this;
        self.getDate = function (url, data) {
            return $http.post(url, data);
        };
    }
    ;
    return new Promises();
});
       