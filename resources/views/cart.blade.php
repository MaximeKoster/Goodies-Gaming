@extends('layouts.app')

@section('content')
    <form class='cart-form' target='hiddenFrame' method='POST'
          action='{{ action('CartController@create_cart') }}'>
        <input name='_token' value='{{csrf_token()}}' type='hidden'>

        <table class="tadd">
            <thead>
            <th>Nom de l'article</th>
            <th>Prix</th>
            <th>Quantité</th>
            <th>Supprimer du panier</th>
            </thead>
            <tbody id="cart-body">
            @foreach($display_cart as $product)
                <input class='input-product-id' type='hidden' name='product_id[]' value=''>
                <input class='input-product-price' type='hidden' name='product_price[]' value=''>
                <script>
                    (function () {
                        for (let i = 0; i < Object.keys(localStorage).length; i++) {
                            if ("{{$product->id}}" === Object.entries(localStorage)[i][0]) {
                                $("#cart-body").append("<tr class='cart-tr'><td class='cart-tr-td'>{{$product->title }}</td></tr>");
                                $('.cart-tr').eq(i).append("<td class='cart-tr-td-price'>{{$product->price }} $</td>");
                                $('.cart-tr-td-price').eq(i).text("" + {{$product->price}} * Object.entries(localStorage)[i][1] + '$');
                                $('.cart-tr').eq(i).append("<td class='cart-tr-td'><input type='number' min='1' class='cart-tr-td-input-qty' name='qty[]' value=''></td>");
                                $('.cart-tr-td-input-qty').eq(i).val(Object.entries(localStorage)[i][1]);
                                $('.cart-tr-td-input-qty').eq(i).change(function () {

                                    localStorage.setItem( {{$product->id}} , $('.cart-tr-td-input-qty').eq(i).val());
                                    $('.cart-tr-td-price').eq(i).text("" + {{$product->price}} * Object.entries(localStorage)[i][1] + "$");
                                    make_sum();
                                    total_cart();

                                });
                                $('.cart-tr').eq(i).append("<td class='cart-tr-td'><input class='cart-tr-td-input-del' type='submit' value='🗙'/></td>");
                                $('.cart-tr-td-input-del').eq(i).click(function () {
                                    if (Object.keys(localStorage).length === 1) {
                                        localStorage.removeItem(Object.keys(localStorage)[0]);
                                        $('.cart-tr').eq(0).remove();
                                        make_sum();
                                        total_cart();
                                    } else {
                                        localStorage.removeItem(Object.keys(localStorage)[i]);
                                        $('.cart-tr').eq(i).remove();
                                        make_sum();
                                        total_cart();
                                    }
                                });

                                $('.input-product-id').eq(i).val('{{$product->title}}');
                                $('.input-product-price').eq(i).val('{{$product->price}}');
                            }
                        }
                    })(jQuery);
                </script>
            @endforeach
            </tbody>
            <tfoot id="dsq">
            <tr class="cart-tfoot-tr">
                <td colspan="3" id="cart-total-price">Prix total de la commande :</td>
                <td>
                    <input name='email' type="text" placeholder="email">
                    <button class="cart-tr-button" style="float:left" type="button">Envoyer une demande d'achat</button>
                </td>

            </tr>
        </table>
    </form>
    <iframe name='hiddenFrame' width='0' height='0' border='0' style='display: none;'></iframe>
    <script>
        $('.cart-tr-button').click(function () {
            $('.cart-form').submit();
        });

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