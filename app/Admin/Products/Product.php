<?php

namespace App\Admin\Products;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'product','en_desc'
    ];


    public static function get_category($item)
	{
	    $data = \DB::table($item.'_product')->groupBy('category')->get();

	    return $data;
	}

	public static function get_product($item, $category)
	{
	    $data = \DB::table($item.'_product')->where('category', '=' , $category)->get();

	    return $data;
	}

	public static function get_item($item, $elment)
	{
	    $data = \DB::table($item.'_product')->where('model', '=' , $elment)->first();

	    return $data;
	}

	public static function get_id($item, $elment)
	{
	    $data = \DB::table($item.'_product')->where('id' , (int)$elment)->first();

	    return $data;
	}

	public static function featureProduct()
	{
		$agents = Product::inRandomOrder()->take(9)->select('product')->get();

		foreach ($agents as $agent) {
			$data = array();
			$data = \DB::table($agent->product.'_product')->inRandomOrder()->first();
			if(!$data) continue;
			$data->table = $agent->product;
			$features[] = $data;
		}

		return $features;
	}
}
