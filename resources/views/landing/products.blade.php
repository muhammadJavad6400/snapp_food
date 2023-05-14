@extends('layouts.landing')

@section('content')

    <h4>محصولات</h4>
    <hr>

    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4 my-2 product-card">
                <div class="d-flex justify-content-between">
                    <h5>{{ $product->title }}</h5>
                    <p>      
                        @if ($product->discount)
                            <span class="text-danger mx-2 off">{{number_format($product->price)}}</span>
                            <span class="text-success">{{ number_format($product->price2 )}}</span>
                        @else
                             <span>{{number_format($product->price)}}</span>  
                         @endif
                    </p>
                </div>
                <hr>
                <img src="{{asset($product->iamge)}}" alt="">
                <p class="mt-3">
                    @if ($product->Row_material)
                        <p>{{$product->Row_material}}</p>   
                    @else
                        <em>بدون توضیحات</em>   
                    @endif
                </p>
                <div class="d-flex justify-content-between align-items-center">
                    <a href="#">{{ $product->shop->title ?? '-' }}</a>
                    <button type="button" class="btn btn-primary btn-sm text-white px-3">افزودن به سبد خرید</button>
                </div>
            </div>
            
        @endforeach
    </div>
    
@endsection