@extends('layouts.app')

@section('content')
    <h1>Cart</h1>
    @if(empty($cart))
        <p>Cart is empty.</p>
    @else
        @foreach($cart as $id => $item)
            <div>
                <h3>{{ $item['name'] }}</h3>
                <p>Qty: {{ $item['quantity'] }} | Price: ${{ $item['price'] * $item['quantity'] }}</p>
                <form action="{{ route('cart.remove', $id) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit">Remove</button>
                </form>
            </div>
        @endforeach
        <a href="{{ route('checkout.index') }}">Proceed to Checkout</a>
    @endif
@endsection