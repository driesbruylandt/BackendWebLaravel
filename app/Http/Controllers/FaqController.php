<?php
namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('category')->paginate(10); // Adjust the number based on your preference

    return view('faq.index', compact('faqs'));
    }

    public function create()
    {
        return view('faq.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'category' => 'required|in:Algemeen,Posts,Account', // Validate the category field
        ]);

        // Create a new FAQ
        $faq = Faq::create([
            'question' => $request->input('question'),
            'answer' => $request->input('answer'),
            'category' => $request->input('category'),
        ]);

        // Redirect to the index page with a success message
        return redirect()->route('faq.index')->with('success', 'FAQ created successfully.');
    }

    public function edit(Faq $faq)
    {
        return view('faq.edit', compact('faq'));
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
