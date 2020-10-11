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
            <li class="breadcrumb-item active" aria-current="page">Sipariş Listesi</li>
        </ol>
    </nav>
    <a href="/admin/logout" class="btn btn-danger btn-lg">
        Logout
    </a>
    <hr>
    @include("admin.layouts.messages")
    <div class="list-group" style="margin-top: 20px;">
        @if($orders->count()>0)
            @foreach($orders as $order)
                <li style="list-style: none;float: left;position: relative">
                    <a href="{{ route("admin.orders.update",["order"=>$order->id]) }}" class="list-group-item list-group-item-action">
                        {{ $order->user->name }} - {{ $order->created_at }}
                    </a>
                    <a href="{{ route("admin.orders.edit",["order"=>$order->id]) }}" type="button" class="btn btn-warning" style="right:60px; position: absolute;z-index: 10000;top: 5px;">
                        Detay
                    </a>
                    <form action="{{ route("admin.orders.destroy",["order"=>$order->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger" style="right:10px; position: absolute;z-index: 10000;top: 5px;">
                            Sil
                        </button>
                    </form>
                    <form action="{{ route("admin.orders.confirm",["order"=>$order->id]) }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-info" style="right:135px; position: absolute;z-index: 10000;top: 5px;">
                            Onayla
                        </button>
                    </form>
                </li>
            @endforeach
            @else
            <div class="alert alert-info" role="alert" style="margin-top: 20px;">
                Sipariş Bulunamadı
            </div>
        @endif
    </div>
@endsection
