@extends('admin.index')

@section('title', 'Admin Dashboard')

@section('sidebar')
    @parent

@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Proje Anasayfa</a></li>
            <li class="breadcrumb-item"><a href="/dashboard">Frontent Anasayfa</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ürün Detayı</li>
        </ol>
    </nav>
    <form action="" method="POST">
        @method('PUT')
        @csrf
        <strong>Ürün Adı : </strong>{{ $product->name  }}<br>
        <strong>Açıklama : </strong>{{ $product->description  }}<br>
        <strong>Ayrıntı : </strong>{{ $product->content  }}<br>
        <strong>Fiyat : </strong>{{ $product->price  }}<br>

    </form>
@endsection
