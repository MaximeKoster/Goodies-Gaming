@extends('layouts.app')

@section('content')
    <form method="POST" action="{{action('AdminController@store')}}" id="addprod">
        {{csrf_field()}}
        <div>
            <label for="prodname">Enter the name of the new product : </label>
            <textarea name="prodname" placeholder="Write here ..."></textarea>
        </div>
        <div>
            <label for="prodprice">Enter the price of the new product : </label>
            <input type="number" name="prodprice" placeholder="Write here ...">
        </div>
        <div>
            <label for="desc">Enter the product description: </label>
            <textarea name="desc" placeholder="Write here ..."></textarea>
        </div>
        <div>
            <label for="quantity">Enter the product quantity: </label>
            <input type="number" name="quantity" placeholder="Write here ...">
        </div>
        <div>
            <label for="prodimage">Enter the url of the image for the product : </label>
            <textarea name="prodimage" placeholder="Write here ..."></textarea>
        </div>
        <div>
            <label for="prodsub">Click here to upload the new product : </label>
            <input type="submit" value="Click me !">
        </div>
    </form>
    <table class="tadd">
        <thead>
        <th>Image Url</th>
        <th>Article name</th>
        <th>Price ($) </th>
        <th>Description</th>
        <th>Amount left</th>
        <th>Delete item</th>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr id="admin-list">
                <td><input type="text" value="{{ $product->url_image }}"></td>
                <td><input type="text" value="{{ $product->title }}"></td>
                <td><input type="number" value="{{ $product->price  }}"></td>
                <td><textarea name="desc" placeholder="Input description here">{{ $product->description }}</textarea></td>
                <td>{{ $product->quantity }}</td>
                <td><input class="bouton" type="button" value="🗙" onclick="{{('AdminController@delete_id)}}"/></td>
            </tr>
        @endforeach
        <tr>
            <td><input type="button" value="Confirm changes"></td>
        </tr>
        </tbody>
    </table>
@endsection
