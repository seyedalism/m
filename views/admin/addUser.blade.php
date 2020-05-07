@extends('admin.master')

@section('title')
	لیگ کتابخوانی
@endsection

@section('content')
	<div class="container justify-content-center d-flex">
		<div class="bg-light shadow mt-3 col-10 p-2 rounded">
			<form method="post" action="{{ url('admin/add-user/') }}{{ ($id !== -1) ? $id : '' }}">
			@csrf
			@method('PUT')

			@if (isset($error) && !empty($error))
				<div class="alert alert-danger">
					{{ $error ?? ''}}
				</div>
			@endif

			<div>
				<span>نام و نام خانوادگی </span><input name="name" class="form-control" value="{{ $user->name ?? '' }}">
			</div>
				<div>
				<span>نام کاربری</span><input name="username" class="form-control" value="{{ $user->username ?? ''}}">
			</div>
			<div>
				<span>شماره تلفن</span><input name="phone" class="form-control" value="{{ $user->phone ?? ''}}">
			</div>
			<div>
				<span>رمز</span><input name="password" class="form-control">
			</div>
			<div>
				<span>شماره دانشجویی</span><input name="uniNum" class="form-control" value="{{ $user->uniNum ?? ''}}">
			</div>

			@if ($id === -1)
				<button class="btn btn-primary mt-2" type="submit">افزودن</button>
			@else
				<button class="btn btn-primary mt-2" type="submit" name="edit" value="edit">ویرایش</button>
			@endif

			</form>
		</div>
	</div>
@endsection