<?php

namespace App\Http\Controllers\Web;

use App\Product;
use App\ProductReview;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WebPorductController extends Controller
{
    public function productDetailsPage($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $productReviews = ProductReview::where('product_id', $product->id)->where('approve',1)->with('user')->get();

        return view('web.product.productDetails',compact('product','productReviews'));
    }

    public function submitReview(Request $request)
    {
       
        $productReview = new ProductReview();
        $productReview->product_id = $request->product_id;
        $productReview->user_id = Auth::check() ? Auth::user()->id : 0;
        $productReview->review = $request->review ? $request->review : '';
        $productReview->rating = isset($request->rating) ? $request->rating : 0;
        $result =  $productReview->save();
        if($result)
        {
            return response()->json(['status' => 'suceess','message'=>'Your review is submitted successfully. Please wait for admin approval',"review" => $productReview , 'username' => Auth::check() ? Auth::user()->username : '']);
        }
        else
        {
            return response()->json(['status' => 'error','message'=>'Something went wrong']);
        }

    }
}
