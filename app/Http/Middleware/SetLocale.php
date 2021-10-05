<?php

namespace App\Http\Middleware;
use Closure;

class SetLocale
{
	protected $languages = ['en', 'ar'];

    public function handle($request, Closure $next)
    {
        if($request->segment(1) && in_array($request->segment(1), $this->languages))
        {
            app()->setLocale($request->segment(1));
        }
        return $next($request);
    }
}