@extends('layouts.app')
@section('content')
<div class="mx-36 mt-8 p-4 border-2 rounded border-gray-300">
  <div class="px-4 sm:px-0">
    <h3 class="text-3xl font-semibold leading-7 text-gray-900">Profiel</h3>
    <p class="mt-1 max-w-2xl text-2xl leading-6 text-gray-500">Hier vind je al jouw gegevens</p>
  </div>
  <div class="mt-6 border-t border-gray-100">
    <dl class="divide-y divide-gray-100">
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-2xl font-medium leading-6 text-gray-900">Naam</dt>
        <dd class="mt-1 text-2xl leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$user->name}}</dd>
      </div>
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-2xl font-medium leading-6 text-gray-900">Email</dt>
        <dd class="mt-1 text-2xl leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$user->email}}</dd>
      </div>
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-2xl font-medium leading-6 text-gray-900">Role</dt>
        <dd class="mt-1 text-2xl leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
    @if($user->isAdmin = 1)
        <span class="text-gray-500">Admin</span>
    @else
        <span class="text-gray-500">Gebruiker</span>
    @endif
</dd>
      </div>
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-2xl font-medium leading-6 text-gray-900">Birthday</dt>
        <dd class="mt-1 text-2xl leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $user->created_at->format('Y-m-d') }}</dd>
      </div>
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-2xl font-medium leading-6 text-gray-900">About me</dt>
        <dd class="mt-1 text-2xl leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
    @if($user->about_me)
        {{ $user->about_me }}
    @else
        <span class="text-gray-500">Nog geen about me toegevoegd</span>
    @endif
</dd>
  
    </dl>
  </div>
</div>

@endsection