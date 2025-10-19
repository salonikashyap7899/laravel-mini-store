@extends('layouts.app')

@section('content')
    <h1>Checkout</h1>
    <p>Total: ${{ $total }}</p>
    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <button type="submit">Fake Pay Now</button>
    </form>
@endsection