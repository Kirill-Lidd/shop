<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Product;

class ReviewController extends Controller
{
    public function create_review(Request $req,$id)
    {
        $req->validate([
                
            'rating' => 'required',
            'dignites' => 'nullable',
            'disadvantages' => 'nullable',
            'coment' => 'nullable',

        ]);

    	$review = new Review();
    	$review->product_id = $id;
    	$review->rating = $req->input('rating');
    	$review->coment = $req->input('coment');
    	$review->dignites = $req->input('dignites');
    	$review->disadvantages = $req->input('disadvantages');
    	
    	$review->save();
    	return redirect()->back();
    }


    public function description(Request $request, $id)
    {   

       $reviews = Review::where('product_id',$id)->orderBy('id','desc')->get();

       $description = Product::where('id',$id)->first();
       


       return view('description',compact('description','reviews'));

    } 
}
