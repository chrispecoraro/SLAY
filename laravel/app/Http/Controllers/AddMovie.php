<?php

namespace App\Http\Controllers;

use Chrispecoraro\PhpSanity\PhpSanity;
use Illuminate\Http\Request;

class AddMovie extends Controller
{


    private function createPortableTextBlock($text)
    {

        $portableTextBlock = [
            "_key" => uniqid(),
            "_type" => "block",
            "children" => [
                "_key" => "72ff167f61bf",
                "_type" => "span",
                "marks" => [],
                "text" => $text
            ],
            "markDefs" => [],
            "style" => "normal"
        ];
        return $portableTextBlock;
    }



        /**
         * Handle the incoming request.
         */
        public function __invoke(Request $request)
        {

            $sanity = new PhpSanity('bl5z37mx', 'production', 'sk2eqzK6pMrjXbu4eUgpm3LMjwMZN8QeIK1M13FTmrvaGs1M1r2Of5NUvqZvqoOnHX3DX5uV2TRnqAuVbpe46jKAeo9QB1CXtjolasUFopVgIrZYcf75RyQuaSOxjCY5FZcnM73mmMzdiWG5zVzZPNuUrDhV2s9pjEDnuzhiD5OFBu51wIqB', '2023-10-01');
            $sanity->
            $poster = $request->file('poster');
            $documentId = $sanity->create('movie', [$request->title, $this->createPortableTextBlock($request->overview)], ['title', 'overview']);
            $sanity->attachImage(fieldName: 'poster', documentId: $documentId, imageUrl: $poster->getRealPath());
            return response()->json(['data' => ['movie_id' => $documentId]]);


            //
        }
    }
