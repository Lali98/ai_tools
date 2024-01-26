<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate(
            ['name' => 'required|string|max:255|min:3'],
            [
                'name.min' => 'A kategória név nem lehet kisebb mint 3 karakter!',
                'name.max' => 'A kategória név nem lehet több mint 255 karakter!',
                'name.required' => 'A kategória név kötelező!'
            ]
        );

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'A kategória sikeresen mentve!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $category = Category::find($id);

        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $category = Category::find($id);

        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate(
            ['name' =>'required|string|max:255|min:3'],
        [
            'name.min' => 'A kategória név nem lehet kisebb mint 3 karakter!',
            'name.max' => 'A kategória név nem lehet több mint 255 karakter!',
            'name.required' => 'A kategória név kötelező!'
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'A kategória sikeresen frissítve!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'A kategória sikeresen törölve!');
    }
}
