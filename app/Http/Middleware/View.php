<?php

namespace App\Http\Middleware;

use App\Models\About;
use App\Models\Home;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class View
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $home = Home::all();
        $about = About::all();
        if($home->count() == 0)
        {
            $msg = "شما ابتدا باید مشخصات یا اطلاعاتی برای نمایش وارد کنید";
            return redirect()->route('homePage.create',compact('msg'));

        }
        if($about->count() == 0)
        {
            $msg = "شما ابتدا باید مشخصات یا اطلاعاتی برای نمایش وارد کنید";
            return redirect()->route('about.create',compact('msg'));

        }

        return $next($request);
    }
}
