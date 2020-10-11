@extends('admin.index')

@section('title', 'Admin Dashboard')

@section('sidebar')
    @parent

@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Proje Anasayfa</a></li>
            <li class="breadcrumb-item"><a href="/admin">Admin Anasayfa</a></li>
            <li class="breadcrumb-item"><a href="/dashboard">Frontent Anasayfa</a></li>
        </ol>
    </nav>
    <a href="/admin/logout" class="btn btn-danger btn-lg">
        Logout
    </a>
    <hr>
    <a href="/admin/products" class="btn btn-primary btn-lg btn-block active" role="button" aria-pressed="true">Ürün İşlemleri</a>
    <a href="/admin/orders" class="btn btn-secondary btn-lg  btn-block active" role="button" aria-pressed="true">Sipariş İşlemleri</a>
@endsection
