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
                <p>{{ $product->Row_material }}</p>
            </div>
            
        @endforeach
    </div>
    
@endsection