<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('user_id', auth()->id())->get();

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:income,expense',
        ]);

        Category::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'type' => $request->type,
        ]);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        if ($category->user_id !== auth()->id()) {
            abort(403);
        }

        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // Cek apakah category milik user yang login
        if ($category->user_id !== auth()->id()) {
            abort(403);
        }

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:income,expense',
        ]);

        // Update category
        $category->update([
            'name' => $request->name,
            'type' => $request->type,
        ]);

        // Redirect kembali ke halaman category
        return redirect()
            ->route('categories.index')
            ->with('success', 'Category berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // Security: pastikan data milik user yang login
        if ($category->user_id !== auth()->id()) {
            abort(403);
        }

        // Hapus data
        $category->delete();

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category berhasil dihapus!');
    }   
}
