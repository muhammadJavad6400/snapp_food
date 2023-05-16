@extends('layouts.landing')

@section('content')

    <h4 class="text-center"> سبد خرید شما</h4>
    <hr>
    @if ($cart)
    <table class="table table-bordered table-hover">
        <thead>
            <tr class="text-center ">
                <th>ردیف</th>
                <th>محصول</th>
                <th>فروشگاه</th>
                <th>تعداد</th>
                <th>قابل پرداخت</th>
                <th>حذف</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cart->cartItems  as $key => $cartItem)
                <tr class="text-center">
                    <th>{{ $key+1 }}</th>
                    <td>{{ $cartItem->product->title ?? '-' }}</td>
                    <td>{{ $cartItem->product->shop->title ?? '-' }}</td>
                    <td>
                        <form action="{{ route('cart.manage' , $cartItem->product_id) }}" method="post">
                            @csrf
                            <button type="submit" name="type" value="minus" class="btn btn-warning btn-sm text-white"> - </button>
                            <span class="cart-count">{{ $cartItem->count }}</span>
                            <button type="submit" name="type" value="plus" class="btn btn-warning btn-sm text-white"> + </button>
                        </div>    
                        </form>
                    </td>
                    <td>{{number_format( $cartItem->payable)}}</td>
                    <td>
                        <form class="" action="{{ route('cart.remove' , $cartItem->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                        </form>
                    </td>
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
            
            <form action="{{ route('cart.finish') }}" method="post" class="text-center ">
                @csrf
                <button type="submit" class="btn btn-success btn-md mt-3">تایید و پرداخت</button>
            </form>
    @else
        <div class="alert alert-info">
            سبد خرید شما خالی است
        </div>
        
    @endif
    

    </div>
    
    </div>
    
@endsection