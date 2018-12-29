var QouatationApp = angular.module('QouatationApp', ['mainCtrl', 'qouatationService'],
function($interpolateProvider) {
$interpolateProvider.startSymbol('{[{').endSymbol('}]}');
    });
