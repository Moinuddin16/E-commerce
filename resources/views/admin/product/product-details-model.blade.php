<div class="modal  fade bd-example-modal-lg" id="show-prodcut-details-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
         
            <form action="{{ route('product_details.update') }}" id="product_details_form" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf    
                <input type="hidden" name="id" value="@if(isset($editData)){{$editData->id}}@endif">
                <textarea name="details" id="" cols="30" rows="10">@if(isset($editData)){{$editData->details}}@endif</textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        </div>
    </div>
</div>
<script>
    CKEDITOR.replace('details');
</script>
<script>
    $(document).ready(function(){
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
    });
</script>