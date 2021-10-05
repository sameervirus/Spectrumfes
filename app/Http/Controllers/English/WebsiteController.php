<?php

namespace App\Http\Controllers\English;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Products\Product;

class WebsiteController extends Controller
{
    //
    public function home()
    {
        $products = Product::orderBy('id')->get();

        $directory = "images/customers/";
        $images = glob($directory . '*.*');

        return view('en.home', [
            'page' => 'home',
            'products' => $products,
            'customers' => $images
        ]);
    }

    public function solutions()
    {
        return view('en.solutions', [
            'page' => 'solutions'
        ]);
    }

    public function partners()
    {
        $products = Product::orderBy('id')->get();

        return view('en.partner', [
            'page' => 'partners',
            'products' => $products
        ]);
    }

    public function customers()
    {
        return view('en.customers', [
            'page' => 'customers'
        ]);
    }

    public function career()
    {
        return view('en.career', [
            'page' => 'career'
        ]);
    }

    public function about()
    {
        return view('en.about', [
            'page' => 'about'
        ]);
    }

    public function contacts()
    {
        $contacts = \App\Admin\SiteContent\Sitecontent::where('lang' , 'en')->pluck('content', 'code');

        return view('en.contacts', [
            'page' => 'contacts',
            'contacts' => $contacts
        ]);
    }

    public function products($product)
    {
        $categories = Product::get_category($product);

        return view('en.products', [
            'page' => 'products',
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function category($product, $category)
    {
        $items = Product::get_product($product, $category);

        return view('en.category', [
            'page' => 'products',
            'product' => $product,
            'category' => $category,
            'items' => $items

        ]);
    }

    public function item($product, $category, $items)
    {
        $item = Product::get_item($product, $items);

        $directory = "images/".$product."/".$items."/";
        $images = glob($directory . "*.{jpg,png}", GLOB_BRACE);

        return view('en.item', [
            'page' => 'products',
            'product' => $product,
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
