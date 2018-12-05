@extends('layouts.app')

@section('content')

    <table class="tadd">
        <thead>
        <th>Article name</th>
        <th>Price</th>
        <th>Amount</th>
        <th>Validate changes</th>
        <th>Delete item</th>
        </thead>
        </thead>
        <tbody>
        @foreach ($display_cart as $product)
            <tr id="admin-list">
                <td>{{ $product->article_title}}</td>
                <td>{{ $product->article_price }}$</td>
                <form method="POST" action="{{ action('CartController@update_quantity') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <td><input type="number" min="1" name="qty" value="{{ $product->item_quantity }}"></td>
                    <td><input type="submit" class="bouton" value="✔"></td>
                </form>

                <form method="POST" action="{{action('CartController@delete_cart')}}">
                    {{ csrf_field() }}

                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <td><input class="bouton" type="submit" value="🗙"/></td>
                </form>
            </tr>
        @endforeach

        </tbody>
        <tfoot>
        <tr>
            <td colspan="2">Total Price :
                <?php
                echo \App\Models\Cart::where('user_id', Auth::user()->id)->sum('article_price');
                ?>$
            </td>
            <td><input class="float-right" type="submit" value="Pay"></td>
        </tr>
    </table>

    <p id="p-id">oui
    </p>
    <table class="tadd">
        <thead>
        <th>Article name</th>
        <th>Price</th>
        <th>Amount</th>
        <th>Validate changes</th>
        <th>Delete item</th>
        </thead>
        </thead>
        <tbody id="cart-body">
        @foreach($display_cart as $product)
            <p id="hidden-id" type="hidden">{{ $product->id }}</p>
            <p id="hidden-title" type="hidden">{{ $product->title }}</p>
            <script>
                (function () {
                    for (let i = 0; i < Object.keys(localStorage).length; i++) {
                        console.log("{{$product->title}}")
                        if ( "{{$product->id}}" === Object.entries(localStorage)[i][0]) {
                            $("#cart-body").append("<tr><td id='cart-tr-td'>{{$product->title}}</td></tr>");
                        }
                    }
                })(jQuery);
            </script>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <td colspan="2">Total Price :
                <?php
                $totalprice = \App\Models\Cart::where('user_id', Auth::user()->id)->sum('article_price');
                echo $totalprice;
                ?>$
            </td>
            <td><input class="float-right" type="submit" value="Pay"></td>
        </tr>

    </table>

@endsection