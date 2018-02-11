var login = angular.module('login', ['ngRoute', 'ngMessages'])
var app = angular.module('example-app', ['ngRoute', 'ngMessages']);

login.config(['$routeProvider', function ($routeProvider) {
  $routeProvider
    .when('/', {
      templateUrl: 'templates/login.html'
    })
    .otherwise({
      redirectTo: '/'
    });
}]);

app.config(['$routeProvider', function ($routeProvider) {
  $routeProvider
    .when('/', {
      templateUrl: 'templates/dashboard.html'
    })
    .otherwise({
      redirectTo: '/'
    });
}]);