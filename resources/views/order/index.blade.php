<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            مدیریت سفارشات
        </h2>
    </x-slot>

        @if ($orders->count())
        <hr class="my-4">
        <table>
            <thead>
                <tr>
                    <th>ردیف</th>
                    <th>کاربر</th>
                    <th>وضعیت</th>
                    <th>کد پیگیری</th>
                    <th>تاریخ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $key => $order)
                    <tr>
                        <th>{{ $key+1 }}</th>
                        <td>...</td>
                        <td>
                            @if ($order->finished)
                                <span class="text-green-600">پرداخت شده</span>
                                
                            @else
                                <span class="text-red-600">تکمیل نشده</span>
                                
                            @endif
                        </td>
                        <td>{{ $order->code}}</td>
                        <td>{{ persionDate($order->created_at)}}</td>
                    </tr>
                    
                @endforeach
                
            </tbody>
        </table>
        
        <div class="my-3">

            {{ $orders->links() }}

        </div>
        
        @endif       
</x-app-layout>