<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('dashboard.index', [
            'latestComments' => Comment::latest()->take(5)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): void
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): void
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): void
    {
        //
    }
}
