<!-- resources/views/posts/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('error'))
                <div class="bg-red-500 text-white p-4 mb-4">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="bg-green-500 text-white p-4 mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form method="post" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                    <input type="text" name="title" id="title" class="border rounded w-full py-2 px-3" value="{{ old('title', $post->title) }}" required>
                </div>

                <div class="mb-4">
                    <label for="message" class="block text-gray-700 text-sm font-bold mb-2">Content:</label>
                    <textarea name="message" id="message" class="border rounded w-full py-2 px-3" required>{{ old('message', $post->message) }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="cover_image" class="block text-gray-700 text-sm font-bold mb-2">Cover Image:</label>
                    <input type="file" name="cover_image" id="cover_image" class="border rounded w-full py-2 px-3" accept="image/*">
                </div>

                @if ($post->cover_image)
                    <div class="mb-4">
                        <p class="text-gray-700">Current Cover Image:</p>
                        <img src="{{ asset('storage/' . $post->cover_image) }}" alt="{{ $post->title }} Cover Image" class="mt-2" style="max-width: 200px;">
                    </div>
                @endif

                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Update Post</button>
            </form>
        </div>
    </div>
</x-app-layout>
