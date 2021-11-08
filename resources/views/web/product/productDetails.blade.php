@extends('web.master')
@section('title', 'Product Details Page')
@section('main-content')

<link rel="stylesheet" href="{{asset('public/assets/css/product_details.css')}}">
<div class="container">
    <div class="card mt-5">
        <div class="card-body">
          
        </div>
       
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card mt-5">
                <div class="card-body">
                    <img src="{{asset($product->photo)}}" alt="" style="height:500px;widht:500px">
                </div>
            </div>
        </div>
        <div class="col-lg-6 overflow-auto"  style="height: 570px;Width:570px">
            <div class="card mt-5">
                <div class="card-body">
                  <h4>{{$product->name}}</h4>
                  <span class="badge bg-secondary p-2">Price : <strong>{{Config::get('app.curreny')}} {{$product->price}}</strong></span>
                  <span class="badge badge-secondary p-2">Status : <strong>@if($product->stock > 0)In Stock @else Out Off Stock @endif</strong> </span>
                  <span class="badge badge-secondary p-2">Product Code : <strong>{{$product->product_code}}</strong></span>
                  <div class="mt-2">
                      {!! $product->details !!}
                  </div>
                  <div class="mt-2">
                    <div class="qty mt-5">
                        <span class="minus bg-primary">-</span>
                        <input type="number" class="count" name="qty" value="1" max="0" step="1" max="10">
                        <span class="plus bg-primary">+</span>
                        @if($product->stock > 0)
                            <button class="btn btn-sm btn-primary ml-1"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Buy Now</button>
                        @endif
                    </div>
              
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-12 mb-5">
            <div class="card mt-5">
                <div class="card-body">
                    <input type="hidden" id="auth_checker" value="@if(Auth::check() && Auth::user()->is_admin != 1 ){{Auth::check()}}@else{{"0"}}@endif">
                    <div class="well well-sm">
                        <div class="text-right">
                            {{session()->put('redirect_path', url()->current())}}
                           
                            @if(Auth::check()  && Auth::user()->is_admin != 1)
                                <a class="btn btn-success btn-green leave_reveiw" href="#reviews-anchor" id="open-review-box">Leave a Review</a>
                                
                            @else
                            <a class="btn btn-success btn-green" href="{{url('/login')}}" >Leave a Review</a>
                            @endif
                          
                        </div>
                    
                        <div class="row" id="post-review-box" style="display:none;">
                            <div class="col-md-12">
                                <form accept-charset="UTF-8" action="{{url("submit-reveiw")}}" id="submit-review-from" method="post">
                                    @csrf
                                    <input name="product_id" type="hidden" value="{{$product->id}}"> 
                                    <input id="ratings-hidden" name="rating" type="hidden"> 
                                    <textarea class="form-control animated" cols="50" id="new-review" name="review" placeholder="Enter your review here..." rows="5"></textarea>
                    
                                    <div class="text-right">
                                        <div class="stars starrr" data-rating="0"></div>
                                        <a class="btn btn-danger btn-sm" href="#" id="close-review-box" style="display:none; margin-right: 10px;">
                                        <span class="glyphicon glyphicon-remove"></span>Cancel</a>
                                        <button class="btn btn-success btn-sm " type="submit">Submit</button>
                                    </div>
                                </form>

                               
                            </div>
                        </div>
                        <input type="hidden" value="{{url('/')}}" id="baseUrl">
                        <hr>
                        <div class="row all_reviews">
                            
                            @if(isset($productReviews))
                                @foreach ($productReviews as $item)
                                <div class="col-lg-1" style="margin-right: -25px !important">
                                    <img src="{{asset('public/assets/avater.png')}}" alt="" width="50px" height="50px">
                                </div>
                                <div class="col-lg-11">
                                    <h5><strong>@if(isset($item->user)){{$item->user->username}}@endif</strong></h5>
                                    <div class="">
                                        {{  App\ProductReview::displayRatings($item->rating)}}

                                    </div>
                                   
                                    <p >{{$item->review}}</p>
                                </div>
                                <hr>
                                @endforeach
                            @endif
                           
                            
                        

                        </div>
                    </div> 
                </div>
               
            </div>
        </div>
    </div>
    
</div>

<script src="{{asset('public/assets/js/web/product_details.js')}}"></script>
@endsection

