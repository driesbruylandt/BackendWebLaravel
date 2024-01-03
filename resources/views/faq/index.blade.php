<x-app-layout>
    <x-slot name="header">
        <div class="w-40 grid grid-cols-3 gap-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('FAQs') }}
        </h2>
        <a href="{{route('faq.create')}}" class="font-semibold text-xl text-gray-800 leading-tight w-24">
            {{ __('Maak FAQ') }}
        </a>
        <a href="{{route('faqCategories.index')}}" class="ml-12 font-semibold text-xl text-gray-800 leading-tight w-48">
            {{ __('Manage Categories') }}
        </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-xl text-center text-gray-900">
                    {{ __('Frequently Asked Questions') }}
                </div>
            </div>
            <div class="overflow-hidden shadow-sm sm:rounded-lg mt-8">
        @foreach ($faqs->groupBy('category.name') as $category => $categoryFaqs)
            <div class="mb-4">
                <h2 class="text-2xl font-semibold mb-2">{{ $category}}</h2>
                @foreach ($categoryFaqs as $faq)
                    <div class="p-6 bg-white rounded-lg mb-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-1">
                                <h2 class="text-xl font-semibold mb-2">{{ $faq->question }}</h2>
                                <p class="text-gray-700">{{ $faq->answer }}</p>
                            </div>
                            @if (auth()->user() && auth()->user()->is_admin)
                            <div>
                                    <a href="{{ route('faq.edit', $faq) }}" class="text-blue-500 mr-4">Edit</a>
                                    <form action="{{ route('faq.destroy', $faq) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500">Delete</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach

        {{ $faqs->links() }}
    </div>
        </div>
    </div>
</x-app-layout>
