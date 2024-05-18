<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetMovies extends SanityController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $movies = $this->sanity->all(
            'movie',
            ['poster.asset->url', 'slug.current', 'title', 'overview'],
            $query,
        );

        return response()->json(['data' => $movies->map(function (array $movie) {
            $movie['title'] = strtoupper($movie['title']);
            return $movie;
        })]);

    }
}
