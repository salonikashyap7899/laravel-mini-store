@extends('layouts.app')

@section('content')
    <h1>Products</h1>
    <form method="GET">
        <select name="category">
            <option value="">All Categories</option>
            @foreach($categories as $cat)
                <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
            @endforeach
        </select>
        <input type="number" name="min_price" placeholder="Min Price" value="{{ request('min_price') }}">
        <input type="number" name="max_price" placeholder="Max Price" value="{{ request('max_price') }}">
        <button type="submit">Filter</button>
    </form>
    @foreach($products as $product)
        <div>
            <h2><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></h2>
            <p>${{ $product->price }}</p>
            <form action="{{ route('cart.add', $product) }}" method="POST">
                @csrf
                <button type="submit">Add to Cart</button>
            </form>
        </div>
    @endforeach
    {{ $products->links() }}
@endsection