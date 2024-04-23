# SLAY
SLAY - Sanity, Laravel, Astro, and "Your Choice" of JavaScript.

Our beloved content-wrangling [Sanity](https://sanity.io), our insta-API [Laravel](https://laravel.com), and the zero-JS [Astro](https://astro.build/), and your choice of JS framework.

A combination of Astro for static pages and Laravel's front-end Breeze (SLAB stack?) scaffolding for any "secure" pages requiring login could also be used.

It's easy, for example, a call to:

```$sanity->all('movie'); ```

https://domain.com/movies could return all of the movies:

```<?php
namespace App\Http\Controllers;

use Chrispecoraro\PhpSanity\PhpSanity;
use Illuminate\Http\Request;

{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $sanity = new PhpSanity('1123ksdf','production','','2023-10-01');
            return response()->json(['data' => $sanity->all('movie')]);
    }
}
```

_Why Laravel?_ It provides a thin layer that can be used to manipulate Sanity data and perform calculations before returning it to the RESTful API, suitable for frontend developers. 
It also is a great proxy for POST operations to Sanity, needed for CORS.

TODO: Write proper driver for Sanity using Laravel's Eloquent ORM, but that's a discussion for another day.

_Why Astro?_ Ships with zero JavaScript for static pages.

Thanks to https://github.com/vincentjflorio for the idea of using "Y" in the acronym. He suggested "Your framework" to keep things open.
