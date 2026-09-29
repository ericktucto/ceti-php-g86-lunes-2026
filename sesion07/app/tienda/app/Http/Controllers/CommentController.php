<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Routing\Attributes\Controllers\Middleware;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
