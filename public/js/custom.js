﻿
var RecordID = 0;
var ControllerID = "";
var FormID = "";
var TblID = "";
var invoiceDetails = [];
var inventory__movement_details = [];
var Order = [];
var subtotal = 0;
var total = 0;
var user_id = 0;
var Avialableqty=0;

//==================== Navigation ====================
//<li><a href="#" onclick="goto('/Students/Index')"><i class="fa fa-circle-o"></i>قبول الطلاب </a></li>
//     <section id="Mydiv" class="content">
function goto(url) {
    $("#Mydiv").load(url);
}
//<a href="javascript:void(0)" onclick="goto_edit(Controller, id)">
function goto_edit(Controller, id) {
    var url = '/' + Controller + '/edit/' + id;
    $("#Mydiv").load(url);
}
function goto_delete(Controller, id) {
    var url = '/' + Controller + '/delete/' + id;
    $("#Mydiv").load(url);
}
//----------------------------------------------------------------------
//================= Actions ===================================
function Create(Controller, Form_id, multi_selected, tbl_Name) {
    var url = '/' + Controller + '/Create';
    if (multi_selected != 0) {
        post_ajax_multi_selected(url, Form_id, multi_selected, tbl_Name, Controller);
    }
    else {
        post_ajax(url, Form_id, tbl_Name, Controller);
    }

}
function Edit(Controller, Form_id, multi_selected, tbl_Name, RecordID) {
    var url = '/' + Controller + '/Edit/' + RecordID;
    if (multi_selected != 0) {
        post_ajax_multi_selected(url, Form_id, multi_selected, tbl_Name);
        //  post_ajax(url, Form_id, tbl_Name, Controller, 'Edit', RecordID);
    }
    else {
        post_ajax(url, Form_id, tbl_Name, Controller, 'Edit', RecordID);
    }
}
////function for deleting 's record
function Delete(Controller, id, tbl_Name) {
    var url = '/' + Controller + '/Delete/' + id;
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel plx!"
    }).then(function (result) {
        if (result) {
            $.ajax({
                url: url,
                type: "POST",
                contentType: "application/json;charset=UTF-8",
                dataType: "json",
                success: function (result) {
                    //  alert(Controller, TblID);
                    GetAll(Controller, TblID);
                    swal({
                        title: "Well Done!",
                        text: "Record has been Deleted successfully",
                        type: "success"
                    });
                },
                error: function (errormessage) {
                    error_msg();
                }
            });

        }
    },
        function (dismiss) {
            if (dismiss === 'cancel') {
                swal(
                    'Cancelled',
                    'Your imaginary Record is safe :)',
                    'error');
            }
        });
}
function GetAll(Controller, TblName, FormName) {


    loadData(Controller, TblName, FormName);
}
function GetbyId(id, Controller, FormName) {

    var url = '/' + Controller + '/GetbyID/';

    getRecordById(id, url, FormName);
}
//------------------------------------------------------------
//================= Ajax Post ================================
function post_ajax_multi_selected(url, formid, Multi_selected_id, tbl_Name, controlerName) {
    var result = '';
    $.ajax({
        //data: JSON.stringify({ Email: $("#username").val(), password: $("#password").val(), Check: $('#remembermech').is(':checked') }),
        type: "POST",
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        //type: "POST",
        url: url,
        data: formtojson_MS(formid, Multi_selected_id),
        success: function (response) {
            if (response.status === 0) {
                error_msg();
            } else {
                alert(controlerName);
                // GetAll(controlerName, tbl_Name);
                save_msg();
                resetForm(formid);
            }
        },
        error: function (response) {
            result = 'error';
        }
    });

    //return result;
}
function post_ajax(url, formid, tbl_Name, Controller, Method, id) {
    var result = '';
    $.ajax({

        type: "POST",
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        url: url,
        data: formtojson(formid, Method, id),
        success: function (response) {

            if (response.status === 0) {
                error_msg();
            } else {

                GetAll(Controller, tbl_Name);
                if (Method !== "Edit") {
                    save_msg();
                } else {
                    edit_msg();
                    $('#static').modal('hide');
                    $('#btnAdd').show();
                    $('#btnUpdate').hide();
                }

                resetForm(formid);
            }
        },
        error: function (response) {
            result = 'error';
        }
        //async: false
    });
    //return result;
}
function loadData(Controller, tblname) {
    $.ajax({
        url: '/' + Controller + '/List',
        //url: "/Areas/List",
        type: "GET",
        contentType: "application/json;charset=utf-8",
        dataType: "json",
        success: function (result) {
            var html = '';
            $.each(result, function (key, item) {
                html += '<tr>';
                for (i in item) {
                    html += '<td>' + item[i] + '</td>';
                }
                html += '<td>' +
                    '<div class="btn-group btn-sm">' + '<button class="btn btn-xs red dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">' + 'Actions' + '<i class="fa fa-angle-down">' + '</i>' + '</button>' + '<ul class="dropdown-menu pull-left" role="menu">' + '<li>' + '<a onclick="GetbyId(' + item.id + ' , ' + ControllerID + ' , ' + FormID + ');">' + '<i class="fa fa-pencil-square-o"></i>' + ' Edit' + '</a>' +
                    '</li>' + '<li>' + '<a onclick="Delete(' + ControllerID + ' ,' + item.id + '  , ' + TblID + ')">' + '<i class="fa fa-times"></i>' + ' Delete' + '</a>' + ' </li>' + ' </ul>' + ' </div>' +
                    '</td>';
                html += '</tr>';
            });

            //$('.tbody').html(html);
            if ($.fn.DataTable.isDataTable("#" + tblname)) {
                $("#" + tblname).DataTable().destroy();
            }

            $("#" + tblname + " tbody").empty();
            //append htnl
            $("#" + tblname + " tbody").append(html);

            $("#" + tblname).DataTable({
                responsive: true
            });
        },
        error: function (errormessage) {
            error_msg();
        }
    });
}
//Function for getting the Data Based upon Employee ID
function getRecordById(id, url, formid) {


    $.ajax({

        url: url + id,

        typr: "GET",

        contentType: "application/json;charset=UTF-8",

        dataType: "json",
        success: function (result) {
            process_response(formid, result);
            $('#btnUpdate').show();
            // $('#btnUpdate').att
            RecordID = result.id;

            $('#btnAdd').hide();
        },
        error: function (errormessage) {
            error_msg();
        }
    });
    return false;
}
//------------------------------------------------------------
//================= Form OPritions ===========================
function formtojson(formid, method, id) {
    var form = document.getElementById(formid);
    var obj = {};
    var elements = form.querySelectorAll("input, select, textarea, radio");
    for (var i = 0; i < elements.length; ++i) {
        var element = elements[i];
        var name = element.name;
        var value = element.value;
        // todo REview the value of the radio button
        if (name) {
            obj[name] = value;
        }
        if (method === 'Edit') {
            obj['id'] = id;
        }
    }

    //alert(JSON.stringify(obj));
    return JSON.stringify(obj);


}
function formtojson_MS(formid, multi_selected_id) {

    var form = document.getElementById(formid);
    var obj = {};
    var elements = form.querySelectorAll("input, select, textarea");
    for (var i = 0; i < elements.length; ++i) {
        var element = elements[i];
        var name = element.name;
        var value = element.value;
        if (name) {
            obj[name] = value;
        }
    }
    var selectednumbers = [];
    $('#' + multi_selected_id + ' :selected').each(function (i, selected) {
        selectednumbers[i] = $(selected).val();
    });
    obj[multi_selected_id] = selectednumbers;

    //alert(JSON.stringify(obj));
    return JSON.stringify(obj);

}
function resetForm(formid) {

    $("#" + formid).trigger("reset");
};
// This to populate ajaxresponse to form dynamicly
function process_response(frmormid, data) {
    var frm = document.getElementById(frmormid);
    var i;
    for (i in data) {
        if (i in frm.elements) {
            frm.elements[i].value = data[i];
            $(frm.elements[i]).val(data[i]).trigger('change');
        }
    }
}
// This to populate ajaxresponse to form dynamicly
//------------------------------------------------------------
//================= Alert Msges  ===========================
function error_msg() {
    swal({
        title: "There is something wrong!!",
        text: "Make sure the operation is correct",
        icon: "warning",
        button: "Try agen!"
    });
}
function save_msg(msgbody) {
    swal({
        title: "Well Done!",
        text: msgbody,
        type: "success"
    });
}
function edit_msg(msgbody) {
    swal({
        title: "Well Done!",
        text: msgbody,
        type: "success"
    });
}
function delete_confirmation() {
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel plx!"
    }).then(function (result) {
        if (result) {
            return "true";
        }
    },
        function (dismiss) {
            if (dismiss === 'cancel') {
                swal(
                    'Cancelled',
                    'Your imaginary Record is safe :)',
                    'error');
            }
        });
}
//------------------------------------------------------------
//================= Binding DropDownlists ===========================
function DDLBind(DDl_name, Controller, FunctionName) {
    var url = '/' + Controller + '/' + FunctionName;
    $.ajax({
        url: url,
        type: "Get",
        success: function (data) {
            var defaultOpt = "<option selected='selected' value='-1'>--Please Select--</option>";
            $("#" + DDl_name).append(defaultOpt);
            for (var i = 0; i < data.length; i++) {
                var opt = new Option(data[i].Text, data[i].Value);
                $("#" + DDl_name).append(opt);
            }
        }
    });

}
function GenerateID(ControlName) {
    var Control = document.getElementById(ControlName);

    Control.value = 'Rpid-' + Math.floor((Math.random() * 10000000));


}
function Checkifexsist(code) {
    $.ajax({

        url: "/Registration/CheckifExsist/" + code,

        typr: "GET",

        contentType: "application/json;charset=UTF-8",

        dataType: "json",

        success: function (result) {
            if (result.NotExist === true) {
                return code;
            }

        },

        error: function (errormessage) {
            swal({
                title: "There is something wrong!!",
                text: "Make sure the operation is correct",
                icon: "warning",
                button: "Try agen!"
            });

        }

    });
}

///start rapid functions
function GetRecpient() {
    // Get the checkbox
    var checkBox = document.getElementById("isrecipient");
    // If the checkbox is checked, display the output text
    if (checkBox.checked == true) {
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
        var id = $('#customer_id').val();
        $.ajax({
            type: "GET",
            url: "/bills/showCustomer/" + id,
            success: function (result) {

                $('#recipient').val(result.name);
                $('#recipient_phone').val(result.phone);
                $('#Recipient_address').val(result.address);
                // disable fildes
                $('#recipient').prop("disabled", true);
                $('#recipient_phone').prop("disabled", true);
                $('#Recipient_address').prop("disabled", true);

            }
        });
    } else {
        $('#recipient').val('');
        $('#recipient_phone').val('');
        $('#Recipient_address').val('');
        // disable fildes
        $('#recipient').prop("disabled", false);
        $('#recipient_phone').prop("disabled", false);
        $('#Recipient_address').prop("disabled", false);

    }
}
/// Add invoice Details
function AddNewItem(data) {
    var NewItem = {
        unit_id: data.unit_id,
        unit_name: data.units.name,
        item_id: data.id,
        item_name: $("#item_id option:selected").text(),
        unit_price: data.unit_price,
        total_price: parseFloat(data.unit_price) * parseFloat($('#qty').val()),
        remark: $('#remark').val(),
        qty: $('#qty').val(),
    };
    invoiceDetails.push(NewItem);
    var html = '';
    html += '<tr>';
    html += '<td>' + NewItem.item_name + '</td>';
    html += '<td>' + NewItem.unit_name + '</td>';
    html += '<td>' + NewItem.qty + '</td>';
    html += '<td>' + NewItem.unit_price + '</td>';
    html += '<td>' + NewItem.total_price + '</td>';
    html += '<td>' + NewItem.remark + '</td>';
    html += '<td>' + '<a class="btn btn-xs btn-danger" onclick="Delete(' + invoiceDetails.indexOf(NewItem) + ',' + "'tbl_invoiceDetails'" + ',' + NewItem.total_price + ');">' + '<i class="fa fa-times"></i>' + ' Delete' + '</a>' + '</td>';
    html += '</tr>';
    // $("#tbl_invoiceDetails tbody").empty();
    $("#tbl_invoiceDetails tbody").append(html);
    //calc subtotal
    subtotal = subtotal + parseFloat(NewItem.total_price);
    $("#lblsubtotal").text(subtotal);
    total = total + parseFloat(NewItem.total_price);
    $("#lbltotal").text(subtotal);
}

//Get Item
function getitem() {
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    var id = $('#item_id').val();
    $.ajax({
        type: "GET",
        url: "/bills/getitem/" + id,
        success: function (result) {
            AddNewItem(result);
        }
    });
}
//Get Item Avilable Qty Expires
function getitem_avialble_qty() {
    if ($('#item_id').val() == 0 || $('#from_warehouse_id').val() == 0) {
        swal({
            title: "Sorry!!",
            text: "Please Select warehouse from and item",
            icon: "warning",
            button: "okay !",
            type: "warning"
        });
    } else {
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
        var item_id = $('#item_id').val();
        var from_warehouse_id = $('#from_warehouse_id').val();
        $.ajax({
            type: "GET",
            url: "/en/inventory/transfers/getitem_qty/" + item_id + '/' + from_warehouse_id,
            success: function (result) {
                $('#expiry_date').find('option').remove().end();

                var defaultOpt = "<option selected='selected' value='-1'>Please Select</option>";
                $('#expiry_date').append(defaultOpt);

                result.data.forEach(element => {
                    var opt = new Option(element.expiry_date, element.id);
                    $('#expiry_date').append(opt);
                });
            }
        });
    }

}
//Get Item Avilable Qty
function Getqty() {
    // console.log("fdsfsdf");
    if ($('#item_id').val() == 0 || $('#from_warehouse_id').val() == 0) {
        swal({
            title: "Sorry!!",
            text: "Please Select warehouse from and item",
            icon: "warning",
            button: "okay !",
            type: "warning"
        });
    } else {
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
        $.ajax({
            type: "GET",
            url: "/en/inventory/transfers/getqty/" + $('#expiry_date').val() ,
            success: function (result) {
                if (result.length == 0) {
                    swal({
                        title: "Sorry!!",
                        text: "Theres no avilable qty in Stock",
                        icon: "warning",
                        button: "okay !",
                        type: "warning"
                    });
                } else {
                    swal({
                        // title: "Well Done!",
                        text: "Stock Quantity is :" + result.qty,

                        // type: "success"
                    });
                    $('#qty').val(result.qty);
                    Avialableqty = result.qty;
                }
            }
        });
    }

}
/// Add transfer Details
function AddNewItemStockMovment() {
    if ($('#item_id').val() == 0 || $('#qty').val() == "") {
        swal({
            title: "Sorry!!",
            text: "Please Select Item and insert the qty",
            icon: "warning",
            button: "okay !",
            type: "warning"
        });
    }else if ( $('#qty').val() > Avialableqty) {
        swal({
            title: "Sorry!!",
            text: "The transfer Qty is greater than available qty in stock ",
            icon: "warning",
            button: "okay !",
            type: "warning"
        });
    } else {
        const q = inventory__movement_details.find(x => x.item_id === $('#item_id').val());

        if (!q) {
            var NewItem = {
                item_id: $('#item_id').val(),
                item_name: $("#item_id option:selected").text(),
                qty: $('#qty').val(),
                notes: $('#notes').val(),
                expiry_date: $("#expiry_date option:selected").text() ,
                rowid:$("#expiry_date").val()
            };

            inventory__movement_details.push(NewItem);
            var html = '';
            html += '<tr>';
            html += '<td>' + NewItem.item_name + '</td>';
            html += '<td>' + NewItem.qty + '</td>';
            html += '<td>' + NewItem.expiry_date + '</td>';
            html += '<td>' + NewItem.notes + '</td>';
            html += '<td>' + '<a class="btn btn-xs btn-danger" onclick="DeleteRow(' + inventory__movement_details.indexOf(NewItem) + ',' + "'tbl_Details'" + ',' + 'inventory__movement_details' + ');">' + '<i class="fa fa-times"></i>' + ' Delete' + '</a>' + '</td>';
            html += '</tr>';
            // $("#tbl_invoiceDetails tbody").empty();
            $("#tbl_Details tbody").append(html);
        }
        else {
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
// }
// To Delete from Html table
function DeleteRow(item, Tbl_Name, ArrayName) {
    var row = $(this).parent().index();
    document.getElementById(Tbl_Name).deleteRow(row);

    ArrayName.splice(item, 1);
    console.log(ArrayName);
}
///save bill
function save_bill() {
    // fill order info
    var Neworder = {
        order_code: 'Rpid-O-' + Math.floor((Math.random() * 10000000)),
        order_date: $("#billdate").val(),
        shipping_date: $("#shipping_date").val(),
        delivery_date: $('#delivery_date').val(),
        recipient: $('#recipient').val(),
        recipient_phone: $('#recipient_phone').val(),
        recipient_address: $('#recipient_address').val(),
        pickup_location: $('#pickup_location').val(),
        drop_location: $('#drop_location').val(),
        status: "Pending"
    };
    Order.push(Neworder);
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    $.ajax({
        url: '/bills/savebill',
        type: 'POST',
        data: {
            bill_date: $("#billdate").val(),
            amount: $("#lbltotal").text(),
            payed: 0,
            remainig: $("#lbltotal").text(),
            code: $("#code").val(),
            customer_id: $("#customer_id").val(),
            shipper_id: $("#shipper_id").val(),
            status: "Pending",
            discount: 0,
            _token: $('meta[name="csrf-token"]').attr('content'),
            Neworder: Neworder

        },
        success: function (result) {
            save_msg("The Invoice has been successfully generated  Ref:" + result.code);
            save_billdetails(result.id, result.order_id);
        },
        error: function (result) { error_msg(); }
    });
}

//Save bil Details
function save_billdetails(bill_id, order_id) {
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    $.ajax({
        url: '/bills/save_billdetails',
        type: 'POST',
        data: { invoiceDetails: invoiceDetails, billid: bill_id, orderid: order_id },

        success: function (result) {
            save_msg("The Invoice has been successfully generated ");
            $("#tbl_invoiceDetails tbody").empty();
            resetForm('frmadd');
            $("#lblsubtotal").value = "0";
            $("#lbltotal").value = "0";
            $("#qty").value = "";
            $("#remark").value = "";
        },
        error: function (result) { error_msg(); }
    });
    alert(data);
}

//Save transfer Details
function transfer() {
    // bind data of inventory__details
    var inventory__details = {
        from_warehouse_id: $("#from_warehouse_id").val(),
        to_warehouse_id: $("#to_warehouse_id").val(),
        qty: $("#qty").val(),
        item_id: $("#item_id").val(),
    };
    // bind data of inventory__transactions
    var inventory__transactions = {
        no: 'R-' + Math.floor((Math.random() * 10000000)),
        from_warehouse_id: $("#from_warehouse_id").val(),
        to_warehouse_id: $("#to_warehouse_id").val(),
        qty: $("#qty").val(),
        item_id: $("#item_id").val(),
    };
    // bind data of inventory__transactions
    var inventory__movements = {
        no: 'R-' + Math.floor((Math.random() * 10000000)),
        from_warehouse_id: $("#from_warehouse_id").val(),
        to_warehouse_id: $("#to_warehouse_id").val(),
        notes: $("#notes").val(),
    };
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    if (inventory__movement_details.length) {
        $.ajax({
            url: '/en/inventory/transfers/Dotransfer',
            type: 'POST',
            data: { inventory__details: inventory__details, inventory__transactions: inventory__transactions, inventory__movements: inventory__movements, inventory__movement_details: inventory__movement_details },
            success: function (result) {
                save_msg("The Transaction has been successfully Completed ");
                resetForm('frmtransfer');
                $('#from_warehouse_id').val('0').trigger('change');
                $('#to_warehouse_id').val('0').trigger('change');
                // $('#expiry_date').val('0').trigger('change');
                $('#btnsave').prop("disabled", true);
                $('#btnprint').removeAttr("disabled");
                $('#btnprint').prop("href", "/en/inventory/transfers/Print/" + result.id);
                $("#tbl_Details tbody").empty();
                inventory__movement_details = [];
            },
            error: function (result) { error_msg(); }
        });
    } else {
        swal({
            title: "Sorry!!",
            text: "Please List items and try again",
            icon: "warning",
            button: "okay !",
            type: "warning"
        });
    }
}

// to Apply discount percantage
function applydiscount() {
  var percantage = parseFloat($('#amount').text()) * parseFloat($('#discount').val()) / 100 ;
         $('#net_amount').text(parseFloat($('#amount').text()) - percantage);
}
