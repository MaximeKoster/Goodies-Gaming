@extends('layouts.app')

@section('content')
    <div class="cath3">
        <img class="catimg" src="{{$product->url_image}}"/>
        <p>Article 1</p>
        <input type="submit" value="Page produit"/><br>
        <input type="submit" value="Achat Direct"/><br>
    </div>
@endsection