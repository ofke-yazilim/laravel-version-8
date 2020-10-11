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
            <li class="breadcrumb-item active" aria-current="page">Sepet Detayı</li>
        </ol>
    </nav>

    @include("admin.layouts.messages")
    <table border="1" id="customers" rel="{!! $total = 0 !!}">
        <tbody>
            <th>Ürün Adı</th>
            <th>Ürün Adedi</th>
            <th>Ürün fiyatı</th>
        </tbody>
    @foreach($baskets as $basket)
      <tr>
          <td>{{ $basket->product->name }}</td>
          <td>{{ $basket->quantity }}</td>
          <td rel="{!! $total = $basket->product->price*$basket->quantity+$total !!}">
              {{ $basket->product->price*$basket->quantity}} Tl
          </td>

      </tr>
    @endforeach
    <tr>
      <td colspan="2" style="text-align: right">Total</td>
      <td>
          <strong>{{ $total }}TL</strong>
      </td>
    </tr>
    </table>
    <form action="{{ route("frontent.order") }}" method="POST">
        @csrf
        <div class="form-group" style="padding: 20px">
            <label for="desc">Sipariş Adresi</label>
            <textarea name="addres" class="form-control" id="desc" rows="2" required></textarea>
        </div>
        <input type="hidden" name="basket" value="{{ $basket->id ?? "" }}">
        <input type="hidden" name="total" value="{{ $total }}">
        <button type="submit" style="float: right;margin-top: 10px;" class="btn btn-success">Siparişi Tamamla</button>
        <a href="/dashboard"  style="float: left;color: #ffffff;" class="btn btn-info">Alışverişe Devam et</a>
    </form>

@endsection
