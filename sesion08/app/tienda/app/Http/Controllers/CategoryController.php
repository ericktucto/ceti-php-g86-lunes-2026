<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Attributes\Controllers\Middleware;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Cache::remember('api.v1.categories.index', 60 * 60 * 24 * 30, function () {
            return Category::all()->toArray();
        });
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }


    #[Middleware('auth:sanctum')]
    #[Middleware('can:update,' . Comment::class)]
    public function update(Request $request, Comment $comment)
    {
        //
    }

    #[Middleware('auth:sanctum')]
    #[Middleware('can:delete,' . Comment::class)]
    public function destroy(Comment $comment)
    {
        //
    }
}
