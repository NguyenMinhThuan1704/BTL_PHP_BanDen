<!-- resources/views/child.blade.php -->
 
@extends('Main.layout_main')
 
@section('title', 'Thế Giới Ánh Sáng - Một thế giới đèn trang trí nội ngoại thất cao cấp')


@section('banner')
    @parent
    @include('Banner.banner')
@endsection

<!-- @section('header')
    @parent
    @include('Header.header')
@endsection
 
@section('container')
    @include('Main.main')
@endsection

@section('footer')
    @include('Footer.footer')
@endsection -->