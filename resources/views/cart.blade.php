@extends('layouts.app')

@section('content')
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
                    let csrf_js_var = $('meta[name="csrf-token"]').attr('content');
                    for (let i = 0; i < Object.keys(localStorage).length; i++) {
                        if ("{{$product->id}}" === Object.entries(localStorage)[i][0]) {
                            $("#cart-body").append("<tr class='cart-tr'><td class='cart-tr-td'>{{$product->title}}</td></tr>");
                            $('.cart-tr').eq(i).append("<td class='cart-tr-td-price'>{{$product->price }}$</td>");
                            $('.cart-tr-td-price').eq(i).text("" + {{$product->price}} * Object.entries(localStorage)[i][1] + '$'
                            )
                            ;
                            $('.cart-tr').eq(i).append("<td class='cart-tr-td'><input type='number' min='1' class='cart-tr-td-input-qty' name='qty' value='1'></td>");
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


                            $('.cart-tr').eq(i).append("<td style='display:none' class='cart-tfoot-tr-td'><form class='cart-form' target='hiddenFrame' method='POST' action='{{ action('CartController@create_cart') }}'><input name='_token' value='{{csrf_token()}}' type='hidden'><input type='hidden' name='user_id' value='{{ Auth::user()->id }}'><input type='hidden' name='product_id' value='{{ $product->title }}'><input type='hidden' name='price' value='{{ $product->price }}'></form><iframe name='hiddenFrame' width='0' height='0' border='0' style='display: none;'></iframe></td>");

                        }
                    }
                })(jQuery);
            </script>

        @endforeach
        </tbody>
        <tfoot id="dsq">
        <tr class="cart-tfoot-tr">
            <td colspan="3" id="cart-total-price">Total Price :</td>
            <td>
                <button class="cart-tr-button" style="float:left" type="button">Pay</button>
            </td>
        </tr>
    </table>
    <script>    
        $('.cart-tr-button').click(function () {
            var count = 0;

            setInterval(function () {
                console.log($('.cart-form').eq(count));
                $('.cart-form').eq(count).submit();
                if (count > 1)
                    clearInterval(this);
                count++;
            }, 1000);

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