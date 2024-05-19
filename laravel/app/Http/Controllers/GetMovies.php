<?php

namespace App\Http\Controllers;

use Chrispecoraro\PhpSanity\Sanity;
use Illuminate\Http\Request;

class GetMovies extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $sanity = new Sanity('bl5z37mx', 'production', '', '2023-10-01');

        $movies = $sanity->all('movie');

        return response()->json(['data' => $movies]);

    }
}
