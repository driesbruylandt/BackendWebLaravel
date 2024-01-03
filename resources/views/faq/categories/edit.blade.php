
<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold">Edit FAQ Category</h1>
    </x-slot>

    <div class="py-6 px-12">
        <form method="POST" action="{{ route('faqCategories.update', $category) }}">
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Category Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" class="mt-1 p-2 border rounded-md w-full">
            </div>

            <div class="mt-4">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Update Category</button>
            </div>
        </form>
    </div>
</x-app-layout>