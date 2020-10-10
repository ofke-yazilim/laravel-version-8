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
            <li class="breadcrumb-item"><a href="/admin/orders">Sipariş Listesi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ürün Ekle</li>
        </ol>
    </nav>
    <form action="{{ route("admin.products.store") }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Ürün adı</label>
            <input name="name" class="form-control form-control-lg" type="text" placeholder="">
        </div>
        <div class="form-group">
            <label for="desc">Açıklama</label>
            <textarea name="desc" class="form-control" id="desc" rows="2"></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input name="price" class="form-control form-control-lg" type="text" placeholder="">
        </div>
        <div class="form-group">
            <label for="content">İçerik</label>
            <textarea name="_content" class="form-control" id="content" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
