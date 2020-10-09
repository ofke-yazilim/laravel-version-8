@extends('frontent.index')

@section('title', 'Frontent Dashboard')

@section('sidebar')
    @parent

@endsection

@section('sidebar')
    @parent

@endsection

@section('content')
    <a href="/dashboard" class="btn btn-primary btn-lg btn-block active" role="button" aria-pressed="true">Müşteri Tarafı</a>
    <a href="/admin/" class="btn btn-secondary btn-lg  btn-block active" role="button" aria-pressed="true">Admin Tarafı</a>
@endsection
