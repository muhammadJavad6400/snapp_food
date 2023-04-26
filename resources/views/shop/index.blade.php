<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            مدیریت رستوران ها
        </h2>
    </x-slot>

        <div class="flex justify-end">
            <a href="{{ route('shop.create') }}" class="'inline-flex items-center px-4 py-2 bg-gray-100 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-sky-300 focus:bg-sky-400 active:bg-sky-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'"><svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M726 1016V895H606v-60h120V715h60v120h120v60H786v121h-60ZM104 895V638H54v-60l44-202h602l45 207v55h-49v167h-60V638H420v257H104Zm60-60h196V638H164v197Zm-50-257h572-572ZM98 316v-60h603v60H98Zm16 262h572l-31-142H145l-31 142Z"/></svg></a>
        </div>

        @if ($shops->count())
        <hr class="my-4">

        <table>
            <thead>
                <tr>
                    <th> # </th>
                    <th> عنوان </th>
                    <th>  نام متصدی </th>
                    <th>تلفن </th>
                    <th> تاریخ شروع فعالیت</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($shops as $key => $shop)
                    <tr class="hover:bg-gray-400 transition ease-in-out delay duration-500">
                        <th> {{$key+1}} </th>
                        <td>{{ $shop->title}}</td>
                        <td>{{ $shop->first_name }} {{ $shop->last_name }}</td>
                        <td>{{ $shop->telephone }}</td>
                        <td>{{ $shop->created_at }}</td>

                    </tr>    
                @endforeach
                
              
            </tbody>
        </table>
            
        @endif
        
</x-app-layout>