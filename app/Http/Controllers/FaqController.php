<?php
namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Models\FaqCategory;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('category_id')->paginate(10);

    return view('faq.index', compact('faqs'));
    }

    public function create()
    {
        $categories = FaqCategory::all();
    return view('faq.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'category_id' => 'required|exists:faq_categories,id',
        ]);

        Faq::create([
            'question' => $request->input('question'),
            'answer' => $request->input('answer'),
            'category_id' => $request->input('category_id'),
        ]);

        return redirect()->route('faq.index')->with('success', 'FAQ created successfully.');
    }

    public function edit(Faq $faq)
{
    $categories = FaqCategory::all();
    return view('faq.edit', ['categories' => $categories, 'faq' => $faq]);
}


    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $faq->update($request->all());

        return redirect()->route('faq.index')->with('success', 'FAQ updated successfully.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('faq.index')->with('success', 'FAQ deleted successfully.');
    }
}
