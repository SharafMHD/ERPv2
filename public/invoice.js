// $('#printInvoice').click(function(){
//     Popup($('.invoice')[0].outerHTML);
//     function Popup(data) 
//     {
//         window.print();
//         return true;
//     }
// });
// $("#printInvoice").click(function(){

// });
// function print() {
//     var divContents = $("#invoice").html();
//     var printWindow = window.open('', '', 'height=400,width=800');
//     printWindow.document.write('<html><head><title>DIV Contents</title>');
//     printWindow.document.write('</head><body >');
//     printWindow.document.write(divContents);
//     printWindow.document.write('</body></html>');
//     printWindow.document.close();
//     printWindow.print();
// }
function PrintElem(elem)
{
    var mywindow = window.open('', 'PRINT', 'height=400,width=600');

    mywindow.document.write('<html><head><title>' + document.title  + '</title>');
    mywindow.document.write('</head><body >');
    mywindow.document.write('<h1>' + document.title  + '</h1>');
    mywindow.document.write(document.getElementById(elem).innerHTML);
    mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();
    mywindow.close();

    return true;
}