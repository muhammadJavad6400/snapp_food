@extends('layouts.landing')

@section('content')
<div class="d-flex justify-content-center">
    <div class="card" style="width: 18rem;">
        <img src="{{ asset($product->image ?? 'image/no-image.png') }}" class="card-img-top" alt="...">
        <div class="card-body">
            <div class="d-flex justify-content-around">
                <h5 class="card-title">{{ $product->title}}</h5>
                <h5 class="card-title">{{ $product->shop->title ?? '-' }}</h5>

            </div>
          
            <p class="card-text">{{ $product->Row_material}}</p>
            <p>      
                @if ($product->discount)
                    <span class="text-danger mx-2 off1">{{number_format($product->price)}}</span>
                    <span class="text-success">{{ number_format($product->price2 )}}</span>
                @else
                    <span>{{number_format($product->price)}}</span>  
                @endif
            </p>
            <div class="d-flex justify-content-center">
                <a href="{{ route('welcome')}}" class="btn btn-primary">صفحه اصلی</a>
            </div> 
        </div>
      </div>
</div>

@include('landing.fragments.comments'  , ['list' => $product->comments , 'owner_type' => 'Product' , 'owner_id' => $product->id])

    
@endsection