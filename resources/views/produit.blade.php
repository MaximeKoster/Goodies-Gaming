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

        <div class="pp">
            <img class="ppimg" src="{{$product->url_image}}">
            <p id="pptitle">{{ $product->title }}</p>
            <p id="ppdesc">{{ $product->description }}</p>
            <p id="ppdesc"> Category : {{ $product->category_id}} </p>
            <p id="ppdesc"> Only {{$product->quantity}} left ! Grab yours quickly !</p>
            <p id="ppdesc"> Price : {{ $product->price }} $</p>

            @foreach($display_cart as $product)
            <form method="POST" action="{{ action('CartController@create_cart') }}">
                {{ csrf_field() }}

                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input id="ppbuy" type="submit" value="Ajouter au panier"/></br>
            </form>
            @endforeach

            @if(Auth::user()->permissions == "admin")
                <tr id="admin-list">
                    <form method="POST" action="{{ action('AdminController@update_id') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="id" value="{{ $product->id }}" ;>
                        <p id="ppdesc" class="float-left"> Edit stock :</p>
                        <td><input type="number" name="update_quantity" value="{{ $product->quantity }}"></td>
                        <td><input type="submit" class="bouton" value="✔"></td>
                    </form>
            @endif
        </div>
    @endforeach
@endsection