@extends('layout')

@section('title')
    Каталог
@endsection

@section('content')
    @foreach($products as $product)
    <div class="item" enctype = "multipart / form-data">
        <img src="{{ URL::to('/') }}/images/{{ $product->image }}" width="120%">
        <h2>{{ $product->short_description}}</h2>
        <a href="{{ route('shop.good.view', $product->id) }}"><b>{{ $product->name }}</b></a><br>
        <h1>{{ $product->price }}руб.</h1>
        <button data-ajax="{{ route('shop.cart.add', $product->id)}}" class="button">Купить</button>
    </div>
    @endforeach
    <div style="padding: 300px;">
    @if(count($products)==0)
        <h1>Категория пуста</h1>
    @endif
</div>
@endsection