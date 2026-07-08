<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // da non dimenticare 



class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(9);
        return view('blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:3',
            'content' => 'required',
            'status' => 'required',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        Blog::create($validated);

        return redirect()->route('blog.index')
            ->with('success', 'Blog creato con successo.');
    }

    public function edit(Blog $blog)
    {
        return view('blog.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'required|min:3',
            'content' => 'required',
            'status' => 'required',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        $blog->update($validated);

        return redirect()->route('blog.index')
            ->with('success', 'Blog aggiornato con successo.');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('blog.index')
            ->with('success', 'Blog eliminato con successo.');
    }
}
