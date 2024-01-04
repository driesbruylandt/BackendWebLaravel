<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact') }}
        </h2>
    </x-slot>

    @if(auth()->user() && auth()->user()->is_admin)
    <div>
        <p class="font-bold text-xl mb-4">New contact form submission(s):</p>
        @forelse($messages as $message)
        <div class="bg-gray-100 p-6 mb-6 rounded shadow-lg">
    <p class="text-xl font-semibold text-gray-800">Name: {{ $message->name }}</p>
    <p class="text-gray-600">Email: {{ $message->email }}</p>
    <p class="mt-4 text-gray-800">{{ $message->message }}</p>

    <form method="post" action="{{ route('contact.reply', $message->id) }}" class="mt-6">
        @csrf
        <div class="mb-4">
            <label for="admin_reply" class="block text-gray-700 text-sm font-bold mb-2">Your Reply:</label>
            <textarea name="admin_reply" id="admin_reply" class="border rounded w-full h-24 py-2 px-3 leading-5" required></textarea>
        </div>

        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-full focus:outline-none focus:shadow-outline-green">Send Reply</button>
    </form>
</div>

        @empty
            <p>No new messages.</p>
        @endforelse
    </div>
    @else
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <form method="post" action="{{ route('contact.form') }}">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Your Name:</label>
                                <input type="text" name="name" id="name" class="border rounded w-full py-2 px-3" required>
                            </div>
                            <div class="mb-4">
                                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Your Email:</label>
                                <input type="email" name="email" id="email" class="border rounded w-full py-2 px-3" required>
                            </div>
                            <div class="mb-4">
                                <label for="message" class="block text-gray-700 text-sm font-bold mb-2">Your Message:</label>
                                <textarea name="message" id="message" class="border rounded w-full py-2 px-3" required></textarea>
                            </div>
                            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
</x-app-layout>
