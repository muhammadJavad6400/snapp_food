<table class="table table-bordered table-hover">
    <thead>
        <tr class="text-center ">
            <th>ردیف</th>
            <th>محصول</th>
            <th>فروشگاه</th>
            <th>تعداد</th>
            <th>قابل پرداخت</th>
            @if ($operations)
            <th>حذف</th>      
            @endif   
        </tr>
    </thead>
    <tbody>
        @foreach ($cart->cartItems  as $key => $cartItem)
            <tr class="text-center">
                <th>{{ $key+1 }}</th>
                <td>{{ $cartItem->product->title ?? '-' }}</td>
                <td>{{ $cartItem->product->shop->title ?? '-' }}</td>
                <td>
                    @if ($operations)
                    <form action="{{ route('cart.manage' , $cartItem->product_id) }}" method="post">
                        @csrf
                        <button type="button" name="type" value="minus" class="btn btn-warning btn-sm text-white manage-cart"> - </button>
                        <span class="cart-count">{{$cartItem->count}}</span>
                        <button type="button" name="type" value="plus" class="btn btn-warning btn-sm text-white manage-cart"> + </button>
                    </div>    
                    </form>        
                    @else
                    {{$cartItem->count}}        
                    @endif
                </td>
                <td>{{number_format( $cartItem->payable)}}</td>
                @if ($operations)
                <td>
                    <form class="" action="{{ route('cart.remove' , $cartItem->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                    </form>
                </td>                    
                @endif
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
                    <td>{{number_format( $cart->sum)}} تومان</td>
                    <td>{{$cart->total}}</td>
                </tr>
            </tbody>
        </table>