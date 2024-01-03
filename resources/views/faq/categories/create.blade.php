<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create FAQ category') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <form method="POST" action="{{ route('faqCategories.store') }}">
        @csrf
        <label for="name">Category Name:</label>
        <input type="text" name="name" required>
        <button type="submit">Create</button>
    </form>

</div>
</x-app-layout>