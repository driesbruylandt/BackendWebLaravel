<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create FAQ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="post" action="{{ route('faq.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="question" class="block text-gray-700 text-sm font-bold mb-2">Question:</label>
                            <input type="text" name="question" id="question" class="border rounded w-full py-2 px-3" required>
                        </div>
                        <div class="mb-4">
                            <label for="answer" class="block text-gray-700 text-sm font-bold mb-2">Answer:</label>
                            <textarea name="answer" id="answer" class="border rounded w-full py-2 px-3" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Category:</label>
                            <select name="category" id="category" class="border rounded w-full py-2 px-3" required>
                                <option value="Algemeen">Algemeen</option>
                                <option value="Posts">Posts</option>
                                <option value="Account">Account</option>
                            </select>
                        </div>
                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Create FAQ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
