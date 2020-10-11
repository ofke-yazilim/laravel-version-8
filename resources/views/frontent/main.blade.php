@extends('frontent.index')

@section('title', 'Frontent Dashboard')

@section('sidebar')
    @parent

@endsection

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
    <a href="/dashboard" class="btn btn-primary btn-lg btn-block active" role="button" aria-pressed="true">Müşteri Tarafı</a>
    <a href="/admin/" class="btn btn-secondary btn-lg  btn-block active" role="button" aria-pressed="true">Admin Tarafı</a>
@endsection
