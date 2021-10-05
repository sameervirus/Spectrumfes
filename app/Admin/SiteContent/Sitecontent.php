<?php

namespace App\Admin\SiteContent;

use Illuminate\Database\Eloquent\Model;

class Sitecontent extends Model
{
    //
    protected $fillable = [
        'code','content','lang',
    ];


    public static function getAsLang()
    {
    	$items = Sitecontent::all();

    	foreach ($items as $item) {
    		if($item->lang == app()->getLocale()) {
    			$diff[$item->code] = $item->content;
    		} else {
    			$org[$item->code] = $item->content;
    		}
    	}

    	return array_unique (array_merge ($org, $diff));
    }
}
