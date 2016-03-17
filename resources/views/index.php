<!DOCTYPE html>
<html ng-app="app">
<head>
   <meta charset="utf-8" />
   <title>AngularJS User Registration and Login Example</title>
   <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />   
</head>
<body>

   <div ng-app="myApp" ng-controller="usersCtrl">
      
      <!-- There will be a table, to dispay the data, here -->

      <!-- There will be a modal to pop-up a Form (One form used as a create and edit form) -->
  
   </div>

   <script src="//code.jquery.com/jquery-2.0.3.min.js"></script>
   <script src="//code.angularjs.org/1.2.20/angular.js"></script>
   <script src="//code.angularjs.org/1.2.20/angular-route.js"></script>
   <script src="//code.angularjs.org/1.2.13/angular-cookies.js"></script>   
   <script>
      (function () {
       'use strict';

       angular
           .module('myApp', ['ngRoute', 'ngCookies'])
           .config(config)
           .run(run);

       config.$inject = ['$routeProvider', '$locationProvider'];
       function config($routeProvider, $locationProvider) {
           $routeProvider
               .when('/', {
                   controller: 'HomeController',
                   templateUrl: 'home/home.view.html',
                   controllerAs: 'vm'
               })

               .when('/login', {
                   controller: 'LoginController',
                   templateUrl: 'login/login.view.html',
                   controllerAs: 'vm'
               })

               .when('/register', {
                   controller: 'RegisterController',
                   templateUrl: 'register/register.view.html',
                   controllerAs: 'vm'
               })

               .otherwise({ redirectTo: '/login' });
       }

       run.$inject = ['$rootScope', '$location', '$cookieStore', '$http'];
       function run($rootScope, $location, $cookieStore, $http) {
           // keep user logged in after page refresh
           $rootScope.globals = $cookieStore.get('globals') || {};
           if ($rootScope.globals.currentUser) {
               $http.defaults.headers.common['Authorization'] = 'Basic ' + $rootScope.globals.currentUser.authdata; // jshint ignore:line
           }

           $rootScope.$on('$locationChangeStart', function (event, next, current) {
               // redirect to login page if not logged in and trying to access a restricted page
               var restrictedPage = $.inArray($location.path(), ['/login', '/register']) === -1;
               var loggedIn = $rootScope.globals.currentUser;
               if (restrictedPage && !loggedIn) {
                   $location.path('/login');
               }
           });
      }
   })();
   </script>
</body>
</html>