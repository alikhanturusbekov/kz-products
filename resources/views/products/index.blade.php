@extends('layout')

@section('content')
@include('partials._hero')
@include('partials._search')

@unless(count($products) == 0)
<div class="lg:grid lg:grid-cols-4 space-y-4 md:space-y-0 mx-20 my-8 mt-0 gap-12">
@foreach($products as $product)
    <div>
        <x-product-card :product='$product' />
    </div>
@endforeach
</div>

@else
    <p> No Products has been found</p>
@endunless

<div class="mt-6 p4">
    {{ $products->links() }}
</div>

@endsection