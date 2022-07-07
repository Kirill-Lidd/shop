<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Review;
use App\Models\Order;
use App\Models\OrderProduct;



class ProductController extends Controller
{
    public function showProduct($cat)
    {	
    	$products = Product::where('category_slug',$cat)->paginate(8);
      
       
        
  		return view('products',compact('products'));
    }

    public function test($id)
    {
        $sum_rate = 0;        
        $rating = Product::find($id)->ratings()->get();
        foreach ($rating as $key) {
            $sum_rate += $key->rating;
        }
        if($sum_rate != 0){

            $sum_rate /= count($rating);
        }

        return $sum_rate;
    }
   

    public function search(Request $request){
        $text = $request->text;


        $products = Product::where('name','LIKE',"%{$text}%")->orderBy('name')->paginate(8);
        return view('products',['products' => $products]);
    }

    public function cart(Request $request){
        
        
        $products = session('products');
        $sum = 0; 
        
        return view('cart',compact('products','sum'));
    }

    public function add_to_cart(Request $request){
        $get_product = Product::where('id',$request->id)->first();
        
        if(session()->has('products')){  
           foreach (session('products') as $key) {
              if ($get_product->id == $key->id) {
                  return redirect()->back();
              }
            } 
        }
            
        $request->session()->push('products',$get_product);  

        return redirect()->back();

    }

    public function delete_all(){

        session()->forget('products');
               
        return redirect()->back();

    } 

    public function delete_favorite(Request $request){
        $favorites = session('favorites');

        foreach ($favorites as $key => $value) {
            if ($value->id == $request->id) {
                unset($favorites[$key]);
            }
        }

        session(['favorites' => $favorites]);
        
        if(count($favorites) < 1){
            session()->forget('favorites');
        }

        return redirect()->back();

    } 
    public function delete_product(Request $request){
        $products = session('products');

        foreach ($products as $key => $value) {
            if ($value->id == $request->id) {
                unset($products[$key]);
            }
        }

        session(['products' => $products]);

        if(count($products) < 1){
            session()->forget('products');
        }

        return redirect()->back();

    } 

    public function add_to_favorite(Request $request){

        $products = Product::where('id',$request->id)->first();
         
      
        $request->session()->push('favorites',$products);

        return redirect()->back();

    } 
    public function favorite_index(Request $request){
        $favorites = session('favorites');
        
        return view('favorite',compact('favorites'));

    }


    public function order(){
        $products = session('products');
        
        return view('order',compact('products'));
    }   

    public function confirm_order(Request $req){
       
        $order = new Order();
        $order->name = $req->input('name');
        $order->phone = $req->input('phone');
        $order->email = $req->input('email');
        $order->mhetod_obtaining = $req->input('mhetod_obtaining');
        $order->address_shop = $req->input('address_shop');
        $order->address = $req->input('address');
        $order->mhetod_payment = $req->input('mhetod_payment');
        
        $order->save();

        $get_order = Order::latest()->get('id');

        $order_product = new OrderProduct;
        
        foreach ($req->id as $key => $value) {
            $products = [
                'product_id' => $req->id[$key], 
                'order_id' =>  $get_order[0]['id']
            ];
        $order_product->insert($products);
        }
        
        session()->forget('products');
        

       
        return redirect('');
    }


  
}
