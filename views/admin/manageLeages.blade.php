@extends('admin.master')

@section('title')
	لیگ کتابخوانی
@endsection

@section('content')

<div class="container">
	
	<div class="bg-light shadow p-2 rounded mt-3">
		<form action="{{ url('admin/manage-leages') }}" method="post">
			@method('PUT')
			@csrf
			<div>
				<span>نام لیگ :</span>
				<input name="name" class="form-control">
			</div>
			<div>
				<span>زمان شروع</span>
				<input name="start" type="datetime-local" class="form-control">
			</div>
			<div>
				<span>زمان پایان</span>
				<input name="end" type="number" class="form-control">
			</div>
			<div>
				<button type="submit" class="btn btn-primary mt-2">افزودن</button>
			</div>
		</form>
	</div>

	<div class="bg-light shadow p-2 rounded mt-3">
		<table class="table table-hover table-bordered">
			<tr>
				<th>نام لیگ</th>
				<th>افزودن سوال</th>
				<th>حذف</th>
			</tr>

			@foreach ($leages as $leage)
			<tr>
				<td>{{ $leage->name }}</td>
				<td><a href="{{ url('admin/add-question/'.$leage->id) }}">افزودن سوال</a></td>
				<td><a href="{{ url('admin/delete-leage/'.$leage->id) }}">حذف</a></td>
			</tr>
			@endforeach

		</table>
	</div>

</div>

@endsection