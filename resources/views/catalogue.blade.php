@extends('layouts.app')

@section('content')
    @guest
        <?php
        $route_log = route('login');
        header("location: $route_log");
        exit;
        ?>
    @endguest
        @foreach($display as $product)
            <h3 class="catalogue-head">
                <div class="cath3">
                    <img class="catimg" src="{{$product->url_image}}"/>
                    <p>{{$product->title}}</p>
                    <p>Price : {{$product-> price}}$</p>
                    <p> Only {{$product->quantity}} left ! Grab yours quickly !</p>
                    <button class="catalogue-button" onclick="location.href = 'produit/{{$product->id}}';">Description</button>
                    <button class="catalogue-button" onclick="location.href = '';">Achat Directe</button>
                </div>
            </h3>
        @endforeach
@endsection