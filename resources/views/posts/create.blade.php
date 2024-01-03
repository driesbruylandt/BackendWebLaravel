<x-app-layout>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-8">
        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="p-6 text-xl text-gray-900 border-b border-gray-200">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" class="mt-1 p-2 border rounded-md w-full" required>

                <label for="message" class="block mt-4 text-sm font-medium text-gray-700">Content</label>
                <textarea name="message" id="message" class="mt-1 p-2 border rounded-md w-full" required></textarea>
                
                <div class="mb-4">
                    <label for="cover_image" class="block text-gray-700 text-sm font-bold mb-2">Cover Image:</label>
                    <input type="file" name="cover_image" id="cover_image" class="border rounded w-full py-2 px-3" accept="image/*">
                </div>

                <button type="submit" class="mt-4 bg-blue-500 text-white p-2 rounded-md">Add Post</button>
            </div>
        </form>
    </div>
</x-app-layout>
