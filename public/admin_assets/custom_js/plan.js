$(document).ready(function(){
    dataTable();
});


function dataTable(){
    $('#cat_datatable').DataTable().destroy();
    var table = $('#cat_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: siteUrl+"/payment-admin/show",
        columns: [ 
            {data: 'DT_RowIndex'},
            {data: 'plan', name: 'plan'},
            {data: 'order_id', name: 'order_id'},
            {data: 'payment_id', name: 'payment_id'},
            {data: 'name', name: 'name'},
            {data: 'date', name: 'date'},
        ]
    });
}
