@extends('admin.master')
@section('title', 'Products List')
@section('main-content')
<style>
    .error{
        color:red;
    }
    .checked {
      color: orange;
    }
</style>
    <div class="container-fluid px-6 py-4">

        <div class="py-6">
            <!-- table -->
            <div class="row mb-6">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div id="examples" class="mb-4">
                        <h2>Product Review List </h2>
                    </div>
                    <!-- Card -->
                    <div class="card">
                        <div class="card-body ">
                            <div class="table-responsive">
                                <table class="table table-hover  " id="datatable">
                                    <thead>
                                        <tr>
                                            <th>#Sn</th>
                                            <th>Product Name</th>
                                            <th>User Name</th>
                                            <th>Review</th>
                                            <th>Ratings</th>
                                            <th>Date</th>
                                            <th>Status</th>
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
    <div class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Approve !</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Do you want approve this review?</p>
            </div>
            <div class="modal-footer">
              <a href="#" class="btn btn-primary">Yes</a>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
    </div>
   
    <script src="{{asset('public/assets/js/admin/product-review.js')}}"></script>
 

@endsection
