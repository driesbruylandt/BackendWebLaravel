<?php

namespace App\Http\Controllers;

use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqCategoryController extends Controller
{
    public function index()
    {
        $categories = FaqCategory::all();
        return view('faq.categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('faq.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        FaqCategory::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('faqCategories.index')->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = FaqCategory::findOrFail($id);
        return view('faq.categories.edit', ['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = FaqCategory::findOrFail($id);
        $category->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('faqCategories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = FaqCategory::findOrFail($id);
        $category->faqs()->delete();
        $category->delete();

    return redirect()->route('faqCategories.index')
        ->with('success', 'Category deleted successfully');
    }
}
