<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            مدیریت رستوران ها
        </h2>
    </x-slot>

    <form class="grid" action="{{ route('shop.store') }}" method="POST">
        @csrf

        <div class="mt-3">
            <x-label for="title" value="عنوان" class="p-2"/>
            <x-input id="title" class="block mt-r w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="username" />
        </div>

        <div class="mt-3">
            <x-label for="frist_name" value="نام" class="p-2"/>
            <x-input id="frist_name" class="block mt-r w-full" type="text" name="frist_name" :value="old('frist_name')" required autofocus autocomplete="username" />
        </div>

        <div class="mt-3">
            <x-label for="last_name" value="نام خانوادگی" class="p-2"/>
            <x-input id="last_name" class="block mt-r w-full" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="username" />
        </div>
        
    </form>
        
</x-app-layout>