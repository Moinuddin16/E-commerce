@extends('admin.master')
@section('title', 'Products List')
@section('main-content')
<style>
    .error{
        color:red;
    }
</style>
    <div class="container-fluid px-6 py-4">

        <div class="py-6">
            <!-- table -->
            <div class="row mb-6">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div id="examples" class="mb-4">
                        <h2>Product List </h2>
                        <div class="text-right">
                            <a href="{{route("product.create")}}" class="btn btn-success">Add</a>
                        </div>
                    </div>
                    <!-- Card -->
                    <div class="card">
                        <div class="card-body ">
                            <div class="table-responsive">
                                <table class="table table-hover  " id="datatable">
                                    <thead>
                                        <tr>
                                            <th>Product Code</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                            <th>Details</th>
                                            <th>Photo</th>
                                            <th width="100px">Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            </div>
                       
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div id="show-details-model">
        @include('admin.product.product-details-model')
    </div>
    <div id="show-product-model">
        @include('admin.product.product-update-model')
    </div>
    <script src="{{asset('public/assets/js/admin/product.js')}}"></script>

@endsection
