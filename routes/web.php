<?php
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Redesign\WebsiteController@home');

Route::group([
  'prefix' => '{locale}', 
  'where' => ['locale' => '[a-zA-Z]{2}'],
  'middleware' => 'setlocale'
], function() {
    Route::get('/', 'Redesign\WebsiteController@home')->name('new_home');
    Route::get('/partners', 'Redesign\WebsiteController@partners')->name('new_partners');
    Route::get('/career', 'Redesign\WebsiteController@career')->name('new_career');
    Route::get('/about', 'Redesign\WebsiteController@about')->name('new_about');
    Route::get('/contacts', 'Redesign\WebsiteController@contacts')->name('new_contacts');
    Route::get('/products/{partner}', 'Redesign\WebsiteController@products')->name('new_products');
    Route::get('/products/{product}/{category}', 'Redesign\WebsiteController@category')->name('new_category');
    Route::get('/products/{product}/{category}/{item}', 'Redesign\WebsiteController@item')->name('new_item');

    Route::post('/contacts', 'Redesign\WebsiteController@send_email');
});


Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin|editor']], function() {
    /*
    | example
    | Route::get('/', function () { return view('welcome'); });    
    | Route::get('/editor', function () { return view('welcome'); })->middleware('role:editor');
    | Route::get('/manage', ['middleware' => ['permission:manage-admins'], 'uses' => 'AdminController@manageAdmins']);
    */

    Route::get('/', 'Admin\AdminController@index');
    
    Route::resource('slider', 'Admin\Slide\SliderController');  
    Route::resource('products', 'Admin\Products\ProductController');  
    Route::resource('sitecontent', 'Admin\SiteContent\SitecontentController');
    Route::resource('/pages', 'Admin\Pages\PageController');

    Route::post('/delimg', 'Admin\AdminController@delimg')->name('del-img');
    Route::delete('/products/delete/item', 'Admin\Products\ProductController@delproduct')->name('delitem');
});

Route::get('sitemap', function(){

    // create new sitemap object
    $sitemap = App::make("sitemap");

    // set cache key (string), duration in minutes (Carbon|Datetime|int), turn on/off (boolean)
    // by default cache is disabled
    //$sitemap->setCache('laravel.sitemap', 60);

    // check if there is cached sitemap and build new only if is not
    if (!$sitemap->isCached())
    {
         // add item to the sitemap (url, date, priority, freq)
         $sitemap->add(URL::to('/ar/'), '2018-02-25T20:10:00+02:00', '1.0', 'daily');
         $sitemap->add(URL::to('/en/'), '2018-02-25T20:10:00+02:00', '1.0', 'daily');
         $sitemap->add(URL::to('/ar/solutions'), '2018-02-26T12:30:00+02:00', '0.3', 'monthly');
         $sitemap->add(URL::to('/en/solutions'), '2018-02-26T12:30:00+02:00', '0.3', 'monthly');
         $sitemap->add(URL::to('/ar/partners'), '2018-02-26T12:30:00+02:00', '0.3', 'monthly');
         $sitemap->add(URL::to('/en/partners'), '2018-02-26T12:30:00+02:00', '0.3', 'monthly');
         $sitemap->add(URL::to('/ar/career'), '2018-02-26T12:30:00+02:00', '0.3', 'monthly');
         $sitemap->add(URL::to('/en/career'), '2018-02-26T12:30:00+02:00', '0.3', 'monthly');
         $sitemap->add(URL::to('/ar/about'), '2018-02-26T12:30:00+02:00', '0.3', 'monthly');
         $sitemap->add(URL::to('/en/about'), '2018-02-26T12:30:00+02:00', '0.3', 'monthly');
         $sitemap->add(URL::to('/ar/contacts'), '2018-02-26T12:30:00+02:00', '0.3', 'monthly');
         $sitemap->add(URL::to('/en/contacts'), '2018-02-26T12:30:00+02:00', '0.3', 'monthly');


         // get all posts from db
         $posts = DB::table('products')->orderBy('created_at', 'desc')->get();

         // add every post to the sitemap
         foreach ($posts as $post)
         {
            $sitemap->add(URL::to('/ar/projects/'. Str::slug($post->product)), $post->created_at, '0.'.$post->id, 'monthly');
            $sitemap->add(URL::to('/en/projects/'. Str::slug($post->product)), $post->created_at, '0.'.$post->id, 'monthly');
         }
    }

    // show your sitemap (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf')
    $sitemap->store('xml', '../../spectrumfes.com/sitemap'); 
    
    return $sitemap->render('xml');
    
});

Route::get('clear-all', function ()
{
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return "Cache is cleared";
});

Route::get('test', function ()
{
    return \App\Admin\SiteContent\Sitecontent::getAsLang();
});

// Old routes

// Route::group(['prefix' => 'en'], function(){
//     Route::get('/', 'English\WebsiteController@home')->name('home');
//     Route::get('/solutions', 'English\WebsiteController@solutions')->name('solutions');
//     Route::get('/agents', 'English\WebsiteController@partners')->name('partners');
//     Route::get('/customers', 'English\WebsiteController@customers')->name('customers');
//     Route::get('/career', 'English\WebsiteController@career')->name('career');
//     Route::get('/about', 'English\WebsiteController@about')->name('about');
//     Route::get('/contacts', 'English\WebsiteController@contacts')->name('contacts');
//     Route::get('/products/{product}', 'English\WebsiteController@products')->name('products');
//     Route::get('/products/{product}/{category}', 'English\WebsiteController@category')->name('category');
//     Route::get('/products/{product}/{category}/{item}', 'English\WebsiteController@item')->name('item');

//     Route::post('/contacts', 'English\WebsiteController@send_email')->middleware('honeypot')->name('contacts');
// });

// Route::get('/', 'English\WebsiteController@home');

// Route::group(['prefix' => 'ar'], function(){
//     Route::get('/', 'Arabic\WebsiteController@home')->name('home-ar');
//     Route::get('/solutions', 'Arabic\WebsiteController@solutions')->name('solutions-ar');
//     Route::get('/partners', 'Arabic\WebsiteController@partners')->name('partners-ar');
//     Route::get('/career', 'Arabic\WebsiteController@career')->name('career-ar');
//     Route::get('/about', 'Arabic\WebsiteController@about')->name('about-ar');
//     Route::get('/contacts', 'Arabic\WebsiteController@contacts')->name('contacts-ar');

//     Route::get('/products/{product}', 'Arabic\WebsiteController@products')->name('products-ar');
//     Route::get('/products/{product}/{category}', 'Arabic\WebsiteController@category')->name('category-ar');
//     Route::get('/products/{product}/{category}/{item}', 'Arabic\WebsiteController@item')->name('item-ar');
// });