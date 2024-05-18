<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AddMovie extends SanityController
{


    public function createPortableTextBlock($text)
    {

        $portableTextBlock = [(object)[
            "_key" => uniqid(),
            "_type" => "block",
            "children" => [
                (object)["_key" => "72ff167f61bf",
                    "_type" => "span",
                    "marks" => [],
                    "text" => $text
                ]
            ],
            "markDefs" => [],
            "style" => "normal"
        ]
        ];
        return $portableTextBlock;
    }


    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {


        $poster = $request->file('poster');

        //create a new document
        $documentId = $this->sanity->create('movie', [$request->title, $this->createPortableTextBlock($request->overview)], ['title', 'overview']);

        //attach the poster to the document
        $this->sanity->attachImage(fieldName: 'poster', documentId: $documentId, imageUrl: $poster->getRealPath());

//         // send an email
//         Mail::html('New movie added:' . $request->title, function ($message) use ($request) {
//             $message->to("email@example.com")
//                 ->subject('New movie added:' . $request->title)
//                 ->from("email@example.com");
//         });


        return response()->json(['data' => ['movie_id' => $documentId]]);

    }
}



