@extends('admin.index')

@section('title', 'Admin Dashboard')

@section('sidebar')
    @parent

@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Anasayfa</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ürün Listesi</li>
        </ol>
    </nav>
    @include("admin.layouts.messages")
    <a href="/admin/products/create" type="button" class="btn btn-info">Yeni Ürün Ekle</a>
    <div class="list-group" style="margin-top: 20px;">
        @if($products->count()>0)
            @foreach($products as $product)
                <li style="list-style: none;float: left;position: relative">
                    <a href="{{ route("admin.products.update",["product"=>$product->id]) }}" class="list-group-item list-group-item-action">
                        {{ $product->name }}
                    </a>
                    <a href="{{ route("admin.products.edit",["product"=>$product->id]) }}" type="button" class="btn btn-warning" style="right:60px; position: absolute;z-index: 10000;top: 5px;">
                        Düzenle
                    </a>
                    <form action="{{ route("admin.products.destroy",["product"=>$product->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger" style="right:10px; position: absolute;z-index: 10000;top: 5px;">
                            Sil
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
