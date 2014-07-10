(function() {
  var __hasProp = {}.hasOwnProperty,
    __extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; };

  if (window.Drivolution == null) {
    window.Drivolution = {
      Events: {}
    };
  }

  Drivolution.Site = (function() {
    Site.prototype.current_page = null;

    Site.prototype.$el = null;

    function Site($el) {
      this.$el = $el;
      this.route(this.$el.data('page'));
      this.init_events();
      this.init_shared();
    }

    Site.prototype.init_events = function() {
      return $(document).on('goto', this.goto);
    };

    Site.prototype.goto = function(e, page) {
      return document.location = window.base_url + page;
    };

    Site.prototype.route = function(page) {
      switch (page) {
        case '':
          return this.current_page = new Drivolution.Index();
        default:
          return this.current_page = new Drivolution.Base();
      }
    };

    Site.prototype.init_shared = function() {};

    return Site;

  })();

  $(document).ready(function() {
    window.site.app = new Drivolution.Site($('body'));
    return $(document).on("click", "a[href]", function(e) {
      var href, root, to_frame;
      href = $(this).prop("href");
      to_frame = $(this).prop("target") === '_blank';
      root = window.location.protocol + "//" + window.location.host;
      if (href.slice(0, root.length) !== root) {
        if (!to_frame) {
          e.preventDefault();
        }
        ga('send', 'event', 'outbound', 'click', href, {
          'hitCallback': (function(_this) {
            return function() {
              if (!to_frame) {
                return document.location = href;
              }
            };
          })(this)
        });
        if (!to_frame) {
          return false;
        }
      }
    });
  });

  Drivolution.Base = (function() {
    function Base() {}

    return Base;

  })();

  Drivolution.Index = (function(_super) {
    __extends(Index, _super);

    function Index() {
      Index.__super__.constructor.call(this);
    }

    return Index;

  })(Drivolution.Base);

}).call(this);

//# sourceMappingURL=app.js.map
