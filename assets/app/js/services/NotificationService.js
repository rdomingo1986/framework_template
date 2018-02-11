login.factory("NotificationService", function(){
  var defaults = {
    position: 'top-right',
    loaderBg:'#fec107',
    icon: 'info',
    hideAfter: 5000, 
    stack: 6
  };

  return {
    payload: null,
    options: defaults,
    init: function (payload) {
      this.payload = payload;
      return this;
    },
    process: function (reset = true) {
      if(reset) {
        this.reset();
      }
      if(this.payload.data.status === 'validationError') {
        var length = this.payload.data.data.length;
        var messages = [];
        $.each(this.payload.data.data, function (key, val) {
          messages.push(val);
        });
        this.set({
          heading: messages.length === 1 ? 'Error!!!' : 'Errors!!!',
          text: messages.length === 1 ? messages[0] : messages,
          icon: 'error',
          stack: length
        }).show();
        return false;
      }
      if(this.payload.data.status === 'error') {
        this.set({
          heading: 'Error!!!',
          text: this.payload.data.message,
          icon: this.payload.data.status
        }).show();
        return false;
      }
      this.set({
        heading: 'Listo!!!',
        text: this.payload.data.message,
        icon: this.payload.data.status
      }).show();
      this.clean();
      return true;
    },
    reset: function () {
      $.toast().reset('all');
      return this;
    },
    clean: function () {
      this.payload = null;
      return this;
    },
    clear: function () {
      this.options = defaults;
      return this;
    },
    set: function (options) {
      angular.extend(this.options, options);
      return this;
    },
    show: function () {
      $.toast({
        heading: this.options.heading,
        text: this.options.text,
        position: this.options.position,
        loaderBg: this.options.loaderBg,
        icon: this.options.icon,
        hideAfter: this.options.hideAfter, 
        stack: this.options.stack
      });
      this.clear();
      return this;
    }
  };
});

app.factory("NotificationService", function(){
  var defaults = {
    position: 'top-right',
    loaderBg:'#fec107',
    icon: 'info',
    hideAfter: 5000, 
    stack: 6
  };
  return {
    payload: null,
    options: defaults,
    init: function (payload) {
      this.payload = payload;
      return this;
    },
    process: function (reset = true) {
      if(reset) {
        this.reset();
      }
      if(this.payload.data.status === 'validationError') {
        var length = this.payload.data.data.length;
        var messages = [];
        $.each(this.payload.data.data, function (key, val) {
          messages.push(val);
        });
        this.set({
          heading: messages.length === 1 ? 'Error!!!' : 'Errors!!!',
          text: messages.length === 1 ? messages[0] : messages,
          icon: 'error',
          stack: length
        }).show();
        return false;
      }
      if(this.payload.data.status === 'error') {
        this.set({
          heading: 'Error!!!',
          text: this.payload.data.message,
          icon: this.payload.data.status
        }).show();
        return false;
      }
      this.set({
        heading: 'Listo!!!',
        text: this.payload.data.message,
        icon: this.payload.data.status
      }).show();
      this.clean();
      return true;
    },
    reset: function () {
      $.toast().reset('all');
      return this;
    },
    clean: function () {
      this.payload = null;
      return this;
    },
    clear: function () {
      this.options = defaults;
      return this;
    },
    set: function (options) {
      angular.extend(this.options, options);
      return this;
    },
    show: function () {
      $.toast({
        heading: this.options.heading,
        text: this.options.text,
        position: this.options.position,
        loaderBg: this.options.loaderBg,
        icon: this.options.icon,
        hideAfter: this.options.hideAfter, 
        stack: this.options.stack
      });
      this.clear();
      return this;
    }
  };
});