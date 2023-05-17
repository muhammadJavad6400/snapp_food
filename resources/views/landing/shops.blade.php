@extends('layouts.landing')

@section('content')

    <h4>فروشگاه ها</h4>
    <hr>

    @foreach ($shops as $key => $shop)
        <div class="landing-shop-card">
            <h5 class="text-primary">{{ $shop->title }}</h5>
            <p><b>آدرس:</b> {{ $shop->address}}</p> 
            <div class="d-flex justify-content-around">
                <span>نام متصدی: {{$shop->full_name}}</span>
                <span>شماره تماس: {{$shop->telephone}}</span>
            </div> 
            <hr>
            <a href="{{ route('shop.show' , $shop->id)}}" class="btn btn-primary bnt-sm">رفتن به فروشگاه</a>  
        </div>
        
    @endforeach

    {{ $shops->links() }}
    
@endsection