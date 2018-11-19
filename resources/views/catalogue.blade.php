@extends('layouts.app')

@section('content')
    @foreach($display as $product)
        <h3 class="catalogue-head">
        <div class="cath3">
            <img class="catimg" src="{{$product->url_image}}"/>
            <p>{{$product->title}}</p>
            <p>Price : {{$product-> price}}$</p>
            <input class="catalogue-button" type="submit" value="Page produit"/><br>
            <input class="catalogue-button" type="submit" value="Achat Direct"/><br>
        </div>
        </h3>
    @endforeach
@endsection