<?php

namespace App\Http\Controllers;
use Chrispecoraro\PhpSanity\Sanity;

use Illuminate\Http\Request;

class SanityController extends Controller
{
    protected object $sanity;
    private string $projectId;
    private string $dataset;


    public function __construct()
    {
        $this->sanity = new Sanity(config('sanity.project_id'), config('sanity.dataset'), '', '2023-10-01');
    }


}
