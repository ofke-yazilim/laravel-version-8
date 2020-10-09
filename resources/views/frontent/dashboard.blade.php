@extends('frontent.index')

@section('title', 'Frontent Dashboard')

@section('sidebar')
    @parent

@endsection

@section('sidebar')
    @parent

@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Anasayfa</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ürün Listesi</li>
        </ol>
    </nav>
    @include("frontent.layouts.messages")
    @if (Auth::guest())
    <ul>
        <li><a href="/login">Müşteri Login</a></li>
        <li><a href="/register">Müşteri Register</a></li>
    </ul>
    @else
    <h5>{{ Auth::user()->name }}</h5>
    <ul>
        <li><a href="/frontent/basket">Sepet</a></li>
        <li><a href="/orders">Siparişlerim</a></li>
        <li><a href="/logout">Logout</a></li>
    </ul>
    @endif

    <div class="list-group" style="margin-top: 20px;">
        @if($products->count()>0)
            @foreach($products as $product)
                <li style="list-style: none;float: left;position: relative">
                    <a href="{{ route("frontent.products.show",["product"=>$product->id]) }}" class="list-group-item list-group-item-action">
                        {{ $product->name }}
                    </a>
                    <a href="{{ route("frontent.products.show",["product"=>$product->id]) }}" type="button" class="btn btn-warning" style="right:5px; position: absolute;z-index: 10000;top: 5px;">
                        Detay
                    </a>
                    <form action="{{ route("frontent.products.basket",["product"=>$product->id]) }}" method="POST">
                        @csrf
                        <strong style="width:100px;right:170px; position: absolute;z-index: 10000;top: 10px;">Miktar :</strong>
                        <input min="1" max="5" value="1" type="count" name="count" class="form-control" id="count" style="width:50px;right:150px; position: absolute;z-index: 10000;top: 5px;">
                        <input  type="hidden" name="create" value="1"/>
                        <button type="submit" class="btn btn-info" style="right:83px; position: absolute;z-index: 10000;top: 5px;">
                            Ekle
                        </button>
                    </form>
                </li>
            @endforeach
        @else
            <div class="alert alert-info" role="alert" style="margin-top: 20px;">
                Ürün Bulunamadı
            </div>
        @endif
    </div>
@endsection
