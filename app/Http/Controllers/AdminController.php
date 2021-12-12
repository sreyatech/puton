<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function product()
    {
        if(Auth::id()){
            if(Auth::user()->usertype=='1'){
                return view('admin.product');
            }else{
                return redirect()->back();
            }
        }else{
            return redirect('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadProduct(Request $req)
    {
        $data = new Product;
        $data->title = $req->title;
        $data->price = $req->price;
        $data->description = $req->description;
        $data->quantity = $req->quantity;
        $image = $req->file;
        $iamgename = time().'.'.$image->getClientoriginalExtension();
        $req->file->move('productImage',$iamgename);
        $data->image=$iamgename;
        $data->save();
            return redirect()->back()->with('message','product data has been saved successfully...');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showProducts()
    {
        $data = Product::all();
        return view('admin.showProduct',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteProduct($id)
    {
        $data = Product::find($id);
        $data->delete();
        return redirect()->back()->with('message','product deleted successfully...');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProduct($id)
    {
        $data = Product::find($id);
        return view('admin.updateProduct',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateSave(Request $req, $id)
    {
        $data = Product::find($id);
        $data->title = $req->title;
        $data->price = $req->price;
        $data->description = $req->description;
        $data->quantity = $req->quantity;
        $image = $req->file;
        if($image){

            $iamgename = time().'.'.$image->getClientOriginalExtension();
            $req->file->move('productImage',$iamgename);
            $data->image=$iamgename;
        }
        $data->save();
            return redirect()->back()->with('message','product data has been updated successfully...');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
     public function showOrders(){
         $data = Order::all();
         return view('admin.showOrders',compact('data'));
     }
     public function deleteOrder($id){
         $data = Order::find($id);
         $data->delete();
        return redirect()->back()->with('message','customer order deleted successfully...');
    }
     public function updateStatus($id){
         $data = Order::find($id);
         $data->status = 'delivered';
         $data->save();
        return redirect()->back()->with('message','customer order updated successfully...');
    }
}
