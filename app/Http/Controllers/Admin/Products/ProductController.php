<?php

namespace App\Http\Controllers\Admin\Products;

use App\Admin\Products\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\UploadClass;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::all();

        return view('admin.products.products', [
            'products' => $products
        ]);
    }


    public function category(Request $request)
    {
        $return = array();
        $data = \DB::table($request->table .'_product')->get();
        foreach ($data as $value) {
            $return[] = [
                $value->id,
                strtoupper(str_replace('_', ' ', $value->model)),
                strtoupper(str_replace('_', ' ', $value->category)),
                $value->model_ar, 
                $value->category_ar];
        }
        return $return;
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        if($files=$request->file('file')){

            foreach ($files as $file) {
            
                $handle = new UploadClass($file);
                
                if ($handle->uploaded) {          
                  $handle->image_resize         = true;
                  $handle->image_ratio_fill     = true;          
                  $handle->file_new_name_body   = 'thumb_' . str_slug($request->model);
                  $handle->file_new_name_ext    = 'jpg';
                  $handle->image_x              = 65;
                  $handle->image_y              = 57;
                  $handle->image_convert        ='jpg';           
                  $handle->process("images/".$request->partner."/".str_slug($request->model)."/");
                  if ($handle->processed) {} else {$massage = 'error : ' . $handle->error;}
                }

                if ($handle->uploaded) {  
                  $handle->image_resize         = true;
                  $handle->image_ratio_fill     = true;
                  $handle->file_new_name_body   = 'small_' . str_slug($request->model);
                  $handle->file_new_name_ext    = 'jpg';
                  $handle->image_x              = 280;
                  $handle->image_y              = 245;
                  $handle->image_convert        ='jpg';
                  $handle->process("images/".$request->partner."/".str_slug($request->model)."/");
                  if ($handle->processed) {} else {$massage = 'error : ' . $handle->error;}
                }

                if ($handle->uploaded) {
                  $handle->image_resize         = true;
                  $handle->image_ratio_fill     = true;
                  $handle->file_new_name_body   = 'large_' . str_slug($request->model);
                  $handle->file_new_name_ext    = 'jpg';
                  $handle->image_x              = 1118;
                  $handle->image_y              = 985;
                  $handle->image_convert        ='jpg';           
                  $handle->process("images/".$request->partner."/".str_slug($request->model)."/");
                  if ($handle->processed) {$handle->clean();} else {$massage = 'error : ' . $handle->error;}          
                }
            }
        }

        $massage = 'Successfully Added';

        \DB::table($request->partner .'_product')->insert([
            'category' => str_slug($request->category),
            'category_ar' => $request->category_ar,
            'model' => str_slug($request->model),
            'model_ar' => $request->model_ar ?? '',
            'features' => $request->features ?? '',
            'features_ar' => $request->features_ar ?? '',
            'technical_data' => $request->technical_data ?? '',
            'technical_data_ar' => $request->technical_data_ar ?? '',
            'accessories' => $request->accessories ?? '',
            'accessories_ar' => $request->accessories_ar ?? '',
            'optional' => $request->optional ?? '',
            'optional_ar' => $request->optional_ar ?? '',
            'data_sheet' => $request->data_sheet ?? '',
            'equipment' => $request->equipment ?? '',
            'equipment_ar' => $request->equipment_ar ?? '',
            'benefits_features' => $request->benefits ?? '',
            'benefits_features_ar' => $request->benefits_ar ?? ''
        ]);
        
        return \Redirect::route('products.index')->with('message', $massage);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin\Products\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($category)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin\Products\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $item = explode('-', $id);
        $product = Product::get_id($item[0], $item[1]);

        $directory = "images/".$item[0]."/". $product->model ."/";
        $images = glob($directory . "*.{jpg,png}", GLOB_BRACE);

        return view('admin.products.edit', [
            'product' => $product,
            'partner' => $item[0],
             'images' => $images
         ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin\Products\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $item)
    {        
        $product = \DB::table($request->partner .'_product')->where('model', $item)->first();

        if($files=$request->file('file')){

            foreach ($files as $file) {

                $handle = new UploadClass($file);
            
                if ($handle->uploaded) {          
                  $handle->image_resize         = true;
                  $handle->image_ratio_fill     = true;          
                  $handle->file_new_name_body   = 'thumb_' . str_slug($request->model);
                  $handle->file_new_name_ext    = 'jpg';
                  $handle->image_x              = 65;
                  $handle->image_y              = 57;
                  $handle->image_convert        ='jpg';
                  $handle->process("images/".$request->partner."/".str_slug($request->model)."/");
                  if ($handle->processed) {} else {$massage = 'error : ' . $handle->error;}
                }

                if ($handle->uploaded) {  
                  $handle->image_resize         = true;
                  $handle->image_ratio_fill     = true;
                  $handle->file_new_name_body   = 'small_' . str_slug($request->model);
                  $handle->file_new_name_ext    = 'jpg';
                  $handle->image_x              = 280;
                  $handle->image_y              = 245;
                  $handle->image_convert        ='jpg';
                  $handle->process("images/".$request->partner."/".str_slug($request->model)."/");
                  if ($handle->processed) {} else {$massage = 'error : ' . $handle->error;}
                }

                if ($handle->uploaded) {
                  $handle->image_resize         = true;
                  $handle->image_ratio_fill     = true;
                  $handle->file_new_name_body   = 'large_' . str_slug($request->model);
                  $handle->file_new_name_ext    = 'jpg';
                  $handle->image_x              = 1118;
                  $handle->image_y              = 985;
                  $handle->image_convert        ='jpg';
                  $handle->process("images/".$request->partner."/".str_slug($request->model)."/");
                  if ($handle->processed) {$handle->clean();} else {$massage = 'error : ' . $handle->error;}          
                }

                $massage = 'Successfully Added';
            }
        }

        \DB::table($request->partner .'_product')
            ->where('model', $item)
            ->update([
                'model'      => str_slug($request->model),
                'model_ar'   => $request->model_ar,
                'category'  => str_slug($request->category),
                'category_ar' => $request->category_ar,
                'features' => $request->features,
                'features_ar' => $request->features_ar,
                'technical_data' => $request->technical_data,
                'technical_data_ar' => $request->technical_data_ar,
                'accessories' => $request->accessories,
                'accessories_ar' => $request->accessories_ar,
                'optional' => $request->optional,
                'optional_ar' => $request->optional_ar,
                'equipment' => $request->equipment,
                'equipment_ar' => $request->equipment_ar,
                'benefits_features' => $request->benefits_features,
                'benefits_features_ar' => $request->benefits_features_ar,
                'data_sheet' => $request->data_sheet,
                'updated_at' => now()
            ]);

        $massage = 'Successfully Updated';

        return back()->with('message', $massage);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\Products\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        \File::delete('images/products/'. $product->image);
        $product->delete();
        return back()->with('message', 'Successfully Deleted!');
    }

    public function delproduct(Request $request)
    {
        $product = Product::get_id($request->table, $request->id);

        if(@$product->image) \File::delete('images/products/'. $product->image);
        \DB::table($request->table .'_product')->where('id', $request->id)->delete();
        return back()->with('message', 'Successfully Deleted!');
    }
}
