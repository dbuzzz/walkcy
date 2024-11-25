$(document).ready(function(){
	showDatatable();
	ConatctDatatable();
});



function showDatatable(){
    $('#cat_datatable').DataTable().destroy();
    startDate = $('#startDate').val();
    endDate =$('#endDate').val();
    paymentMethod = $('#paymentMethod').val();
	var table = $('#cat_datatable').DataTable({
        processing: true,
        serverSide: true,
        // ajax: siteUrl+"/order/show",
        ajax: {
            'url': siteUrl+"/order/show",
            data: function(data) {
                data.startDate = startDate;
                data.endDate = endDate;
                data.paymentMethod = paymentMethod;
            }
        },
        columns: [ 
            {data: 'DT_RowIndex'},
            {data: 'info', name: 'info'},
            // {data: 'address', name: 'address'},
            // {data: 'location', name: 'location', orderable: false, searchable: false},
            {data: 'order_date', name: 'order_date'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
}
function ConatctDatatable(){
    $('#contact_datatable').DataTable().destroy();
	var table = $('#contact_datatable').DataTable({
        processing: true,
        serverSide: true,
        // ajax: siteUrl+"/order/show",
        ajax: {
            'url': siteUrl+"/contactShow",
            // data: function(data) {
            //     data.startDate = startDate;
            //     data.endDate = endDate;
            //     data.paymentMethod = paymentMethod;
            // }
        },
        columns: [ 
            {data: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'phone', name: 'phone', orderable: false, searchable: false},
            {data: 'subject', name: 'subject'},
            {data: 'message', name: 'message', orderable: false, searchable: false},
        ]
    });
}

function order_status(id = "") {
    status = $('#order_status').val();
    $.ajax({
        url: siteUrl +"/order/order_status",
        data: { id: id, status: status},
        type: "get",
        dataType: "json",
        success: function (response) {
            if(response.status_code==200){
                console.log(response.message);
                    toastr["success"](response.message);
                    reset();
                }else if(response.status==201){
                    toastr["error"](response.message);
                    reset();
                }
        },
    });
}
