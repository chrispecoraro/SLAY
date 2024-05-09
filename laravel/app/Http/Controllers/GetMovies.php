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

        $movies = $sanity->all(
            'movie',
            ['poster.asset->url', 'slug.current', 'title', 'overview'],
            $query,
        );

        $movieCollection = collect($movies);

        //        $movieCollectionUpperCase = $movieCollection->map(function (array $movie) {
//            return ['title' => strtoupper($movie['title']),];
//        });
//        var_dump($movieCollectionUpperCase);
        return response()->json(['data' => $movieCollection]);

    }
}
