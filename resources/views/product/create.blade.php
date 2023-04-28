<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            مدیریت محصولات
        </h2>
    </x-slot>
    
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-12 gap-4">

            <div class="col-span-3">
                <x-label for="title" value=" عنوان محصول" class="p-2"/>
                <x-input id="title" class="block mt-r w-full" type="text" name="title" :value="old('title')" autofocus />
            </div>
    
            <div class="col-span-3">
                <x-label for="price" value="قیمت محصول" class="p-2"/>
                <x-input id="price" class="block mt-r w-full" type="text" name="price" :value="old('price')" autofocus />
            </div>
    
            <div class="col-span-3">
                <x-label for="discount" value="مقدار تخفیف" class="p-2"/>
                <x-input id="discount" class="block mt-r w-full" type="text" name="discount" :value="old('discount')" autofocus />
            </div>
    
            <div class="col-span-3 mt-1 pt-1 ">
                <x-label for="image" value="تصویر"/>
                <input type="file" id="image" name="image" class="mt-4">
            </div>
    
            <div class="col-span-12">
                <x-label for="Row_material" value="مواد اولیه" class="p-2"/>
                <x-input id="Row_material" class="block mt-r w-full" type="text" name="Row_material" :value="old('Row_material')" autofocus />
            </div>

        </div>

        <div class="col-start-2 col-end-3 mt-3">
            <div class="flex justify-center">
                <x-button class="mr-4">ذخیره </x-button>   
            </div>
        </div>
        
    </form>
        
</x-app-layout>