<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function index(): void
    {
        abort(404);
    }

    public function show(): void
    {
        abort(404);
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'content' => 'required',
            'task_id' => 'required'
        ], [
            'content.required' => 'Comment content is required!'
        ]);
        $validatedData += [
            'user_id' => Auth::id(),
        ];
        Comment::create($validatedData);
        return back()->with('success', "Comment created.");
    }
}
