<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfLocalize
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $segment = request()->segment(1);
        
        if (array_key_exists($segment, config('app.locales'))) {
            $locale = app()->setlocale($segment);
        } else {
            return redirect('/' . config('app.locale') . '/' . $request->path(), 301);
        }

        return $next($request);
    }
}
