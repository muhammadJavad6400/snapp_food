<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            مدیریت محصولات
        </h2>
    </x-slot>

    @if ($product->image)
        <div class="flex justify-between">
            <h4> تصویر فعلی </h4>
            <img src="{{asset($product->image)}}" width="250px">
        </div>
        <hr class="my-4">
    @endif

    @if (auth()->check() && auth()->user()->role == 'admin')
    <div class="flex justify-center mb-5">
        <div class="w-1/4 my-3 px-3">
                <label for="shop_id" class="block mb-2">انتخاب فروشگاه</label>
            <select name="shop_id" class="select2 w-96">
                <option value="">انتخاب کنید...</option>
                @foreach ($shops as $shop)
                    <option @if ($product->shop_id == $shop->id) selected @endif value="{{ $shop->id }}">{{ $shop->title }}</option>
                @endforeach
            </select>
        </div>
    </div>   
    <hr class="my-4">    
    @endif 

    
    
    <form action="{{ route('product.update' , $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="grid grid-cols-12 gap-4">

            <div class="col-span-3">
                <x-label for="title" value=" عنوان محصول" class="p-2"/>
                <x-input id="title" class="block mt-r w-full" type="text" name="title" :value="$product->title ?? old('title')" autofocus />
            </div>
    
            <div class="col-span-3">
                <x-label for="price" value="قیمت محصول" class="p-2"/>
                <x-input id="price" class="block mt-r w-full" type="text" name="price" :value="$product->price ?? old('price')" autofocus />
            </div>
    
            <div class="col-span-3">
                <x-label for="discount" value="مقدار تخفیف" class="p-2"/>
                <x-input id="discount" class="block mt-r w-full" type="text" name="discount" :value="$product->discount ?? old('discount')" autofocus />
            </div>
    
            <div class="col-span-3 mt-1 pt-1 ">
                <x-label for="image" value="تصویر"/>
                <input type="file" id="image" name="image" class="mt-4" :value="$product->image ?? old('image')">
            </div>
    
            <div class="col-span-12">
                <x-label for="Row_material" value="مواد اولیه" class="p-2"/>
                <x-input id="Row_material" class="block mt-r w-full" type="text" name="Row_material" :value="$product->Row_material ?? old('Row_material')" autofocus />
            </div>

        </div>

        <div class="col-start-2 col-end-3 mt-3">
            <div class="flex justify-center">
                <x-button class="mr-4">ذخیره </x-button>   
            </div>
        </div>
        
    </form>
        
</x-app-layout>