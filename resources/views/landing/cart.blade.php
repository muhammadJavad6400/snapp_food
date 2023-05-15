@extends('layouts.landing')

@section('content')

    <h4> سبد خرید شما</h4>
    <hr>
    <table class="table table-bordered table-hover">
        <thead>
            <tr class="text-center ">
                <th>ردیف</th>
                <th>محصول</th>
                <th>تعداد</th>
                <th>قابل پرداخت</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cart->cartItems  as $key => $cartItem)
                <tr class="text-center">
                    <th>{{ $key+1 }}</th>
                    <td>{{ $cartItem->product->title ?? '-' }}</td>
                    <td>{{ $cartItem->count }}</td>
                    <td>{{number_format( $cartItem->payable)}}</td>
                </tr>   
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        <div class="col-md-5 mt-5">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="text-center">
                        <th>قیمت کل</th>
                        <th>تعداد کل</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td>{{number_format( $cart->sum) }} تومان</td>
                        <td>{{ $cart->total }}</td>
                    </tr>
                </tbody>
            </table>

    </div>
    
    </div>
    
@endsection