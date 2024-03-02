<!DOCTYPE html>
<html>
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
			<div class="col-md-3 col-lg-3 col-xl-3"></div>
			<div class="col-md-6 col-lg-6 col-xl-6">
				<div class="d-flex justify-content-center">
					<div>
						<h4>Edit #{{ $records[0]->id }}</h4>
					</div>
				</div>
				<div class="mt-2">
					<form action="/edit/{{ $records[0]->id }}" method="post" accept-charset="utf-8">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="d-grid gap-3">
							<div>
								<input  type="text" class="form-control" name="product" placeholder="Product" value='{{ old("product", $records[0]->product) }}' required>
								@error('product')
								    <div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div>
								<input type="number" class="form-control" name="quantity" placeholder="Quantity" value='{{ old("quantity", $records[0]->quantity) }}' required>
								@error('quantity')
								    <div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div>
								<div class="input-group">
									<span class="input-group-text" id="naira">&#8358;</span>
									<input type="number" class="form-control" name="amount" placeholder="Amount" value='{{ old("amount", $records[0]->amount) }}' required>
								</div>
								@error('amount')
									<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="d-grid gap-2 mt-2">
							<button type="submit" class="btn btn-success">Done</button>
						</div>
					</form>
					<a href="/home" style="text-decoration:none">
						<div class="d-grid gap-2 mt-2">
							<button class="btn btn-light">Go back</button>
						</div>
					</a>
				</div>
			</div>
			<div class="col-md-3 col-lg-3 col-xl-3"></div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>