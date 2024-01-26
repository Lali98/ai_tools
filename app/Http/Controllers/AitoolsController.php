<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Aitools;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AitoolsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $sort_by = request()->query('sort_by', 'name');
        $sort_dir = request()->query('sort_dir', 'asc');
        $aitools = Aitools::with('tags')->orderBy($sort_by, $sort_dir)->paginate(3);

        return view('aitools.index', compact('aitools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('aitools.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $hasFeePlan = $request->has('hasFeePlan');
        if ($hasFeePlan) {
            $request->merge(['hasFeePlan' => true]);
        }

        $request->validate([
            'name' =>'required|string|max:255|min:3',
            'category_id' =>'required|exists:categories,id',
            'description' =>'required|string|min:10',
            'link' =>'required|url',
            'hasFeePlan' =>'boolean',
            'price' =>'nullable|numeric'
        ]);

        $aitool = Aitools::create($request->all());
        $aitool->tags()->attach($request->tags);

        return redirect()->route('aitools.index')->with('success', 'Az AI eszköz sikeresen hozzáadva!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $aitool = Aitools::with('Tags')->find($id);

        return view('aitools.show', compact('aitool'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $aitools = Aitools::find($id);
        $categories = Category::all();
        $tags = Tag::all();

        return view('aitools.edit', compact('aitools', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->merge(['hasFeePlan' => $request->has('hasFeePlan')]);

        $request->validate([
            'name' =>'required|string|max:255|min:3',
            'category_id' =>'required|exists:categories,id',
            'description' =>'required|string|min:10',
            'link' =>'required|url',
            'hasFeePlan' =>'boolean',
            'price' =>'nullable|numeric'
        ]);

        Aitools::find($id)->update($request->all());

        return redirect()->route('aitools.index')->with('success', 'Az AI eszköz sikeresen frissítve!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $aitools = Aitools::find($id);
        $aitools->delete();

        return redirect()->route('aitools.index')->with('success', 'Az AI eszköz sikeresen törölve!');
    }
}
