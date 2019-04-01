@extends('layouts.app')

@section('content')
    @if(Auth::user() != null)
        @if(Auth::user()->permissions != "admin")
            <?php
            $route_cat = route('home');
            header("location: $route_cat");
            exit;
            ?>
        @else
            <div id="product-creator">
                <form enctype="multipart/form-data" method="POST" action="{{action('AdminController@store')}}" id="addprod">
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
                        <label for="image">Enter the image url : </label>
                        <textarea name="image" placeholder="Write here ..."></textarea>
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
            <div>
                <p class="user-count" >Number of users</p>
                <p class="command-count">Number of commands</p>
                <p class="big-command">Biggest command</p>
            </div>
            <button class="admin-refresh">Refresh</button>
            <script>
                function showusers () {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },

                        type: "POST",
                        url: "http://127.0.0.1:8000/admin/refreshedusers",

                        success: function (response) {
                            $('.user-count').text("Number of users : " + response);

                        }
                    })
                }

                function commands () {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },

                        type: "POST",
                        url: "http://127.0.0.1:8000/admin/commands",

                        success: function (response) {
                            $('.command-count').text("Number of commands : " + response);

                        }
                    })
                }

                function big_command () {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },

                        type: "POST",
                        url: "http://127.0.0.1:8000/admin/bigcommand",

                        success: function (response) {
                            $('.big-command').text("Biggest command: " + response);

                        }
                    })
                }

                $(document).ready(function () {
                    showusers();
                    commands();
                    big_command();
                });

                $('.admin-refresh').click(function () {
                    showusers();
                    commands();
                    big_command();
                })


            </script>
            <table class="tadd">
                <thead>
                <th>Image Url</th>
                <th>Article name</th>
                <th>Price ($)</th>
                <th>Description</th>
                <th>Amount left</th>
                <th>Confirm Changes</th>
                <th>Delete item</th>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr id="admin-list">
                        <form method="POST" action="{{ action('AdminController@update_id') }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="id" value="{{ $product->id }}" ;>
                            <td><input type="text" name="update_img" value="{{ $product->url_image }}"></td>
                            <td><input type="text" name="update_title" value="{{ $product->title }}"></td>
                            <td><input type="number" name="update_price" value="{{ $product->price  }}"></td>
                            <td><textarea name="update_desc"
                                          placeholder="Input description here">{{ $product->description }}</textarea>
                            </td>
                            <td><input type="number" name="update_quantity" value="{{ $product->quantity }}"></td>
                            <td><input type="submit" class="bouton" value="✔"></td>
                        </form>

                        <form method="POST" action="{{action('AdminController@delete_id')}}">
                            {{ csrf_field() }}

                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <td><input class="bouton" type="submit" value="🗙"/></td>
                        </form>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    @else
        <?php
        $route_log = route('login');
        header("location: $route_log");
        exit;
        ?>
    @endif
@endsection