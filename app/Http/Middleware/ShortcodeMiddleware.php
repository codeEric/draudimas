<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Shortcodes;
use Illuminate\Http\Request;

class ShortCodeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        $content = $response->getContent();
        foreach (Shortcodes::all() as $shortcode) {
            $content = str_replace('[[' . $shortcode->shortcode . ']]', $shortcode->replace, $content);
        }
        $response->setContent($content);
        return $response;
    }
}
