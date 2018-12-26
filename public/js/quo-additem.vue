// var app = new Vue({
//     el: '#additem-vue',
//     data: {
//         items: "",
//         item_id: 0
//     },
//     methods: {
//         allRecords: function () {

//             axios.get('ajaxfile.php')
//                 .then(function (response) {
//                     app.users = response.data;
//                 })
//                 .catch(function (error) {
//                     console.log(error);
//                 });
//         },
//         recordByID: function () {

        
//             if ($('#test').val() > 0) {
//               console.log($('#test').val());
//                 axios.get('/en/sales/quotations/getqty/' +$('#test').val(), {
//                         // params: {
//                         //   id: $('#test').val()
//                         // }
//                     })
//                     .then(function (response) {
//                         app.items = response.data;
//                         console.log(app.items[0].warehouse_id);
//                     })
//                     .catch(function (error) {
//                         console.log(error);
//                     });
//             }
//         }
//     }
// })
const app = new Vue({
    el: "#vue-additems",
    data: { .... },
    methods: { .... },
    ....
});