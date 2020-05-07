@extends('admin.master')

@section('title')
	لیگ کتابخوانی
@endsection

@section('content')
	<div class="container my-3">
		<form action="{{ url('admin/add-question/'.$id) }}" method="post">
			@csrf
			@method('PUT')
			<div>
				<span>سوال:</span><input name="question" class="form-control">
			</div>
			<div>
				<span>گزینه اول</span><input name="one" class="form-control">
			</div>
			<div>
				<span>گزینه دوم</span><input name="tow" class="form-control">
			</div>
			<div>
				<span>گزینه سوم</span><input name="three" class="form-control">
			</div>
			<div>
				<span>گزینه چهارم</span><input name="four" class="form-control">
			</div>
			<div>
				<span>امتیاز سوال:</span><input name="point" class="form-control">
			</div>
			<div>
				<span>گزینه درست</span>
				<select class="form-control" name="answer">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
				</select>
			</div>
			<button type="submit" class="btn btn-primary text-white mt-2">افزودن</a>
		</form>
	</div>
@endsection