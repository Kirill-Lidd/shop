<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Admin\Admin;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderProduct;


class AdminController extends Controller
{
	public function index()
	{
		
		return view('Admin/admin');
	}

 

	 public function create_product(Request $req){
             
            // add to base
            $product = new Product();
            $product->name = $req->input('name');
            $product->price = $req->input('price');
            $product->image = $req->file('image')->store('uploads','public');
            $product->category_slug = $req->input('category_slug');
            $product->description = $req->input('description');
            $product->save();
     
            // redirect to home
            return redirect()->back();
    }

    public function create_category(Request $req){
           
          // add to base
          $category = new Category();
          $category->name = $req->input('name');
          $category->slug = AdminController::translit_sef($category->name);
    
          $category->save();
    
          // redirect to home
          return redirect()->back();
      }


      public function view_product()
      {
        $category_list = Category::get();

        return view('Admin/admin-create_product',compact('category_list'));
      }
      public function view_category()
      {
        return view('Admin/admin-create_category');
      }

     
       public function translit_sef($value)
       {
         $converter = array(
           'а' => 'a',    'б' => 'b',    'в' => 'v',    'г' => 'g',    'д' => 'd',
           'е' => 'e',    'ё' => 'e',    'ж' => 'zh',   'з' => 'z',    'и' => 'i',
           'й' => 'y',    'к' => 'k',    'л' => 'l',    'м' => 'm',    'н' => 'n',
           'о' => 'o',    'п' => 'p',    'р' => 'r',    'с' => 's',    'т' => 't',
           'у' => 'u',    'ф' => 'f',    'х' => 'h',    'ц' => 'c',    'ч' => 'ch',
           'ш' => 'sh',   'щ' => 'sch',  'ь' => '',     'ы' => 'y',    'ъ' => '',
           'э' => 'e',    'ю' => 'yu',   'я' => 'ya',
         );
        
         $value = mb_strtolower($value);
         $value = strtr($value, $converter);
         $value = mb_ereg_replace('[^-0-9a-z]', '-', $value);
         $value = mb_ereg_replace('[-]+', '-', $value);
         $value = trim($value, '-'); 
        
         return $value;
       }
      
       public function view_order()
      {
         $orders = AdminController::show_order();
         $order_product = AdminController::show_products_for_order();
         $products = Product::all();

         return view('Admin/admin-show_order',compact('orders','order_product','products'));
      }
      public function show_order(){
        $orders = Order::all();

        return $orders;
      }
      
      public function show_products_for_order(){
        
          $order_product = OrderProduct::all();
          
        
          return $order_product;
      }
      

	
}
