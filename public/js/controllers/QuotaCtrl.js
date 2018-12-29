angular.module('mainCtrl', [])

    // inject the Comment service into our controller
    .controller('mainController', function($scope, $http, Qouatation, $compile) {
        // arrays
        $scope.QouatationDetails = [];
                $scope.no = 'Q-' + Math.floor((Math.random() * 10000000));
                $('#no').val($scope.no);
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
        $scope.loadservices = function() {
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
            $scope.loading = true;
            Qouatation.getqty(item_id)
                .success(function(data) {
                    $('#expiry_date').find('option').remove().end();
                    var defaultOpt = "<option selected='selected' value='-1'>Please Select</option>";
                    $('#expiry_date').append(defaultOpt);
                    data.forEach(element => {
                        var opt = new Option(element.expiry_date, element.id);
                        $('#expiry_date').append(opt);
                    });
                    $scope.loading = false;
                });
        };
        /// get Avilable qty date
        $scope.getAvilableqty = function(expiry_date) {
            $scope.loading = true;
            Qouatation.getAvilableqty(expiry_date)
                .success(function(data) {
                    // swal({
                    //     text: "Stock Quantity is :" + data.qty,
                    // });
                    $('#qty').val(data.qty);
                    $("#qty").attr('max', data.qty);
                    $scope.loading = false;
                });
        };
        /// get Item price
        $scope.getprice = function(item_id) {

            if ($('#qty').val() > $("#qty").attr('max')) {
                swal({
                    title: "Sorry!!",
                    text: "the Quantity value must be less than or equal to " + $("#qty").attr('max'),
                    icon: "warning",
                    button: "okay !",
                    type: "warning"
                });
                return;
            } else {
                $scope.loading = true;
                Qouatation.getprice(item_id)
                    .success(function(data) {
                        $("#qty").submit()
                        $scope.additem(data);
                        $scope.loading = false;
                    });
            }
        };
        // add an item
        $scope.additem = function(data) {
            //check if item or service
            if (data.item.item_type === "Services") {
                // validate
                if ($('#service_id').val() == 0 || $('#service_qty').val() == "") {
                    swal({
                        title: "Sorry!!",
                        text: "Please Select service and insert the Quantity",
                        icon: "warning",
                        button: "okay !",
                        type: "warning"
                    });

                } else {
                    // check i item exist
                    var q = $scope.QouatationDetails.find(x => x.item_id === $('#service_id').val());
                    if (!q) {
                        // Desfine New object
                        var newitem = {
                            id: $scope.QouatationDetails.length + 1,
                            item_id: $('#service_id').val(),
                            qty: $('#service_qty').val(),
                            price: data.item.sales_price,
                            total: (parseFloat(data.item.sales_price) * parseFloat($('#service_qty').val())),
                            expiry_date: "-",
                            description: "Services"
                        };
                          $('#amount').innertext(parseFloat(newitem.total))
                            $('#net_amount').val(this.value + parseFloat(newitem.total))
                        //push items
                        $scope.QouatationDetails.push(newitem);
                        // append html table
                        var html = '';
                        html += '<tr>';
                        html += '<td>' + newitem.id + '</td>';
                        html += '<td>' + data.item.no + '</td>';
                        html += '<td>' + data.item.name + '</td>';
                        html += '<td>' + data.item.item_type + '</td>';
                        html += '<td>' + newitem.qty + '</td>';
                        html += '<td>' + data.unit + '</td>';
                        html += '<td>' + data.item.sales_price + '</td>';
                        html += '<td>' + newitem.total + '</td>';
                        html += '<td>' + newitem.expiry_date + '</td>';
                        html += '<td>' + newitem.description + '</td>';
                        html += '<td>' + '<a class="btn btn-xs delete-record" ng-click="removeRow(' + $scope.QouatationDetails.indexOf(newitem) + ')"><i class="glyphicon glyphicon-trash"></i></a>' + '</td>';
                        html += '</tr>';

                        var temp = $compile(html)($scope);
                        angular.element($("#tbl_Details tbody")).append(temp);
                    } else {
                        swal({
                            title: "Sorry!!",
                            text: "Please remove the Services from list and try again",
                            icon: "warning",
                            button: "okay !",
                            type: "warning"
                        });
                    }
                }
            } else {
                // validate
                if ($('#item_id').val() == 0 || $('#qty').val() == "" || $('#expiry_date').val() == "") {
                    swal({
                        title: "Sorry!!",
                        text: "Please Select Item ,expiry date and insert the Quantity",
                        icon: "warning",
                        button: "okay !",
                        type: "warning"
                    });
                } else {
                    // check i item exist
                    var q = $scope.QouatationDetails.find(x => x.item_id === $('#item_id').val() && x.expiry_date === $("#expiry_date option:selected").text());
                    if (!q) {
                        // Desfine New object
                        var newitem = {
                            id: $scope.QouatationDetails.length + 1,
                            item_id: $('#item_id').val(),
                            qty: $('#qty').val(),
                            price: data.item.sales_price,
                            total: (parseFloat(data.item.sales_price) * parseFloat($('#qty').val())),
                            expiry_date: $("#expiry_date option:selected").text(),
                            description: $('#notes').val()
                        };
                        //push items
                        $scope.QouatationDetails.push(newitem);
                        $('#amount').val(this.value + parseFloat(newitem.total))
                          $('#net_amount').val(this.value + parseFloat(newitem.total))
                        // append html table
                        var html = '';
                        html += '<tr>';
                        html += '<td>' + newitem.id + '</td>';
                        html += '<td>' + data.item.no + '</td>';
                        html += '<td>' + data.item.name + '</td>';
                        html += '<td>' + data.item.item_type + '</td>';
                        html += '<td>' + newitem.qty + '</td>';
                        html += '<td>' + data.unit + '</td>';
                        html += '<td>' + data.item.sales_price + '</td>';
                        html += '<td>' + newitem.total + '</td>';
                        html += '<td>' + newitem.expiry_date + '</td>';
                        html += '<td>' + newitem.description + '</td>';
                        html += '<td>' + '<a class="btn btn-xs delete-record" ng-click="removeRow(' + $scope.QouatationDetails.indexOf(newitem) + ')"><i class="glyphicon glyphicon-trash"></i></a>' + '</td>';
                        html += '</tr>';

                        var temp = $compile(html)($scope);
                        angular.element($("#tbl_Details tbody")).append(temp);

                    } else {
                        swal({
                            title: "Sorry!!",
                            text: "Please remove the item from list and try again",
                            icon: "warning",
                            button: "okay !",
                            type: "warning"
                        });
                    }
                }
            }

        };
        // To Delete from Html table
        $scope.removeRow = function(index) {

            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                cancelButtonColor: "#00c581",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plx!"
            }).then(function(result) {
                    if (result) {
                        var row = $(this).parent().index();
                        document.getElementById('tbl_Details').deleteRow(row);
                        $scope.QouatationDetails.splice(index, 1);
                    }
                },
                function(dismiss) {
                    if (dismiss === 'cancel') {
                        swal(
                            'Cancelled',
                            'Your imaginary Record is safe :)',
                            'error');
                    }
                });
        }
        // save Qouatation
        $scope.submitQouatation = function() {
            $scope.loading = true;
            // Define Data
                // $scope.QData = {
                //   date	: $('#date').val(),
                //   no: 'R-' + Math.floor((Math.random() * 10000000)),
                //     valide_date	: $('#date').val(),
                //       amount	: $('#date').val(),
                //         discount	: $('#date').val(),
                //         net_amount:net_amount,
                // };
            Qouatation.save($scope.commentData)
                .success(function(data) {

                    // if successful, we'll need to refresh the comment list
                    Comment.get()
                        .success(function(getData) {
                            $scope.comments = getData;
                            $scope.loading = false;
                        });

                })
                .error(function(data) {
                    console.log(data);
                });
        };

    });
