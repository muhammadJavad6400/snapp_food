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
            @include('landing.fragments.product_card')
        @endforeach
    </div>
    <hr>
    {{ $products->links() }}
@endsection