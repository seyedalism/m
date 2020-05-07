@extends('admin.master')

@section('title')
	لیگ کتابخوانی
@endsection

@section('content')
	<div class="container my-3 col-12 col-md-4">
		<form action="{{ url('admin/login') }}" method="post">
			@csrf
			<div>
				<span>نان کاربری</span><input name="username" class="form-control" style="direction: ltr !important;">
			</div>
			<div>
				<span>رمز ورود</span><input name="password" class="form-control" style="direction: ltr !important;">
			</div>
			
			<button type="submit" class="btn btn-primary text-white mt-2">ورود</a>
		</form>
	</div>
@endsection