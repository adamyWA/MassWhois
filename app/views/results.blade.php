<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://bootswatch.com/readable/bootstrap.min.css">
	</head>
	<body style="background:lightgrey">
		<div class="container">
			<div class="col-md-12">
				<div class="row">
					<h1>Results</h1>
						
					@foreach ($results as $k=>$v) 
						<div class="list-group">
						  <a href="#" class="list-group-item active">
							 <strong>Registrant Name: </strong>{{ $k }}
						  </a>
						  @foreach($v as $domain)
						  <p class="list-group-item">{{ $domain }} &nbsp;
						  </p>
						  @endforeach
						</div>
					@endforeach

				</div>
			</div>
		</div>
	</body>
</html>