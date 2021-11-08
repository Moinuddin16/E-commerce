<?php

namespace App\Http\Controllers\Admin;

use App\ProductReview;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
class ProductReviewController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
             $query = ProductReview::with('user','product')->latest()->get();
          
              return Datatables::of($query)
                ->addIndexColumn()
                 ->addColumn('product_name', function($query){
                    return isset($query->product) ? $query->product->name : '';
                 })
                 ->addColumn('user_name', function($query){
                    return isset($query->user) ? $query->user->username : '';
                })
                 ->addColumn('ratings', function($query){
                        return ProductReview::returnRatingsStars($query->rating);
                 })
                 ->addColumn('date', function($query){
                        return date('Y-m-d',strtotime($query->created_at));
                 })
                 ->addColumn('status', function($query){
                        if($query->approve == 1)
                        {
                            return '<span class="badge badge-success">Approve</span>';
                        }
                        else
                        {
                            return '<span class="badge badge-warning">Not Approve</span>';
                        }
                 })
                  ->addColumn('action', function($query){
                         $btn = '<button data-review_id="'.$query->id.'" class="btn edit-btn btn-sm btn-primary mb-1 approve_btn">Approve</button>';
                         return $btn;
                 })
                 ->rawColumns(['action', 'product_name','ratings','date','status'])
                        
                 ->make(true);
        }  

        $productReviews = ProductReview::with('user','product')->get();
        return view('admin.reviews.index',compact('productReviews'));
    }

    public function approveModal($id)
    {
        return view('admin.reviews.approve-modal',compact('id'));
    }
    public function approve($id)
    {
        $review = ProductReview::find($id);
        $review->approve = 1;
        $result =  $review->save();;

        if($result)
        {
            return response()->json(['status' => 'suceess','message'=>'Product Review approve Successfully']);
        }
        else
        {
            return response()->json(['status' => 'error','message'=>'Something went wrong']);
        }
        
    }

}
