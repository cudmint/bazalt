require(['angular', 'bazalt-cms'], function() {

    app = angular.module('loginApp', ['bazalt-cms']).
        config(function($routeProvider, $locationProvider, $httpProvider) {
            //$locationProvider.html5Mode(true);
            $locationProvider.hashPrefix('!');
        });

    app.controller('LoginCtrl', function ($scope, $location, $session) {
        $scope.login = function() {
            $location.path('/');
            location.reload();
        }
    });

    angular.bootstrap(document, ['loginApp']);

});