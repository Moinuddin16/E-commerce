
$(document).ready(function() {
    let baseUrl = $('meta[name="baseUrl"]').attr('content');
    var table = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: baseUrl+'/admin/product-reviews',
        columns: [
            {data: 'DT_RowIndex', 'orderable': false, 'searchable': false },
            {data: 'product_name', name: 'product_name'},
            {data: 'user_name', name: 'user_name'},
            {data: 'review', name: 'review'},
            {data: 'ratings', name: 'ratings'},
            {data: 'date', name: 'date'},
            {data: 'status', name: 'status'},
            {
                data: 'action', 
                name: 'action', 
                orderable: false, 
                searchable: false
            },
        ]
    });

 
});

$(document).on('click','.approve_btn', function(e){
    let baseUrl = $('meta[name="baseUrl"]').attr('content');
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to approve this review!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Approve it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Approve!',
                'This review is approved.',
                'success'
                )
                $.ajax({
                    url: baseUrl+'/admin/product-reviews-approve/'+$(this).data('review_id'),
                    type: 'GET',
                    success: function (data) {
                        if (data.status == 'suceess') {
                            toastr.success(data.message);
                            $('#datatable').DataTable().ajax.reload();
                        }
                        else if (data.status == 'error') {
                            toastr.success(data.message);
                        }
                    },
                    error: function (data) {
                        if (data.status == 'error') {
                            toastr.success(data.message);
                        }
                    }
                });
            }
        })
});
