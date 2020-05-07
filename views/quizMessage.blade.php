@extends('master')

@section('title')
    لیگ کتابخوانی
@endsection

@section('content')

    <p class="alert alert-info mt-5">امتیاز شما ثبت و در جدول امتیازات قرار گرفت.</p>
    <p class="alert alert-info mb-5">امتیاز این مرحله {{ $norm ?? 0}}</p>

@endsection