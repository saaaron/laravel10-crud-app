<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sales record app</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark shadow fixed-top">
		<div class="container">
      		<a class="navbar-brand" href="#sales_record">
      			<strong>Sales record</strong>
      		</a>
      	</div>
	</nav>
	<div class="container">
		<br><br><br><br>
		<div class="row">
			<div class="col-md-2 col-lg-2 col-xl-2"></div>
			<div class="col-md-8 col-lg-8 col-xl-8">
				@if (request()->has('r_status'))
					@if (request()->query('r_status') == 'csuccess')
						<div class="fixed-bottom p-3 mb-3" style="width:350px;">
					    	<div class="alert alert-success alert-dismissible fade show shadow" role="alert">
							  Product added successfully!
							  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
						</div>
				    @elseif (request()->query('r_status') == 'usuccess')
				    	<div class="fixed-bottom p-3 mb-3" style="width:350px;">
					    	<div class="alert alert-success alert-dismissible fade show shadow" role="alert">
							  Product edited successfully!
							  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
						</div>
					@elseif (request()->query('r_status') == 'dsuccess')
						<div class="fixed-bottom p-3 mb-3" style="width:350px;">
					    	<div class="alert alert-success alert-dismissible fade show shadow" role="alert">
							  Product deleted successfully!
							  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
						</div>
				    @endif
				@endif
				<div class="d-flex justify-content-between">
					<div>
						<h4>All records ({{$totalRecordsCount}})</h4>
					</div>
					<div>
						<a href="add/" style="text-decoration:none">
							<button class="btn btn-success btn-block">+ Add new</button>
						</a>
					</div>
				</div>
				@if (empty($records))
				    <p class="text-muted text-center p-3">
				    	<strong>No records yet!</strong>
				    </p>
				@else
					<table class="table table-striped mt-2">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Product</th>
								<th scope="col">Quantity</th>
								<th scope="col">Amount (&#8358;)</th>
								<th scope="col">Sold on</th>
								<th scope="col">Status</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($records as $record)
								<tr>
									<th scope="row">{{$record -> id}}</th>
									<td>{{$record -> product}}</td>
									<td>{{$record -> quantity}}</td>
									<td>{{$record -> amount}}</td>
									<td>{{$record -> formatted_date_time}}</td>
									<td class="text-success">Sold</td>
									<td>
										<a href="edit/{{$record -> id}}">Edit</a> / <a href="delete/{{$record -> id}}">Delete</a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				@endif
				<div class="p-3 fixed-bottom">
					Built by <a href="https://saaaron.github.io"><strong>Aaron</strong></a>
				</div>
			</div>
			<div class="col-md-2 col-lg-2 col-xl-2"></div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>