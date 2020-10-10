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
            <li class="breadcrumb-item active" aria-current="page">Sipariş Detayı</li>
        </ol>
    </nav>
    <form action="{{ route("admin.orders.update",['order'=>$order->id]) }}" method="POST">
        <strong>Siparişi  Veren : </strong> {{ $order->user->name }}<br>
        <strong>Siparişi  Tarihi : </strong> {{ $order->created_at }}<br>
        <strong>Siparişi  Toplam Tutar : </strong> {{ $order->total }}<br>
        <strong>Siparişi  Onayı : </strong> {{ ($order->verified)?'Sipariş Onaylanmış':'Sipariş henüz onaylanmamış' }}<br>
        <hr>
        @method('PUT')
        @csrf
        @foreach($products as $order_product)
            <h4>{{ $loop->iteration }}. Ürün</h4><hr>
            <div class="form-group">
                <label for="name">Ürün adı</label>
                <input name="name" class="form-control form-control-lg" type="text" placeholder="" value="{{ $order_product->product->name  }}">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input name="price" class="form-control form-control-lg" type="text" placeholder="" value="{{ $order_product->product_price  }}">
            </div>
        @endforeach
    </form>
@endsection
