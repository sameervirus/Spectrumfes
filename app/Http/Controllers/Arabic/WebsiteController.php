<?php

namespace App\Http\Controllers\Arabic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Products\Product;

class WebsiteController extends Controller
{
    //
    public function home()
    {
        \App::setLocale('ar');
        $products = Product::orderBy('id')->get();

        return view('ar.home', [
            'page' => 'home',
            'products' => $products
        ]);
    }

    public function solutions()
    {
        return view('ar.solutions', [
            'page' => 'solutions'
        ]);
    }

    public function partners()
    {
        $products = Product::orderBy('id')->get();

        return view('ar.partner', [
            'page' => 'partners',
            'products' => $products
        ]);
    }

    public function career()
    {
        return view('ar.career', [
            'page' => 'career'
        ]);
    }

    public function about()
    {
        return view('ar.about', [
            'page' => 'about'
        ]);
    }

    public function contacts()
    {
        $contacts = \App\Admin\SiteContent\Sitecontent::pluck('content', 'code');

        return view('ar.contacts', [
            'page' => 'contacts',
            'contacts' => $contacts
        ]);
    }

    public function products($product)
    {
        $categories = Product::get_category($product);
        $product_ar = Product::where('product', $product)->first();

        return view('ar.products', [
            'page' => 'products',
            'product' => $product,
            'product_ar' => $product_ar,
            'categories' => $categories
        ]);
    }

    public function category($product, $category)
    {
        $items = Product::get_product($product, $category);
        $product_ar = Product::where('product', $product)->first();

        return view('ar.category', [
            'page' => 'products',
            'product' => $product,
            'product_ar' => $product_ar,
            'category' => $category,
            'items' => $items

        ]);
    }

    public function item($product, $category, $items)
    {
        $item = Product::get_item($product, $items);
        $product_ar = Product::where('product', $product)->first();

        $directory = "images/".$product."/".$items."/";
        $images = glob($directory . "*.jpg");

        return view('ar.item', [
            'page' => 'products',
            'product' => $product,
            'product_ar' => $product_ar,
            'category' => $category,
            'item' => $item,
            'images' => $images
        ]);
    }

    // Send Email
    public function send_email(Request $request)
    {
        
        //return $request->all();

        $this->validate(request(), [
            'email' => 'required|email',
            'name' => 'required',
            'user_message' => 'required'
        ]);     
                
        $this->to = \App\Admin\SiteContent\Sitecontent::where('code','=','email')->value('content');

        $this->email = $request->email;
        $this->name = $request->name;

        $data = array_except($request->all(), ['_token']);
        
        //$this->to = 'info@raindesigner.com';
        
        \Mail::send('layouts.mail', $data, function($message) {
         $message->to($this->to)->bcc('sales@raindesigner.com')->subject('Feed Back from Website');
         $message->from($this->email, $this->name);
         
        });
        
        return back()->with('feedback','sucsses');
    }
}
