login.controller('LoginController', ['$scope', '$http', '$q', '$window', 'LoginModel', 'HTTPHandlerService', 'NotificationService', function ($scope, $http, $q, $window, LoginModel, HTTPHandlerService, NotificationService) {
  LoginModel.init($scope);

  $scope.signIn = function ($event) {
    $event.preventDefault();

    HTTPHandlerService.httpRequest({
      url:  `${$('#base_url').val()}api/Users/signIn`,
      data: $.param(LoginModel.params()),
      method: 'POST'
    }).then(function (response) {
      if(!NotificationService.init(response).process()) return;
      setTimeout(function () {
        $window.location.href= `${$('#base_url').val()}Dashboard`;
      }, 3000);
    }).catch(function (error) {
      console.log(error);
    });
  };
}]);