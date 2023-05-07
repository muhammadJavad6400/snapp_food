<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            مدیریت رستوران ها
        </h2>
    </x-slot>
    
    <form class="grid grid-cols-3 gap-4" action="{{route('shop.update', $shop->id)}}" method="POST">
        @csrf
        @method('put')

        <div>
            <x-label for="title" value="عنوان" class="p-2"/>
            <x-input id="title" class="block mt-r w-full" type="text" name="title" :value="$shop->title ?? old('title')" autofocus />
        </div>

        <div>
            <x-label for="first_name" value="نام" class="p-2"/>
            <x-input id="first_name" class="block mt-r w-full" type="text" name="first_name" :value="$shop->first_name ?? old('first_name')"  autofocus  />
        </div>

        <div>
            <x-label for="last_name" value="نام خانوادگی" class="p-2"/>
            <x-input id="last_name" class="block mt-r w-full" type="text" name="last_name" :value="$shop->last_name ?? old('last_name')"  autofocus  />
        </div>

        <div>
            <x-label for="telephone" value="شماره تماس" class="p-2"/>
            <x-input id="telephone" class="block mt-r w-full" type="number" name="telephone" :value="$shop->telephone?? old('telephone')"  autofocus  />
        </div>

        <div class="col-span-3">
            <x-label for="address" value="آدرس" class="p-2"/>
            <x-input id="address" class="block mt-r w-full" type="text" name="address" :value=" $shop->address ?? old('address')"  autofocus />
        </div>

    

        <div class="col-start-2 col-end-3">
            <div class="flex justify-center">
                <x-button class="mr-4">ذخیره </x-button>   
            </div>
        </div>     
    </form>       
</x-app-layout>