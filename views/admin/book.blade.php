@extends('admin.master')

@section('title')
    لیگ کتابخوانی
@endsection

@section('content')
    <div class="container my-3">
        <form action="{{ url('admin/book') }}" method="post">
            @csrf
            <div>
                <span>اسم کتاب</span><input name="name" class="form-control">
            </div>
            <div>
                <span>توضیحات کتاب</span><textarea name="desc" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary text-white mt-2">ویرایش</button>
        </form>
    </div>
@endsection