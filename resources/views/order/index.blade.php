<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            مدیریت سفارشات
        </h2>
    </x-slot>

        @if ($orders->count())
        
        <table>
            <thead>
                <tr>
                    <th>ردیف</th>
                    <th>کاربر</th>
                    <th>وضعیت</th>
                    <th>کد پیگیری</th>
                    <th>تاریخ</th>
                    <th colspan="2">عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $key => $order)
                    <tr>
                        <th>{{ $key+1 }}</th>
                        <td>{{ $order->user->name ?? '-' }}</td>
                        <td>
                            @if ($order->finished)
                                <span class="text-green-600">پرداخت شده</span>
                                
                            @else
                                <span class="text-red-600">تکمیل نشده</span>
            
                            @endif
                        </td>
                        <td>{{ $order->code}}</td>
                        <td>{{ persionDate($order->created_at)}}</td>
                        <td>
                            <a href="{{ route('order.show' , $order->id)}}"  class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-400 active:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">جزئیات</a>
                        </td>
                        <td>
                            <button type="button" class="delete-record inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-400 active:bg-red-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">حدف</button>
                        </td>
                    </tr>
                    
                @endforeach
                
            </tbody>
        </table>
        
        <div class="my-3">
            {{ $orders->links() }}
        </div>
        
        @endif       
</x-app-layout>