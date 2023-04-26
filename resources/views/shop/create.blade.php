<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            مدیریت رستوران ها
        </h2>
    </x-slot>
    
    <form class="grid grid-cols-3 gap-4" action="{{ route('shop.store') }}" method="POST">
        @csrf

        <div>
            <x-label for="title" value="عنوان" class="p-2"/>
            <x-input id="title" class="block mt-r w-full" type="text" name="title" :value="old('title')" autofocus />
        </div>

        <div>
            <x-label for="first_name" value="نام" class="p-2"/>
            <x-input id="first_name" class="block mt-r w-full" type="text" name="first_name" :value="old('first_name')"  autofocus  />
        </div>

        <div>
            <x-label for="last_name" value="نام خانوادگی" class="p-2"/>
            <x-input id="last_name" class="block mt-r w-full" type="text" name="last_name" :value="old('last_name')"  autofocus  />
        </div>

        <div>
            <x-label for="telephone" value="شماره تماس" class="p-2"/>
            <x-input id="telephone" class="block mt-r w-full" type="number" name="telephone" :value="old('telephone')"  autofocus  />
        </div>

        <div>
            <x-label for="username" value="نام کاربری" class="p-2"/>
            <x-input id="username" class="block mt-r w-full" type="text" name="username" :value="old('username')"  autofocus  />
        </div>
        <div>
            <x-label for="email" value="ایمیل" class="p-2"/>
            <x-input id="email" class="block mt-r w-full" type="text" name="email" :value="old('email')"  autofocus  />
        </div>

        <div class="col-span-3">
            <x-label for="address" value="آدرس" class="p-2"/>
            <x-input id="address" class="block mt-r w-full" type="text" name="address" :value="old('address')"  autofocus />
        </div>

    

        <div class="col-start-2 col-end-3">
            <div class="flex justify-center">
                <x-button class="mr-4">ذخیره </x-button>   
            </div>
        </div>
        
    </form>
        
</x-app-layout>