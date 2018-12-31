angular.module('qouatationService', [])

    .factory('Qouatation', function($http) {

        return {
            // get all
            getqty: function(id) {
                return $http.get('/en/sales/quotations/getqty/' + id);
            },
            // get item price
            getprice: function(id) {
                return $http.get('/en/sales/quotations/getprice/' + id);
            },
            // get Avilable qty
            getAvilableqty: function(id) {
                return $http.get('/en/inventory/transfers/getqty/' + id);
            },
            // get all the itmes
            getitems: function() {
                return $http.get('/en/sales/quotations/getItems');
            },
            // get all the services
            getservices: function() {
                return $http.get('/en/sales/quotations/getservices');
            },
            // save a Qouatation
            save: function(QData, QDetailsData) {

                return $http({
                    method: 'POST',
                    url: '/en/sales/quotations/',
                    data: {
                        QData: QData,
                        QDetailsData: QDetailsData
                    },
                });
            },
        }
    });
