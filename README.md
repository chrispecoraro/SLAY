# SLAY
 
The <span style="color:green">SLAY</span> stack consists of our beloved content-wrangling [Sanity](https://sanity.io), the insta-API [Laravel](https://laravel.com) PHP framework, and the zero-JS [Astro](https://astro.build/) website generator.

The Y represents "Your Choice" of JavaScript.

It's easy, for example, a call to:

```https://domain.com/movies``` 

returns a list of movies using just one line of code:

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

Joins are passed in as an array of parameters: 
```$sanity->all('movie', ['poster.asset->url', 'slug.current', 'title', 'overview'])``` 

The result is camel-cased:

```
{
"data": [
   {
      "posterAssetUrl": "https://cdn.sanity.io/images/bl5z37mx/production/69ad5d60ff19c456954513e8c67e9563c780d5e1-780x1170.jpg",
      "slugCurrent": "walle",
      "title": "WALL·E",
      "overview": [
          {
              "children": [
                 {
                     "text": "WALL·E is the last robot left on an Earth that has been overrun with garbage and all humans  
                      have fled to outer space. For 700 years he has continued to try and clean up the mess, but has 
                      developed some rather interesting human-like qualities. When a ship arrives with a sleek new type of 
                      robot, WALL·E thinks he's finally found a friend and stows away on the ship when it leaves.",
                      "_key": "v6xmjPqs",
                      "_type": "span",
                      "marks": []
                 }
              ],
              "_type": "block",
              "style": "normal",
              "_key": "8a1fd7b434db11443bf33bc3a2428b64",
              "markDefs": []
          }
       ]
   },
...
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
