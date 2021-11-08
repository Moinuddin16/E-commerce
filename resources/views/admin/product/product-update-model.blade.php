<div class="modal fade bd-example-modal-lg" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Employee Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> 
            @if(isset($editData))
            <form action="{{ route('product.update',$editData->id) }}" id="product_update_form" method="POST" enctype="multipart/form-data">
          
            <input type="hidden" name="_method" value="PUT">
            <div class="modal-body">
                  @csrf
                  <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="product_code">Product Code:<span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="product_code" 
                            name="product_code" placeholder="Enter Employee Code"
                            value="{{ $editData->product_code }}" required>
                        @if ($errors->has('product_code'))
                            <small class="text-danger">{{ $errors->first('product_code') }}</small>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name">Name:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Enter Name" value="{{ $editData->name }}" required>
                        @if ($errors->has('name'))
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        @endif
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="stock">Stock:<span class="text-danger">*</span> </label>
                        <input type="number" step="1" min="0" class="form-control" id="stock"
                            name="stock" placeholder="Enter Stock"
                            value="{{ $editData->stock }}" required>
                        @if ($errors->has('stock'))
                            <small class="text-danger">{{ $errors->first('stock') }}</small>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="price">Price:<span class="text-danger">*</span> </label>
                        <input type="number" step="1" min="0" class="form-control" id="price"
                            name="price" placeholder="Enter Price"
                            value="{{ $editData->price }}" required>
                        @if ($errors->has('price'))
                            <small class="text-danger">{{ $errors->first('price') }}</small>
                        @endif
                    </div>
                </div>

                <div class="form-row ">

                    <div class="form-group col-md-6">
                        <label for="photo">Photo:<span class="text-danger">*</span> </label>
                        <input type="file" class="form-control" id="photo" name="photo"
                            placeholder="Enter Photo" value="{{ old('photo') }}" accept="image/*"
                            >
                    </div>
                </div>
               
            </div>
            @endif
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        </div>
    </div>
</div>

