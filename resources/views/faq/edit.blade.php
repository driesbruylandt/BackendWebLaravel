<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit FAQ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="post" action="{{ route('faq.update', $faq) }}">
                        @csrf
                        @method('PATCH')
                        <div class="mb-4">
                            <label for="question" class="block text-gray-700 text-sm font-bold mb-2">Question:</label>
                            <input type="text" name="question" id="question" class="border rounded w-full py-2 px-3" value="{{ $faq->question }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="answer" class="block text-gray-700 text-sm font-bold mb-2">Answer:</label>
                            <textarea name="answer" id="answer" class="border rounded w-full py-2 px-3" required>{{ $faq->answer }}</textarea>
                        </div>
                        <div class="mb-4">
                        <label for="category_id" class="block text-sm font-medium text-gray-600">Category:</label>
                        <select name="category_id" class="mt-1 p-2 w-full border rounded-md" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        </div>
                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Update FAQ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
