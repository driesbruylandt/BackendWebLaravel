<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Maak een FAQ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('faq.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="question" class="block text-sm font-medium text-gray-600">Question:</label>
                        <input type="text" name="question" class="mt-1 p-2 w-full border rounded-md" required>
                    </div>

                    <div class="mb-4">
                        <label for="answer" class="block text-sm font-medium text-gray-600">Answer:</label>
                        <textarea name="answer" rows="4" class="mt-1 p-2 w-full border rounded-md" required></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="category_id" class="block text-sm font-medium text-gray-600">Category:</label>
                        <select name="category_id" class="mt-1 p-2 w-full border rounded-md" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Maak FAQ</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
