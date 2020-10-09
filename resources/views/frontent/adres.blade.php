@extends('admin.index')

@section('title', 'Admin Dashboard')

@section('sidebar')
    @parent

@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Anasayfa</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ürün Ekle</li>
        </ol>
    </nav>
    <form action="{{ route("admin.products.store") }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="desc">Adres</label>
            <textarea name="desc" class="form-control" id="desc" rows="2"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
