// Bootstrap Table - detail view without plus icon, to answer https://github.com/wenzhixin/bootstrap-table/issues/964, uses bootstrap-table.10.1.min.js, simple handler, simple css


/* Latest compiled and minified JavaScript included as External Resource */

var $table = $('#myTable');

$('#myTable').on('expand-row.bs.table', function(e, index, row, $detail) {
  var res = $("#desc" + index).html();
  $detail.html(res);
});

$table.on("click-row.bs.table", function(e, row, $tr) {

  // prints Clicked on: table table-hover, no matter if you click on row or detail-icon
  console.log("Clicked on: " + $(e.target).attr('class'), [e, row, $tr]);

  // In my real scenarion, trigger expands row with text detailFormatter..
  //$tr.find(">td>.detail-icon").trigger("click");
  // $tr.find(">td>.detail-icon").triggerHandler("click");
  if ($tr.next().is('tr.detail-view')) {
    $table.bootstrapTable('collapseRow', $tr.data('index'));
  } else {
    $table.bootstrapTable('expandRow', $tr.data('index'));
  }
});
