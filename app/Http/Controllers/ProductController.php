<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use App\Traits\ImageHandler;
use Config;
class ProductController extends Controller
{
    use ImageHandler;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::all();
      
        if($request->ajax())
        {
             $query = Product::latest()->get();
          
              return Datatables::of($query)
                 ->addColumn('price', function($query){
                     return Config::get('app.curreny')." ".$query->price;
                 })
                 ->addColumn('details', function($query){
                    $btn = '<a href="javascript:void(0)" onclick="showProductDetailsModal('.$query->id.')" class="btn edit-btn btn-sm btn-success mb-1">See Details</a>';
                    return $btn;
                })
                 ->addColumn('photo', function($query){
                         return '<img src="'.asset($query->photo).'" width="100px" height="100px" alt="">';
                 })
                  ->addColumn('action', function($query){
                         $btn = '<a href="javascript:void(0)" onclick="showProductModal('.$query->id.')" class="btn edit-btn btn-sm btn-primary mb-1">Edit</a>';
                         $btn .= '<a href="javascript:void(0)" onclick="deleteProduct('.$query->id.')" class="btn delete-btn btn-sm btn-danger ml-1 mb-1">Delete</a>';
                         return $btn;
                 })
                 ->rawColumns(['action', 'photo','details'])
                        
                 ->make(true);
        }  
    
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator =  \Validator::make($request->all(),[
            'product_code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'price' => 'required',
            'stock' => 'required',
            'details' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
    
        $product = new Product();
        $product->product_code = $request->product_code;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->details = $request->details;
        $photo = '';
        if($request->hasFile('photo')){
            $photo = $this->uploadImage($request->file('photo'), public_path('/product_images'),200,200,'public/product_images');
            $photo = 'public/product_images/'.$photo;
        }
        $product->photo = !empty($photo)?$photo : '';
        $result = $product->save();
 
       if($result){
           return redirect()->route('product.index')->with(['alert_type' => 'success','message'=>'Product Added Successfully']);
       }else{
           return redirect()->route('product.index')->with(['alert_type' => 'error','message'=>'Something went wrong']);
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editData = Product::find($id);
        return view('admin.product.product-update-model',compact('editData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->product_code = $request->product_code;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $photo = '';
        if($request->hasFile('photo')){
            if(file_exists($product->photo)){
                unlink($product->photo);
            }
            $photo = $this->uploadImage($request->file('photo'), public_path('/product_images'),200,200,'public/product_images');
            $photo = 'public/product_images/'.$photo;
            $product->photo = !empty($photo)?$photo : '';
        }
        $result = $product->save();

        if($result)
        {
            return response()->json(['status' => 'suceess','message'=>'Product Updated Successfully']);
        }
        else
        {
            return response()->json(['status' => 'error','message'=>'Something went wrong']);
        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public  function productDetails($id)
    {
        $editData = Product::find($id);
        return view('admin.product.product-details-model',compact('editData'));
    }

    public function productDetailUpdate(Request $request)
    {
        $product = Product::find($request->id);   
        $product->details = $request->details;
        $result = $product->save();

        if($result)
        {
            return response()->json(['status' => 'suceess','message'=>'Details Updated Successfully']);
        }
        else
        {
            return response()->json(['status' => 'error','message'=>'Something went wrong']);
        }

    }

    public function deleteData($id)
    {
        $product = Product::find($id);
        if(file_exists($product->photo)){
            unlink($product->photo);
        }
        $product->delete();
        return response()->json(['status' => 'success','message'=>'Product Deleted Successfully']);
    }
}
