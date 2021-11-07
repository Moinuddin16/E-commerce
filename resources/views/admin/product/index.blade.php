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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-html5-1.5.1/datatables.min.css"/>
  
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-html5-1.5.1/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>

<script>
    $(document).ready(function() {
        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('product.index') }}",
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
</script> 
@endsection
