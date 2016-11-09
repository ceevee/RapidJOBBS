/**
 * RapidJob Web App
 * @author Usaidh Mohamed <usaidh.ai@gmail.com>
 */

/**
 * Main AngularJS Web Application
 */
var app = angular.module('jobBankWebApp', [
  'ngRoute'
]);

/**
 * Configure the Routes
 */
app.config(['$routeProvider', function ($routeProvider) {
  $routeProvider
  // Home
    .when("/", {templateUrl: "partials/home.html", controller: "PageCtrl"})
    // Pages
    .when("/about", {templateUrl: "partials/about.html", controller: "PageCtrl"})
    .when("/faq", {templateUrl: "partials/faq.html", controller: "PageCtrl"})
    .when("/login", {templateUrl: "partials/login.html", controller: "PageCtrl"})
    .when("/contact", {templateUrl: "partials/contact.html", controller: "PageCtrl"})
    .when("/jobs", {templateUrl: "partials/jobs.html", controller: "PageCtrl"})
    .when("/signup", {templateUrl: "partials/signup.html", controller: "PageCtrl"})
    // else 404
    .otherwise("/404", {templateUrl: "partials/404.html", controller: "PageCtrl"});
}]);

/**
 * Controls all other Pages
 */
app.controller('PageCtrl', function (/*$scope, $location, $locationProvider*/) {
  console.log("Page Controller reporting for duty.");

  //Start slider
  $("#carousel").carousel();

  // Activates Tooltips for Social Links
  $('.tooltip-social').tooltip({
    selector: "a[data-toggle=tooltip]"
  });

  //collapse navBar in mobile devices
  $(document).on('click', '.navbar-ex1-collapse', function (e) {
    if ($(e.target).is('a') && $(e.target).attr('class') != 'dropdown-toggle') {
      $(this).collapse('hide');
    }
  });

  //Scroll to top of the page on each menu clicked
  $(document).ready(function () {
    $(this).scrollTop(0);
  });
});

