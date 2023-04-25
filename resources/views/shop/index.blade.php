<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            مدیریت رستوران ها
        </h2>
    </x-slot>

        <div class="flex justify-end">
            <a href="{{ route('shop.create') }}" class="'inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-800 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'">تعریف فروشنده جدید</a>
        </div>
        
</x-app-layout>