<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'content' => 'required',
            'task_id' => 'required'
        ], [
            'content.required' => 'Comment content is required!'
        ]);
        $validatedData += [
            'client_id' => Auth::user()->id,
        ];
        Comment::create($validatedData);
        return back()->with('success', "Comment created.");
    }
}
