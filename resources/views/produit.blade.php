@extends('layouts.app')

@section('content')
@foreach($display as $product)
    <div class="pp">
        <img class="ppimg" src="{{$product->url_image}}">
        <p id="pptitle">{{ $product->title }}</p>
        <p id="ppdesc">{{ $product->description }}</p>
        <p id="ppdesc"> Category : {{ $product->category_id}} </p>
        <p id="ppdesc"> Price : {{ $product->price }} $</p>
        <input id="ppbuy" type="submit" value="Ajouter au panier"/></br>
    </div>
@endforeach
@endsection