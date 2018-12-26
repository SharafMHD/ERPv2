angular.module('qouatationService', [])

    .factory('Qouatation', function($http) {

        return {
            // get all the comments
            getqty: function(id) {
                return $http.get('/en/sales/quotations/getqty/' + id);
            },

            // get all the itmes
            getitems: function() {
                return $http.get('/en/sales/quotations/getItems');
            },
            // get all the services
            getservices: function() {
                return $http.get('/en/sales/quotations/getservices');
            },
            // save a comment (pass in comment data)
            save: function(commentData) {
                return $http({
                    method: 'POST',
                    url: '/api/comments',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    data: $.param(commentData)
                });
            },

            // destroy a comment
            destroy: function(id) {
                return $http.delete('/api/comments/' + id);
            }
        }

    });
