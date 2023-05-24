<div class="col-md-4 my-2 product-card">
    <div class="d-flex justify-content-between">
        <h5><a href="{{ route('show.product' , $product->id) }}" class="btn btn-primary">{{ $product->title }}</a></h5>
        <p>      
            @if ($product->discount)
                <span class="text-danger mx-2 off">{{number_format($product->price)}}</span>
                <span class="text-success">{{ number_format($product->price2 )}}</span>
            @else
                 <span>{{number_format($product->price)}}</span>  
             @endif
        </p>
    </div>
    <img src="{{asset($product->image ?? 'image/no-image.png')}}" alt="">
    <hr>
    {{-- <p class="mt-3">
        @if ($product->Row_material)
            <p>{{$product->Row_material}}</p>   
        @else
            <em>بدون توضیحات</em>   
        @endif
    </p>                 --}}
    <form class="d-flex justify-content-between align-items-center" method="post" action="{{ route('cart.manage' ,  $product->id) }}">
        @csrf
        <a href="{{ route('show.one' , $product->shop->id)}}" class="btn btn-warning btn-sm text-white"><b>{{ $product->shop->title ?? '-' }}</b></a>
            <div class="in-cart @if (! $cart_item = $product->isInCart()) hidden @endif">
                <button type="button" name="type" value="minus" class="btn btn-warning btn-sm text-white manage-cart"> - </button>
                <span class="cart-count">{{ $cart_item->count ?? 0 }}</span>
                <button type="button" name="type" value="plus" class="btn btn-warning btn-sm text-white manage-cart"> + </button>
            </div>   
            <div class="not-in-cart @if ($product->isInCart()) hidden @endif">
                <button type="button" name="type" value="plus" class="btn btn-primary btn-sm text-white px-3 manage-cart">افزودن به سبد خرید</button>
            </div>   
    </form>
    <div class="hidden alert alert-danger mt-2">
        
    </div>
</div>