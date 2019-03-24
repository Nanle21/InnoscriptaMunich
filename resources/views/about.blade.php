@extends('layout.master')

@section('title')
	About
@endsection

@section('content')
<br>
<br>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h3>Über</h3>
					</div>
					<div class="card-body">
						<div class="card-title">Über das Projekt</div>
						<p>
							Das Projekt wurde mit laravel php, mariaDb, Laravel Excel, ajax, bootstrap css.
						</p>
						<p>
							Es konnte die Anforderung erfüllen, was in der Mail angegeben wurde
							1. Erlaube Name und E-Mail
							2. Mutli-Wahlfrage
							3. Verwenden Sie eine bildliche Darstellung der Partitur
							4. Scoreboard im Excel-Format herunterladen
						</p>
					</div>
					<div class="card-footer">
						&copy Innoscripta @php echo date('Y') @endphp 
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection