<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            مدیریت محصولات
        </h2>
    </x-slot>
    
    <form class="grid grid-cols-3 gap-4" action="{{ route('product.store') }}" method="POST">
        @csrf


    

        <div class="col-start-2 col-end-3">
            <div class="flex justify-center">
                <x-button class="mr-4">ذخیره </x-button>   
            </div>
        </div>
        
    </form>
        
</x-app-layout>