@extends('layouts.landing')

@section('content')

    <h4>{{ $shop->title }}</h4>
    <hr>

    <div class="row">
        @foreach ($products as $product)
            @include('landing.fragments.product_card')
        @endforeach
    </div>
    <hr>
    {{ $products->links() }}

    <div>
        <h3 class="text-center">لیست پیام ها</h3>
        <hr>
        <h5 class="my-3">لطفا نظرات خود را با ما به اشتراک بگذارید</h5>
        <form action="{{ route('comment.store')}}" method="POST">
            @csrf
            <input type="hidden" name="shop_id" value="{{ $shop->id}}">
            <textarea name="text" id=""  rows="4" placeholder="متن پیام" class="form-control my-2"></textarea>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">ارسال</button>
            </div>
        </form>

        @foreach ($shop->comments as $comment)
            <div class="alert alert-info my-2">
                {{ $comment->text }}
                <hr>
                {{ persionDate($comment->created_at) }}
            </div>
            
        @endforeach
    </div>
    
@endsection