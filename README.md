# SLAY
 
The <span style="color:green">SLAY</span> stack consists of our beloved content-wrangling [Sanity](https://sanity.io), the insta-API [Laravel](https://laravel.com) PHP framework, and the zero-JS [Astro](https://astro.build/) website generator.

The Y represents "Your Choice" of JavaScript.

It's easy, for example, a call to:

```https://domain.com/movies``` return a list of movies through just one line of code:

```$sanity->all('movie'); ```

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

_Why Laravel?_ 
* Laravel provides a thin layer that can be used to manipulate Sanity content.
* We can leverage Laravel's `collection` methods to perform calculations before returning the result to the RESTful API-- perfect to hide away complexity from frontend developers.
* Laravel also provides an easy way to handle POST operations to Sanity, needed for creating, updating, and deleting Sanity documents.
* When a proxy is needed for CORS, Laravel can handle this, too.

_Why Astro?_ 
* Astro ships with zero JavaScript for static pages but can also host JavaScript "islands", perfect for creating fast that also need some functionality.
* Astro provides a faster and lighter build process than older frameworks such as Gatsby and doesn't need DOM hydration, such as NextJS.

Special thanks are due to @vincentjflorio for the idea of using "Y" in the acronym. He suggested "Your framework" to keep things open.
