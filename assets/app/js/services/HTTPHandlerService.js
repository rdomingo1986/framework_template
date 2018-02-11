login.service('HTTPHandlerService', ['$http', '$q', function ($http, $q) {
  var defaults = {
    blockBeforeSend: true,
    unblockOnComplete: true,
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded'
    },
    method: 'GET'
  };
  
  return {
    httpRequest: function (params) {
      var deferred = $q.defer();
      var options = defaults;
      angular.extend(options, params)
      
      if(options.blockBeforeSend) {
        $.blockUI({message: null});
      }
      if(typeof options.url === 'string') {
        var requestObj = {
          method: options.method,
          url: params.url,
          data: params.data,
          headers: options.method === 'GET' ? $http.defaults.headers.common : options.headers
        };

        $http(requestObj).then(function (response) {
          if(options.unblockOnComplete) {
            $.unblockUI();
          }
          deferred.resolve(response);
        }, function (error) {
          deferred.reject(error);
        });
      } else {
        var promisesArray = [];
        options.url.forEach(function (val, index) {
          promisesArray.push($http({
            method: !Array.isArray(options.method) ? 'GET' : options.method[index],
            url: val,
            data: options.data[index],
            headers: options.method === 'GET' ? $http.defaults.headers.common:  options.headers
          }));
        });

        $q.all(promisesArray).then(function (response) {
          if(options.unblockOnComplete) {
            $.unblockUI();
          }
          deferred.resolve(response);
        }).catch(function (error) {
          deferred.reject(error);
        });
      }
      return deferred.promise;  
    },
  }
}]);

app.service('HTTPHandlerService', ['$http', '$q', function ($http, $q) {
  var defaults = {
    blockBeforeSend: true,
    unblockOnComplete: true,
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded'
    },
    method: 'GET'
  };
  
  return {
    httpRequest: function (params) {
      var deferred = $q.defer();
      var options = defaults;
      angular.extend(options, params)
      
      if(options.blockBeforeSend) {
        alert('Se bloquea la interfaz gráfica');
      }
      if(typeof options.url === 'string') {
        var requestObj = {
          method: options.method,
          url: params.url,
          data: params.data,
          headers: options.method === 'GET' ? $http.defaults.headers.common : options.headers
        };

        $http(requestObj).then(function (response) {
          if(options.unblockOnComplete) {
            alert('Se desbloquea la interfaz gráfica');
          }
          deferred.resolve(response);
        }, function (error) {
          deferred.reject(error);
        });
      } else {
        var promisesArray = [];
        options.url.forEach(function (val, index) {
          promisesArray.push($http({
            method: !Array.isArray(options.method) ? 'GET' : options.method[index],
            url: val,
            data: options.data[index],
            headers: options.method === 'GET' ? $http.defaults.headers.common:  options.headers
          }));
        });

        $q.all(promisesArray).then(function (response) {
          if(options.unblockOnComplete) {
            alert('Se desbloquea la interfaz gráfica');
          }
          deferred.resolve(response);
        }).catch(function (error) {
          deferred.reject(error);
        });
      }
      return deferred.promise;  
    },
  }
}]);