angular.module('mainCtrl', [])

    // inject the Comment service into our controller
    .controller('mainController', function($scope, $http, Qouatation) {

        // $scope.$watch('Qouatation.item_id', function () {
        //
        // });
        // object to hold all the data for the new comment form
        // $scope.QouatationData = {};

        // loading variable to show the spinning loading icon
        $scope.loading = true;

        // get all the comments first and bind it to the $scope.comments object
        // use the function we created in our service
        // GET ALL COMMENTS ==============
        // Qouatation.get()
        //     .success(function(data) {
        //         $scope.Qouatation = data;
        //         $scope.loading = false;
        //     });

        $scope.loaditems = function(){
           $http.get('/en/sales/quotations/getItems')
           .success(function(data){
             var defaultOpt = "<option selected='selected' value='-1'>Please Select</option>";
             $('#item_id').append(defaultOpt);

             data.forEach(element => {
                 var opt = new Option(element.name, element.id);

                 $('#item_id').append(opt);
             });
             // $scope.items = data;
           })
        }


        // function to handle submitting the form
        // SAVE A COMMENT ================
        $scope.submitComment = function() {
            $scope.loading = true;

            // save the comment. pass in comment data from the form
            // use the function we created in our service
            Comment.save($scope.commentData)
                .success(function(data) {

                    // if successful, we'll need to refresh the comment list
                    Comment.get()
                        .success(function(getData) {
                            $scope.items = getData;
                            $scope.loading = false;
                        });

                })
                .error(function(data) {


                    // console.log(data);
                });
        };


        // function to handle deleting a comment
        // DELETE A COMMENT ====================================================
        $scope.getqty = function(item_id) {
            $scope.loading = true;

            // use the function we created in our service
            Qouatation.getqty(item_id)
                .success(function(data) {
                    $('#expiry_date').find('option').remove().end();

                    var defaultOpt = "<option selected='selected' value='-1'>Please Select</option>";
                    $('#expiry_date').append(defaultOpt);

                    data.forEach(element => {
                        var opt = new Option(element.expiry_date, element.id);

                        $('#expiry_date').append(opt);
                    });
                    // if successful, we'll need to refresh the comment list
                    // Comment.get()
                    //     .success(function(getData) {
                    //         $scope.comments = getData;
                    //         $scope.loading = false;
                    //     });

                });
        };

    });
