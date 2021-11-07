@extends('admin.master')
@section('title', 'Add Employee Info')
@section('main-content')

    <style>
        .error {
            color: red;
        }

    </style>

    <div class="container-fluid px-6 py-4">

        <div class="py-6">
            <!-- table -->
            <div class="row mb-6">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div id="examples" class="mb-4">
                        <h2>Add Product</h2>
                    </div>
                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('product.store') }}" id="employee_info_form" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="product_code">Product Code:<span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="product_code" 
                                            name="product_code" placeholder="Enter Employee Code"
                                            value="{{ old('product_code') }}" required>
                                        @if ($errors->has('product_code'))
                                            <small class="text-danger">{{ $errors->first('product_code') }}</small>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Name:<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter Name" value="{{ old('name') }}" required>
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
                                            value="{{ old('stock') }}" required>
                                        @if ($errors->has('stock'))
                                            <small class="text-danger">{{ $errors->first('stock') }}</small>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="price">Price:<span class="text-danger">*</span> </label>
                                        <input type="number" step="1" min="0" class="form-control" id="price"
                                            name="price" placeholder="Enter Price"
                                            value="{{ old('price') }}" required>
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
                                            required>
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="form-group col-md-12">
                                        <label for="photo">Details:<span class="text-danger">*</span> </label>
                                        <textarea name="details" id="" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg-12 text-right">
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        CKEDITOR.replace('details');
    </script>
@endsection
