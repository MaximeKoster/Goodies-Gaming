@extends('layouts.app')

@section('content')
    @foreach($display as $product)


        <h3 class="catalogue-head">
            <div class="cath3">
                <img class="catimg" src={{asset($product->url_image)}} />
                <p>{{$product->title}}</p>
                <p>Price : {{$product-> price}}$</p>
                <p> Only {{$product->quantity}} left ! Grab yours quickly !</p>
                <button class="catalogue-button" onclick="location.href = 'produit/{{$product->id}}';">Description
                </button>

                <form method="POST" action="{{ action('CartController@create_cart') }}">
                        {{ csrf_field() }}

                    <input type="hidden" name="pagenameid" value="1">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="product_id" value="{{ $product->title }}">
                    <input type="hidden" name="product_price" value="{{ $product->price }}">
                    <input type="hidden" name="qty" value="1">
                </form>
                <button class="catalogue-button" type="submit" onclick="stock_id_session({{$product->id}}); total_cart()">Ajouter au panier
                </button>
            </div>
        </h3>
    @endforeach
@endsection