@extends('master')

@section('title')
	لیگ کتابخوانی
@endsection

@section('content')

@if (isset($leage))

	<div class="col-11 rounded border border-primary p-3 mt-2 mx-auto text-primary">

		<span>لیگ:</span>
		<span>{{ $leage->name }}</span>

	</div>

	<div class="col-11 rounded border border-danger p-3 mt-2 mx-auto text-danger">
	حتما قبل از به پایان رسیدن زمان دکمه اتمام را کلیک نمایید.
	</div>

	<div class="questions col-11 col-10 mx-auto mt-3 p-2">
		<form action="{{ url('quiz/done') }}" method="post">
		@csrf
		@foreach ($quests as $key => $q)
			<div class="question p-3 my-3 rounded" style="color: white;background-color: #74b9ff;">
				<span class="p-1" style="text-align: justify !important;font-size: 1.3rem;">{{ $q->question }}</span>
				<ul class="my-4">
					<li>
						<input id="qq{{ $key.$q->id }}" type="radio" name="{{ 'question'.$q->id }}" value="1">
						<label style="display: inline;" for="qq{{ $key.$q->id }}">{{ $q->one }}</label>
					</li>
					<li>
						<input id="qq{{ ($key+1).$q->id }}" type="radio" name="{{ 'question'.$q->id }}" value="2">
						<label style="display: inline;" for="qq{{ ($key+1).$q->id }}">{{ $q->tow }}</label>
					</li>
					<li>
						<input id="qq{{ ($key+2).$q->id }}" type="radio" name="{{ 'question'.$q->id }}" value="3">
						<label style="display: inline;" for="qq{{ ($key+2).$q->id }}">{{ $q->three }}</label>
					</li>
					<li>
						<input id="qq{{ ($key+3).$q->id }}" type="radio" name="{{ 'question'.$q->id }}" value="4">
						<label style="display: inline;" for="qq{{ ($key+3).$q->id }}">{{ $q->four }}</label>
					</li>
				</ul>
			</div>
		@endforeach

		<button type="submit" name="done" class="btn btn-warning mx-auto d-block d-md-inline-block my-3">اتمام مسابقه</button>
	</div>
	</form>

	<div class="counter">
		<div class="badge badge-danger big">زمان باقی مانده:</div>
		<div id="second" class="badge badge-danger big"></div>
		<div id="min" class="badge badge-danger big"></div>
	</div>

	<script type="text/javascript">
		let start = {{ $leage->end - time() }};
		let sec = start % 60;
		setInterval(()=>{
			min.innerHTML = parseInt(start/60);
			second.innerHTML = sec;
			start--;
			sec--;
			if(sec == 0 && start != 0)
				sec = 60;
		},1000)
	</script>

@else
	<div class="alert alert-danger">هنوز زمان امتحان فرا نرسیده است.</div>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
@endif


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