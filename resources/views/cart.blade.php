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

    <input type="text" value='localstorage'>
    <p id="p-id">oui
    </p>
    <table class="tadd">
        <thead>
        <th>Article name</th>
        <th>Price</th>
        <th>Amount</th>
        <th>Delete item</th>
        </thead>
        </thead>
        <tbody id="cart-body">

        @foreach($display_cart as $product)
            <script>
                (function () {
                    for (let i = 0; i < Object.keys(localStorage).length; i++) {
                        if ("{{$product->id}}" === Object.entries(localStorage)[i][0]) {
                            $("#cart-body").append("<tr class='cart-tr'><td class='cart-tr-td'>{{$product->title}}</td></tr>");
                            $('.cart-tr').eq(i).append("<td class='cart-tr-td-price'>{{$product->price }}</td>");
                            $('.cart-tr-td-price').eq(i).text({{$product->price}} * Object.entries(localStorage)[i][1]
                        )
                            ;
                            $('.cart-tr').eq(i).append("<td class='cart-tr-td'><input type='number' min='1' class='cart-tr-td-input-qty' name='qty' value='1'></td>");
                            $('.cart-tr-td-input-qty').eq(i).val(Object.entries(localStorage)[i][1]);
                            $('.cart-tr-td-input-qty').eq(i).change(function () {

                                localStorage.setItem( {{$product->id}} , $('.cart-tr-td-input-qty').eq(i).val());
                                $('.cart-tr-td-price').eq(i).text( {{$product->price}} * Object.entries(localStorage)[i][1]);
                                make_sum();

                            });
                            $('.cart-tr').eq(i).append("<td class='cart-tr-td'><input class='cart-tr-td-input-del' type='submit' value='🗙'/></td>");
                            $('.cart-tr-td-input-del').eq(i).click(function () {
                                if (Object.keys(localStorage).length === 1) {
                                    localStorage.removeItem(Object.keys(localStorage)[0]);
                                    $('.cart-tr').eq(0).remove()
                                    make_sum();
                                    total_cart();
                                } else {
                                    localStorage.removeItem(Object.keys(localStorage)[i]);
                                    $('.cart-tr').eq(i).remove();
                                    make_sum();
                                    total_cart();
                                }
                            });
                        }

                    }
                })(jQuery);


            </script>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <td colspan="2" id="cart-total-price">Total Price :</td>
            <td><input class="float-right" type="submit" value="Pay"></td>
        </tr>
    </table>
    <script>
        function make_sum() {
            let sum = 0;
            for (let i = 0; i < Object.keys(localStorage).length; i++) {
                sum = sum + parseInt($('.cart-tr-td-price').eq(i).text());
            }
            $('#cart-total-price').text("Total Price: " + sum + "$");
        }
        make_sum();
    </script>
@endsection