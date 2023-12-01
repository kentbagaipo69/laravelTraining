<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CategoryController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index(Request $request): View
	{
		// search input
		$searchVal = $request->search ?? null;

		// users
		// paginate with query
		$categorylists = Category::where('name', 'LIKE', "%{$searchVal}%")->whereNot('id', auth()->user()->id)->paginate(5)->withQueryString();

		return view('category.index', compact('categorylists', 'searchVal'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create(): View
	{
		return view('category.create');
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(StoreCategoryRequest $request): RedirectResponse
	{
		$validated = $request->validated();
		$category = new Category;

		$category->name = $validated['name'];
		$category->description = $validated['description'];
		$category->save();
                  
		return redirect()->route('categories.index')->with('status', 'Category has been successfully added.');
	}

	/**
	 * Display the specified resource.
	 */
	public function show(Category $category): View
	{
		$canEdit = false;
		return view('category.show', compact('category', 'canEdit'));
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Category $category): View
	{
		$canEdit = true;
		return view('category.show', compact('category', 'canEdit'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpdateCategoryRequest $request, Category $category): RedirectResponse
	{
		$validated = $request->validated();
		$category->name = $validated['name'];
		$category->description = $validated['description'];
		$category->update();
		return redirect()->route('categories.index')->with('status', 'Category has been updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Category $category)
	{
		$category->delete();
		return redirect()->route('categories.index')->with('status', 'Category has been successfully deleted.');
	}
}
