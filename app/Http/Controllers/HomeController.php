<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::id()){
            return redirect('redirect');
        }else{
            $data = Product::paginate(3);
            return view('user.home',compact('data'));
        }
    }
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        if($usertype == 1){
            return view('admin.home');
        }else{
            $data = Product::paginate(3);
            $user = auth()->user();
            $count = Cart::where('phone',$user->phone)->count();
            return view('user.home',compact('data','count'));   
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function removeProduct($id)
    {
        $data = Cart::find($id);
        $data->delete();
        return redirect()->back()->with('message','prduct removed successfully...');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showCart()
    {
        $user = auth()->user();
        $cart = Cart::where('phone',$user->phone)->get();
        $count = Cart::where('phone',$user->phone)->count();
        return view('user.showCart',compact('count','cart'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $req)
    {
        $search = $req->search;
        if($search==''){
            $data = Product::paginate(3);
            $user = auth()->user();
            // $count = Cart::where('phone',$user->phone)->count();
            // return view('user.home',compact('data','count'));   
            return view('user.home',compact('data'));   
        }else{

            $data = Product::where('title','Like','%'.$search.'%')->get();
            return view('user.home',compact('data'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addCart(Request $req, $id)
    {
        // return $id;
        if(Auth::id()){
            $user = auth()->user();
            $cart = new Cart;
            $product = Product::find($id);
            $cart->name = $user->name;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->product_title = $product->title;
            $cart->quantity = $req->quantity;
            $cart->price = $product->price;
            $cart->save();
            return redirect()->back()->with('message','product added to cart');
        }else{
            return redirect('login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirmOrder(Request $req)
    {
        $user = auth()->user();
        $name = $user->name;
        $phone = $user->phone;
        $address = $user->address;
        $status = 'in process';
        
        foreach($req->productTitle as $key => $productTitle){
            $order = new Order;
            $order->name = $name;
            $order->phone = $phone;
            $order->address = $address;
            $order->product_title = $req->productTitle[$key];
            $order->quantity = $req->quantity[$key];
            $order->price = $req->price[$key];
            $order->status = $status;
            $order->save();
        }
        DB::table('carts')->where('phone',$phone)->delete();
        return redirect()->back()->with('message','the products will deliver soon...');

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
}
