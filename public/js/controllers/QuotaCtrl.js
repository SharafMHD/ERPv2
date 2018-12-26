angular.module('mainCtrl', [])

    // inject the Comment service into our controller
    .controller('mainController', function($scope, $http, Qouatation) {

        // load items
        $scope.loaditems = function() {
            // use the function we created in our service
            Qouatation.getitems()
                .success(function(data) {
                    var defaultOpt = "<option selected='selected' value='-1'>Please Select</option>";
                    $('#item_id').append(defaultOpt);

                    data.forEach(element => {
                        var opt = new Option(element.name, element.id);

                        $('#item_id').append(opt);
                    });

                });
        };
        // load Services
        $scope.loadservices= function() {
            // use the function we created in our service
            Qouatation.getservices()
                .success(function(data) {
                    var defaultOpt = "<option selected='selected' value='-1'>Please Select</option>";
                    $('#service_id').append(defaultOpt);
                    data.forEach(element => {
                        var opt = new Option(element.name, element.id);
                        $('#service_id').append(opt);
                    });
                });
        };
        /// get expires date
        $scope.getexpires = function(item_id) {
            Qouatation.getqty(item_id)
                .success(function(data) {
                    $('#expiry_date').find('option').remove().end();
                    var defaultOpt = "<option selected='selected' value='-1'>Please Select</option>";
                    $('#expiry_date').append(defaultOpt);
                    data.forEach(element => {
                        var opt = new Option(element.expiry_date, element.id);
                        $('#expiry_date').append(opt);
                    });
                });
        };
    });
