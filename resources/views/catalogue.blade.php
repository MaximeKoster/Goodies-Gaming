@extends('layouts.app')

@section('content')
    @foreach($display as $product)
        <h3 class="catalogue-head">
            <div class="cath3">
                <img class="catimg" src="{{$product->url_image}}"/>
                <p>{{$product->title}}</p>
                <p>Price : {{$product-> price}}$</p>
                <button onclick="location.href = 'produit/{{$product->id}}';">Description</button>
                <button onclick="location.href = '';">Achat Directe</button>
            </div>
        </h3>
    @endforeach
@endsection