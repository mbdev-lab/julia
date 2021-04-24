<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function list(Request $request)
    {
        $validated = $request->validate([
            'viewer_id' => 'required|integer',
            'sort_type' => 'required|string',
        ]);

         return $this->postService
             ->postsByViewerId($validated['viewer_id'])
             ->sort($validated['sort_type']);
    }
}
