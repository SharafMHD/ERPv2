var inventory__details = [];
/// Add to list Details 
function AddNewItemStockIn() {
    if ($('#item_id').val() == 0 || $('#qty').val() == "" || $('#warehouse_id').val() == 0 || $('#expiry_date').val() == "") {
        swal({
            title: "Sorry!!",
            text: "Please Select Item ,warehouse,expiry date and insert the Quantity",
            icon: "warning",
            button: "okay !",
            type: "warning"
        });
    } else {
        const q = inventory__details.find(x => x.item_id === $('#item_id').val());

        if (!q) {
            var NewItem = {
                warehouse_id: $('#warehouse_id').val(),
                warehouse_name: $("#warehouse_id option:selected").text(),
                item_id: $('#item_id').val(),
                item_name: $("#item_id option:selected").text(),
                qty: $('#qty').val(),
                expiry_date: $('#expiry_date').val()
               
            };

            inventory__details.push(NewItem);
            var html = '';
            html += '<tr>';
            html += '<td>' + NewItem.warehouse_name + '</td>';
            html += '<td>' + NewItem.item_name + '</td>';
            html += '<td>' + NewItem.qty + '</td>';
            html += '<td>' + NewItem.expiry_date + '</td>';
            html += '<td>' + '<a class="btn btn-xs btn-danger" onclick="DeleteRow(' + inventory__details.indexOf(NewItem) + ',' + "'tbl_Details'" + ','+'inventory__details'+ ');">' + '<i class="fa fa-times"></i>' + ' Delete' + '</a>' + '</td>';
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
//Save Stockin Details 
function Stockin() {
    // bind data of inventory__details
 
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    if (inventory__details.length) {
        $.ajax({
            url: '/en/inventory/stockDetails/store',
            type: 'POST',
            data: { inventory__details: inventory__details ,   no: 'R-' + Math.floor((Math.random() * 10000000))},
            success: function (result) {
                save_msg("The Transaction has been successfully Completed ");
                resetForm('frmstockin');
                $('#warehouse_id').val('0').trigger('change');
                $('#item_id').val('0').trigger('change');
              $('#btnsave').prop("disabled", true);
              $('#btnprint').removeAttr("disabled");
              $('#btnprint').prop("href", "/en/inventory/stockDetails/print/" + result.id);
                $("#tbl_Details tbody").empty();
                inventory__details = [];
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