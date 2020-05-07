@extends('admin.master')

@section('title')
	لیگ کتابخوانی
@endsection

@section('content')

<div class="container">
	
	<div class="bg-light shadow p-2 rounded mt-3">
		<table class="table table-hover table-bordered">
			<tr>
				<th>نام و نام خانوادگی</th>
				<th>شماره دانشجویی</th>
				<th>ویرایش</th>
				<th>حذف</th>
			</tr>

			@foreach ($users as $user)
				<tr>
					<td>{{ $user->name }}</td>
					<td>{{ $user->uniNum }}</td>
					<td><a href="{{ url('admin/add-user/'.$user->id) }}">ویرایش</a></td>
					<td><a href="{{ url('admin/delete-user/'.$user->id) }}">حذف</a></td>
				</tr>
			@endforeach

		</table>

	</div>

</div>

@endsection