@extends('layouts.app')

@section('content')
    <div id="product-creator">
        <form method="POST" action="{{action('AdminController@store')}}" id="addprod">
            {{csrf_field()}}
            <h1>Product Creator</h1>

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
    </div>

    <div id="category-creator">

        <form method="POST" action="{{action('AdminController@store_category')}}" id="addprod">
            {{csrf_field()}}
            <h1>Category creator</h1>
            <div>
                <label for="category_name">Enter the name of the new Category : </label>
                <textarea name="category_name" placeholder="Write here ..."></textarea>
            </div>
            <!--
            <div>
                <label for="category-permission">Enter the type of users allowed to see the category </label>
                <label for="guest">Guest</label>
                <input type="checkbox" value="guest">
                <label for="admin">Admin</label>
                <input type="checkbox" value="admin">
                <label for="user">User</label>
                <input type="checkbox" value="user">
                  </div>
                  -->
            <div>
                <label for="category-submit">Click here to upload the new category : </label>
                <input type="submit" value="Click me !">
            </div>
        </form>
    </div>

    <table class="tadd">
        <thead>
        <th>Image Url</th>
        <th>Article name</th>
        <th>Price ($)</th>
        <th>Description</th>
        <th>Amount left</th>
        <th>Delete item</th>
        </thead>
        <tbody>
        <?php
        use App\Http\Controllers\AdminController;
        ?>
        @foreach($products as $product)
            <tr id="admin-list">
                <td><input type="text" value="{{ $product->url_image }}"></td>
                <td><input type="text" value="{{ $product->title }}"></td>
                <td><input type="number" value="{{ $product->price  }}"></td>
                <td><textarea name="desc" placeholder="Input description here">{{ $product->description }}</textarea>
                </td>
                <td>{{ $product->quantity }}</td>
                <form method="POST" action="{{action('AdminController@delete_id')}}">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $product->id }}";>
                    <td><input class="bouton" type="submit" value="🗙"/></td>
                </form>
            </tr>
        @endforeach
        <tr>
            <td><input type="button" value="Confirm changes"></td>
        </tr>
        </tbody>
    </table>
@endsection
