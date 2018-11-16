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
        <input type="number" name="quantity" placeholder="quantity">
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
    <th>Image</th>
    <th>Article name</th>
    <th>Price</th>
    <th>Description</th>
    <th>Amount left</th>
    </thead>
    <tbody>
    <tr>
        <td>image</td>
        <td>Article 1</td>
        <td>Price</td>
        <td><textarea name="desc" placeholder="Here is the last description set up for the item"></textarea></td>
        <td>number</td>
    </tr>
    <tr>
        <td>image</td>
        <td>Article 2</td>
        <td>Price</td>
        <td><textarea name="desc" placeholder="Here is the last description set up for the item"></textarea></td>
        <td>number</td>
    </tr>
    <tr>
        <td><input type="button" value="Confirm changes"></td>
        <td><input type="button" value="Modify items"></td>
    </tr></tbody></table>
@endsection
