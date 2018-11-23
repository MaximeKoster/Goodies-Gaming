@extends('layouts.app')

@section('cartheader')
    @foreach($display_cart as $product)
        <tr>
            <td>{{ $product->title }}</td>
            <td>{{ $product->price }}</td>

            <form method="POST" action="{{ action('CartController@update_quantity') }}">
                <td>
                    <input type="number" name="update_quantity" min="1" value="{{ $product->quantity }}"></td>
                <td>
                    <input class="bouton" type="submit" value="✔"/>
                </td>
            </form>
        </tr>
    @endforeach
@endsection