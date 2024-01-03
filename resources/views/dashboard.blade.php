<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-xl text-center text-gray-900">
                    Bekijk alle posts van afgelopen chiro-zondag hier
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-8">
            @foreach ($posts as $post)
                    <div class="p-6 text-xl text-gray-900 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-2xl font-semibold mb-2">{{ $post->title }}</h2>
                                <p class="text-gray-700">{{ $post->content }}</p>
                                <p class="text-gray-500 mt-2">Posted by {{ $post->user->name }} on {{ $post->created_at->format('F j, Y') }}</p>
                            </div>
                            <div class="flex items-center space-x-4">
                                <button class="text-green-500">
                                    Upvote <span class="ml-1">{{ $post->upvotes }}</span>
                                </button>
                                <button class="text-red-500">
                                    Downvote <span class="ml-1">{{ $post->downvotes }}</span>
                                </button>
                            </div>
                        </div>
                        <div class="mt-4">
                            <p class="text-gray-600">{{ $post->message }}</p>
                        </div>
                    </div>
                @endforeach

    {{ $posts->links() }} <!-- Display pagination links -->
</div>
        </div>


    </div>
</x-app-layout>
