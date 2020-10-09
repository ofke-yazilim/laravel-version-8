@extends('admin.index')

@section('title', 'Admin Dashboard')

@section('sidebar')
    @parent

@endsection

@section('content')
    <a href="/admin/products" class="btn btn-primary btn-lg btn-block active" role="button" aria-pressed="true">Ürün İşlemleri</a>
    <a href="/admin/orders" class="btn btn-secondary btn-lg  btn-block active" role="button" aria-pressed="true">Sipariş İşlemleri</a>
@endsection
