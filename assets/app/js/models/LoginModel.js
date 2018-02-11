login.factory('LoginModel', function () {
  var scopeCloned = {};

  var VM = {
    email: {
      val: '',
      display: {
        has_error: function () {
          return (
            (
              !scopeCloned.loginForm.email.$pristine && 
              scopeCloned.loginForm.email.$invalid
            ) ||
            (
              scopeCloned.loginForm.$submitted &&
              scopeCloned.loginForm.email.$invalid
            )
          ); 
        },
        show_messages: function () {
          return (
            (
              !scopeCloned.loginForm.email.$pristine &&
              scopeCloned.loginForm.email.$error
            ) ||
            (
              scopeCloned.loginForm.$submitted &&
              scopeCloned.loginForm.email.$error
            )
          );
        }
      },
      messages: {
        required: 'El email es requerido',
        email: 'Formato de email inválido'
      }
    },
    password: {
      val: '',
      display: {
        has_error: function () {
          return (
            (
              !scopeCloned.loginForm.password.$pristine && 
              scopeCloned.loginForm.password.$invalid
            ) ||
            (
              scopeCloned.loginForm.$submitted &&
              scopeCloned.loginForm.password.$invalid
            )
          ); 
        },
        show_messages: function () {
          return (
            (
              !scopeCloned.loginForm.password.$pristine &&
              scopeCloned.loginForm.password.$error
            ) ||
            (
              scopeCloned.loginForm.$submitted &&
              scopeCloned.loginForm.password.$error
            )
          );
        }
      },
      messages: {
        required: 'La contraseña es requerida'
      }
    }
  };
  
  return {
    VM: {},
    init: function (scope) {
      scopeCloned = scope;
      scope.LoginVM = this.VM = VM;
      return this;
    },
    reinit: function () {
      this.init(scopeCloned);
      return this;
    },
    clear: function () {
      this.VM = {};
      scopeCloned = {};
      return this;
    },
    params: function () {
      var VMClon = {};
      angular.forEach(this.VM, function (value, key) {
        VMClon[key] = value.val;
      });
      return VMClon;
    }
  };
});