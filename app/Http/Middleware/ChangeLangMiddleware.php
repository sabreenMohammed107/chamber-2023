<?php

namespace App\Http\Middleware;

use Closure;

use Config;
use App;
use Illuminate\Support\Facades\App as FacadesApp;
use Illuminate\Support\Facades\Config as FacadesConfig;

class ChangeLangMiddleware
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
    // $lang_param = session()->get('locale');

    //     if (in_array($lang_param, FacadesConfig::get('app.locales')))
    //     {
    //         $lang = $lang_param;

    //     }

    //     else
    //     {
    //         $lang = FacadesConfig::get('app.locale');
    //     }

    //     FacadesApp::setLocale($lang);

    //     return $next($request);



    if (session()->has('locale')) {
        \App::setLocale(session()->get('locale'));
    }

    return $next($request);

}
}
