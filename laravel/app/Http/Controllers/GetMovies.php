<?php

namespace App\Http\Controllers;

use Chrispecoraro\PhpSanity\PhpSanity;
use Illuminate\Http\Request;

class GetMovies extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $sanity = new PhpSanity('bl5z37mx', 'production', '', '2023-10-01');
        return response()->json(['data' => $sanity->all('movie', ['poster.asset->url', 'slug.current', 'title', 'overview'])]);

    }
}
