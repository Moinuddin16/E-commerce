$(document).ready(function() {
    let baseUrl = $('meta[name="baseUrl"]').attr('content');
    var table = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: baseUrl + '/admin/product',
        columns: [
            {data: 'product_code', name: 'product_code'},
            {data: 'name', name: 'name'},
            {data: 'price', name: 'price'},
            {data: 'stock', name: 'stock'},
            {data: 'details', name: 'details'},
            {data: 'photo', name: 'photo'},
            {
                data: 'action', 
                name: 'action', 
                orderable: false, 
                searchable: false
            },
        ]
    });

});

$(document).on('submit', '#product_update_form', function(e){
    e.preventDefault();
    e.stopImmediatePropagation();
    formData =  $(this)[0];
    formData =  new FormData(formData);
    formData.append('photo', $('input[type=file]')[0].files[0]);
    formData.append('_token',csrfToken);
    if($(this).valid()) {
        $.ajax({
            url: $(this).attr('action'),
            type:  $(this).attr('method'),
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
               
                if(data.status == 'suceess'){
                    console.log(data);
                    toastr.success(data.message);
                    $('#exampleModal2').modal('hide');
                    $('#product_update_form')[0].reset();
                    $('#datatable').DataTable().ajax.reload();
                }else{
                    toastr.error("Something went wrong");
                }
            },
            error: function(data){
                var errors = data.responseJSON;
                if(errors.errors){
                    toastr.error(errors.errors);
                }
            }
        });
    }
});

$(document).on('submit', '#product_details_form', function(e){
    e.preventDefault();
    e.stopImmediatePropagation();
    var formData = new FormData(this);
    $.ajax({
        url: $(this).attr('action'),
        type: 'POST',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
            if(data.status == 'suceess'){
                toastr.success(data.message);
                $('#show-prodcut-details-modal').modal('hide');
                $('#product_details_form')[0].reset();
                $('#datatable').DataTable().ajax.reload();
            }else{
                toastr.error("Something went wrong");
            }
        },
        error: function(data){
            var errors = data.responseJSON;
            if(errors.errors){
                toastr.error(errors.errors);
            }
        }
    });
});