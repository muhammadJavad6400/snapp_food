<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            مدیریت سفارشات
        </h2>
    </x-slot>  
    
    <table>
        <thead>
            <tr class="text-center">
                <th>ردیف</th>
                <th>مشتری</th>
                <th>محصول</th>
                <th>تعداد</th>
                <th>قابل پرداخت</th>
                <th>تاریخ</th>
                <th>ساعت</th>
                <th>وضعیت</th>
                <th>تغییر وضعیت</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $key => $item)
                <tr class="text-center">
                    <th>{{ $key+1 }}</th>
                    <td>{{ $item->cart->user->name ?? '-' }}</td>
                    <td>{{ $item->product->title ?? '-' }}</td>
                    <td>{{ $item->count}}</td>
                    <td>{{number_format($item->payable)}}</td>
                    <td>{{ persionDate($item->created_at)}}</td>
                    <td>{{ $item->created_at->format('H:i:s') }}</td>
                    <td>
                        @if ($item->status == 1)
                            <span class="bg-green-500 text-white px-2 py-2">سفارش جدید</span> 
                        @elseif ($item->status == 2)
                        <span class="bg-purple-700 text-white px-2 py-2">تحویل داده شده</span>
                        @elseif ($item->status == 3)
                        <span class="bg-gray-800 text-white px-2 py-2">در حال پردازش</span>
                        @else
                        <span class="bg-red-500 text-white px-2 py-2">مرجوع شده</span>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('order.status', $item->id) }}" method="post" class="flex">
                            @csrf
                            <select name="status" class="form-control form-control-sm">
                                <option value="">انتخاب کنید</option>
                                <option value="1">سفارش جدید</option>
                                <option value="2">تحویل داده شده</option>
                                <option value="3">در حال پردازش</option>
                                <option value="4">مرجوع شده</option>
                            </select>
                            <x-button class="mr-4">
                                تایید
                            </x-button>
                        </form>
                    </td>
                </tr>
                
            @endforeach
        </tbody>
    </table>

    {{-- <table class="mt-5">
        <thead>
            <tr>
                <th>ردیف</th>
                <th>مشتری</th>
                <th>شماره تماس</th>
                <th>آدرس</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $key => $item)
                <tr>
                    <th>{{ $key+1 }}</th>
                    <td>{{  $item->cart->user->name ?? '-'}}</td>
                    <td>{{ $item->cart->user->telephone ?? '-'}}</td>
                    <td>{{ $item->cart->user->address ?? '-'}}</td>
                </tr>
                
            @endforeach
        </tbody>
    </table> --}}

    <div class="mt-5">
        {{ $items->links() }}
    </div>
    
</x-app-layout>