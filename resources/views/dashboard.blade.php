<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-4xl text-center font-bold text-gray-900">
                    Welkom op ons chiro platform
                </div>    
            <div class="pb-4 text-xl text-center text-gray-900">
                    Bekijk hier alle posts van afgelopen chiro-zondag hier
                </div>
            </div>
            <div class=" overflow-hidden shadow-sm sm:rounded-lg mt-8">
            @foreach ($posts as $post)
            <div class="p-6 bg-white rounded-lg mb-4">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        @if ($post->cover_image)
                            <img src="{{ asset('storage/' . $post->cover_image) }}" alt="{{ $post->title }} Cover Image" class="w-32 h-32 object-cover rounded-full">
                        @endif
                    </div>
                    <div class="flex-1">
                        <h2 class="text-xl font-semibold mb-2">{{ $post->title }}</h2>
                        <p class="text-gray-700">{{ $post->message }}</p>
                        <p class="text-gray-500 mt-2">Posted by {{ $post->user->name }} on {{ $post->created_at->format('F j, Y') }}</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <form action="{{ route('posts.upvote', $post->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="text-green-500">
                                Upvote <span class="ml-1">{{ $post->upvotes()->count() }}</span>
                            </button>
                        </form>
                        <form action="{{ route('posts.downvote', $post->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="text-red-500">
                                Downvote <span class="ml-1">{{ $post->downvotes()->count() }}</span>
                            </button>
                        </form>
                    </div>
                    <div>
                    @if (auth()->user() && (auth()->user()->is_admin || auth()->user()->id === $post->user_id))
                        <a href="{{ route('posts.edit', $post) }}" class="text-blue-500 mr-4">Edit</a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Delete</button>
                        </form>
                    @endif
                    </div>
                </div>
            </div>
                @endforeach

    {{ $posts->links() }}
</div>
        </div>


    </div>
</x-app-layout>
