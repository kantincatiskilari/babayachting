<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;

class SitemapController extends Controller
{

    public function generateSitemap($routes)
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        foreach ($routes as $route) {
            $xml .= '<url>';
            $xml .= '<loc>' . url($route) . '</loc>';
            $xml .= '<lastmod>' . now()->toAtomString() . '</lastmod>';
            $xml .= '<changefreq>daily</changefreq>';
            $xml .= '<priority>0.8</priority>';
            $xml .= '</url>';
        }

        $xml .= '</urlset>';

        return $xml;
    }

    public function index()
    {
        $routes = collect(Route::getRoutes())->map(function ($route) {
            return $route->uri;
        })->toArray();

        $xml = $this->generateSitemap($routes);

        return Response::make($xml, 200)->header('Content-Type', 'text/xml');
    }
}
