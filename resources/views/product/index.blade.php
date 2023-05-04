<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            مدیریت محصولات
        </h2>
    </x-slot>

        <div class="flex justify-end">
            <a href="{{ route('product.create') }}" class="'inline-flex items-center px-4 py-2 bg-gray-100 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-sky-300 focus:bg-sky-400 active:bg-sky-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'"><svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M620 897 460 737l43-43 117 117 239-239 43 43-282 282Zm220-414h-60V276h-60v90H240v-90h-60v600h251v60H180q-26 0-43-17t-17-43V276q0-26 17-43t43-17h202q7-35 34.5-57.5T480 136q36 0 63.5 22.5T578 216h202q26 0 43 17t17 43v207ZM480 276q17 0 28.5-11.5T520 236q0-17-11.5-28.5T480 196q-17 0-28.5 11.5T440 236q0 17 11.5 28.5T480 276Z"/></svg></a>
        </div>

        <hr class="my-4">

        <form class="flex flex-wrap justify-center items-center">
            @if (auth()->check() && auth()->user()->role == 'admin')
                <div class="w-1/4 my-3 px-3">
                     <label class="block mb-2">انتخاب فروشگاه</label>
                     <select name="s" class="select2 w-64">
                            <option value="">انتخاب کنید</option>
                            @foreach ($shops as $shop)
                            <option @if (request('s') == $shop->id) selected  @endif value="{{ $shop->id }}">{{ $shop->title }}</option>
                            @endforeach
                    </select> 
                    
                 </div>
                @endif 
            <div class="w-1/4 my-3 px-3">
                <x-label for="t" value=" عنوان " class="p-2"/>
                <x-input id="t" class="block mt-r w-full" type="text" name="t" :value="request('t')" autofocus />
            </div>
            <div class="w-1/4 my-3 px-3">
                <label class="block mb-2"> مرتب سازی </label>
                <select class="w-full" name="o">
                    <option value=""> انتخاب کنید</option>
                    <option @if(request('o') == 1) selected @endif value="1"> ارزانترین </option>
                    <option @if(request('o') == 2) selected @endif value="2"> گران ترین </option>
                    <option @if(request('o') == 3) selected @endif value="3"> جدیدترین </option>
                    <option @if(request('o') == 4) selected @endif value="4"> قدیمی ترین </option>
                </select>
            </div>
            <div class="w-1/4 my-3 px-3">
                <label>
                    <input type="checkbox" name="d" value="1" @if(request('d')) checked @endif>
                      سطل زباله 
                </label>
            </div>
            <div class="w-full"></div>
            <div class="w-1/4 my-3 px-3 text-center">
                <x-button class="mr-4">جستجو </x-button> 
            </div>
        </form>



        @if ($products->count())
        <hr class="my-4">


        <table>
            <thead>
                <tr>
                    <th> # </th>
                    @if (auth()->check() && auth()->user()->role == 'admin')
                        <th>نام رستوران</th>   
                    @endif
                    <th>عنوان</th>
                    <th>قیمت اولیه</th>
                    <th>تخفیف</th>
                    <th>قیمت فروش</th>
                    <th>تصویر </th>
                    <th colspan="2"> عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $product)
                    <tr>
                        <th> {{$key+1}} </th>
                        @if (auth()->check() && auth()->user()->role == 'admin')
                            <td>{{$product->shop->title ?? '-' }}</td>    
                        @endif
                        <td>{{ $product->title}}</td>
                        <td>{{{number_format( $product->price )}}}</td>
                        <td>{{ $product->discount}}</td>
                        <td>{{ number_format($product->price2) }}</td>
                        <td>
                            @if ($product->image)
                                <span class="text-green-500">دارد</span>
                                
                            @else
                            <span class="text-red-500">ندارد</span>
                                
                            @endif
                        </td>
                        @if ($product->trashed())
                            <td colspan="2">
                                <form action ="product/{{ $product->id}}/restore" method="POST">
                                    @csrf
                                    <button type="submit" class=" inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-700 focus:bg-yellow-400 active:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">بازیابی</button>
                                </form>
                            </td>   
                        @else
                        <td><a href="{{ route('product.edit' , $product->id) }}" class="'inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-400 active:bg-green-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'">ویرایش</a></td>
                        <td>
                            <form action="{{ route('product.destroy' , $product->id)}}" method="POST">
                                @csrf
                                @method('delete')

                                <button type="button" class=" delete-record inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-400 active:bg-red-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">حدف</button>

                            </form>
                        </td>       
                        @endif    
                    </tr>    
                @endforeach 
            </tbody>
        </table>        
        @endif       
</x-app-layout>