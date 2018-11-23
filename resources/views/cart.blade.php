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

                    <input type="hidden" name="id" value="{{ $product->id }}" ;>
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
            <td colspan="2">Total Price :</td>
            <td><input type="submit" value="confirm"></td>
        </tr>
    </table>
@endsection