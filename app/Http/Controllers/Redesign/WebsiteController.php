<?php

namespace App\Http\Controllers\Redesign;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Products\Product;
use App\Admin\Pages\Page;

class WebsiteController extends Controller
{
    //
    public function home()
    {        
        $products = Product::orderBy('id')->get();
        $features = Product::featureProduct();
        if(\App::isLocale('en')) {
            $pages = Page::pluck('content', 'page');
        } else {
            $pages = Page::pluck('content_ar', 'page');
        }
        
        $site_content = \App\Admin\SiteContent\Sitecontent::getAsLang();

        return view('new.home', [
            'page' => 'home',
            'products' => $products,
            'pages' => $pages,
            'features' => $features,
            'site_content' => $site_content
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

        return view('new.partner', [
            'page' => 'partners',
            'products' => $products
        ]);
    }

    public function career()
    {
        if(\App::isLocale('en')) {
            $pages = Page::pluck('content', 'page');
        } else {
            $pages = Page::pluck('content_ar', 'page');
        }

        return view('new.career', [
            'page' => 'career',
            'pages' => $pages
        ]);
    }

    public function about()
    {
        if(\App::isLocale('en')) {
            $pages = Page::pluck('content', 'page');
        } else {
            $pages = Page::pluck('content_ar', 'page');
        }

        return view('new.about', [
            'page' => 'about',
            'pages' => $pages
        ]);
    }

    public function contacts()
    {
        $contacts = \App\Admin\SiteContent\Sitecontent::getAsLang();

        return view('new.contacts', [
            'page' => 'contacts',
            'contacts' => $contacts
        ]);
    }

    public function products($lang, $product)
    {
        $categories = Product::get_category($product);
        $product = Product::where('product', $product)->first();

        return view('new.products', [
            'page' => 'products',
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function category($lang, $product, $category)
    {
        $items = Product::get_product($product, $category);
        $product = Product::where('product', $product)->first();

        return view('new.category', [
            'page' => 'products',
            'product' => $product,
            'items' => $items
        ]);
    }

    public function item($lang, $product, $category, $items)
    {
        $item = Product::get_item($product, $items);
        $product = Product::where('product', $product)->first();

        $directory = "images/". $product->product ."/".$items."/";
        $images = glob($directory . "*.jpg");

        return view('new.item', [
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

        try {
            \Mail::send('layouts.mail', $data, function($message) {
                 $message->to($this->to)->bcc('sales@raindesigner.com')->subject('Feed Back from Website');
                 $message->from($this->to, $this->name);
                 
            });

            return "MF000";
        } catch (Exception $ex) {
            // Debug via $ex->getMessage();
            return $ex->getMessage();
            return 'MF255';
        }
        
    }
}
