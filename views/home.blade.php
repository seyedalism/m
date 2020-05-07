@extends('master')

@section('title')
	لیگ کتابخوانی
@endsection

@section('content')

	<div class="mb-md-5 container-fluid d-flex flex-column flex-md-row justify-content-center align-items-center align-items-md-start">

		<div class="col-9 col-md-3">
			<img src="{{ asset('img/leage.png') }}" class="mt-2 img-fluid">
			<div class="text-center bg-success rounded p-2 text-white " style="overflow: hidden;">
				<span>کتاب این لیگ : </span>
				<span>{{ $book->name }}</span>
				<p class="mt-3">
					<span>توضیحات کتاب :</span>
					<span style="word-wrap: break-word;">{{ $book->desc }}</span>
				</p>
				<p class="mt-3 py-1">
					جهت شرکت در مسابقه به آیدی mahdiyavaran_admin@ در پیامرسان های تلگرام و بله پیام دهید.
				</p>
			</div>
			<a href="{{ url('quiz') }}" class="btn btn-outline-success btn-block my-3">
			ورود به مسابقه
			</a>
			<p class="muted text-center text-danger">
				جهت ورود به مسابقه ابتدا وارد شوید.
			</p>

		</div>
		
		<div class="col-md-4 col-12 p-3 mt-2">
			<div class="p-1 rounded bg-info position-relative mt-3 shadow">
				<div class="rounded col-11 p-3 px-4 position-absolute top-of-box">
				نفرات برتر لیگ
				</div>
				<div class="mt-5">
					{!! $all ?? '' !!}
				</div>
			</div>
		</div>

		<div class="col-md-4 col-12 p-3 mt-2">
			<div class=" p-1 rounded bg-info position-relative mt-3 shadow">
				<div class="rounded col-11 p-3 px-4 position-absolute top-of-box">
				نفرات برتر آخرین مسابقه
				</div>

				<div class="mt-5">
					{!! $last ?? '' !!}
				</div>
			</div>

			</div>

		</div>

	</div>

	<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		 aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header text-center">
					<h4 class="modal-title w-100 font-weight-bold">فرم ورود</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body mx-3">
					<form action="{{ url('login') }}" method="post">
						@csrf
						<div class="md-form mb-5">
							<label data-error="wrong" data-success="right" for="defaultForm-email">نام کاربری :</label>
							<input name="username" id="defaultForm-email" class="form-control validate">
						</div>

						<div class="md-form mb-4">
							<label data-error="wrong" data-success="right" for="defaultForm-pass">رمز:</label>
							<input name="password" type="password" id="defaultForm-pass" class="form-control validate">
						</div>

						<div class="modal-footer d-flex justify-content-center">
							<button class="btn btn-default">ورود</button>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>

@endsection