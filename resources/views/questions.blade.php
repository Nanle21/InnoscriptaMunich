@php
	use App\Http\Controllers\Controller;
@endphp
@extends('layout.master')

@section('title')
	Questions
@endsection


@section('content')
	<br><br>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					@include('layout.message-block')
					@php
						if($getUserResult->count() > 0){
							@endphp
								<p class="alert alert-warning">Sorry, the test can only be taken once</p>
							@php
						}
						else{
						@endphp
							<!-- <button class="btn btn-warning" type="submit">Submit Test</button> -->
						@php
					}
					@endphp
					<div class="card-header">
						<h3>Questions: {{Auth::user()->name}}</h3>
					</div>
					<div class="card-body">
						<!-- <h6>What is your name</h6> -->
						<form action="{{url('/submit_answer')}}" method="post">
							
						
						<div class="card-title">
							<ul>
							@foreach($questions as $questions)
							<li>
						    <h4>{{$questions->question}}</h4>
						    <ul class="choices">
						    @php
						    	$answers = Controller::getAnswers($questions->id);
						    	foreach($answers as $answers){
						    		@endphp
						    			<li><label><input type="radio" id="answer_check" name="questions{{$answers->question_id}}" value="{{$answers->answer}}"> <span>{{$answers->answer}}</span></label></li>
						    		@php
						    	}	
						    @endphp
						    </ul>
						  </li>
						  @endforeach
						  <input type="hidden" name="_token" value="{{ Session::token()}}">
						  
						</ul>
						</div>


					</div>
					<div class="card-footer">
						@php
						if($getUserResult->count() > 0){
							@endphp
								<button class="btn btn-warning" type="submit" disabled>Submit Test</button>
							@php
						}
						else{
						@endphp
							<button class="btn btn-warning" type="submit">Submit Test</button>
						@php
					}
					@endphp
					</div>

					</form>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-header">Result</div>
					@php
						if($getUserResult->count() > 0){
							@endphp
								<input type="hidden" id="score" value="{{$getUserResult[0]->passed}}">
							<input type="hidden" id="failed" value="{{$getUserResult[0]->failed}}">
							@php
						}
						else{

					}
						
					@endphp
					<div class="card-body">
						<div id="container" style="width:100%; height:400px;"></div>
					</div>
					<div class="card-footer">
						<a class="btn btn-success" href="{{url('/get_excel')}}">Download Excel results</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection


@section('scripts')
	<script type="text/javascript">
		
	document.addEventListener('DOMContentLoaded', function () {
			var score = parseInt($('#score').val());
			var failed = parseInt($('#failed').val());
			
    var myChart = Highcharts.chart('container', {
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Score Pie Chart'
        },
         series: [{
		    name: 'Test Result',
		    colorByPoint: true,
		    data: [{
		      name: 'passed',
		      y: score,
		      sliced: true,
		      selected: true
		    }, {
		      name: 'Failed',
		      y: failed
		    }, ]
		  }]
    });
});



	function submitTest(){
		var answer_id = $('#answer_check').val();

		var data = new FormData();

		data.append('answer_id', answer_id);
		alert(answer_id);
		$.ajax({
			url: "/submit_answer",
			type: "POST",
			data:data,
			timeout: 5000,
	        contentType: false,
	        cache: false,
	        processData: false,
	        headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    	},
	    	success:function(response){

	    	},
	    	error: function(){

	    	}
		})
	}
	</script>
@endsection
