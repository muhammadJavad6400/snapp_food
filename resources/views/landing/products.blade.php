@extends('layouts.landing')

@section('content')

    <h4 class="text-center">محصولات</h4>
    <hr>
    <form action="" method="get" class="row justify-content-center align-items-center">
        <div class="col-md-4 form-group ">
            <label class="mb-2" for="">نام محصول</label>
            <input type="text" name="p" class="form-control" value="{{ request('p') }}">
        </div>
        <div class="col-md-4 form-group">
            <label class="mb-2" for="">مرتب سازی</label>
            <select class="form-control" name="o" id="">
                <option value="">-- انتخاب کنید --</option>
                <option value="1" @if (request('o')==1) selected @endif>جدید ترین</option>
                <option value="2" @if (request('o')==2) selected @endif>قدیمی ترین</option>
                <option value="3" @if (request('o')==3) selected @endif>ارزان ترین</option>
                <option value="4" @if (request('o')==4) selected @endif>گران ترین</option>
            </select>
        </div>
        <div class="col-md-2 mt-4">
            <button type="submit" class="btn btn-info">جستجو</button>
        </div>
    </form>
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
                <img src="{{asset('image/Iranian-dish.jpg')}}" alt="">
                <hr>
                <p class="mt-3">
                    @if ($product->Row_material)
                        <p>{{$product->Row_material}}</p>   
                    @else
                        <em>بدون توضیحات</em>   
                    @endif
                </p>
                <form class="d-flex justify-content-between align-items-center" method="post" action="{{ route('cart.add' ,  $product->id) }}">
                    @csrf
                    <a href="#" class="btn btn-primary btn-sm">{{ $product->shop->title ?? '-' }}</a>
                    <button type="submit" class="btn btn-primary btn-sm text-white px-3">افزودن به سبد خرید</button>
                </form>
            </div>
            
        @endforeach
    </div>
    <hr>

    {{ $products->links() }}
@endsection