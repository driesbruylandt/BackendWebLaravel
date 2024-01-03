<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold">FAQ Categories</h1>
    </x-slot>

    <div class="py-6 px-12">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-semibold">Categories List</h2>
            <a href="{{ route('faqCategories.create') }}" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Create Category</a>
        </div>

        <ul class="space-y-4">
            @foreach($categories as $category)
                <li class="flex items-center justify-between p-3 bg-white rounded shadow">
                    <span class="text-lg font-medium">{{ $category->name }}</span>
                    <div class="flex space-x-2">
                    <a href="{{ route('faqCategories.edit', $category) }}" class="text-blue-500 mr-4">Edit</a>
<a href="{{ route('faqCategories.destroy', $category) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $category->id }}').submit();" class="text-red-500 hover:underline">Delete</a>
                    </div>
                </li>
                <form id="delete-form-{{ $category->id }}" action="{{ route('faqCategories.destroy', $category) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            @endforeach
        </ul>
    </div>
</x-app-layout>

