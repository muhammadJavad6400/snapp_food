@extends('layouts.landing')

@section('content')

    <h4 class="text-center"> سبد خرید شما</h4>
    <hr>
    @if ($cart)

        @include('landing.fragments.cart_table' , ['operations' => true])
            
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