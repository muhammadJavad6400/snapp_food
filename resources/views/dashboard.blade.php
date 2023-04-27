<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
        @if (auth()->check() && auth()->user()->role == 'admin')
            Admin   
        @endif

        @if (auth()->check() && auth()->user()->role == 'shop')
            shop  
        @endif
</x-app-layout>
