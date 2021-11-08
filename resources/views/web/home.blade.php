@extends('web.master')
@section('title', 'Home Page')
@section('main-content')
<style>
    .checked {
      color: orange;
    }
    .stock{
      background: rgba(55, 75, 185, 0.1) !important;
      color: #3749BB !important;
    }
</style>
     <div class="row m-5" >

      @if(isset($products))
        @foreach($products as $product)
        <div class="col-lg-3 mb-5">
          <div class="card" style="width: 18rem;">
              <img class="card-img-top" style="height: 288;width:288px" src="{{asset($product->photo)}}" alt="Card image cap">
              <div class="card-body" >
              <h5 class="card-title text-uppercase font-weight-bold">{{$product->name}}</h5>
              
              <div class="mb-2 mt-2 text-center">
                {{  App\Product::calculateRating( isset($product->ratings) && count($product->ratings)>0 ? $product->ratings->avg('rating'):0)}}
               
              </div>

             
              <div class="col-lg-12 text-center" style="color: #EF4A23"><strong>{{Config::get('app.curreny')}} {{$product->price}}</strong></div>
              @if($product->stock > 0)
              <div class="col-lg-12 text-center stock">In Stock</div>
              @else
              <div class="col-lg-12 text-center stock">Out Off Stock</div>
              @endif
             
            
                <a href="{{url('product-details/'.$product->slug)}}" style="padding: 3px !important" class="mt-2 btn btn-outline-primary  btn-block">See Details</a>
              </div>
            </div>
       </div>
        @endforeach
      @endif
        
     </div>
@endsection

