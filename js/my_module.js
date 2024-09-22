(function ($, Drupal, drupalSettings) {

    Drupal.behaviors.customRedirectBehavior = {
      attach: function (context, settings) {
        var config = drupalSettings.my_module;
      }
    };
  
  })(jQuery, Drupal, drupalSettings);