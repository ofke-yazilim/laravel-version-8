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
            <li class="breadcrumb-item active" aria-current="page">Sipariş Listesi</li>
        </ol>
    </nav>
    @include("frontent.layouts.messages")
    <div class="list-group" style="margin-top: 20px;">
        @if($orders->count()>0)
            @foreach($orders as $order)
                <li style="list-style: none;float: left;position: relative">
                    <a href="{{ route("frontent.order.show",["order"=>$order->id]) }}" class="list-group-item list-group-item-action">
                        {{ $order->user->name }} - {{ $order->created_at }}
                    </a>
                    <a href="{{ route("frontent.order.show",["order"=>$order->id]) }}" type="button" class="btn btn-warning" style="right:60px; position: absolute;z-index: 10000;top: 5px;">
                        Detay
                    </a>
                </li>
            @endforeach
            @else
            <div class="alert alert-info" role="alert" style="margin-top: 20px;">
                Sipariş Bulunamadı
            </div>
        @endif
    </div>
@endsection
